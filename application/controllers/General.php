<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by SIMPLON CI.
 * User: Diarrassouba Abdoulaye
 * Email: diarrassoubaabdoulaye73@gmail.com
 */
class General extends CI_Controller {

	//  constructeur

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('crud_model');
	}
	
	public function index()
	{
	}
	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   function de faq
    */
	function faq()
	{
		$page_data['page_name']		=	'faq';
		$page_data['page_title']	=	'Gesionnaire des questions';
		$this->load->view('frontend/index', $page_data);
		
	}
	 /** 
		* @param $page_data		   	:
		* @param $page_data		   	:
        * Description      			:   refundpolicy
    */
	function refundpolicy()
	{
		$page_data['page_name']		=	'refundpolicy';
		$page_data['page_title']	=	'Refund Policy';
		$this->load->view('frontend/index', $page_data);
		
	}
	
	
	


}
