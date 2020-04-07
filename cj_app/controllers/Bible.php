<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bible extends CI_Controller {

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
        $data['meta_title'] = 'Genesis 1 KJV';
        $data['meta_keywords'] = 'Genesis, KJV, King James Version, The beginning, Times and Seasons';
        $data['meta_description'] = $this->cj_model->get_meta_verse(1, 1, 'description');
        redirect(base_url('bible/passage/'), 'refresh');
    }

    /*Get all Books*/
    public function get_books($q)
    {
        $resp = array();
        $book_names = $this->cj_model->bk_search($q);
        foreach($book_names as $row){
            $resp[] = $row['name'];
        }
        echo json_encode($resp);
    }

    /*Check if passage selection is valid True|False*/
    public function psg_sel()
    {
        $bk_query = $this->input->post('book_name');
        $book_id = $this->cj_model->get_book_id($bk_query);
        $ch_id = $this->input->post('chapter_id');
        $cj_mask = $this->input->post('cj_mask');
        if($cj_mask == ''){
            $psg_sel  = $this->cj_model->psg_sel($book_id, $ch_id);
            if($psg_sel === true){
                $book_name = $this->cj_model->get_book_name($book_id);
                redirect(base_url('bible/passage/'.$book_name.'/'.$ch_id), 'refresh');
            }
            else{
                redirect(base_url('bible'), 'refresh');
            }
        }
    }

    /*Show Selected Passage*/
    public function passage($book ='Genesis', $chapter='1')
    {
        $data = array();
        $book_id = $this->cj_model->get_book_id($book);
        $psg_sel  = $this->cj_model->psg_sel($book_id, $chapter);
        if($psg_sel === true){
            $data['book_name'] = $this->cj_model->get_book_name($book_id);
            $data['book_id'] = $book_id;
            $data['chapter'] = $chapter;
            $data['book']= $this->cj_model->go_to_book($book_id, $chapter);
            }
            else{
                redirect(base_url('bible'), 'refresh');
            }
/*Meta DATA*/
        $data['meta_title'] = $data['book_name'].' '.$data['chapter'].' KJV - '.$this->cj_model->get_meta_verse($book_id, $chapter, 'title');
        $data['meta_keywords'] = $data['book_name'].', KJV, King James Version, The Bible, Times and Seasons';
        $data['meta_description'] = $this->cj_model->get_meta_verse($book_id, $chapter, 'description');
		
		 /*Open Graph Data*/
        $data['og_title'] = $data['book_name'].' '.$data['chapter'].' KJV';
        $data['og_description'] = $this->cj_model->get_meta_verse($book_id, $chapter, 'og_description');
        $data['img_path'] = 'images/nowo@4x.png';
        $data['og_url'] = 'bible/passage/'.$data['book_name'].'/'.$chapter;

        $data['page_name'] = 'passage';
        $this->load->view('pages/index', $data);
    }
}