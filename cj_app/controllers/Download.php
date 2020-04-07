<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        /*Meta Data*/
        $data['meta_title'] = 'The King\'s Bride: Pattern for Kingdom-Breakthrough';
        $data['meta_keywords'] = '';
        $data['meta_description'] = 'When God made man, He made them male and female. The Genesis account of creation ended with the first man and his wife receiving the mandate to govern the earth. God wanted Adam and Eve to govern the earth on His behalf; and in His name. He wanted an earth in perfect alignment with heaven.';

        /*Open Graph Data*/
        $data['og_title'] = 'The King\'s Bride: Pattern for Kingdom-Breakthrough';
        $data['og_description'] = 'When God made man, He made them male and female. The Genesis account of creation ended with the first man and his wife receiving the mandate to govern the earth. God wanted Adam and Eve to govern the earth on His behalf; and in His name. He wanted an earth in perfect alignment with heaven.';
        $data['img_path'] = 'images/book/kb.jpg';
        $data['og_url'] = 'download';

        $data['page_name'] = 'download';
        $this->load->view('pages/index', $data);
    }

    public function the_kings_bride()
    {
		$this->cj_model->update_download_count('the_kings_bride');
        $file_url = base_url('assets/downloads/The_Kings_Bride.epub');
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
    }

}