<?php 
class Auth extends CI_Model 
{

	public function __construct()
	{
        parent::__construct();
	}

	function register($username,$password,$nomor_induk,$nomor_wa)
	{
		$data_user = array(
			'username'=>$username,
			'password'=>password_hash($password,PASSWORD_DEFAULT),
			'nomor_induk'=>$nomor_induk,
			'wa_member'=>$nomor_wa,
			'status_registrasi'=>'N',
			'status_akun'=>'N'
		);
		$this->db->insert('tb_user',$data_user);
	}

	function login_user($username,$password)
	{
        $query = $this->db->get_where('tb_user',array('username'=>$username));
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('id_user',$data_user->id_user);
                $this->session->set_userdata('username',$username);
				$this->session->set_userdata('nama',$data_user->nama);
				$this->session->set_userdata('level', $data_user->level);
				$this->session->set_userdata('is_login',TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
	}
	
    function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
			redirect('login');
		}
    }

    function update_key($email, $access_key, $verifikasi){
    	// CEK DATABASE
    	$cek = $this->db->select('*')->from('tb_user')->where('email_member', $email)->get()->row_array();
    	// DATA INPUTAN
    	$data = [
    		'access_key_registration' => $access_key,
    		'verification_code_registration' => $verifikasi
    	];
    	return $this->db->where('id_user', $cek['id_user'])->update('tb_user', $data);
    }

    function update_key2($id, $access_key, $verifikasi){
    	// CEK DATABASE
    	$cek = $this->db->select('*')->from('tb_user')->where('id_user', $id)->get()->row_array();
    	// DATA INPUTAN
    	$data = [
    		'access_key_registration' => $access_key,
    		'verification_code_registration' => $verifikasi
    	];
    	return $this->db->where('id_user', $id)->update('tb_user', $data);
    }
}
?>
