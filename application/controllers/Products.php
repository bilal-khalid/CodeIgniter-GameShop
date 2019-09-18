<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product');
    }

	public function index()
	{
        $data['products'] = $this->Product->all();
        $data['main_content'] = 'products/index';
		$this->load->view('layouts/main', $data);
    }
    
    public function details($id)
	{
        $data['product'] = $this->Product->get((int)$id);
        if (!$data['product']) {
            show_404();
        }
        $data['main_content'] = 'products/details';
		$this->load->view('layouts/main', $data);
    }
    
    public function category($id)
	{
        $data['products'] = $this->Product->get_by_category((int)$id);
        $data['main_content'] = 'products/index';
		$this->load->view('layouts/main', $data);
	}
}
