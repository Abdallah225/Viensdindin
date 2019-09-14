<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Created by SIMPLON CI.
 * User: Diarrassouba Abdoulaye
 * Email: diarrassoubaabdoulaye73@gmail.com
 */
class Email_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
    }
	/**
        * @param $email						:  
		* @param $query   					:   
		* @param $new_password		   		: 
		* @param $new_password		   		:   
        * Description      					:   methode de changer de mot de passe
    */
	function reset_password() {
		// Checking email existence
		$email		=	$this->input->post('email');
        $query 		=	$this->db->get_where('user', array('email' => $email));
			
        if ($query->num_rows() > 0) {
			
			// Saving the new password's hashed value into database
			$new_password = substr(md5(rand(100000000, 20000000000)), 0, 7);
        	$new_hashed_password = sha1($new_password);
			$this->db->update('user', array('password' => $new_hashed_password), array('email'=>$email));
			$this->session->set_flashdata('password_reset', 'success');
			
			// Envoi à l'utilisateur du courrier électronique de notification avec un nouveau mot de passe
			$email_msg	=	"Votre nouveau mot de passe : ".$new_password;
			$email_sub	=	"Demande de réinitialisation du mot de passe";
			$email_to	=	$email;
			$this->do_email($email_msg , $email_sub , $email_to);
        }
		else {
			$this->session->set_flashdata('password_reset', 'failed');
		}
	}
	/**
        * @param $email						:  
		* @param $query   					:   
		* @param $new_password		   		: 
		* @param $new_password		   		:   
        * Description      					:   
    */
	function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
	{
		
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']		= "smtp";
        $config['smtp_host']	= "localhost";
        $config['smtp_port']	= "25";
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;

        $this->load->library('email');

        $this->email->initialize($config);

		$site_name	=	$this->db->get_where('settings' , array('type' => 'site_name'))->row()->description;
		if($from == NULL)
			$from		=	$this->db->get_where('settings' , array('type' => 'site_email'))->row()->description;
		
		$this->email->from($from, $site_name);
		$this->email->to($to);
		$this->email->subject($sub);
		
		
		$this->email->message($msg);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();
	}
}
