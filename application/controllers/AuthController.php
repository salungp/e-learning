<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function register()
	{
		$this->load->view('auth/register');
	}

	public function actregister()
	{
		$name = htmlspecialchars($this->input->post('name'));
		$slug = strtolower(str_replace(' ', '-', $name));
		$email = htmlspecialchars($this->input->post('email'));
		$password = htmlspecialchars($this->input->post('password'));

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('auth/register');
		} else {
			$data = $this->db->get_where('users', ['email' => $email])->row_array();

			if ($data)
			{
				$this->session->set_flashdata('status', '<div class="alert alert-danger">Maaf email sudah ada!</div>');
				redirect('register');
			} else {
				mkdir(__DIR__.'/../../asset/user/'.$slug.'/foto_profile/', 0777, true);
				$this->db->insert('users', [
					'name' => $name,
					'slug' => $slug,
					'email' => $email,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'profile_image' => 'default.jpg'
				]);

				$this->session->set_flashdata('status', '<div class="alert alert-success">Daftar berhasil silahkan login terlebih dahulu!</div>');
				redirect('login');
			}
		}
	}

	public function actlogin()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data = $this->db->get_where('users', ['email' => $email])->row_array();

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('auth/login');
		} else {
			if ($data)
			{
				if (password_verify($password, $data['password']))
				{
					$this->session->set_userdata([
						'user_id' => $data['id']
					]);

					redirect();
				} else {
					$this->session->set_flashdata('status', '<div class="alert alert-danger">Maaf password anda salah!</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('status', '<div class="alert alert-danger">Maaf email tidak terdaftar!</div>');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		redirect('login');
	}
}