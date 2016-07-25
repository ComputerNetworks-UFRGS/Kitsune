<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class GatewayConfigForm extends CFormModel
{
	public $polling;
	public $timeout;
	public $cache;
	// public $body;
	// public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('polling, timeout, cache', 'required'),
			// verifyCode needs to be entered correctly
			// array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			// 'verifyCode'=>'Verification Code',
			'polling'=> 'Poll Interval',
			'timeout' => 'Request Timeout',
			'cache' => 'Clear Cache'
		);
	}
}