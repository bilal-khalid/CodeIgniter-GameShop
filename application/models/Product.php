<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get(int $id)
    {
        $query = $this->db->get_where('products', ['id' => $id], 1);
        return $query->row();
    }

    public function all()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    public function get_categories()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function get_by_category(int $id)
    {
        $query = $this->db->get_where('products', ['category_id' => $id]);
        return $query->result();
    }

    public function get_popular()
    {
        $this->db->select('P.*, COUNT(O.product_id) as total');
        $this->db->from('orders as O');
        $this->db->join('products as P', 'O.product_id = P.id', 'INNER');
        $this->db->group_by('O.product_id');
        $this->db->order_by('total', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result();
    }

    public function add_order($order_data)
    {
        return $this->db->insert('orders', $order_data);
    }
}
