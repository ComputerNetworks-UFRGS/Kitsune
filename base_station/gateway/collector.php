#!/usr/bin/php -q
<?PHP
function connect() {
	$c = mysql_connect("localhost", "root", "admin");
	mysql_select_db('gateway');
	return $c;
}

function putDatabase($t) {
	$c = connect();
	if (!$c)
		die("No connection with database");
	foreach ($t as $key => $value) {
		$columns = implode(", ", array_keys($value));
		//$escaped_values = array_map('mysql_real_escape_string', array_values($value));
		//$values  = implode(", ", $escaped_values);
		$values  = implode(", ", array_values($value));
		$query = "INSERT INTO  `cf_results`($columns) VALUES ($values)";
		$r = mysql_query($query,$c);
		if (mysql_errno()) {
			echo "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>";
		}
	}
	mysql_close($c);
}

snmp_set_valueretrieval(SNMP_VALUE_PLAIN);
snmp_read_mib('/usr/local/share/snmp/mibs/SNMPv2-SMI.txt');
snmp_read_mib('/usr/local/share/snmp/mibs/MIB-DISS.smi');

$id_counter = 0;

// Aqui pegar os IPs de cada CPE na base do gateway!
$c = connect();
$cpe_infos = mysql_query("SELECT * FROM cpe_info", $c);
$num_rows = mysql_num_rows($cpe_infos);
mysql_close($c);

// trocar por while(1)
for ($index = 0; $index < 2; $index++) {
	for ($cpe_id = 1; $cpe_id <= $num_rows; $cpe_id++) {
		$c = connect();
		$result = mysql_query("SELECT cpe_ip FROM cpe_info WHERE id = $cpe_id");
		mysql_close($c);
	
		if (!$result) {
	    		echo "No CPE found with ID " .$cpe_id;
		} else {
			$id_counter++;
			$cpe_info = mysql_fetch_row($result);
			$IP_CPE = $cpe_info[0];
			$CPE_array=array($IP_CPE=>array(),);
			// Inforacoes gerais do CPE/
			$CPE_array[$IP_CPE]["id"] = $id_counter;
			$CPE_array[$IP_CPE]["timestamp"] = round(microtime(true) * 1000);
			$CPE_array[$IP_CPE]["status"] = "'new'";
			$CPE_array[$IP_CPE]["cpe_id"] = $cpe_id;
			$CPE_array[$IP_CPE]["cpe_ip"] = $IP_CPE;//ip2long($IP);
			$IP = long2ip($IP_CPE);
			// Informacoes dos resultados da MIB
			$CPE_array[$IP_CPE]["wranIfSmManagedChannelStatus"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.5.5.0")."'";
			$CPE_array[$IP_CPE]["wranIfSmWranOccupiedChannelSet"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.5.6.0")."'";
			$CPE_array[$IP_CPE]["wranIfSsaTimeLastSensing"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.6.2.0")."'";
			$CPE_array[$IP_CPE]["wranIfSsaSensingPathRssi"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.6.3.0")."'";
			$CPE_array[$IP_CPE]["DecisionOperatingChannel"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.8.1.0")."'";
			$CPE_array[$IP_CPE]["DecisionBackupChannel"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.8.2.0")."'";
			$CPE_array[$IP_CPE]["DecisionCandidateChannels"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.8.3.0")."'";
			$CPE_array[$IP_CPE]["DecisionUplinkThroughput"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.8.7.0")."'";
			$CPE_array[$IP_CPE]["DecisionDownlinkThroughput"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.8.8.0")."'";
			$CPE_array[$IP_CPE]["SharingStartTime"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.8.9.0")."'";
			$CPE_array[$IP_CPE]["SharingStopTime"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.8.10.0")."'";
			$CPE_array[$IP_CPE]["SharingAllocatedBand"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.8.11.0")."'";
			$CPE_array[$IP_CPE]["wranIfGenericObj5"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.9.5.0")."'";
			$CPE_array[$IP_CPE]["wranIfGenericObj6"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.9.6.0")."'";
			$CPE_array[$IP_CPE]["wranIfGenericObj7"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.9.7.0")."'";
			$CPE_array[$IP_CPE]["wranIfGenericObj8"]="'".snmp2_get("$IP", "public", "1.3.6.1.2.1.1300.9.8.0")."'";
			putDatabase($CPE_array);
		}
	}
	// O valor do sleep deve ser lida do Base, nas configuracoes do Gateway!
	$c = connect();
	$config_row = mysql_query("SELECT pollInterval FROM configuration WHERE status = 'running'");
	mysql_close($c);

	if (!$config_row) {
                echo "No configuration.";
		sleep(2);
        } else {
		$gateway_config = mysql_fetch_row($config_row);
		$sleep_time = $gateway_config[0];
		sleep($sleep_time);
	}
}
?>
