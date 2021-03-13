<?php defined('BASEPATH') OR exit('No direct script access allowed');

class L_surat {

    public function load_option($data_option = array(), $selected = NULL)
	{
		$param1 = (is_null($selected)) ? FALSE : TRUE;
		$param2 = (isset($data_option) and is_array($data_option)) ? TRUE : FALSE;

		if ($param2) {
			$opt = '';
			if ($param1) {
				foreach ($data_option as $key => $val) {
					if ($selected == $key) {
						$opt .= '<option value="' . $key . '" selected="selected">' . $val . '</option>';
					} else {
						$opt .= '<option value="' . $key . '">' . $val . '</option>';
					}
				}
			} else {
				foreach ($data_option as $key => $val) {
					$opt .= '<option value="' . $key . '">' . $val . '</option>';
				}
			}
			return $opt;
		} else {
			return '<option value="">Data dropdown kosong !</option>';
		}
    }

	function loadValArray($param=NULL, $data=0)
	{
		if(isset($param[$data])){ 
			return $param[$data];
		}else{
			return '';
		} 
	}

}