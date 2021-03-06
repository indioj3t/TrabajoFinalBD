<?php defined('BASEPATH') OR exit('No direct script access allowed');
class RegClientes extends CI_Model 
{
	public function __construct() 
	{
        parent::__construct();
	}
	public function insertar($nombre, $cedula, $direccion, $telefono, $user_cliente, $clv_cliente)
	{
		return $this->db->insert('cliente', $nombre + $cedula + $direccion + $telefono + $user_cliente + $clv_cliente);
	}
	public function actualizar($nombre, $cedula, $direccion, $telefono, $user_cliente, $clv_cliente, $id) 
	{
		return $this->db->update('cliente', $nombre + $cedula + $direccion + $telefono + $user_cliente + $clv_cliente, compact('id'));
	}
	public function eliminar($id) 
	{
		$this->db->where(compact('id'));
		return $this->db->delete('cliente');
	}
	public function listar() 
	{
		$this->db->from('cliente');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function listar_filtro($nombre) 
	{
		$this->db->from('cliente');
		$this->db->like('nombre', $nom_empresa);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function consultar($id) 
	{
		$this->db->from('cliente');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		return $query->row_array();
	}
	public function obtenerNombre($id) 
	{
		$this->db->from('cliente');
		$this->db->where(compact('id'));
		$query = $this->db->get();
		$res=$query->row_array();
		return $res['nombre'];
	}
	public function existe($user_cliente, $clv_cliente) 
	{
		$this->db->from('cliente');
		$this->db->where(compact('user_cliente', 'clv_cliente'));
		return ($this->db->count_all_results() > 0) ? TRUE : FALSE;
	}
}	