<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function index()
    {
        $data['books'] = $this->cj_model->list_bks_by_ch_id(20);
        $data['page_name'] = 'test';
        $this->load->view('pages/test', $data);
    }

}