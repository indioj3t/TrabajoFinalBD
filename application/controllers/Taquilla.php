<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Taquilla extends CI_Controller {

	var $user;

	function __construct() {
        parent::__construct();
    }

	public function index() {
		redirect('Taquilla/home');
		//header('location:Admin/home');
	}

	public function retroceder() {
		$this->load->view('menu' );
		//header('location:Admin/home');
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


	public function home() {	
		$data['listTaquillas'] = $this->Taquillas->listar();
		$this->load->view('taquilla/taquilla', $data );
	}

	public function cliente() {	
		$data['listTaquillas'] = $this->Taquillas->listar();
		$this->load->view('taquilla/taquillaCliente', $data );
	}

	public function taquilla() {
		$data['listTaquillas'] = $this->Taquillas->listar();
		$this->load->view('taquilla/taquilla', $data );
	}

	// INICIO FUNCIONES DE AREAS

	public function agregar() {		
		if ( ! $this->input->post('origen'))
		{
			redirect('Taquilla/taquilla');
		} else {
			
			$origen = $this->input->post('origen');
			$destino = $this->input->post('destino');
			$precio = $this->input->post('precio');
			if (! $this->input->post('idd')) {
				

					$origen = array('origen' => $origen);
					$destino = array('destino' => $destino);
					$precio = array('precio' => $precio);
					$this->Taquillas->insertar($origen,$destino,$precio);
				
			} else {
					$idd = $this ->input->post('idd');
					$origen = array('origen' => $origen);
					$destino = array('destino' => $destino);
					$precio = array('precio' => $precio);
					$this->Taquillas->actualizar($origen,$destino,$precio,$idd);
				//$this->session->set_userdata('msg', 'Equipo '. $nombre . '(' . $region . ') editado correctamente');
			}
			redirect('Taquilla/taquilla');
		}
	}

	public function listarFiltro() {
		if ($this->input->post('key')) {
			$data = $this->Area->listar_filtro($this->input->post('key'));
			foreach ($data as $valor) {
			    echo $valor['id_visita'] . "::::" . $valor['descripcion'] . "----";
			}
			
		}
	}

	public function eliminar() {
		$idd = $this->input->post('idd');
		$this->Taquillas->eliminar( $idd);
		redirect('Taquilla/taquilla');		
	}
}
