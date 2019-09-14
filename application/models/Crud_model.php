<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Created by SIMPLON CI.
 * User: Diarrassouba Abdoulaye
 * Email: diarrassoubaabdoulaye73@gmail.com
 */
class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

	/*
	* INTERROGER LES REGLAGES
	*/
	function get_settings($type)
	{
		$description	=	$this->db->get_where('settings', array('type'=>$type))->row()->description;
		return $description;
	}

	/**
        * @param $query  				:   $query pour selectionner les element de la table
        * Description           		:   Plan pour les differents abonnement 
    */ 

	function get_active_plans()
	{
		$this->db->where('status', 1);
		$query 	= $this->db->get('plan');
        return $query->result_array();
	}

	/**
        * @param $theme   				:   String du theme du site
        * Description           		:   activer le type de theme utiliser pour le site 
    */ 
	function get_active_theme()
	{
		$theme	=	$this->get_settings('theme');
		return $theme;
	}
	/**
        * @param $video_url  				:   String de l'url de la video
        * @param $iframe_embed        		:  	String iframe
		* @param $extension   				:  	String de l'extension de la video
		* @param $path_info 			   	:   String pour determiner l'extension de la video
        * Description           			:   verification de l'integration d'une video iframe ou playeur
    */ 
	function is_iframe($video_url)
	{
		$iframe_embed	=	true;
		if (strpos($video_url, 'youtube.com,')) {
			$iframe_embed = false;
		}

		$path_info 		=	pathinfo($video_url);
		$extension		=	$path_info['extension'];
		if ($extension == 'mp4') {
			$iframe_embed = false;
		}
		return $iframe_embed;
	}

	/**
        * @param $data['name']  							:   String du nom de l'utilisateur
        * @param $data['fulname']  							:   String du prenom de l'utilisateur
        * @param $data['number']  							:   Integer du numero de telephone
        * @param $data['email']  							:   String du email utlisateur
        * @param $data['password']  						:   String du mot de passe 
        * @param $data['type']  							:   Integer du type d'ulisateur si type=1 alors user== admin
		* @param $total_number_of_matching_user  			:   Integer pour voir le nombre total d'utilisateurs correspondants
		* @param $trial_period			   					:   Integer pour determiner la période d'essai
        * Description           							:   methode de creation  de compte 
    */ 
	function signup_user()
	{
		$data['name'] 		= 	$this->input->post('name');
		$data['fulname']	=	$this->input->post('fulname');
		$data['number']		=	$this->input->post('number');
		$data['email']		=	$this->input->post('email');
		$data['password'] 	= 	sha1($this->input->post('password'));
		$data['type'] 		= 0; // user type = customer
		// formvalidation
		$this->form_validation->set_rules('fulname', 'Nom', 'required');
		$this->form_validation->set_rules('name', 'Prenom', 'required');
		$this->form_validation->set_rules('email', 'Adresse email', 'required|valid_emails');
		$this->form_validation->set_rules('number', 'Numéro de telephone', 'required|regex_match[/^[0-9]{8}$/]');//{8} for 8 digits number
		$this->form_validation->set_rules('password', 'Mot de passe', 'required');
		$this->form_validation->set_rules('password1', 'Confirmer mot de passe', 'matches[password]');
		if($this->form_validation->run() == TRUE){
			$this->db->where('number' , $data['number']);
			$this->db->from('user');
			// VALIDER SI NUMBER N'EXISTE PAS
			$total_number_of_matching_user = $this->db->count_all_results();
			if ($total_number_of_matching_user == 0) {
				$this->db->insert('user' , $data);
				$user_id	=	$this->db->insert_id();
				$this->signin($this->input->post('name'), $this->input->post('fulname'), $this->input->post('number') , $this->input->post('email') , $this->input->post('password'));
				$this->session->set_flashdata('signup_result', 'success');
				return true;
			}
			else {
				$this->session->set_flashdata('signup_result', 'failed');
				return false;
			}
		}
		else{
			$this->session->set_flashdata('signup_result',  validation_errors('<p class="error">', '</p>'));
			return false;
		}
	}

	/**
        * @param $data['plan_id']  					:   Integer de l'id du plan
        * @param $data['user_id']  					:   Interger de l'id de l'utlisateur
        * @param $data['paid_amount']  				:   Integer du montant payé
        * @param $data['payment_timestamp']  		:   data peride de validation
        * @param $data['timestamp_from']  			:   data de
        * @param $data['timestamp_to']  			:   data à
        * @param $data['payment_method']  			:   Interger methode de payement == free
        * @param $data['payment_details']  			:   Interger details de payement
        * @param $data['status']  					:   Interger status si status==1 alors le compte activer
		* @param $trial_period_days		   			:   
        * Description      							:   methode de creation  de compte free 
    */ 
	function create_free_subscription($user_id = '')
	{
		$trial_period_days			=	$this->get_settings('trial_period_days');
		$increment_string			=	'+' . $trial_period_days . ' days';

		$data['plan_id']			=	3;
		$data['user_id']			=	$user_id;
		$data['paid_amount']		=	0;
		$data['payment_timestamp']	=	strtotime(date("Y-m-d H:i:s"));
		$data['timestamp_from']		=	strtotime(date("Y-m-d H:i:s"));
		$data['timestamp_to']		=	strtotime($increment_string, $data['timestamp_from']);
		$data['payment_method']		=	'FREE';
		$data['payment_details']	=	'';
		$data['status']				=	1;
		$this->db->insert('subscription' , $data);
	}

	/**
		* @param $password  					:   String du mot de passe
		* @param $number  						:   Interger du numero de telephone
		* @param $credential  					:   String de la recuperation de la table
		* @param $user_id  						:   Integer de l'id de l'utilisateur
		* @param $trial_period_days		   		:   interger de verificaton de la periode de validation de compte
        * Description      						:   methode de connexion
    */ 
	function signin($number, $password)
	{
		$credential = array('number' => $number, 'password' => sha1($password));
		$query = $this->db->get_where('user', $credential);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $this->session->set_userdata('user_login_status', '1');
            $this->session->set_userdata('user_id', $row->user_id);
            $this->session->set_userdata('login_type', $row->type); // 1=admin, 0=customer
            return true;
        }
		else {
			$this->session->set_flashdata('signin_result', 'failed');
			return false;
		}
	}
	/**
        * @param $user_id  						:   Integer id de l'utilisateur
		* @param $timestamp_current  			:   String du mot de passe
		* @param $subscription_id  				:   Integer id de la souscritpion   
        * Description      						:   methode de validation du compte
    */
	function validate_subscription()
	{
		$user_id			=	$this->session->userdata('user_id');
		$timestamp_current	=	strtotime(date("Y-m-d H:i:s"));
		$this->db->where('user_id', $user_id);
		$this->db->where('timestamp_to >' ,  $timestamp_current);
		$this->db->where('timestamp_from <' ,  $timestamp_current);
		$this->db->where('status' ,  1);
		$query				=	$this->db->get('subscription');
		if ($query->num_rows() > 0) {
            $row = $query->row();
			$subscription_id	=	$row->subscription_id;
			return $subscription_id;
		}
        else if ($query->num_rows() == 0) {
			return false;
		}
	}

	/**
        * @param $subscription_id 				:  Integer de l'id de la souscription  
        * Description      						:   methode du tailles de souscription retouner le resutat de la requete
    */
	function get_subscription_detail($subscription_id)
	{
		$this->db->where('subscription_id', $subscription_id);
		$query 		=	 $this->db->get('subscription');
        return $query->result_array();
	}
	/**
        * @param $subscription_id 				:   ID D'ABONNEMENT ACTUEL
		* @param $subscription_detail   		:   DÉTAIL ACTUEL DE LA SUBSCCRIPTIONs   
        * Description      						:   
    */
	function get_current_plan_id()
	{
		$subscription_id			=	$this->crud_model->validate_subscription();
		$subscription_detail		=	$this->crud_model->get_subscription_detail($subscription_id);
		foreach ($subscription_detail as $row)
			$current_plan_id = $row['plan_id'];
		return $current_plan_id;
	}
	/**
        * @param $user_id 						:  interger de l'id de l'utilisateur    
        * Description      						:  methode de souscription de l'utlisateur, retourner la requete
    */
	function get_subscription_of_user($user_id = '')
	{
		$this->db->where('user_id', $user_id);
        $query = $this->db->get('subscription');
        return $query->result_array();
	}
	/**
        * @param $user_id 						:  interger ID uilisateur
		* @param $timestamp_current   			:  data de creation de compte
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation du compte de l'ulisateur
    */
	function get_active_plan_of_user($user_id = '')
	{
		$timestamp_current	=	strtotime(date("Y-m-d H:i:s"));
		$this->db->where('user_id', $user_id);
		$this->db->where('timestamp_to >' ,  $timestamp_current);
		$this->db->where('timestamp_from <' ,  $timestamp_current);
		$this->db->where('status' ,  1);
		$query				=	$this->db->get('subscription');
		if ($query->num_rows() > 0) {
            $row = $query->row();
			$subscription_id	=	$row->subscription_id;
			return $subscription_id;
		}
        else if ($query->num_rows() == 0) {
			return false;
		}
	}
	/**
        * @param $month 								:  
		* @param $year   								: 
		* @param $first_day_this_month   				:
		* @param $last_day_this_month   				:   
		* @param $timestamp_first_day_this_month   		:   
		* @param $timestamp_first_day_this_month   		:  
		* @param $subscriptions					   		:   
		* @param $trial_period_days		   				:   
        * Description      								:   methode de rapport de la souscription
    */
	function get_subscription_report($month, $year)
	{
		$first_day_this_month 			= 	date('01-m-Y' , strtotime($month." ".$year));
		$last_day_this_month  			= 	date('t-m-Y' , strtotime($month." ".$year));
		$timestamp_first_day_this_month	=	strtotime($first_day_this_month);
		$timestamp_last_day_this_month	=	strtotime($last_day_this_month);

		$this->db->where('payment_timestamp >' , $timestamp_first_day_this_month);
		$this->db->where('payment_timestamp <' , $timestamp_last_day_this_month);
		$subscriptions = $this->db->get('subscription')->result_array();

		return $subscriptions;
	}
	/**
        * @param $user_id 					:  Integer ID de l'ulisateur
		* @param $user_detail   			:  recuper les information de l'utlisateur
        * Description      					:   methode de l'information actuelle de l'utilisateur
    */
	function get_current_user_detail()
	{
		$user_id	=	$this->session->userdata('user_id');
		$user_detail=	$this->db->get_where('user', array('user_id'=>$user_id))->row();
		return $user_detail;
	}
	/**
        * @param $user_number 					:  
		* @param $user_id   					:  
        * Description      						:   methode de validation d'une souscription
    */
	function get_username_of_user($user_number)
	{
		$user_id	=	$this->session->userdata('user_id');
		$username	=	$this->db->get_where('user', array('user_id'=>$user_id))->row()->$user_number;
		return $username;
	}
	/**  
        * Description      						:   retourner le genre
    */
	function get_genres()
	{
		$query 		=	 $this->db->get('genre');
        return $query->result_array();
	}
	
	/**
        * @param $base_url 					:  
		* @param $total_rows   				:  
		* @param $per_page   				:    
		* @param $uri_segment		   		:   
        * Description      					:   methode de pagination
    */
	function paginate($base_url, $total_rows, $per_page, $uri_segment)
	{
        $config = array('base_url' => $base_url,
            'total_rows' => $total_rows,
            'per_page' => $per_page,
            'uri_segment' => $uri_segment);

        $config['first_link'] = '<i class="fa fa-angle-double-left" aria-hidden="true"></i>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        return $config;
    }
	/**
        * @param $genre_id   	:   Integer ID genre
        * @param $limit         :   limiter le nombre d'element
        * @param $offset    	:   nombre de colonne prise en compte
        * Description           :  faire appel de la function movie pour le traitement et l'affichage
    */ 
	function get_movies($genre_id, $limit = NULL, $offset = 0)
	{

        $this->db->order_by('movie_id', 'desc');
        $this->db->where('genre_id', $genre_id);
        $query = $this->db->get('movie', $limit, $offset);
        return $query->result_array();
    }

	/**
        * @param $data['title']  					:   String du titre du film
        * @param $data['description_short']  		:   String breve description du film
		* @param $data['description_long']  		:   String longue description du film
        * @param $data['year']  					:   String année de sortie du film
        * @param $data['rating']  					:   String de l'evalution du film
        * @param $data['genre_id']  				:   String du titre du film
        * @param $data['featured']  				:   String featured mettre le film en vedette
        * @param $data['url']  						:   String url du film
		* @param $data['trailer_url']  				:   String url demo du film
		* @param $actor				  				:   String acteur du film
		* @param $number_of_entries   	 			:  	integer de count de la table
		* @param $movie_id    						: 	Interger ID du film 
        * Description           					:   methode de creation de film 
    */ 
	function create_movie()
	{
		$data['title']				=	$this->input->post('title');
		$data['description_short']	=	$this->input->post('description_short');
		$data['description_long']	=	$this->input->post('description_long');
		$data['year']				=	$this->input->post('year');
		$data['time']				=	$this->input->post('time');
		$data['rating']				=	$this->input->post('rating');
		$data['genre_id']			=	$this->input->post('genre_id');
		$data['featured']			=	$this->input->post('featured');
		$data['url']				=	$this->input->post('url');
		$data['trailer_url']  		=	$this->input->post('trailer_url');
		$actors						=	$this->input->post('actors');
		$actor_entries				=	array();
		$number_of_entries			=	sizeof($actors);
		for ($i = 0; $i < $number_of_entries ; $i++)
		{
			array_push($actor_entries, $actors[$i]);
		}
		$data['actors']				=	json_encode($actor_entries);

		$this->db->insert('movie', $data);
		$movie_id = $this->db->insert_id();
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/movie_thumb/' . $movie_id . '.jpg');
		move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/global/movie_poster/' . $movie_id . '.jpg');
		move_uploaded_file($_FILES['title']['tmp_name'],'assets/global/movie_title/' . $movie_id . '.jpg');

	}
	/**
        * @param $data['title']  					:   String du titre du film
        * @param $data['description_short']  		:   String breve description du film
		* @param $data['description_long']  		:   String longue description du film
        * @param $data['year']  					:   String année de sortie du film
        * @param $data['rating']  					:   String de l'evalution du film
        * @param $data['genre_id']  				:   String du titre du film
        * @param $data['featured']  				:   String featured mettre le film en vedette
        * @param $data['url']  						:   String url du film
		* @param $data['trailer_url']  				:   String url demo du film
		* @param $actor				  				:   String acteur du film
		* @param $number_of_entries   	 			:  	integer de count de la table
		* @param $movie_id    						: 	Interger ID du film  
        * Description           					:   gestion de la mise a jour du film dans la base donnée
    */ 
	function update_movie($movie_id = '')
	{
		$data['title']				=	$this->input->post('title');
		$data['description_short']	=	$this->input->post('description_short');
		$data['description_long']	=	$this->input->post('description_long');
		$data['year']				=	$this->input->post('year');
		$data['time']				=	$this->input->post('time');
		$data['rating']				=	$this->input->post('rating');
		$data['genre_id']			=	$this->input->post('genre_id');
		$data['featured']			=	$this->input->post('featured');
		$data['url']				=	$this->input->post('url');
    	$data['trailer_url']  		=	$this->input->post('trailer_url');
		$actors						=	$this->input->post('actors');
		$actor_entries				=	array();
		$number_of_entries			=	sizeof($actors);
		for ($i = 0; $i < $number_of_entries ; $i++)
		{
			array_push($actor_entries, $actors[$i]);
		}
		$data['actors']				=	json_encode($actor_entries);

		$this->db->update('movie', $data, array('movie_id'=>$movie_id));

		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/movie_thumb/' . $movie_id . '.jpg');
		move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/global/movie_poster/' . $movie_id . '.jpg');
		move_uploaded_file($_FILES['title']['tmp_name'],'assets/global/movie_title/' . $movie_id . '.jpg');
	}

	/**
        * @param $data['title']  					:   String du titre de la serie
        * @param $data['description_short']  		:   String breve description de la serie
		* @param $data['description_long']  		:   String longue description de la serie
        * @param $data['year']  					:   String année de sortie de la serie
        * @param $data['rating']  					:   String de l'evalution de la serie
        * @param $data['genre_id']  				:   String du titre de la serie
        * @param $data['url']  						:   String url de la serie
		* @param $data['trailer_url']  				:   String url demo de la serie
		* @param $actor				  				:   String acteur de la serie
		* @param $number_of_entries   	 			:  	integer de count de la table  
		* @param $series_id    						: 	selectionner id_movie de la table  
        * Description           					:   creation de series
    */ 
	function create_series()
	{
		$data['title']				=	$this->input->post('title');
		$data['trailer_url']		=	$this->input->post('series_trailer_url');
		$data['description_short']	=	$this->input->post('description_short');
		$data['description_long']	=	$this->input->post('description_long');
		$data['year']				=	$this->input->post('year');
		$data['rating']				=	$this->input->post('rating');
		$data['featured']			=	$this->input->post('featured');
		$data['genre_id']			=	$this->input->post('genre_id');
		$actors						=	$this->input->post('actors');
		$actor_entries				=	array();
		$number_of_entries			=	sizeof($actors);
		for ($i = 0; $i < $number_of_entries ; $i++)
		{
			array_push($actor_entries, $actors[$i]);
		}
		$data['actors']				=	json_encode($actor_entries);

		$this->db->insert('series', $data);
		$series_id = $this->db->insert_id();
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/series_thumb/' . $series_id . '.jpg');
		move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/global/series_poster/' . $series_id . '.jpg');

	}
	/**
        * @param $data['title']  					:   String du titre du film
        * @param $data['description_short']  		:   String breve description du film
		* @param $data['description_long']  		:   String longue description du film
        * @param $data['year']  					:   String année de sortie du film
        * @param $data['rating']  					:   String de l'evalution du film
        * @param $data['genre_id']  				:   String du titre du film
        * @param $data['featured']  				:   String featured mettre le film en vedette
        * @param $data['url']  						:   String url du film
		* @param $data['trailer_url']  				:   String url demo du film
		* @param $actor				  				:   String acteur du film
		* @param $number_of_entries   	 			:  	integer de count de la table  
		* @param $series_id    						: 	recuperer l'id de la serie 
        * Description           					:   gestion de la mise a jour du serie dans la base donnée
    */ 
	function update_series($series_id = '')
	{
		$data['title']				=	$this->input->post('title');
		$data['trailer_url']		=	$this->input->post('series_trailer_url');
		$data['description_short']	=	$this->input->post('description_short');
		$data['description_long']	=	$this->input->post('description_long');
		$data['year']				=	$this->input->post('year');
		$data['featured']			=	$this->input->post('featured');
		$data['rating']				=	$this->input->post('rating');
		$data['genre_id']			=	$this->input->post('genre_id');

		$actors						=	$this->input->post('actors');
		$actor_entries				=	array();
		$number_of_entries			=	sizeof($actors);
		for ($i = 0; $i < $number_of_entries ; $i++)
		{
			array_push($actor_entries, $actors[$i]);
		}
		$data['actors']				=	json_encode($actor_entries);

		$this->db->update('series', $data, array('series_id'=>$series_id));
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/series_thumb/' . $series_id . '.jpg');
		move_uploaded_file($_FILES['poster']['tmp_name'], 'assets/global/series_poster/' . $series_id . '.jpg');
		move_uploaded_file($_FILES['title']['tmp_name'],'assets/global/series_title/' . $series_id . '.jpg');
	}
	/**
        * @param $genre_id   	:   Integer ID du genre
        * @param $limit         :   limiter le nombre d'element
        * @param $offset    	:   nombre de colonne prise en compte
        * Description           :  faire appel de la function serie pour le traitement et l'affichage
    */ 

	function get_series($genre_id, $limit = NULL, $offset = 0)
	{

        $this->db->order_by('series_id', 'dest');
        $this->db->where('genre_id', $genre_id);
        $query = $this->db->get('series', $limit, $offset);
        return $query->result_array();
    }
	/**
        * @param $series_id   	:   Integer ID serie
        * @param $limit         :   limiter le nombre d'element
        * @param $offset    	:   nombre de colonne prise en compte
        * Description           :  faire appel de la function saison pour le traitement et l'affichage
    */ 
	function get_seasons_of_series($series_id = '')
	{
		$this->db->order_by('season_id', 'desc');
        $this->db->where('series_id', $series_id);
        $query = $this->db->get('season');
        return $query->result_array();
	}
	/**
        * @param $subscription_id 				:  
		* @param $subscription_detail   		:   
		* @param $trial_period_days		   		:   
        * Description      						:   jointure de la table episode, associé a season et series
    */
	function get_episode($genre_id,$limit = NULL, $offset = 0)
	{
		// $this->db->select('*');
		// $this->db->from('episode');
		$this->db->order_by('episode_id', 'dest');
        $this->db->where('genre_id', $genre_id);
		$this->db->join('series ', 'episode.series_id = series.series_id');
		$this->db->join('season', 'episode.season_id = season.season_id');
		$query = $this->db->get('episode',$limit, $offset);
        return $query->result_array();
	}
	/**
        * @param $season_id 					:  Integer ID saison 
        * Description      						:   methode de saison et episode
    */
	function get_episodes_of_season($season_id = '')
	{
		$this->db->order_by('episode_id', 'asc');
        $this->db->where('season_id', $season_id);
        $query = $this->db->get('episode');
        return $query->result_array();
	}
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */
    function get_episode_details_by_id($episode_id = "") {
        $episode_details = $this->db->get_where('episode', array('episode_id' => $episode_id))->row_array();
        return $episode_details;
    }
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */
	function create_actor()
	{
		$data['name']				=	$this->input->post('name');
		$this->db->insert('actor', $data);
		$actor_id = $this->db->insert_id();
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/actor/' . $actor_id . '.jpg');
	}
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */	
	function update_actor($actor_id = '')
	{
		$data['name']				=	$this->input->post('name');
		$this->db->update('actor', $data, array('actor_id'=>$actor_id));
		move_uploaded_file($_FILES['thumb']['tmp_name'], 'assets/global/actor/' . $actor_id . '.jpg');
	}
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */
	function create_user()
	{
		$data['name']				=	$this->input->post('name');
		$data['email']				=	$this->input->post('email');
		$data['password']			=	sha1($this->input->post('password'));
		$this->db->insert('user', $data);
	}
	/**
        * @param $data['name']					:  
        * @param $data['fulname']				:   
		* @param $data['number']				: 
		* @param $data['email']					:   
        * Description      						:   methode de mise a jour information utilisateur
    */
	function update_user($user_id = '')
	{
		$data['name']				=	$this->input->post('name');
		$data['fulname']			=	$this->input->post('fulname');
		$data['number']				=	$this->input->post('number');
		$data['email']				=	$this->input->post('email');
		$this->db->update('user', $data, array('user_id'=>$user_id));
	}
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */
    function get_mylist_exist_status($type ='', $id ='')
    {
    	// Obtention de l'utilisateur actif et de l'ID du compte d'utilisateur
		$user_id 		=	$this->session->userdata('user_id');
		$active_user 	=	$this->session->userdata('active_user');

		// Choisir la liste entre film et série
		if ($type == 'movie')
			$list_field	=	$active_user.'_movielist';
		else if ($type == 'series')
			$list_field	=	$active_user.'_serieslist';

		// Obtenir la liste
		$my_list	=	$this->db->get_where('user', array('user_id'=>$user_id))->row()->$list_field;
		if ($my_list == NULL)
			$my_list = '[]';
		$my_list_array	=	json_decode($my_list);

		
		// Vérification de l'existence de l'identifiant de film / série dans la liste d'utilisateurs actifs
		if (in_array($id, $my_list_array))
			return 'true';
		else
			return 'false';
    }
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */
	function get_mylist($type = '')
	{
		// Obtention de l'utilisateur actif et de l'ID du compte d'utilisateur
		$user_id 		=	$this->session->userdata('user_id');
		$active_user 	=	$this->session->userdata('active_user');

		// Choisir la liste entre film et série
		if ($type == 'movie')
			$list_field	=	$active_user.'_movielist';
		else if ($type == 'series')
			$list_field	=	$active_user.'_serieslist';

		// Obtenir la liste
		$my_list	=	$this->db->get_where('user', array('user_id'=>$user_id))->row()->$list_field;
		if ($my_list == NULL)
			$my_list = '[]';
		$my_list_array	=	json_decode($my_list);

		return $my_list_array;
	}
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */
	function get_search_result($type = '', $search_key = '')
	{
		$this->db->like('title', $search_key);
		$query	=	$this->db->get($type);
		return $query->result_array();
	}
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */
	function get_thumb_url($type = '' , $id = '')
	{
        if (file_exists('assets/global/'.$type.'_thumb/' . $id . '.jpg'))
            $image_url = base_url() . 'assets/global/'.$type.'_thumb/' . $id . '.jpg';
        else
            $image_url = base_url() . 'assets/global/placeholder.jpg';

        return $image_url;
	}
	/**
        * @param $subscription_id 				:  
		* @param $type   						: variable utilisé pour le type d'image   
        * Description      						:   methode de upoader le titre d'image mise en poster
    */
	function get_title_url($type = '' , $id = '')
	{
        if (file_exists('assets/global/'.$type.'_title/' . $id . '.jpg'))
            $image_url = base_url() . 'assets/global/'.$type.'_title/' . $id . '.jpg';
        else
            $image_url = base_url() . 'assets/global/placeholder.jpg';

        return $image_url;
    }
	/**
        * @param $subscription_id 				:  
		* @param $type   						: variable utilisé pour le type d'image   
        * Description      						:   methode de upoader une image mise en poster
    */
	function get_poster_url($type = '' , $id = '')
	{
        if (file_exists('assets/global/'.$type.'_poster/' . $id . '.jpg'))
            $image_url = base_url() . 'assets/global/'.$type.'_poster/' . $id . '.jpg';
        else
            $image_url = base_url() . 'assets/global/placeholder.jpg';

        return $image_url;
    }

	/**
        * @param $subscription_id 				:  
		* @param $type   						: 	variable utilisé pour le type d'image   
        * Description      						:   methode de upoader une image de l'acteur mise en poster
    */
	function get_actor_image_url($id = '')
	{
        if (file_exists('assets/global/actor/' . $id . '.jpg'))
            $image_url = base_url() . 'assets/global/actor/' . $id . '.jpg';
        else
            $image_url = base_url() . 'assets/global/placeholder.jpg';

        return $image_url;
    }
	/**
        * @param $subscription_id 					:  
		* @param $subscription_detail   						:   
		* @param $trial_period_days		   		:   
        * Description      						:   methode de validation d'une souscription
    */
    public function get_actor_wise_film_and_tv_series($actor_id = "", $item = "") {
      $item_list = array();
      $item_details = $this->db->get($item)->result_array();
      $cheker = array();
      foreach ($item_details as $row) {
        $actor_array = json_decode($row['actors'], true);
        if(in_array($actor_id, $actor_array)){
          array_push($cheker, $row[$item.'_id']);
        }
      }

      if (count($cheker) > 0) {
        $this->db->where_in($item.'_id', $cheker);
        $item_list = $this->db->get($item)->result_array();
      }
      return $item_list;
    }
}
