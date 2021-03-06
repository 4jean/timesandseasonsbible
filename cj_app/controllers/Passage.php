<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passage extends CI_Controller {

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
        $data['page_name'] = 'passage';
        $this->load->view('pages/index', $data);
    }
}