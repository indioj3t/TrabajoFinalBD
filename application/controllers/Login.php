<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller 
{
	var $user;
	function __construct() 
	{
		parent::__construct();
	}
	
	public function index() 
	{
		$this->load->view('login/entrada');
	}
	public function Admin() 
	{
		redirect('Admin/home');
	}
	public function Empresa() 
	{
		redirect('Empresa/home');
	}
	public function RegCliente() 
	{
		redirect('RegCliente/home');
	}

	public function Taquillas() 
	{
		redirect('Taquilla/home');
	}
	public function Tiquetes() 
	{
		redirect('Tiquete/home');
	}
/*
	public function RegCliente2() 
	{
		redirect('RegCliente/agregar');
	}
*/
	public function OrigenDestino() 
	{
		redirect('OrigenDestino/home');
	}
	// INICIO FUNCIONES DE USUARIOS
	public function validar() 
	{

		if ( ! $this->input->post('username') && ! $this->input->post('password'))
		{
			redirect('login/entrada');
		} else 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');	
			if($this->Usuarios->existe($username, $password)) 
			{
				$data = $arrayName = array('usuario' => $username , 'clave' => $password);
				$this->session->set_userdata($data);
				$this->load->view('menu'); 
			}
			else if($this->RegClientes->existe($username, $password))
			{	
				$data = $arrayName = array('usuario' => $username , 'clave' => $password);
				$this->session->set_userdata($data);
				$this->load->view('menu'); 
			}
			else
			{
				$this->load->view('login/error'); 	
			}
		}
	}
}
