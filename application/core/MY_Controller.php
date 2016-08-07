<?php
class MY_Controller extends CI_Controller {
	
	public $data = array();
		function __construct() {
			parent::__construct();
			$this->data['errors'] = array();
			$this->data['site_name'] = config_item('site_name');
		}

	public function getTgl(){
		$datestring = '%d/%m/%Y';
		$time = time();
		return mdate($datestring, $time);
	}
}