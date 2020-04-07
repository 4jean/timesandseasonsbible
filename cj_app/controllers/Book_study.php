<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book_Study extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function index()
    {
        $data['meta_title'] = 'Book Study - Season Books';
        $data['meta_keywords'] = 'season, Biblical season, Study, Books of the Bible, what Bible says, about, last days, Sets of seven';
        $data['meta_description'] = 'Season Books - Study the Books of the Bible according to their seasons and study the Books of the Bible in sets of seven';
        $data['season'] = $this->cj_model->get_all_seasons();
        $data['ss7'] = $this->cj_model->get_all_ss7();
        $data['page_name'] = 'book_study';
        $this->load->view('pages/index', $data);
    }
}