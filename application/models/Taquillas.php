<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Taquillas extends CI_Model {

	public function __construct() {
        parent::__construct();
	}

	public function insertar($origen,$destinos,$precio) {
		return $this->db->insert('taquilla',$origen+$destinos+$precio);
	}

	public function actualizar($origen,$destinos,$precio,$Id) {
		return $this->db->update('taquilla',$origen+$destinos+$precio,compact('id'));
	}

	public function eliminar($id) {
		$this->db->where(compact('id'));
		return $this->db->delete('taquilla');
	}

	public function listar() {
		$this->db->from('taquilla');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function listar_filtro($id) {
		$this->db->from('taquilla');
		$this->db->like('Id', $Id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function consultar($id) {
		$this->db->from('taquilla');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function obtenerNombre($id) {
		$this->db->from('taquilla');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		$res=$query->row_array();
		return $res['Id'];
	}

	public function existe($id) {
		$this->db->from('taquilla');
		$this->db->where(compact('id'));
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}	
