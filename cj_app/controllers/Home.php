<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	    function __construct()
    {
        parent::__construct();
        $this->load->database();
        //$this->load->library('session');
		/*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }

	public function index()
	{
		$data['meta_title'] = 'Times And Seasons Bible Study Center';
        $data['meta_keywords'] = 'TIMES AND SEASONS BIBLE, Understanding Times and Seasons, Times And Seasons Bible Study Center, Times And Seasons, what Bible says, about, last days, seasons changing, Biblical season, Study Bible';
        $data['meta_description'] = 'Welcome to Times and Seasons Bible Study Center, Study Times and Seasons from the Bible and study the Bible from a Times and Seasons perspective';
		
		 /*Open Graph Data*/
        $data['og_title'] = 'Times And Seasons Bible Study Center';
        $data['og_description'] = 'Welcome to Times and Seasons Bible Study Center, Study Times and Seasons from the Bible and study the Bible from a Times and Seasons perspective';
        $data['img_path'] = 'images/nowo@4x.png';
        $data['og_url'] = '';
		
        $data['page_name'] = 'home';
		$this->load->view('pages/index', $data);
	}
}