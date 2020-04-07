<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

    }

    public function index()
    {
        redirect(base_url('book/season/'), 'refresh');
    }

    public function season($book = 'Genesis')
    {
        $book_id = $this->cj_model->get_book_id($book);
        $book_name =$this->cj_model->get_book_name($book_id);

        /*Meta DATA*/

        $data['meta_title'] = 'The Book of '.$book_name.' - '.$this->cj_model->season_meta_verse($book_id, 'title');
        $data['meta_keywords'] = $book_name.', season, about, the book of';
        $data['meta_description'] = $this->cj_model->season_meta_verse($book_id, 'description');

         /*Open Graph Data*/
        $data['og_title'] = 'The Book of '.$book_name;
        $data['og_description'] = $this->cj_model->season_meta_verse($book_id, 'og_description');
        $data['img_path'] = 'images/nowo@4x.png';
        $data['og_url'] = 'book/season';

        $data['notes'] = $this->cj_model->get_book_notes_season($book);
        $data['page_name'] = 'notes_season';
        $this->load->view('pages/index', $data);
    }

   /* public function seven($book = 'Genesis')
    {
        $book_id = $this->cj_model->get_book_id($book);
        $book_name = $this->cj_model->get_book_name($book_id);


      $data['meta_title'] = 'The Book of '.$book_name.' - '.$this->cj_model->seven_meta_verse($book_id, 'title');
        $data['meta_keywords'] = $book_name.', seven, about, sets of seven, the book of';
        $data['meta_description'] = $this->cj_model->seven_meta_verse($book_id, 'description');
      

        $data['og_title'] = 'The Book of '.$book_name;
        $data['og_description'] = $this->cj_model->seven_meta_verse($book_id, 'og_description');
        $data['img_path'] = 'images/nowo@4x.png';
        $data['og_url'] = 'book/seven';

        $data['notes'] = $this->cj_model->get_book_notes_ss7($book);
        $data['page_name'] = 'notes_ss7';
        $this->load->view('pages/index', $data);
    }*/

}