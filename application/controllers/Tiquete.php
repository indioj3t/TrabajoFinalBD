<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tiquete extends CI_Controller {

	var $user;

	function __construct() {
        parent::__construct();
    }

	public function index() {
		redirect('Tiquete/home');
		//header('location:Admin/home');
	}

	public function retroceder() {
		$this->load->view('menu' );
		//header('location:Admin/home');
	}

	public function admin() {
		redirect('Tiquete/home');
		//header('location:Admin/home');
	}


	public function home() {	
		$data['listTiquetes'] = $this->Tiquetes->listar();
		$this->load->view('tiquete/tiquete', $data );
	}
	public function cliente() {	
		$data['listTaquillas'] = $this->Taquillas->listar();
		$this->load->view('taquilla/taquilla', $data );
	}

	public function tiquete() {
		$data['listTiquetes'] = $this->Tiquetes->listar();
		$this->load->view('tiquete/tiquete', $data );
	}


	// INICIO FUNCIONES DE AREAS

	public function agregar() {		
		if ( ! $this->input->post('nombre'))
		{
			redirect('Tiquete/tiquete');
		} else {
			
			$nombre = $this->input->post('nombre');
			$apellido = $this->input->post('apellido');
			$destino = $this->input->post('destino');
		    $valor_tiquete = $this->input->post('valor_tiquete');
			if (! $this->input->post('idd')) {
				

					$nombre = array('nombre' => $nombre);
					$apellido = array('apellidos' => $apellido);
					$destino = array('destino' => $destino);
					$valor_tiquete = array('valor_tiquete' => $valor_tiquete);
					$this->Tiquetes->insertar($nombre,$apellido,$destino,$valor_tiquete);
				
			} else {
					$idd = $this->input->post('idd');
					$nombre = array('nombre' => $nombre);
					$apellido = array('apellidos' => $apellido);
					$destino = array('destino' => $destino);
					$valor_tiquete = array('valor_tiquete' => $valor_tiquete);
					$this->Tiquetes->actualizar($nombre,$apellido,$destino,$valor_tiquete,$idd);
				//$this->session->set_userdata('msg', 'Equipo '. $nombre . '(' . $region . ') editado correctamente');
			}
			redirect('Tiquete/tiquete');
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
		$this->Tiquetes->eliminar( $idd);
		redirect('Tiquete/tiquete');
		
	}
}
