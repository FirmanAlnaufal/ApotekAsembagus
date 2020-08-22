<?php
	function check_already_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id_user');
		if($user_session)
		{
			redirect('dashboard');
		}
	}
	function check_not_login()
	{
		$ci =& get_instance();
		$user_session = $ci->session->userdata('id_user');
		if(!$user_session)
		{
			redirect('auth/login');
		}
	}
	function check_admin(){
		$ci =& get_instance();
		$ci->load->library('fungsi');
		if($ci->fungsi->user_login()->level != 1){
			redirect('dashboard');
		}
	}

	function getAutoNumber($table, $field, $pref, $length, $where = "") {
    $ci = &get_instance();
        $query = "SELECT IFNULL(MAX(CONVERT(MID($field," . (strlen($pref) + 1) . "," . ($length - strlen($pref)) . "),UNSIGNED INTEGER)),0)+1 AS NOMOR
                FROM $table WHERE LEFT($field," . (strlen($pref)) . ")='$pref' $where";
        $result = $ci->db->query($query)->row();
        $zero="";
        $num = $length - strlen($pref) - strlen($result->NOMOR);
        for ($i = 0; $i < $num; $i++) {
            $zero = $zero . "0";
        }
        return $pref . $zero . $result->NOMOR;
	}
	
	function indo_currency($nominal){
		$result = "Rp" . number_format($nominal, 0, '.', '.');
		return $result;
	}