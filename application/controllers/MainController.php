<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('main/index');
	}

	public function post()
	{
		// data user
		$user = $this->db->get_where('users', ['id' => $this->session->userdata('user_id')])->row_array();

		$text = htmlspecialchars($this->input->post('text'));
		$slug = strtolower(str_replace(' ', '-', $text));
		// validate text input
		$this->form_validation->set_rules('text', 'Text', 'required');
		// check validate
		if ($this->form_validation->run() === FALSE)
		{
			// back to main page and send error
			$this->load->view('main/index');
		} else {
			// cek if file is exists
			if (isset($_FILES['video']['name']) || @$_FILES !== null)
			{
				$config['upload_path'] = 'asset/user/video/';
				$config['allowed_types'] = 'gif|jpg|png|mp4|mp3|wav|m4v|mpg';
				$config['max_size'] = 500024;
				$config['encrypt_name'] = TRUE;

				// get upload library
				$this->load->library('upload', $config);

				// run it
				if (! $this->upload->do_upload('video'))
				{
					// if false
					$this->load->view('main/index', ['error' => $this->upload->display_errors()]);
				}

				$video_name = $this->upload->data('file_name');
			} else {
				$video_name = 'empty';
			}

			if ($video_name != 'empty')
			{
				$file_type = 'video';
			} else {
				$file_type = 'empty';
			}

			$this->db->insert('materi', [
				'text' => $text,
				'slug' => $slug,
				'file_type' => $file_type,
				'file' => $video_name,
				'user_id' => $user['id']
			]);

			redirect();
		}
	}
}
