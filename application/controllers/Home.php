<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by SIMPLON CI.
 * User: Diarrassouba Abdoulaye
 * Email: diarrassoubaabdoulaye73@gmail.com
 */
class Home extends CI_Controller {

    // constructeur pour l'initialisation

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('crud_model');
		$this->load->model('email_model');
		$this->load->library('session');
		$this->load->helper('directory');
		$this->load->helper('form');
    	$this->load->library('form_validation');

	}


	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page home pour l'afficharge du 1er vue
    */
	public function index()
	{
		$this->login_check();
		$page_data['page_name']		=	'home';
		$page_data['page_title']	=	'bienvenue';
		$this->load->view('frontend/index', $page_data);
	}

	public function text()
	{
		// $this->login_check();
		// $page_data['episode_id']		=	$episode_id;
		$page_data['page_name']		=	'baaTest';
		$page_data['page_title']	=	'bienvenue';
		$this->load->view('frontend/index', $page_data);
	}
	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:  function register
    */
	function signup()
	{
		$this->login_check();
		
		if (isset($_POST) && !empty($_POST))
		{
			$signup_result = $this->crud_model->signup_user();
			if ($signup_result == true){
				redirect(base_url().'index.php?home/signin' , 'refresh');
			}
			else if ($signup_result == false){
				redirect(base_url().'index.php?home/signup' , 'refresh');
			}

		}
		$page_data['page_name']		=	'signup';
		$page_data['page_title']	=	'Insription';
		$this->load->view('frontend/index', $page_data);

	}

	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de login
    */
	function signin($param1 = "")
	{
		$this->login_check();
		if (isset($_POST) && !empty($_POST))
		{
			$number 		= $this->input->post('number');
			$password 		= $this->input->post('password');
			$signin_result 	= $this->crud_model->signin($number, $password);
			if ($signin_result == true)
			{
				if ($this->session->userdata('login_type') == 1)
					redirect(base_url().'index.php?admin/dashboard' , 'refresh');
				else if ($this->session->userdata('login_type') == 0)
					redirect(base_url().'index.php?page/home' , 'refresh');
			}
			else if ($signin_result == false){
				if ($param1 == 'admin') {
					$this->session->set_flashdata('error_message', get_phrase('Échec de la connexion'));
					redirect(base_url().'index.php?home/signin/' , 'refresh');
				}else {
					redirect(base_url().'index.php?home/signin' , 'refresh');
				}
			}
		}
		if ($param1 == 'admin') {
			$this->load->view('backend/login.php');
		}else {
			$page_data['page_name']		=	'signin';
			$page_data['page_title']	=	'Connexion';
			$this->load->view('frontend/index', $page_data);
		}
	}

	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de mot de passe oublier
    */
	function forget()
	{
		$this->login_check();
		if (isset($_POST) && !empty($_POST))
		{
			$signup_result = $this->email_model->reset_password();
			redirect(base_url().'index.php?home/forget' , 'refresh');
		}
		$page_data['page_name']		=	'forget';
		$page_data['page_title']	=	'Mot de passe oublié';
		$this->load->view('frontend/index', $page_data);
	}

	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de deconnexion
    */
	function signout()
	{
		$this->session->set_userdata('user_login_status', '');
        $this->session->set_userdata('user_id', '');
        $this->session->set_userdata('login_type', '');
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url().'index.php?home/signin', 'refresh');
	}
	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function login check
    */
	function login_check()
	{
		if ($this->session->userdata('user_login_status') == 1)
			redirect(base_url().'index.php?page/home' , 'refresh');
	}
}
