<?php 

	class edit_model extends CI_Model
	{

		// fonction pour remplir les champs
		public function fill_admin($email) {

			$query = $this->db->query("SELECT * FROM admin, user 
										WHERE admin.id_user=user.id_user
										AND admin.email_admin='".$email."'");

			return  $query->row_array(0);

		}
		
		// fonction pour mettre à jour les données
		public function edit_admin($email, $userData, $adminData) {

			// get id de cet utilisateur pour l'utiliser dans la requete 2
			$pick = $this->fill_admin($email);
			$id = $pick['id_user']; // ;)

			// update de la table admin (requete 1)
			$this->db->where('email_admin', $email);
			
			// update de la table admin
			if ($this->db->update('admin', $adminData)) {
				// update de la table user (requete 2)
				$this->db->where('id_user', $id);
				// update de la table user
				if ($this->db->update('user', $userData)) {
					// Si tt ce passe bien, return true :)
					return true;
				}
			}

			// sinon return false :(
			return false;
		}


		// fonction pour remplir les champs
		public function fill_ens($email) {

			$query = $this->db->query("SELECT * FROM enseignant, user 
										WHERE enseignant.id_user=user.id_user
										AND enseignant.email_ens='".$email."'");

			return  $query->row_array(0);

		}

		// fonction pour mettre à jour les données
		public function edit_ens($email, $userData, $ensData) {

			// get id de cet utilisateur pour l'utiliser dans la requete 2
			$pick = $this->fill_ens($email);
			$id = $pick['id_user']; // ;)

			// update de la table enseignant (requete 1)
			$this->db->where('email_ens', $email);
			
			if ($this->db->update('enseignant', $ensData)) {
				// update de la table user (requete 2)
				$this->db->where('id_user', $id);
				if ($this->db->update('user', $userData)) {
					// Si tt ce passe bien, return true :)
					return true;
				}
			}

			// sinon return false :(
			return false;
		}



		// fonction pour remplir les champs
		public function fill_etu($email) {

			$query = $this->db->query("SELECT * FROM etudiant, user 
										WHERE etudiant.id_user=user.id_user
										AND etudiant.email_etu='".$email."'");

			return  $query->row_array(0);

		}

		// fonction pour mettre à jour les données
		public function edit_etu($email, $userData, $etuData) {

			// get id de cet utilisateur pour l'utiliser dans la requete 2
			$pick = $this->fill_etu($email);
			$id = $pick['id_user']; // ;)

			// update de la table etudiant (requete 1)
			$this->db->where('email_etu', $email);
			
			if ($this->db->update('etudiant', $etuData)) {
				// update de la table user (requete 2)
				$this->db->where('id_user', $id);
				if ($this->db->update('user', $userData)) {
					// Si tt ce passe bien, return true :)
					return true;
				}
			}

			// sinon return false :(
			return false;
		}


		// fonction pour remplir les champs
		public function fill_module($id) {

			$query = $this->db->query("SELECT * FROM module 
										WHERE module.id_module='".$id."'");

			return  $query->row_array(0);

		}

		// fonction pour mettre à jour les données
		public function edit_mdl($id, $mdlData) {

			// update de la table module
			$this->db->where('id_module', $id);
			
			if ($this->db->update('module', $mdlData)) {
					return true;
				}

			// sinon return false :(
			return false;
		}


	}

?>