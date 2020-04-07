<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['meta_title'] = 'Contact US';
        $data['meta_keywords'] = 'contact';
        $data['meta_description'] = 'Contact us @ Timesandseasonsbible.com, +234-802-7444-825, +234-805-7900-364. Times and Seasons Bible Study Center. Abuja. Nigeria';

        $data['page_name'] = 'contact';
        $this->load->view('pages/index', $data);
    }

}