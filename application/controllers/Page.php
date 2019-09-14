<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by SIMPLON CI.
 * User: Diarrassouba Abdoulaye
 * Email: diarrassoubaabdoulaye73@gmail.com
 */
class Page extends CI_Controller {

    // constructeur
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->login_check();
	}

	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de recherche
    */

	function search($search_key = '')
	{
		if (isset($_POST) && !empty($_POST))
		{
			$search_key = $this->input->post('search_key');
			redirect(base_url().'index.php?page/search/'.$search_key , 'refresh');
		}
		$page_data['page_name']		=	'search';
		$page_data['search_key']	=	$search_key;
		$page_data['page_title']	=	'Resultat de la recherche';
		$this->load->view('frontend/index', $page_data);

	}

	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page d'accueil home
    */
	function home()
	{
		$page_data['page_name']		=	'home';
		$page_data['page_title']	=	'Accueil';
		$this->load->view('frontend/index', $page_data);
	}

	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page film
    */
	function movie()
	{
		$page_data['page_name']		=	'movie';
		$page_data['page_title']	=	'Liste film';
		$this->load->view('frontend/index', $page_data);
	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page serie
    */
	function series()
	{
		$page_data['page_name']		=	'series';
		$page_data['page_title']	=	'liste série';
		$this->load->view('frontend/index', $page_data);
	}

	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page playeur film
    */
	function playmovie($movie_id = '')
	{
		$page_data['page_name']		=	'playmovie';
		$page_data['page_title']	=	'Player';
		$page_data['movie_id']		=	$movie_id;
		$this->load->view('frontend/index', $page_data);
	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page playeur serie
    */
	function playseries($series_id = '', $season_id = '', $episode_id = "")
	{
		if ($season_id == '')
		{
        	$seasons	=	$this->db->get_where('season', array('series_id'=>$series_id))->result_array();
			foreach ($seasons as $row)
			{
				$first_season_id	=	$row['season_id'];
				break;
			}
			$page_data['season_id']		=	$first_season_id;
		}
		else
			$page_data['season_id']		=	$season_id;

		if ($episode_id == "") {
			$episodes	=	$this->db->get_where('episode', array('season_id'=>$page_data['season_id']))->row_array();
			$page_data['episode_id']		= $episodes['episode_id'];
		}else
			$page_data['episode_id']		= $episode_id;

		$page_data['series_id']		=	$series_id;
		$page_data['page_name']		=	'playseries';
		$page_data['page_title']	=	'Player';
		//$page_data['series_id']		=	$series_id;
		$this->load->view('frontend/index', $page_data);
	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page du compte user
    */
	function youraccount()
	{
		$page_data['page_name']		=	'youraccount';
		$page_data['page_title']	=	'Compte';
		$this->load->view('frontend/index', $page_data);
	}

	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page editer profile
    */
	function switchprofile()
	{
		$this->subscription_check();
		$page_data['page_name']			=	'switchprofile';
		$page_data['page_title']		=	"Changer de profil";
		$page_data['current_plan_id']	=	$this->crud_model->get_current_plan_id();
		$this->load->view('frontend/index', $page_data);

	}

	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page profile
    */
	function manageprofile()
	{
		// $this->subscription_check();
		// $page_data['page_name']			=	'manageprofile';
		// $page_data['page_title']		=	'Gestion du profile';
		// $page_data['current_plan_id']	=	$this->crud_model->get_current_plan_id();
		// $this->load->view('frontend/index', $page_data);

	}

	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page editer profile
    */
	function editprofile($user = '')
	{
		if (isset($_POST) && !empty($_POST))
		{
			$user_id 		=	$this->session->userdata('user_id');
			$user_field		=	$user;
			$username		=	$this->input->post('username');

			$this->db->update('user', array($user_field => $username), array('user_id' => $user_id));
			redirect(base_url().'index.php?page/manageprofile' , 'refresh');
		}
		$page_data['page_name']			=	'editprofile';
		$page_data['page_title']		=	'Editer profile';
		$page_data['user']				=	$user;
		$this->load->view('frontend/index', $page_data);

	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page changer le numero de telephone
    */
	function numberchange()
	{
		if (isset($_POST) && !empty($_POST))
		{
			$user_id							=	$this->session->userdata('user_id');
			$old_password_encrypted				=	$this->crud_model->get_current_user_detail()->password;
			$old_password_submitted_encrypted	=	sha1($this->input->post('old_password'));
			$new_number							=	$this->input->post('new_number');

			// changer son email
			$this->db->where('number' , $new_number);
			$this->db->from('user');
        	$total_number_of_matching_user = $this->db->count_all_results();
			if ($total_number_of_matching_user > 0)
			{
				$this->session->set_flashdata('status', 'number_change_failed');
				redirect(base_url().'index.php?page/numberchange' , 'refresh');
			}

			// Verification du mot de passe pour changer le numero
			if ($old_password_encrypted 		==	$old_password_submitted_encrypted)
			{
				$this->db->update('user', array('number'=>$new_number), array('user_id'=>$user_id));
				$this->session->set_flashdata('status', 'number_changed');
				redirect(base_url().'index.php?page/youraccount' , 'refresh');
			}
			else
			{
				$this->session->set_flashdata('status', 'number_change_failed');
				redirect(base_url().'index.php?page/numberchange' , 'refresh');
			}

			$this->db->update('user', array($user_field => $username), array('user_id' => $user_id));
			redirect(base_url().'index.php?page/manageprofile' , 'refresh');
		}
		$page_data['page_name']			=	'numberchange';
		$page_data['page_title']		=	'Changer le numero de telephone';
		$this->load->view('frontend/index', $page_data);
	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page changer email
    */
	function emailchange()
	{
		if (isset($_POST) && !empty($_POST))
		{
			$user_id							=	$this->session->userdata('user_id');
			$old_password_encrypted				=	$this->crud_model->get_current_user_detail()->password;
			$old_password_submitted_encrypted	=	sha1($this->input->post('old_password'));
			$new_email							=	$this->input->post('new_email');

			// changer son email
			$this->db->where('email' , $new_email);
			$this->db->from('user');
        	$total_number_of_matching_user = $this->db->count_all_results();
			if ($total_number_of_matching_user > 0)
			{
				$this->session->set_flashdata('status', 'email_change_failed');
				redirect(base_url().'index.php?page/emailchange' , 'refresh');
			}

			// Verification du mot de passe pour changer l'email
			if ($old_password_encrypted 		==	$old_password_submitted_encrypted)
			{
				$this->db->update('user', array('email'=>$new_email), array('user_id'=>$user_id));
				$this->session->set_flashdata('status', 'email_changed');
				redirect(base_url().'index.php?page/youraccount' , 'refresh');
			}
			else
			{
				$this->session->set_flashdata('status', 'email_change_failed');
				redirect(base_url().'index.php?page/emailchange' , 'refresh');
			}

			$this->db->update('user', array($user_field => $username), array('user_id' => $user_id));
			redirect(base_url().'index.php?page/manageprofile' , 'refresh');
		}
		$page_data['page_name']			=	'emailchange';
		$page_data['page_title']		=	'Changer addresse email';
		$this->load->view('frontend/index', $page_data);

	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page editer mot de passe
    */
	function passwordchange()
	{
		if (isset($_POST) && !empty($_POST))
		{
			$user_id							=	$this->session->userdata('user_id');
			$old_password_encrypted				=	$this->crud_model->get_current_user_detail()->password;
			$old_password_submitted_encrypted	=	sha1($this->input->post('old_password'));
			$new_password						=	$this->input->post('new_password');
			$new_password_encrypted				=	sha1($this->input->post('new_password'));

			// LE NOUVEAU MOT DE PASSE DOIT COMPORTER 6 CARACTERES
			if (strlen($new_password) <6)
			{
				$this->session->set_flashdata('status', 'le changement de mot de passe a échoué');
				redirect(base_url().'index.php?page/passwordchange' , 'refresh');
			}

			// Verification du mot de passe pour changer le niveau mot de passe
			if ($old_password_encrypted 		==	$old_password_submitted_encrypted)
			{
				$this->db->update('user', array('password'=>$new_password_encrypted), array('user_id'=>$user_id));
				$this->session->set_flashdata('status', 'Mot de passe changé');
				redirect(base_url().'index.php?page/youraccount' , 'refresh');
			}
			else
			{
				$this->session->set_flashdata('status', 'le changement de mot de passe a échoué');
				redirect(base_url().'index.php?page/passwordchange' , 'refresh');
			}

			$this->db->update('user', array($user_field => $username), array('user_id' => $user_id));
			redirect(base_url().'index.php?page/manageprofile' , 'refresh');
		}
		$page_data['page_name']			=	'passwordchange';
		$page_data['page_title']		=	'Changer mot de passe';
		$this->load->view('frontend/index', $page_data);

	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page plan
    */
	function cancelplan()
	{
		if (isset($_POST) && !empty($_POST))
		{
			$subscription_id	=	$this->crud_model->validate_subscription();
			$this->db->update('subscription', array('status' => 0), array('subscription_id' => $subscription_id));
			$this->session->set_flashdata('status', 'subscription_cancelled');
			redirect(base_url().'index.php?page/youraccount' , 'refresh');
		}
		$page_data['page_name']			=	'cancelplan';
		$page_data['page_title']		=	'Annuler plan';
		$this->load->view('frontend/index', $page_data);

	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page plan
    */
	function purchaseplan()
	{
		if (isset($_POST) && !empty($_POST))
		{

			redirect(base_url().'index.php?page/youraccount' , 'refresh');
		}
		$page_data['page_name']			=	'purchaseplan';
		$page_data['page_title']		=	"Plan d'achat";
		$this->load->view('frontend/index', $page_data);

	}

	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page historique
    */
	function billinghistory()
	{
		$page_data['page_name']		=	'billinghistory';
		$page_data['page_title']	=	"Historique de facturation";
		$this->load->view('frontend/index', $page_data);
	}

	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page activation
    */
	function active_user_check()
	{
		// admin peut accéder à toutes les pages du front
		if ($this->session->userdata('login_type') == 1)
			return;

		$active_user	=	$this->session->userdata('active_user');
		if ($active_user == '')
			redirect(base_url().'index.php?page/switchprofile' , 'refresh');
	}

	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de la page souscription
    */	
	function subscription_check()
	{
		// admin peut accéder à toutes les pages du front
		if ($this->session->userdata('login_type') == 1)
			return;

		$subscription_validation	=	$this->crud_model->validate_subscription();
		if ($subscription_validation == false)
			redirect(base_url().'index.php?page/youraccount' , 'refresh');
	}
	/** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function login check
    */
	function login_check()
	{
		if ($this->session->userdata('user_login_status') != 1)
			redirect(base_url().'index.php?home/signin' , 'refresh');
	}

}
