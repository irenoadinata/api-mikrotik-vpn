<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotspot extends CI_Controller
{
	public function users()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$hotspotuser = $API->comm('/ip/hotspot/user/print');
		$server = $API->comm('/ip/hotspot/print');
		$profile = $API->comm('/ip/hotspot/user/profile/print');

		$data = [
			'title' => 'Users Hotspot',
			'totalhotspotuser' => count($hotspotuser),
			'hotspotuser' => $hotspotuser,
			'server' => $server,
			'profile' => $profile,
		];

		$this->load->view('template/main', $data);
		$this->load->view('hotspot/users', $data);
		$this->load->view('template/footer');
	}
	public function addUser()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		if ($post['timelimit'] == "") {
			$timelimit = "0";
		} else {
			$timelimit = $post['timelimit'];
		}


		$API->comm("/ip/hotspot/user/add", array(
			"name" => $post['user'],
			"password" => $post['password'],
			"server" => $post['server'],
			"profile" => $post['profile'],
			"limit-uptime" => $timelimit,
			"comment" => $post['comment'],
		));

		redirect('hotspot/users');
	}

	//EDIT USER
	public function editUser($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$getuser = $API->comm('/ip/hotspot/user/print', array(
			"?.id" => '*' . $id,
		));
		// var_dump($getuser);
		// die;
		$server = $API->comm('/ip/hotspot/print');
		$profile = $API->comm('/ip/hotspot/user/profile/print');

		$data = [
			'title' => 'edit User',
			'user' => $getuser[0],
			'server' => $server,
			'profile' => $profile,
		];

		$this->load->view('template/main', $data);
		$this->load->view('hotspot/edit-user', $data);
		$this->load->view('template/footer');
	}
	//SIMPAN EDIT USER
	public function saveEditUser()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		if ($post['timelimit'] == "") {
			$timelimit = "0";
		} else {
			$timelimit = $post['timelimit'];
		}


		$API->comm("/ip/hotspot/user/set", array(
			".id" => $post['id'],
			"name" => $post['user'],
			"password" => $post['password'],
			"server" => $post['server'],
			"profile" => $post['profile'],
			"limit-uptime" => $timelimit,
			"comment" => $post['comment'],
		));

		redirect('hotspot/users');
	}
	// DELETE USER HOTSPOT
	public function delUser($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/hotspot/user/remove", array(
			".id" => '*' . $id,
		));
		redirect('hotspot/users');
	}

	public function active()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$hotspotactive = $API->comm('/ip/hotspot/active/print');

		$data = [
			'title' => 'Users Active',
			'totalhotspotactive' => count($hotspotactive),
			'hotspotactive' => $hotspotactive,

		];

		$this->load->view('template/main', $data);
		$this->load->view('hotspot/active', $data);
		$this->load->view('template/footer');
	}

	public function delUserActive($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/hotspot/active/remove", array(
			".id" => '*' . $id,
		));
		redirect('hotspot/active');
	}
	public function profile()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$hotspotprofile = $API->comm('/ip/hotspot/user/profile/print');

		$data = [
			'title' => 'Users Profile',
			'totalhotspotprofile' => count($hotspotprofile),
			'hotspotprofile' => $hotspotprofile,

		];

		$this->load->view('template/main', $data);
		$this->load->view('hotspot/profile', $data);
		$this->load->view('template/footer');
	}

	//TAMBAH USER PROFILE HOTSPOT
	public function addUserProfile()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		$API->comm("/ip/hotspot/user/profile/add", array(
			"name" => $post['user'],
			"rate-limit" => $post['rate_limit'],
			"shared-users" => $post['shared_user']
		));

		redirect('hotspot/profile');
	}
	public function delProfile($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/hotspot/user/profile/remove", array(
			".id" => '*' . $id,
		));
		redirect('hotspot/profile');
	}

	//HOST
	public function host()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$hotspothost = $API->comm('/ip/hotspot/host/print');
		// var_dump($hotspothost);
		// die;

		$data = [
			'title' => 'Users Host',
			'totalhotspothost' => count($hotspothost),
			'hotspothost' => $hotspothost,

		];

		$this->load->view('template/main', $data);
		$this->load->view('hotspot/host', $data);
		$this->load->view('template/footer');
	}
	public function delhost($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/hotspot/host/remove", array(
			".id" => '*' . $id,
		));
		redirect('hotspot/host');
	}

	//COOKIES
	public function cookies()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$hotspotcookies = $API->comm('/ip/hotspot/cookie/print');
		// var_dump($hotspotcookies);
		// die;

		$data = [
			'title' => 'Users Cookies',
			'totalhotspotcookies' => count($hotspotcookies),
			'hotspotcookies' => $hotspotcookies,

		];

		$this->load->view('template/main', $data);
		$this->load->view('hotspot/cookies', $data);
		$this->load->view('template/footer');
	}
	public function delcookies($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/hotspot/cookie/remove", array(
			".id" => '*' . $id,
		));
		redirect('hotspot/cookies');
	}
}
ini_set('display_errors', 'off');
