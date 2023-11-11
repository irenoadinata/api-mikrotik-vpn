<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppp extends CI_Controller
{

	//SECRET FUNCTION

	public function secret()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$secret = $API->comm('/ppp/secret/print');
		// var_dump($secret);
		// die;
		$profile = $API->comm('/ppp/profile/print');

		$data = [
			'title' => 'PPP Secret',
			'totalsecret' => count($secret),
			'secret' => $secret,
			'profile' => $profile,
		];

		$this->load->view('template/main', $data);
		$this->load->view('ppp/secret', $data);
		$this->load->view('template/footer');
	}


	//ACTIVE FUNCTION

	public function active()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$pppactive = $API->comm('/ppp/active/print');
		// var_dump($pppactive);
		// die;


		$data = [
			'title' => 'PPP Active',
			'totalpppactive' => count($pppactive),
			'pppactive' => $pppactive,

		];

		$this->load->view('template/main', $data);
		$this->load->view('ppp/active', $data);
		$this->load->view('template/footer');
	}


	//PROFILE FUNCTION

	public function profile()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$profile = $API->comm('/ppp/profile/print');
		// var_dump($profile);
		// die;
		$pool = $API->comm('/ip/pool/print');

		$data = [
			'title' => 'PPP Profile',
			'totalprofile' => count($profile),
			'profile' => $profile,
			'pool' => $pool,
		];

		$this->load->view('template/main', $data);
		$this->load->view('ppp/profile', $data);
		$this->load->view('template/footer');
	}

	//PROFILE FUNCTION

	public function pool()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$pool = $API->comm('/ip/pool/print');
		// var_dump($pool);
		// die;

		$data = [
			'title' => 'PPP Pool',
			'totalpool' => count($pool),
			'pool' => $pool,
		];

		$this->load->view('template/main', $data);
		$this->load->view('ppp/pool', $data);
		$this->load->view('template/footer');
	}



	//PPPOE SERVERS FUNCTION
	public function pppoeservers()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$service = $API->comm('/interface/pppoe-server/server/print');
		// var_dump($service);
		// die;
		$interface = $API->comm('/interface/print');
		$defaultprofile = $API->comm('/ppp/profile/print');

		$data = [
			'title' => 'PPPOE Servers',
			'totalservice' => count($service),
			'service' => $service,
			'interface' => $interface,
			'defaultprofile' => $defaultprofile,
		];

		$this->load->view('template/main', $data);
		$this->load->view('ppp/pppoeservers', $data);
		$this->load->view('template/footer');
	}

	//ADD PPP SECRET
	public function addpppsecret()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		// if ($post['localaddress'] == "") {
		// 	$localaddress = "0.0.0.0";
		// } else {
		// 	$localaddress = $post['localaddress'];
		// }
		// if ($post['remoteaddress'] == "") {
		// 	$remoteaddress = "0.0.0.0";
		// } else {
		// 	$remoteaddress = $post['remoteaddress'];
		// }


		$API->comm("/ppp/secret/add", array(
			"name" => $post['user'],
			"password" => $post['password'],
			"service" => $post['service'],
			"profile" => $post['profile'],
			// "local-address" => $localaddress,
			// "remote-address" => $remoteaddress,
			"comment" => $post['comment'],
		));

		redirect('ppp/secret');
	}

	public function addPppoeServers()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		// if ($post['localaddress'] == "") {
		// 	$localaddress = "0.0.0.0";
		// } else {
		// 	$localaddress = $post['localaddress'];
		// }


		$API->comm("/interface/pppoe-server/server/add", array(
			"service-name" => $post['servicename'],
			"interface" => $post['interface'],
			"default-profile" => $post['defaultprofile'],
		));

		redirect('ppp/pppoeservers');
	}

	public function enablepppoeserver($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/interface/pppoe-server/server/enable", array(
			".id" => '*' . $id,
		));
		redirect('ppp/pppoeservers');
	}


	//ADD PPP POOL
	public function addppppool()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		if ($post['adresses'] == "") {
			$adresses  = "0.0.0.0";
		} else {
			$adresses  = $post['adresses'];
		}



		$API->comm("/ip/pool/add", array(
			"name" => $post['name'],
			"ranges" => $adresses,
		));

		redirect('ppp/pool');
	}


	// ADD PPP PROFILE
	public function addpppprofile()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		if ($post['localaddress'] == "") {
			$localaddress = "0.0.0.0";
		} else {
			$localaddress = $post['localaddress'];
		}


		$API->comm("/ppp/profile/add", array(
			"name" => $post['name'],
			"local-address" => $localaddress,
			"remote-address" => $post['remoteaddress'],
			"rate-limit" => $post['ratelimit'],
			"only-one" => $post['onlyone'],
		));

		redirect('ppp/profile');
	}


	public function editpppsecret()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		// if ($post['localaddress'] == "") {
		// 	$localaddress = "0.0.0.0";
		// } else {
		// 	$localaddress = $post['localaddress'];
		// }
		// if ($post['remoteaddress'] == "") {
		// 	$remoteaddress = "0.0.0.0";
		// } else {
		// 	$remoteaddress = $post['remoteaddress'];
		// }


		$API->comm("/ppp/secret/set", array(
			".id" => $post['id'],
			"name" => $post['user'],
			"password" => $post['password'],
			"service" => $post['service'],
			"profile" => $post['profile'],
			// "local-address" => $localaddress,
			// "remote-address" => $remoteaddress,
			"comment" => $post['comment'],
		));

		redirect('ppp/secret');
	}

	public function editpppprofile()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		if ($post['localaddress'] == "") {
			$localaddress = "0.0.0.0";
		} else {
			$localaddress = $post['localaddress'];
		}



		$API->comm("/ppp/profile/set", array(
			".id" => $post['id'],
			"name" => $post['name'],
			"local-address" => $localaddress,
			"remote-address" => $post['remoteaddress'],
			"rate-limit" => $post['ratelimit'],
			"only-one" => $post['onlyone'],
		));

		redirect('ppp/profile');
	}


	public function editppppool()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		//PENGECUALIAN
		if ($post['ranges'] == "") {
			$ranges = "0.0.0.0";
		} else {
			$ranges = $post['ranges'];
		}



		$API->comm("/ip/pool/set", array(
			".id" => $post['id'],
			"name" => $post['name'],
			"ranges" => $ranges,
		));

		redirect('ppp/pool');
	}


	public function editPppoeServers()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		// //PENGECUALIAN
		// if ($post['ranges'] == "") {
		// 	$ranges = "0.0.0.0";
		// } else {
		// 	$ranges = $post['ranges'];
		// }



		$API->comm("/interface/pppoe-server/server/set", array(
			".id" => $post['id'],
			"service-name" => $post['servicename'],
			"interface" => $post['interface'],
			"default-profile" => $post['default-profile'],
		));

		redirect('ppp/pppoeservers');
	}

	public function delSecret($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ppp/secret/remove", array(
			".id" => '*' . $id,
		));
		redirect('ppp/secret');
	}

	public function delProfile($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ppp/profile/remove", array(
			".id" => '*' . $id,
		));
		redirect('ppp/profile');
	}

	public function delPool($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/pool/remove", array(
			".id" => '*' . $id,
		));
		redirect('ppp/pool');
	}

	public function delPppActive($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ppp/active/remove", array(
			".id" => '*' . $id,
		));
		redirect('ppp/active');
	}

	public function delPppoeserver($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/interface/pppoe-server/server/remove", array(
			".id" => '*' . $id,
		));
		redirect('ppp/pppoeservers');
	}
	// public function filterrules()
	// {
	// 	$ip = $this->session->userdata('ip');
	// 	$user = $this->session->userdata('user');
	// 	$password = $this->session->userdata('password');
	// 	$API = new Mikweb();
	// 	$API->connect($ip, $user, $password);
	// 	$filterrules = $API->comm('/ip/firewall/filter/print');
	// 	$interface = $API->comm('/interface/print');
	// 	$data = [
	// 		'title' => 'PPPOE Filter Rules',
	// 		'totalpppoe' => count($filterrules),
	// 		'filterrules' => $filterrules,
	// 		'interface' => $interface,
	// 	];
	// 	$this->load->view('template/main', $data);
	// 	$this->load->view('ppp/filterrules', $data);
	// 	$this->load->view('template/footer');
	// }

	// public function addfilterrules()
	// {
	// 	$post = $this->input->post(null, true);
	// 	$ip = $this->session->userdata('ip');
	// 	$user = $this->session->userdata('user');
	// 	$password = $this->session->userdata('password');
	// 	$API = new Mikweb();
	// 	$API->connect($ip, $user, $password);

	//Contoh controller untuk drop semua paket yang masuk melalui antarmuka kecuali yang masuk selain menggunakan Pppoe-out1
	// $API->comm("ip/firewall/filter/add", array(
	// 	'chain' => "input",
	// 	'action' => "drop",
	// 	'in-interface' => "<pppoe-user003>",

	// ));

	//Contoh controller untuk drop port SSH yang masuk selain menggunakan Pppoe-out1
	// $API->comm("ip/firewall/filter/add", array(
	// 	'chain' => "input",
	// 	'action' => "drop",
	// 	'protocol' => "tcp",
	// 	'dst-port' => "22",
	// 	'in-interface' => "<pppoe-user003>",

	// ));

	//Contoh controller untuk drop port Telnet yang masuk selain menggunakan Pppoe-out1
	// $API->comm("ip/firewall/filter/add", array(
	// 	'chain' => "input",
	// 	'action' => "drop",
	// 	'protocol' => "tcp",
	// 	'dst-port' => "23",
	// 	'in-interface' => "<pppoe-user003>",

	// ));

	//Contoh controller untuk drop port HTTPS yang masuk selain menggunakan Pppoe-out1
	// $API->comm("ip/firewall/filter/add", array(
	// 	'chain' => "input",
	// 	'action' => "drop",
	// 	'protocol' => "tcp",
	// 	'dst-port' => "443",
	// 	'in-interface' => "<pppoe-user003>",

	// ));

	//Contoh controller untuk drop port HTTP yang masuk selain menggunakan Pppoe-out1
	// $API->comm("ip/firewall/filter/add", array(
	// 	'chain' => "input",
	// 	'action' => "drop",
	// 	'protocol' => "tcp",
	// 	'dst-port' => "80",
	// 	'in-interface' => "<pppoe-user003>",

	// ));

	//Contoh controller untuk drop port FTP yang masuk selain menggunakan Pppoe-out1
	// $API->comm("ip/firewall/filter/add", array(
	// 	'chain' => "input",
	// 	'action' => "drop",
	// 	'protocol' => "tcp",
	// 	'dst-port' => "21",
	// 	'in-interface' => "!Pppoe-out1",

	// ));

	//Contoh controller untuk drop port Winbox yang masuk selain menggunakan Pppoe-out1
	// 	$API->comm("ip/firewall/filter/add", array(
	// 		'chain' => "input",
	// 		'action' => "drop",
	// 		'protocol' => "tcp",
	// 		'dst-port' => "8291",
	// 		'in-interface' => "<pppoe-user003>",

	// 	));


	// 	redirect('ppp/filterrules');
	// }

	// 	public function delDropPppoe($id)
	// 	{
	// 		$ip = $this->session->userdata('ip');
	// 		$user = $this->session->userdata('user');
	// 		$password = $this->session->userdata('password');
	// 		$API = new Mikweb();
	// 		$API->connect($ip, $user, $password);
	// 		$API->comm("ip/firewall/filter/remove", array(
	// 			".id" => '*' . $id,
	// 		));
	// 		redirect('ppp/filterrules');
	// 	}
}
