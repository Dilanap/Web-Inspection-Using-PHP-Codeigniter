<?php
/**
* 
*/
class Model_operator extends CI_Model
{
	
	function login($username,$password)
	{
		$chek =	$this->db->get_where('pegawai',array('username'=>$username,'password'=>$password));
		
		// untuk check data username dan password ada atau tidak
		if ($chek->num_rows()>0) 
		{
			return 1;
		}
		else {
			return 0;
		}
	}
	

}