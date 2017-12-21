<?php 

class Absence_model extends CI_Model
{
	
	public function sea_etu_show($idUser, $datSea, $hr_deb, $hr_fin) {

		// hahaaaa ! get them aaaall :D
		$sql = "SELECT * FROM Enseignant, Affecter, Seance, Module, Etudier, Etudiant 
			WHERE Enseignant.id_user = Seance.id_user 
			AND Module.id_module = Seance.id_module 
			AND Affecter.id_module = Module.id_module
			AND Affecter.id_user = Enseignant.id_user
			AND Etudier.id_module = Module.id_module 
			AND Etudier.id_user = Etudiant.id_user 
			AND Enseignant.id_user = ?
			AND Seance.date_seance = ?
			AND Seance.heure_debut = ?
			AND Seance.heure_fin = ? ";

		$query  = $this->db->query($sql, array($idUser, $datSea, $hr_deb, $hr_fin));

		return $query; 
	}


	public function insert_absence($absData) {

		// directement !
		if ($this->db->insert('Absence', $absData))
			return TRUE;
		else
			return FALSE;

	}


	public function check_absence($idSea, $idEtu) {

		$sql = "select * from Absence where id_seance = '" . $idSea . "' and id_user = '" . $idEtu . "'"; 
        $query = $this->db->query($sql);
        // num_row doit etre 0 pour qu'on peut dire que l'affectation d'absence n'a pas encore effectuer
        return $query->num_rows();

	}


}

?>