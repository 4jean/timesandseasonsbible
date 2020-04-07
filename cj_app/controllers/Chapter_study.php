<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter_Study extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function index()
    {
        $data['meta_title'] = 'Chapter Study';
        $data['meta_keywords'] = 'Study, Chapters of the Bible, season, Biblical season, what Bible says, about, last days, Sets of seven';
        $data['meta_description'] = 'Study the Chapters of the Bible according to their seasons - Season Chapters and Sets of Seven Chapters';

        $data['ch_season'] = $this->cj_model->get_all_ch_seasons();
        $data['ch_ss7'] = $this->cj_model->get_all_ch_ss7();
        $data['page_name'] = 'chapter_study';
        $this->load->view('pages/index', $data);
    }

    public function show_ch_season_bks($chapter_id = '')
    {
        if($chapter_id){
            $data['books'] = $this->cj_model->list_bks_by_ch_id($chapter_id);
            $data['ch_id'] = $chapter_id;
            $this->load->view('pages/show_ch_season_bks', $data);
        }
    }

    public function show_ch_ss7_bks($chapter_id = '')
    {
        if($chapter_id){
            $data['books'] = $this->cj_model->list_bks_by_ch_id($chapter_id);
            $data['ch_id'] = $chapter_id;
            $this->load->view('pages/show_ch_ss7_bks', $data);
        }
    }
}