<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public $total = 0;
    public $grand_total = 0;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product');
        $this->config->load('cart');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['main_content'] = 'cart/index';
        $this->load->view('layouts/main', $data);
    }

    public function add()
    {
        $data = [
            'id' => $this->input->post('item_number'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('title')
        ];
        $this->cart->insert($data);
        redirect('products');
    }

    public function update()
    {
        $this->cart->update($this->input->post());
        if ($this->cart->total_items()) {
            redirect('cart', 'refresh');
        } else {
            redirect('products');
        }
    }

    public function process()
    {
        if (!is_post_request() || !$this->session->userdata('logged_in')) {
            redirect();
        }

        $this->form_validation->set_rules(
            'address', 'Address', 
            'trim|required|min_length[4]|max_length[255]'
        );
        $this->form_validation->set_rules(
            'city', 'City', 
            'trim|required|min_length[2]|max_length[100]'
        );
        $this->form_validation->set_rules(
            'state', 'State', 
            'trim|required|min_length[2]|max_length[100]'
        );
        $this->form_validation->set_rules(
            'country', 'Country', 
            'required|max_length[100]'
        );
        $this->form_validation->set_rules(
            'zipcode', 'Zipcode', 
            'trim|required|min_length[2]|max_length[30]'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please check the shipping info!');
            redirect('cart');
        } else {
            $data = [];
            foreach ($this->input->post('items') as $index => $item) {
                $product = $this->Product->get((int)$item['item_id']);

                $subtotal = ($product->price * $item['item_qty']);
                $this->total = $this->total + $subtotal;

                $data['cart_details']['items'][] = [
                    'id' => $product->id,
                    'name' => $product->title,
                    'price' => $product->price,
                    'qty' => $item['item_qty']
                ];
                $order_data = [
                    'product_id' => $product->id,
                    'user_id' => $this->session->userdata('user_id'),
                    'transaction_id' => 0,
                    'quantity' => $item['item_qty'],
                    'price' => $subtotal,
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'country' => $this->input->post('country'),
                    'zipcode' => $this->input->post('zipcode')
                ];
                $this->Product->add_order($order_data);
            }

            $shipping = $this->config->item('shipping');
            $tax = $this->config->item('tax');
            $data['cart_details']['shipping'] = $shipping;
            $data['cart_details']['tax'] = $tax;
            $data['cart_details']['total'] = $this->cart->total() + $shipping + $tax;
            $data['main_content'] = 'cart/confirm';
            $this->cart->destroy();
            $this->load->view('layouts/main', $data);
        }
    }
}
