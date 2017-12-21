<?php 

class Insert_model extends CI_Model {

	// Fonction d'insertion des admins
	public function insert_admin($userData, $adminData) {
		// insertion dans la table User
		// Si l'insertion dans la table User est effectue avec success
		if ($this->db->insert('user', $userData)) {
			// get last id here :)
			$last_id = $this->db->insert_id();

			// hahaha :D
			$adminData['id_user'] = $last_id;
			
			// insertion dans la table admin
			// Si les données sont inseres avec success dans les deux table retourne TRUE
			if ($this->db->insert('admin', $adminData)) {
				return TRUE;
			} else {
				return FALSE;
			}

		}
	}


	// Fonction d'insertion des enseignants
	public function insert_ens($userData, $ensData) {
		// insertion dans la table User
		// Si l'insertion dans la table User est effectue avec success
		if ($this->db->insert('user', $userData)) {
			// get last id here :)
			$last_id = $this->db->insert_id();

			// hahaha :D
			$ensData['id_user'] = $last_id;
			
			// insertion dans la table enseignant
			// Si les données sont inseres avec success dans les deux table retourne TRUE
			if ($this->db->insert('enseignant', $ensData)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	// Fonction d'insertion des etudiants
	public function insert_etu($userData, $etuData) {
		// insertion dans la table User
		// Si l'insertion dans la table User est effectue avec success
		if ($this->db->insert('user', $userData)) {
			// get last id here :)
			$last_id = $this->db->insert_id();

			// hahaha :D
			$etuData['id_user'] = $last_id;

			// insertion dans la table etudiant
			// Si les données sont inseres avec success dans les deux table retourne TRUE
			if ($this->db->insert('etudiant', $etuData)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}


	// Fonction d'insertion d'une seance
	public function insert_seance($seanceData) {

		// très simple !
		if ($this->db->insert('seance', $seanceData))
			return TRUE;
		else
			return FALSE;

	}


	// Fonction d'insertion d'un module
	public function insert_module($mdlData) {

		// très simple !
		if ($this->db->insert('Module', $mdlData))
			return TRUE;
		else
			return FALSE;

	}

	

}

?>