<?php 

class Desactivate_model extends CI_Model
{
	
	public function desactivate_admin($email) {

		$sql = "SELECT id_user FROM Admin WHERE email_admin = ?";
		$query  = $this->db->query($sql, array($email));
		$row = $query->row(0);
		$id = $row->id_user;

		$access = array('access' => 0);
		$this->db->where('id_user', $id);
		$this->db->update('User', $access);

	}


	public function desactivate_ens($email) {

		$sql = "SELECT id_user FROM Enseignant WHERE email_ens = ?";
		$query  = $this->db->query($sql, array($email));
		$row = $query->row(0);
		$id = $row->id_user;

		$access = array('access' => 0);
		$this->db->where('id_user', $id);
		$this->db->update('User', $access);

	}


	public function desactivate_etu($email) {

		$sql = "SELECT id_user FROM Etudiant WHERE email_etu = ?";
		$query  = $this->db->query($sql, array($email));
		$row = $query->row(0);
		$id = $row->id_user;

		$access = array('access' => 0);
		$this->db->where('id_user', $id);
		$this->db->update('User', $access);

	}


}

?>