<?php 

class Activate_model extends CI_Model
{
	
	public function activate_admin($email) {

		$sql = "SELECT id_user FROM Admin WHERE email_admin = ?";
		$query  = $this->db->query($sql, array($email));
		$row = $query->row(0);
		$id = $row->id_user;

		$access = array('access' => 1);
		$this->db->where('id_user', $id);
		$this->db->update('User', $access);

	}


	public function activate_ens($email) {

		$sql = "SELECT id_user FROM Enseignant WHERE email_ens = ?";
		$query  = $this->db->query($sql, array($email));
		$row = $query->row(0);
		$id = $row->id_user;

		$access = array('access' => 1);
		$this->db->where('id_user', $id);
		$this->db->update('User', $access);

	}


	public function activate_etu($email) {

		$sql = "SELECT id_user FROM Etudiant WHERE email_etu = ?";
		$query  = $this->db->query($sql, array($email));
		$row = $query->row(0);
		$id = $row->id_user;

		$access = array('access' => 1);
		$this->db->where('id_user', $id);
		$this->db->update('User', $access);

	}


}

?>