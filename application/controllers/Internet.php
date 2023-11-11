<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Internet extends CI_Controller
{

	//DHCP FUNCTION

	public function enabledhcpclient($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-client/enable", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpclient');
	}


	public function dhcpclient()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$dhcpclient = $API->comm('/ip/dhcp-client/print');

		// var_dump($dhcpclient);
		// die;
		$interface = $API->comm('/interface/print');

		$data = [
			'title' => 'DHCP Client',
			'totaldhcpclient' => count($dhcpclient),
			'dhcpclient' => $dhcpclient,
			'interface' => $interface,
		];

		$this->load->view('template/main', $data);
		$this->load->view('internet/dhcpclient', $data);
		$this->load->view('template/footer');
	}

	public function delDhcpclient($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-client/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpclient');
	}
	public function adddhcpclient()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);


		$API->comm("/ip/dhcp-client/add", array(
			"interface" => $post['interface'],
		));

		redirect('internet/dhcpclient');
	}
	public function editdhcpclient()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/dhcp-client/set", array(
			".id" => $post['id'],
			"interface" => $post['user'],
		));

		redirect('internet/dhcpclient');
	}




	//IP ADDRESS
	public function ipaddress()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$ipaddress = $API->comm('/ip/address/print');

		// var_dump($ipaddress);
		// die;
		$interface = $API->comm('/interface/print');

		$data = [
			'title' => 'IP Address',
			'totalipaddress' => count($ipaddress),
			'ipaddress' => $ipaddress,
			'interface' => $interface,
		];

		$this->load->view('template/main', $data);
		$this->load->view('internet/ipaddress', $data);
		$this->load->view('template/footer');
	}

	public function delIpaddress($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/address/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/ipaddress');
	}

	public function addipaddress()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);


		$API->comm("/ip/address/add", array(
			"address" => $post['address'],
			"interface" => $post['interface'],
		));

		redirect('internet/ipaddress');
	}

	public function editipaddress()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/dhcp-client/set", array(
			".id" => $post['id'],
			"interface" => $post['user'],
		));

		redirect('internet/ipaddress');
	}



	//DNS


	public function enabledns()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dns/set", array(
			"allow-remote-requests" => 'yes',

		));
		redirect('internet/dns');
	}

	public function dns()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$dns = $API->comm('/ip/dns/print');

		// var_dump($dns);
		// die;

		$data = [
			'title' => 'DNS',
			'totaldns' => count($dns),
			'dns' => $dns,
		];

		$this->load->view('template/main', $data);
		$this->load->view('internet/dns', $data);
		$this->load->view('template/footer');
	}

	public function delDns($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dns/remove-value", array(
			".id" => '*' . $id,
		));
		redirect('internet/dns');
	}

	public function adddns()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);


		$API->comm("/ip/dns/set", array(
			"servers" => $post['servers'],
		));

		redirect('internet/dns');
	}


	//NAT
	public function firewall()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$firewall = $API->comm('/ip/firewall/nat/print');

		// var_dump($firewall);
		// die;
		$interface = $API->comm('/interface/print');

		$data = [
			'title' => 'Firewall',
			'totalfirewall' => count($firewall),
			'firewall' => $firewall,
			'interface' => $interface,
		];

		$this->load->view('template/main', $data);
		$this->load->view('internet/firewall', $data);
		$this->load->view('template/footer');
	}

	public function delFirewall($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/firewall/nat/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/firewall');
	}

	public function addfirewall()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);


		$API->comm("/ip/firewall/nat/add", array(
			"chain" => $post['chain'],
			"out-interface" => $post['out-interface'],
			"action" => $post['action'],
		));

		redirect('internet/firewall');
	}

	public function dhcpserver()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$dhcpserver = $API->comm('/ip/dhcp-server/print');
		$network = $API->comm('/ip/dhcp-server/network/print');
		$pool = $API->comm('/ip/pool/print');
		$interface = $API->comm('/interface/print');


		$data = [
			'title' => 'DHCP Server',
			'totaldhcpserver' => count($dhcpserver),
			'dhcpserver' => $dhcpserver,
			'network' => $network,
			'interface' => $interface,
			'pool' => $pool,
		];

		$this->load->view('template/main', $data);
		$this->load->view('internet/dhcpserver', $data);
		$this->load->view('template/footer');
	}

	public function delDhcpserver($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-server/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpserver');
	}

	public function adddhcpserver()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/pool/add", array(
			"name" => $post['name'],
			"ranges" => $post['ranges'],
		));


		$API->comm("/ip/dhcp-server/add", array(
			"name" => $post['name'],
			"interface" => $post['interface'],
			"address-pool" => $post['pool'],
		));

		redirect('internet/dhcpserver');
	}

	public function addnetwork()
	{
		$post = $this->input->post(null, true);
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);

		$API->comm("/ip/dhcp-server/network/add", array(
			"address" => $post['address'],
			"gateway" => $post['gateway'],
			"dns-server" => $post['dns-server'],
		));

		redirect('internet/dhcpserver');
	}
	public function delNetwork($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-server/network/remove", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpserver');
	}
	public function enabledhcpserver($id)
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$API->comm("/ip/dhcp-server/enable", array(
			".id" => '*' . $id,
		));
		redirect('internet/dhcpserver');
	}


	//POOL

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
			'title' => 'Internet Pool',
			'totalpool' => count($pool),
			'pool' => $pool,
		];

		$this->load->view('template/main', $data);
		$this->load->view('internet/pool', $data);
		$this->load->view('template/footer');
	}

	public function addinternetpool()
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

		redirect('internet/pool');
	}

	public function editinternetpool()
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

		redirect('internet/pool');
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
		redirect('internet/pool');
	}
}
