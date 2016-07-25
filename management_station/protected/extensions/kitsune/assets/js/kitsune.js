/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var Kitsune = {};
// Load the Visualization API and the piechart package.

google.load('visualization', '1', {'packages':[ 'geochart', 'corechart'], language:['en']});
google.load("visualization", "1", {packages:["map"], language:['en']});


Kitsune.drawOccChart = function (channels, contLab) {

    contLab = contLab ? contLab : 'occchart_div';

    var dataTable = new google.visualization.DataTable();
    
    dataTable.addColumn({ type: 'date', id: 'start' });
    dataTable.addColumn({ type: 'date', id: 'end' });
    dataTable.addColumn({ type: 'string', id: 'content' });
    dataTable.addColumn({ type: 'string', id: 'group' });
    dataTable.addColumn({ type: 'string', id: 'className' });
    var dataAux = [];
//  Channel structure 
//  channels[channel_number] =  {
//      occ : [],
//      ts : [],
//      pow : []
//  };

    var futTime;
    var channelsLength=0;
    for( var i  in channels){
        channelsLength++;
        var cha = channels[i];
        var tsSize = cha.ts.length;
        for (var j = 0; j< tsSize; j++){
            if(j === tsSize - 1){
                futTime = cha.ts[j];
                futTime.setSeconds(futTime.getSeconds()+1);
            }else{
                futTime = cha.ts[j+1];
            }
            var text;
            if(cha.occ[j]==="1"){
//                if(fCol.indexOf(color.occ) === -1) fCol.push(color.occ);
                text = "occ";
            }else {
            // if(cha.occ[j]==="2"){
//                if(fCol.indexOf(color.tx) === -1) fCol.push(color.tx);
                // text = "tx";
            // }
            // else{
//                if(fCol.indexOf(color.vac) === -1) fCol.push(color.vac);
                text = "vac";
            }
            dataAux.push([cha.ts[j],  futTime, '', "Channel "+i, text]);
        }
    }
    
    var options = {
          "width":  "97%",
          "height": (channelsLength*25+100)+"px",
          "style": "box",
//          "customStackOrder" : "reverse()",
//          "editable" : false,
//          "selectable" : true
    };  
    dataTable.addRows(dataAux);
    
    var container = document.getElementById(contLab);
    var chart = new links.Timeline(container);

//    google.visualization.events.addListener(chart, 'select', Kitsune.onselect());
    var divLegend = document.createElement( 'div');
    divLegend.className = "occupancy_legend";
    divLegend.innerHTML = "<div class='legend square occ'></div> <div style='float:left'> Occupied </div>\
                          <div class='legend square vac'></div> <div style='float:left'> Vacant </div>";
    // <div class='legend square tx'></div><div style='float:left'> Secondary User</div>\
    //container.appendChild(divChart);
    container.appendChild(divLegend);
    
    $('#'+contLab).show();
    chart.draw(dataTable, options);
    
};

Kitsune.drawPowerChart = function( channels, contLab, color ) {
    contLab = contLab ? contLab : 'pwchart_div';
    color = color ? color : {
        vac: '#FFFFFF',
        occ: '#B0CAFA'
    };
    
    //View introductions
    var container = document.getElementById(contLab);
    var chart = new google.visualization.LineChart(container);
    
    // Create and populate the data table.
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn('date', 'x');
    var col=0;
    var row;
    
    for( var i in channels){
        dataTable.addColumn('number',i);
        for (var j = 0; j < channels[i].ts.length; j++ ){
            row=[];
            row.push(channels[i].ts[j]);
            for(var k = 0; k < col; k++){
                row.push(null);
            }
            row.push(parseFloat(channels[i].pow[j]));
            dataTable.addRows([row]);
        }
        col++;
    }
    // Create and draw the visualization.
    
    var options = {
        colors : ["rgb(51, 102, 204)", "rgb(226, 239, 217)", "rgb(144, 170, 219)", "rgb(128, 128, 128)", "rgb(218, 226, 243)"],
        chartArea: {width: '90%'},
        hAxis: {position: 'center', title: 'Channels', titleTextStyle: {color: 'black'}},
        vAxis: {},
        title: 'RSSI [dB]',
        curveType: "function",
        pointSize: 4,
        legend: {position: 'bottom', textStyle: {color: 'black', fontSize:12}, alignment:'center'}, 
        interpolateNulls:true
    };
    
    //container.appendChild(divChart);
        
    chart.draw(dataTable, options);
    $('#'+contLab).hide().show();
    
};

Kitsune.drawTXChart = function(channels, contLab, color){
    contLab = contLab ? contLab : 'txchart_div';
    color = color ? color : {
        vac: '#FFFFFF'
        
    };
    
    var container = document.getElementById(contLab);
    var chart = new google.visualization.ColumnChart(container);
    
    var data = new google.visualization.DataTable();
    
//    dataTable.addColumn({type: 'string', id: 'Channels'});
//    dataTable.addColumn({type: 'number', id: 'Throughtput (Mbps)'});
//    
    var channelsLength=0;
    var raw_data = [];
    for( var i in channels){
        var row = [];
        row.push(i);
        var tsSize = channels[i].ts.length;
        var total = 0;
        for (var j = 0; j < tsSize; j++){
            total += parseFloat(channels[i].tx[j]);
        }
        row.push( total/tsSize);
        raw_data.push(row);
        channelsLength++;
    }
    data.addColumn('string', 'Columns');
    for (var i = 0; i  < raw_data.length; ++i) {
        data.addColumn('number', raw_data[i][0]);
    }
    data.addRows(1);
    for (var i = 0; i  < raw_data.length; ++i) {    
        data.setValue(0, i+1, raw_data[i][1]);
    }
    var options = {
        colors : ["rgb(51, 102, 204)", "rgb(226, 239, 217)", "rgb(144, 170, 219)", "rgb(128, 128, 128)", "rgb(218, 226, 243)"],
        title: 'Throughput [Mbps]',
        position: 'center',
        chartArea: {width: '85%'},
        legend: {position: "bottom", textStyle: {color: 'black', fontSize:12}},
        hAxis: {position: 'center', title: 'Channels', titleTextStyle: {color: 'black'}},
        vAxis: {minvalue:0}
};
    $(contLab).show();
    chart.draw(data, options);    
};

Kitsune.drawCFChart = function(channels, contLab, color){
    contLab = contLab ? contLab : 'cfchart_div';
    color = color ? color : {
        vac: '#FFFFFF'
        
    };

    var container = document.getElementById(contLab);
    var chart = new google.visualization.ColumnChart(container);  
    var data = new google.visualization.DataTable();
    
//    dataTable.addColumn({type: 'string', id: 'Channels'});
//    dataTable.addColumn({type: 'number', id: 'Throughtput (Mbps)'});
//    
    var channelsLength=0;
    var raw_data = [];
    for( var i in channels){
        var row = [];
        row.push(i);
        var tsSize = channels[i].ts.length;
        var total = 0;
        for (var j = 0; j < tsSize; j++){
            total += parseFloat(channels[i].cf[j])*100;
        }
        row.push( total/tsSize);
        raw_data.push(row);
        channelsLength++;
    }
    data.addColumn('string', 'Columns');
    for (var i = 0; i  < raw_data.length; ++i) {
        data.addColumn('number', raw_data[i][0]);
    }
    data.addRows(1);
    for (var i = 0; i  < raw_data.length; ++i) {    
        data.setValue(0, i+1, raw_data[i][1]);
    }
    var options = {
        colors : ["rgb(51, 102, 204)", "rgb(226, 239, 217)", "rgb(144, 170, 219)", "rgb(128, 128, 128)", "rgb(218, 226, 243)"],
          title: 'Confidence [%]',
          position: 'center',
          chartArea: {width: '90%'},
          legend: {position: "bottom", textStyle: {color: 'black', fontSize:12}},
          hAxis: {position: 'center', title: 'Channels', titleTextStyle: {color: 'black'}},
          vAxis: {minValue: 0, maxValue: 100}
        };
    $(contLab).show();
    chart.draw(data, options);
};

// Kitsune.drawMobChart = function (channels, contLab) {

//     contLab = contLab ? contLab : 'mobchart_div';

//     var dataTable = new google.visualization.DataTable();
    
//     dataTable.addColumn({ type: 'date', id: 'start' });
//     dataTable.addColumn({ type: 'date', id: 'end' });
//     dataTable.addColumn({ type: 'string', id: 'content' });
//     dataTable.addColumn({ type: 'string', id: 'group' });
//     dataTable.addColumn({ type: 'string', id: 'className' });
//     var dataAux = [];
// //  Channel structure 
// //  channels[channel_number] =  {
//                     // occ : [],
//                     // ts : [],
//                     // tx : [],
//                     // pow : [],
//                     // cf : [],
//                     // dc : [],
//                     // db : [],
//                     // dn : []
// //  };

//     var futTime;
//     var channelsLength=0;

//     for( var i  in channels){
//         channelsLength++;
//         var cha = channels[i];
//         var tsSize = cha.ts.length;
//         for (var j = 0; j< tsSize; j++){
//             if(j === tsSize - 1){
//                 futTime = cha.ts[j];
//                 futTime.setSeconds(futTime.getSeconds()+1);
//             }else{
//                 futTime = cha.ts[j+1];
//             }
//             // var text="cha"+cha.dcc[j];
//             dataAux.push([cha.ts[j],  futTime, '', "Channel "+i, text]);
//         }
//     }
    
//     var options = {
//           "width":  "97%",
//           "height": (channelsLength*25+100)+"px",
//           "style": "box",
// //          "customStackOrder" : "reverse()",
// //          "editable" : false,
// //          "selectable" : true
//     };  
//     dataTable.addRows(dataAux);
    
//     var container = document.getElementById(contLab);
//     var chart = new links.Timeline(container);

// //    google.visualization.events.addListener(chart, 'select', Kitsune.onselect());
//     var divLegend = document.createElement( 'div');
//     divLegend.className = "occupancy_legend";
//     divLegend.innerHTML = "<div class='legend square occ'></div> <div style='float:left'> Occupied </div>\
//                           <div class='legend square vac'></div> <div style='float:left'> Vacant </div>";
//     // <div class='legend square tx'></div><div style='float:left'> Secondary User</div>\
//     //container.appendChild(divChart);
//     container.appendChild(divLegend);
    
//     $('#'+contLab).show();
//     chart.draw(dataTable, options);
    
// };


/**
 * Draw geolocation of bss and cpes
 * @param {type} bsInfo
 * @param {type} cpeInfo
 * @param {type} contLab
 * @param {type} bsShowRange
 * @param {type} cpeShowRange
 * @param {type} bsShowMarker
 * @param {type} cpeShowMarker
 * @param {type} bsCenter
 * @returns {void}
 */
Kitsune.drawMarkersMap = function(bsInfo, cpeInfo, contLab, bsShowRange, cpeShowRange, bsShowMarker, cpeShowMarker,  bsICON, cpeICON, bsCenter){
    //Setting default values for parameters
    contLab = contLab ? contLab : 'geo_div';

    bsShowRange = bsShowRange !== "false" ? true : false;
    cpeShowRange = cpeShowRange !== "false" ? true : false;
    bsShowMarker = bsShowMarker !== "false" ? true : false;
    cpeShowMarker = cpeShowMarker !== "false" ? true : false;
    bsICON = bsICON ? bsICON : 'images/bsicon.jpg';
    cpeICON = cpeICON ? cpeICON : 'images/cpeicon.jpg';
    
    bsCenter = bsCenter !== "false" ? true : false;
    
    color ={
        bs: 'yellow',
        cpe: 'green'
    };
    
    var container = document.getElementById(contLab);
    var citymap = {};
    colors = ["rgb(51, 102, 204)", "rgb(226, 239, 217)", "rgb(144, 170, 219)", "rgb(128, 128, 128)", "rgb(218, 226, 243)"];
    var bs = {};
    bs.center = new google.maps.LatLng(0,0);
    if(bsInfo){
        bs.geo = Kitsune.getGeolocation(bsInfo.geolocation);
        bs.lat = bs.geo[0];
        bs.lon = bs.geo[1];
        bs.name = bsInfo.name;
        bs.center = new google.maps.LatLng(bs.geo[0], bs.geo[1]);
        bs.radius = 80;//meter?
        bs.color= color.bs;
        bs.showMarker=bsShowMarker;
        bs.show = bsShowRange;
        bs.markerICON=bsICON;
    }
    citymap[bs.name] = bs;
    
    if(cpeInfo)
    {
        
        if(!Array.isArray(cpeInfo)){
            cpeInfo = [ cpeInfo ];
        }
        for(var i = 0; i < cpeInfo.length; i++){
            var geo = Kitsune.getGeolocation(cpeInfo[i].geolocation);
            citymap[cpeInfo[i].name] = {
                center: new google.maps.LatLng(geo[0], geo[1]),
                radius: 100,
                // color: color.cpe,
                color: colors[i],
                show: cpeShowRange,
                showMarker: cpeShowMarker,
                markerICON: cpeICON,
                lat:geo[0],
                lon:geo[1]
              };
        }   
    } 
    
    var center;
    if(bsCenter){
        center =  bs.center;
    }else{
        center = citymap[cpeInfo[0].name].center;
    }
    var mapOptions = {
        zoom: 16,
        center: center,
        language: ['EN'],
        //OptionMapTypeID: TERRAIN, ROADMAP, SATELLITE
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };

    var map = new google.maps.Map(container, mapOptions);
    for (var city in citymap) {
        // Construct the circle for each value in citymap. We scale population by 20.
        if(citymap[city].show)
            Kitsune.addMapCircle(map, citymap[city]);
        if(citymap[city].showMarker)
            Kitsune.addMapMarker(map, citymap[city]);
    }
    $('#'+contLab).hide().show();
};
Kitsune.addMapCircle = function(map, location){
    var rangeOptions = {
        strokeColor: location.color,
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: location.color,
        fillOpacity: 0.2,
        map: map,
        center: location.center,
        radius: location.radius //Em km
      };
    new google.maps.Circle(rangeOptions);
};
// Function for adding a marker to the page.
Kitsune.addMapMarker = function(map, location) {
        marker = new google.maps.Marker({
        position: new google.maps.LatLng(location.lat+10000000000, location.lon),
        map: map,
//        flat: false,
        color: location.color,
        icon:location.markerICON
    });
};
Kitsune.onselect = function() {
  var sel = chart.getSelection();
  if (sel.length) {
    if (sel[0].row != undefined) {
      var row = sel[0].row;
      
      document.title = "event " + row + " selected";
    }
  }
};
Date.createFromMysql = function(mysql_string){ 
   if(typeof mysql_string === 'string')
   {
      var t = mysql_string.split(/[- :]/);

      //when t[3], t[4] and t[5] are missing they defaults to zero
      return new Date(t[0], t[1] - 1, t[2], t[3] || 0, t[4] || 0, t[5] || 0);          
   }

   return null;   
};
Kitsune.adjustData = function(_senInf){
    //Time centric informations
    //Creating a vector with organized data and mysql date translated to javascript
    var senInf = Kitsune.prepareSenInf(_senInf).sort(Kitsune.compare);
    //Creating channel centric information
    var chas = Kitsune.createChannelData(senInf);
    //Sorting channels by number of the channel
    var channels = Kitsune.sortChannelsDict(chas);
    return channels;
};

Kitsune.createFromSNMP = function(mysql_string){ 
   if(typeof mysql_string === 'string')
   {
      var t = mysql_string.split(/[\/]/);
      //when t[3], t[4] and t[5] are missing they defaults to zero
      return t;          
   }

   return null;   
};

Kitsune.prepareSenInf = function(senInf){
    
    for (var i in senInf){
        senInf[i].timestamp = Date.createFromMysql(senInf[i].timestamp);
    }
    return senInf;
};

Kitsune.createSenData = function(senInf){
    var dec = {};
    for (var i = 0; i < senInf.length; i++){
        var inf = senInf[i];
        dec[i] =  {
            ts : inf.timestamp,
            dcc : Kitsune.createFromSNMP(inf.DecisionOperatingChannel),
            dbc : Kitsune.createFromSNMP(inf.DecisionBackupChannel),
            dnc : Kitsune.createFromSNMP(inf.DecisionCandidateChannels),

        };
    }
    return dec;
};

Kitsune.createChannelData = function(senInf){
    var channels = {};
    for (var i = 0; i < senInf.length; i++){
        var inf = senInf[i];
        var scan = Kitsune.createFromSNMP(inf.wranIfSsaSensingChannel);
        var pow = Kitsune.createFromSNMP(inf.wranIfSsaSensingPathRssi);
        var thx = Kitsune.createFromSNMP(inf.wranCpeTxThroughput);
        var cnf = Kitsune.createFromSNMP(inf.wranIfSsaIdcUpdIndication);
        var occ = Kitsune.createFromSNMP(inf.wranIfSmSizeWranOccupiedChannelSet);
        
        var dcc = Kitsune.createFromSNMP(inf.DecisionOperatingChannel);
        var dbc = Kitsune.createFromSNMP(inf.DecisionBackupChannel);
        var dnc = Kitsune.createFromSNMP(inf.DecisionCandidateChannels);

        for (var c in scan ){ //Para cada um dos canais escaneados 
            var sc = scan[c] ? scan[c] : 0;
            var pw = pow[c] ? pow[c] : 0;
            var tx = thx[c] ? thx[c] : 0;
            var cf = cnf[c] ? cnf[c] : 0;
            var oc = occ[c] ? occ[c] : 0;
            
            var dc = dcc[c];
            var db = dbc[c];
            var dn = dnc[c];
            if(! channels[sc]){//Lazy instantiation
                channels[sc] =  {
                    occ : [],
                    ts : [],
                    tx : [],
                    pow : [],
                    cf : [],
                };
            }
            channels[sc].ts.push(inf.timestamp);
            channels[sc].pow.push(pw);
            channels[sc].cf.push(cf);
            channels[sc].tx.push(tx);
            channels[sc].occ.push(oc);
            channels[sc].dc.push(dc);
            channels[sc].db.push(db);
            channels[sc].dn.push(dn);
//            if(inf.wranIfSmWranOccupiedChannelSet.indexOf(sc) !== -1){//Vou deixar assim mas precisa corrigir canais de 0-9
//                channels[sc].occ.push(true);
//            }else{
//                channels[sc].occ.push(false);
//            }
            
        }
    }
    return channels;
};

Kitsune.sortChannelsDict = function(channels){
    var keys = Object.keys(channels);
    keys.sort(Kitsune.compareChannelKey);
    var dictAux = {};
    for (var i in keys){
        dictAux[keys[i]] = channels[keys[i]];
    }
    return dictAux;
};

Kitsune.compare = function(a,b) {
  if (a.timestamp < b.timestamp)
     return -1;
  if (a.timestamp > b.timestamp)
    return 1;
  return 0;
};

Kitsune.compareArray = function(a,b) {
  if (a[0] < b[0])
     return -1;
  if (a[0] > b[0])
    return 1;
  return 0;
};

Kitsune.compareChannelKey = function(a,b){
    var iA = parseInt(a);
    var iB = parseInt(b);
    
    if (iA < iB)
     return -1;
  if (iA > iB)
    return 1;
  return 0;
};

Kitsune.getGeolocation = function($geo){
    
    return $geo.split(/,/);
};

Kitsune.rad = function(x) {return x*Math.PI/180;};

Kitsune.getDistance = function(lat1, lon1, lat2, lon2){
    var R = 6371; // earth's mean radius in km
  var dLat  = Kitsune.rad(lat2 - lat1);
  var dLong = Kitsune.rad(lon2 - lon1);

  var a = Math.sin(dLat/2) * Math.sin(dLat/2);
  a = a+Math.cos(Kitsune.rad(lat1)) * Math.cos(Kitsune.rad(lat2)) * Math.sin(dLong/2) * Math.sin(dLong/2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  var d = R * c;

  return d;
};

Kitsune.getColors = function(){
  return [
    // grays
    '#ffffff', '#cccccc', '#c0c0c0', '#999999', '#666666', '#333333', '#000000',
    // reds
    '#ffcccc', '#ff6666', '#ff0000', '#cc0000', '#990000', '#660000', '#330000',
    // oranges
    '#ffcc99', '#ff9966', '#ff9900', '#ff6600', '#cc6600', '#993300', '#663300',
    // yellows
    '#ffff99', '#ffff66', '#ffcc66', '#ffcc33', '#cc9933', '#996633', '#663333',
    // olives
    '#ffffcc', '#ffff33', '#ffff00', '#ffcc00', '#999900', '#666600', '#333300',
    // greens
    '#99ff99', '#66ff99', '#33ff33', '#33cc00', '#009900', '#006600', '#003300',
    // turquoises
    '#99ffff', '#33ffff', '#66cccc', '#00cccc', '#339999', '#336666', '#003333',
    // blues
    '#ccffff', '#66ffff', '#33ccff', '#3366ff', '#3333ff', '#000099', '#000066',
    // purples
    '#ccccff', '#9999ff', '#6666cc', '#6633ff', '#6600cc', '#333399', '#330099',
    // violets
    '#ffccff', '#ff99ff', '#cc66cc', '#cc33cc', '#993399', '#663366', '#330033'
  ].sort(Kitsune.colorsUnsort);  
};

Kitsune.colorsUnsort = function(a, b){
    var r1, r2;
    r1 = Math.random();
    r2 = Math.random();
    if(r1 < r2)
        return 1;
    else if(r1 > r2)
        return -1;
    return 0;
};
