<?php 

class AffMdl_model extends CI_Model {

	// Fonction d'affectation d'un module à un enseignant
	public function aff_module_ens($email_en, $module_choisi) {
		
		// avant d'inserer dans la table affecter
		// on doit recuperer l'id d'enseignant et l'id du module

		// get id_ens (id_user), je vais utiliser la fonction "fill_ens" (voir edit_model)
		$this->load->model('edit_model');
		$pick = $this->edit_model->fill_ens($email_en);
		$idEns = $pick['id_user']; // ;)

		// get id_module, je vais utiliser la fonction "get_id_module" (voir show_model)
		$this->load->model('show_model');
		$idMdl = $this->show_model->get_id_module($module_choisi);

		$AffData = array(
			'id_user' => $idEns,
			'id_module' => $idMdl
			);

		// maintenant l'insertion dans la table Affecter :D
		if ($this->db->insert('Affecter', $AffData))
		 	return TRUE;
		else
			return FALSE;

	}

	// Fonction d'affectation d'un module à un etudiant
	public function aff_module_etu($email_et, $module_choisi) {
		
		// avant d'inserer dans la table etudier
		// on doit recuperer l'id d'etudiant et l'id du module

		// get id_etu (id_user), je vais utiliser la fonction "fill_etu" (voir edit_model)
		$this->load->model('edit_model');
		$pick = $this->edit_model->fill_etu($email_et);
		$idEtu = $pick['id_user']; // ;)

		// get id_module, je vais utiliser la fonction "get_id_module" (voir show_model)
		$this->load->model('show_model');
		$idMdl = $this->show_model->get_id_module($module_choisi);

		$AffData = array(
			'id_user' => $idEtu,
			'id_module' => $idMdl
			);

		// maintenant l'insertion dans la table Etudier :D
		if ($this->db->insert('Etudier', $AffData))
		 	return TRUE;
		else
			return FALSE;

	}



	

}

?>