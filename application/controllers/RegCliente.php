<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RegCliente extends CI_Controller 
{
	var $user;
	function __construct() 
	{
        parent::__construct();
    }
	public function index() 
	{
		redirect('RegCliente/home');
		//header('location:RegCliente/home');
	}
	public function retroceder() 
	{
		$this->load->view('menu');
	}
	public function volverinicio() 
	{
		$this->load->view('login/entrada');
	}
	public function admin() 
	{
		redirect('Admin/home');
	}
	public function home() 
	{	
		$data['listRegClientes'] = $this->RegClientes->listar();
		$this->load->view('admin/regcliente', $data );
	}
	public function regcliente() 
	{
		$data['listRegClientes'] = $this->RegClientes->listar();
		$this->load->view('admin/regcliente', $data );
	}
	// INICIO FUNCIONES DE REGCLIENTE
	public function agregar() 
	{		
		if ( ! $this->input->post('nombre'))
		{
			redirect('RegCliente/regcliente');
		} else 
		{
			$nomb = $this->input->post('nombre');
			$ced = $this->input->post('cedula');
			$dir = $this->input->post('direccion');
			$tel = $this->input->post('telefono');
			$usr = $this->input->post('user_cliente');
			$clv = $this->input->post('clv_cliente');
			if (! $this->input->post('idd')) 
			{
				if(!$this->RegClientes->existe(0, $nit)) 
				{
					$dat = array('nombre' => $nomb);
					$dat1 = array('cedula' => $ced);
					$dat2 = array('direccion' => $dir);
					$dat3 = array('telefono' => $tel);
					$dat4 = array('user_cliente' => $usr);
					$dat5 = array('clv_cliente' => $clv);
					$this->RegClientes->insertar($dat, $dat1, $dat2, $dat3, $dat4, $dat5);
				} 
			} else 
			{
				$idd = $this->input->post('idd');
				$dat = array('nombre' => $nomb);
				$dat1 = array('cedula' => $ced);
				$dat2 = array('direccion' => $dir);
				$dat3 = array('telefono' => $tel);
				$dat4 = array('user_cliente' => $usr);
				$dat5 = array('clv_cliente' => $clv);
				$this->RegClientes->actualizar($dat, $dat1, $dat2, $dat3, $dat4, $dat5, $idd);
				//$this->session->set_userdata('msg', 'Equipo '. $nombre . '(' . $region . ') editado correctamente');
			}
			redirect('RegCliente/regcliente');
		}
	}
	public function listarFiltro() 
	{
		if ($this->input->post('key')) 
		{
			$data = $this->RegClientes->listar_filtro($this->input->post('key'));
			foreach ($data as $valor) 
			{
			    echo $valor['id_visita'] . "::::" . $valor['descripcion'] . "----";
			}			
		}
	}
	public function eliminar() 
	{
		$idd = $this->input->post('idd');
		$this->RegClientes->eliminar( $idd);
		redirect('RegCliente/regcliente');	
	}
}