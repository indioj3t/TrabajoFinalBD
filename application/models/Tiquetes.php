<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tiquetes extends CI_Model {

	public function __construct() {
        parent::__construct();
	}

	public function insertar($nombre,$apellidos,$destino,$valor_destino) {
		return $this->db->insert('tiquete',$nombre+$apellidos+$destino+$valor_destino);
	}

	public function actualizar($nombre,$apellidos,$destino,$valor_destino,$id) {
		return $this->db->update('tiquete',$nombre+$apellidos+$destino+$valor_destino,compact('id'));
	}

	public function eliminar($id) {
		$this->db->where(compact('id'));
		return $this->db->delete('tiquete');
	}

	public function listar() {
		$this->db->from('tiquete');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listar_filtro($id) {
		$this->db->from('tiquete');
		$this->db->like('Id', $Id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function consultar($id) {
		$this->db->from('tiquete');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function obtenerNombre($id) {
		$this->db->from('tiquete');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		$res=$query->row_array();
		return $res['Id'];
	}

	public function existe($id) {
		$this->db->from('tiquete');
		$this->db->where(compact('id'));
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}	
