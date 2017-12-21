<?php 

	class edit_model extends CI_Model
	{

		// fonction pour remplir les champs
		public function fill_admin($email) {

			$query = $this->db->query("SELECT * FROM Admin, User 
										WHERE Admin.id_user=User.id_user
										AND Admin.email_admin='".$email."'");

			return  $query->row_array(0);

		}
		
		// fonction pour mettre à jour les données
		public function edit_admin($email, $userData, $adminData) {

			// get id de cet utilisateur pour l'utiliser dans la requete 2
			$pick = $this->fill_admin($email);
			$id = $pick['id_user']; // ;)

			// update de la table admin (requete 1)
			$this->db->where('email_admin', $email);
			
			// update de la table Admin
			if ($this->db->update('Admin', $adminData)) {
				// update de la table user (requete 2)
				$this->db->where('id_user', $id);
				// update de la table User
				if ($this->db->update('User', $userData)) {
					// Si tt ce passe bien, return true :)
					return true;
				}
			}

			// sinon return false :(
			return false;
		}


		// fonction pour remplir les champs
		public function fill_ens($email) {

			$query = $this->db->query("SELECT * FROM Enseignant, User 
										WHERE Enseignant.id_user=User.id_user
										AND Enseignant.email_ens='".$email."'");

			return  $query->row_array(0);

		}

		// fonction pour mettre à jour les données
		public function edit_ens($email, $userData, $ensData) {

			// get id de cet utilisateur pour l'utiliser dans la requete 2
			$pick = $this->fill_ens($email);
			$id = $pick['id_user']; // ;)

			// update de la table Enseignant (requete 1)
			$this->db->where('email_ens', $email);
			
			if ($this->db->update('Enseignant', $ensData)) {
				// update de la table user (requete 2)
				$this->db->where('id_user', $id);
				if ($this->db->update('User', $userData)) {
					// Si tt ce passe bien, return true :)
					return true;
				}
			}

			// sinon return false :(
			return false;
		}



		// fonction pour remplir les champs
		public function fill_etu($email) {

			$query = $this->db->query("SELECT * FROM Etudiant, User 
										WHERE Etudiant.id_user=User.id_user
										AND Etudiant.email_etu='".$email."'");

			return  $query->row_array(0);

		}

		// fonction pour mettre à jour les données
		public function edit_etu($email, $userData, $etuData) {

			// get id de cet utilisateur pour l'utiliser dans la requete 2
			$pick = $this->fill_etu($email);
			$id = $pick['id_user']; // ;)

			// update de la table Etudiant (requete 1)
			$this->db->where('email_etu', $email);
			
			if ($this->db->update('Etudiant', $etuData)) {
				// update de la table user (requete 2)
				$this->db->where('id_user', $id);
				if ($this->db->update('User', $userData)) {
					// Si tt ce passe bien, return true :)
					return true;
				}
			}

			// sinon return false :(
			return false;
		}


		// fonction pour remplir les champs
		public function fill_module($id) {

			$query = $this->db->query("SELECT * FROM Module 
										WHERE Module.id_module='".$id."'");

			return  $query->row_array(0);

		}

		// fonction pour mettre à jour les données
		public function edit_mdl($id, $mdlData) {

			// update de la table Module
			$this->db->where('id_module', $id);
			
			if ($this->db->update('Module', $mdlData)) {
					return true;
				}

			// sinon return false :(
			return false;
		}


	}

?>