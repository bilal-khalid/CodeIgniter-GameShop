<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function register(array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = $this->hash_password($data['password']);
        }
        $insert = $this->db->insert('users', $data);
        return $insert;
    }

    public function login($username, $password)
    {
        $query = $this->db->get_where('users', ['username' => $username], 1);
        $user = $query->row();
        if (!empty($user) && password_verify($password, $user->password)) {
            return $user;
        } else {
            return false;
        }
    }

    private function hash_password($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
