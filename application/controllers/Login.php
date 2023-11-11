<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	//LOGIN

	public function users()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$users = $API->comm('/user/print');

		// var_dump($users);
		// die;


		$data = [
			'title' => 'Users',
			'users' => $users,
		];

		$this->load->view('template/main', $data);
		$this->load->view('login/users', $data);
		$this->load->view('template/footer');
	}

	public function dellogin($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/user/remove", array(
			".id" => '*' . $id,
		));
		redirect('login/users');
	}
	public function addlogin()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);


		$API->comm("/user/add", array(
			"name" => $post['name'],
			"group" => $post['group'],
			"address" => $post['address'],
			"password" => $post['password'],
		));


		redirect('login/users');
	}
}
