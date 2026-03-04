<?php 

class Absence_model extends CI_Model
{
	
	public function sea_etu_show($idUser, $datSea, $hr_deb, $hr_fin) {

		// hahaaaa ! get them aaaall :D
		$sql = "SELECT * FROM enseignant, affecter, seance, module, etudier, etudiant 
			WHERE enseignant.id_user = seance.id_user 
			AND module.id_module = seance.id_module 
			AND affecter.id_module = module.id_module
			AND affecter.id_user = enseignant.id_user
			AND etudier.id_module = module.id_module 
			AND etudier.id_user = etudiant.id_user 
			AND enseignant.id_user = ?
			AND seance.date_seance = ?
			AND seance.heure_debut = ?
			AND seance.heure_fin = ? ";

		$query  = $this->db->query($sql, array($idUser, $datSea, $hr_deb, $hr_fin));

		return $query; 
	}


	public function insert_absence($absData) {

		// directement !
		if ($this->db->insert('absence', $absData))
			return TRUE;
		else
			return FALSE;

	}


	public function check_absence($idSea, $idEtu) {

		$sql = "select * from absence where id_seance = '" . $idSea . "' and id_user = '" . $idEtu . "'"; 
        $query = $this->db->query($sql);
        // num_row doit etre 0 pour qu'on peut dire que l'affectation d'absence n'a pas encore effectuer
        return $query->num_rows();

	}


}

?>