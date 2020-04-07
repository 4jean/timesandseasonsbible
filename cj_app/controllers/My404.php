<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {

	public function index()
	{
		$this->output->set_status_header('404');
		$data['page_name'] = '404';
		$this->load->view('errors/html/404', $data);
	}
}
