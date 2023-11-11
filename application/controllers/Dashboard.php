<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$ip = $this->session->userdata('ip');
		$user = $this->session->userdata('user');
		$password = $this->session->userdata('password');
		$API = new Mikweb();
		$API->connect($ip, $user, $password);
		$secret = $API->comm("/ppp/secret/print");
		$pppactive = $API->comm("/ppp/active/print");
		$resource = $API->comm("/system/resource/print");
		$interface = $API->comm("/interface/print");
		// $resource = json_encode($resource);
		// $resource = json_decode($resource, true);

		$data = [
			'title' => 'MHD3 | Mikweb',
			'secret' => count($secret),
			'pppactive' => count($pppactive),
			'cpu' => $resource['0']['cpu-load'],
			'uptime' => $resource['0']['uptime'],
			'interface' => $interface,
		];

		$this->load->view('template/main', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}

	// public function traffic()
	// {
	// 	$ip = $this->session->userdata('ip');
	// 	$user = $this->session->userdata('user');
	// 	$password = $this->session->userdata('password');
	// 	$API = new Mikweb();
	// 	$API->connect($ip, $user, $password);
	// 	$getinterfacetraffic = $API->comm("/interface/monitor-traffic", array(
	// 		'interface' => 'Port2_Masjid',
	// 		'once' => '',
	// 	));

	// 	$rx = $getinterfacetraffic[0]['rx-bits-per-second'];
	// 	$tx = $getinterfacetraffic[0]['tx-bits-per-second'];

	// 	// echo 'rx = ' . $rx . '<br>';
	// 	// echo 'tx = ' . $tx . '<br>';
	// 	$data = [
	// 		'tx' => $tx,
	// 		'rx' => $rx,

	// 	];
	// 	$this->load->view('traffic', $data);
	// }
}
