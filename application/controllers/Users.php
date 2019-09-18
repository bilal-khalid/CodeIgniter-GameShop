<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->library('form_validation');
    }

	public function register()
	{
        if ($this->session->userdata('logged_in')) {
            redirect();
        }

        $this->form_validation->set_rules(
            'first_name', 'First Name', 
            'trim|required'
        );
		$this->form_validation->set_rules(
            'last_name', 'Last Name', 
            'trim|required'
        );
        $this->form_validation->set_rules(
            'email', 'Email', 
            'trim|required|valid_email|is_unique[users.email]', 
            ['is_unique' => 'Please enter a different %s.']
        );
        $this->form_validation->set_rules(
            'username', 'Username', 
            'trim|required|min_length[4]|max_length[16]|is_unique[users.username]', 
            ['is_unique' => 'Please enter a different %s.']
        );
        $this->form_validation->set_rules(
            'password', 'Password', 
            'trim|required|min_length[4]|max_length[50]'
        );
        $this->form_validation->set_rules(
            'password2', 'Confirm Password', 
            'trim|required|matches[password]'
        );
		
		if ($this->form_validation->run() == FALSE) {
			$data['main_content'] = 'users/register';
		    $this->load->view('layouts/main', $data);
		} else {
            $data = [
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ];
			if ($this->User->register($data)) {
				$this->session->set_flashdata('success', 'You are now registered and can login!');
				redirect('products');
            }
		}
    }

    public function login()
    {
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Sorry, the login info that you entered is invalid');
            redirect('products');
		} else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->User->login($username, $password);
            if (!empty($user)) {
                $this->session->set_userdata([
                    'user_id'   => $user->id,
                    'username'  => $user->username,
                    'logged_in' => true
                ]);
                $this->session->set_flashdata('success', 'You are now logged in!');
			    redirect('products');
            } else {
                $this->session->set_flashdata('error', 'Sorry, the login info that you entered is invalid');
			    redirect('products');
            }
		}
	}
	
    public function logout()
    {
		$this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();

        $this->session->set_flashdata('success', 'You are now logged out!');
        redirect('products');
	}
}
