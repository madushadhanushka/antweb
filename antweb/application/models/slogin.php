<?php
class Slogin extends CI_Model {
	public function __construct() {
		$this->load->database ();
		$this->load->helper ( 'url' );
	}
        
	public function login($data) {
                print_r($data);
		$query=mysql_query("select * from employee where user_name='".$data['user_name']."'");
                //print_r("select * from employee where user_name=".$data['user_name']);
                while($res=mysql_fetch_array($query)){
                    echo $res['pass_word'].' '.sha1 ( $data ['pass_word'] );
                    if ($res['pass_word'] == sha1 ( $data ['pass_word'] )) {
                        echo 'done';
				$data = array (
						'user_name' => $res['user_name'],
						'user_type' => $res['type'],
						'login' => "1" 
				);
				return $data;
			} else {
				return array (
						'login' => '0' 
				);
			}
                }
		
	}
	public function doforget() {
		$this->load->helper ( 'url' );
		$email = $_POST ['email'];
		$q = $this->db->query ( "select * from users where email='" . $email . "'" );
		if ($q->num_rows > 0) {
			$r = $q->result ();
			$user = $r [0];
			$this->resetpassword ( $user );
			$info = "Password has been reset and has been sent to email id: " . $email;
			redirect ( '/index.php/login/forget?info=' . $info, 'refresh' );
		}
		$error = "The email id you entered not found on our database ";
		redirect ( '/index.php/login/forget?error=' . $error, 'refresh' );
	}
}
?>
