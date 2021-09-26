<?php

namespace Thomasdseao\OvhSms;

class OvhSmsService {
    private $ovhsms;

    /*
     * Construct function to declare private global variable with ENV parameters
    */
    public function __construct($url, $app_account, $app_login, $app_password) {
		$url = $this->validate($url, 'https://www.ovh.com/cgi-bin/sms/http2sms.cgi');
		$app_account = $this->validate($app_account, '');
		$app_login = $this->validate($app_login, '');
        $app_password = $this->validate($app_password, '');
        //Define the base URL for the call with options Json response ...
        $this->ovhsms = $url."?&contentType=application/json&account=".$app_account."&login=".$app_login."&password=".$app_password;
    }

    /*
     * Function to validate parameters or return default value
    */
	private function validate($val, $default) {
		if (!empty($val) && is_string($val)) {
			return $val;
		}
		return $default;
	}

    /*
     * Function to send a SMS
    */
    public function send($from, $to, $message, $nostop) {
        //Check parameters
        if(!$this->validate($from, false) || !$this->validate($to, false) || !$this->validate($message, false)) {
            return false;
        }
        //Replace '+' by '00' for the international format
        $to = str_replace('+', '00', $to);
        //Get request
        return file_get_contents($this->ovhsms."&noStop=".$nostop."&from=".$from."&to=".$to."&message=".urlencode($message));
    }
}
