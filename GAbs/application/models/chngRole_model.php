<?php 

	class ChngRole_model extends CI_Model {

		public function index($email_ad, $email_en, $email_et, $nv_role) {
			//// on doit verifier que l'admin qui est connecter actuellement ne peut pas change son role (c'est logique !)
			// var_dump($nv_role);
			// var_dump($email_ad);
			// var_dump($email_en);
			// var_dump($email_et);

			// if nv role le mme "sorry u can't !" ;)

			// admin, etudiant --to--> enseignant
			if ($nv_role == 'ens') {

				// le nouveau type va etre enseignant
				$type_user = array('type_user' => 'enseignant'); 

				// // get l'ancien role
				// $sql = "SELECT type_user FROM User WHERE id_user = ?";
				// $query  = $this->db->query($sql, array($id));
				// $row = $query->first_row('array');
				// $old_role = $row['type_user'];

				// admin --to--> enseignant
				// $email_ad = true : indique qu'il a été un admin hhhhh ;)
				if ($email_ad) {

					// get the user_id de l'utilisateur choisie (recherche par email)
					$sql = "SELECT id_user FROM Admin WHERE email_admin = ?";
					$query  = $this->db->query($sql, array($email_ad));
					// wohooooooooooooo ! :D
					$row = $query->first_row('array');
					$id = $row['id_user'];

					// helaaaa hop :)
					$this->admin_to_ens($email_ad, $id, $type_user);
				}

				
				// etudiant --to--> enseignant
				elseif ($email_et) {
					
					// get the user_id de l'utilisateur choisie (recherche par email)
					$sql = "SELECT id_user FROM Etudiant WHERE email_etu = ?";
					$query  = $this->db->query($sql, array($email_et));
					// wohooooooooooooo ! :D
					$row = $query->first_row('array');
					$id = $row['id_user'];

					// helaaaa hop :)
					$this->etu_to_ens($email_et, $id, $type_user);
				}
				
			}

			// enseignant, etudiant --to--> admin 
			elseif ($nv_role == 'admin') {

				// le nouveau type va etre admin
				$type_user = array('type_user' => 'admin');

				// enseignant --to--> admin
				if ($email_en) {

					// get the user_id de l'utilisateur choisie (recherche par email)
					$sql = "SELECT id_user FROM Enseignant WHERE email_ens = ?";
					$query  = $this->db->query($sql, array($email_en));
					// wohooooooooooooo ! :D
					$row = $query->first_row('array');
					$id = $row['id_user'];

					// helaaaa hop :)
					$this->ens_to_admin($email_en, $id, $type_user);
				}

				// etudiant --to--> admin
				elseif ($email_et) {
					
					// get the user_id de l'utilisateur choisie (recherche par email)
					$sql = "SELECT id_user FROM Etudiant WHERE email_etu = ?";
					$query  = $this->db->query($sql, array($email_et));
					// wohooooooooooooo ! :D
					$row = $query->first_row('array');
					$id = $row['id_user'];

					// helaaaa hop :)
					$this->etu_to_admin($email_et, $id, $type_user);
				}
				
			}

			// enseignant, admin --to--> etudiant
			elseif ($nv_role == 'etu') {

				// le nouveau type va etre atudiant
				$type_user = array('type_user' => 'etudiant');

				// enseignant --to--> etudiant
				if ($email_en) {

					// get the user_id de l'utilisateur choisie (recherche par email)
					$sql = "SELECT id_user FROM Enseignant WHERE email_ens = ?";
					$query  = $this->db->query($sql, array($email_en));
					// wohooooooooooooo ! :D
					$row = $query->first_row('array');
					$id = $row['id_user'];

					// helaaaa hop :)
					$this->ens_to_etu($email_en, $id, $type_user);
				}

				// admin --to--> etudiant
				elseif ($email_ad) {
					
					// get the user_id de l'utilisateur choisie (recherche par email)
					$sql = "SELECT id_user FROM Admin WHERE email_admin = ?";
					$query  = $this->db->query($sql, array($email_ad));
					// wohooooooooooooo ! :D
					$row = $query->first_row('array');
					$id = $row['id_user'];

					// helaaaa hop :)
					$this->admin_to_etu($email_ad, $id, $type_user);
				}



			}

		}


		public function admin_to_ens($email, $id, $type_user) {

			// On va passer par 4 etapes :
			// changer le type
			$this->db->where('id_user', $id);
			$this->db->update('User', $type_user);

			// selectionner les infos de cet utilisateur
			$query = $this->db->get_where('Admin', array('id_user' => $id));
			$row = $query->first_row('array');
			$nom = $row['nom_admin'];
			$prenom = $row['prenom_admin'];
			$email = $row['email_admin'];

			// les copiés dans la table correspondante
			$data = array(
			   'id_user' => $id,
			   'nom_ens' => $nom,
			   'prenom_ens' => $prenom,
			   'email_ens' => $email
			);
			$this->db->insert('Enseignant', $data); 

			// les supprimer de la table ancienne 
			$this->db->delete('Admin', array('id_user' => $id)); 

		}

		public function etu_to_ens($email, $id, $type_user) {

			// On va passer par 4 etapes :
			// changer le type
			$this->db->where('id_user', $id);
			$this->db->update('User', $type_user);

			// selectionner les infos de cet utilisateur
			$query = $this->db->get_where('Etudiant', array('id_user' => $id));
			$row = $query->first_row('array');
			$nom = $row['nom_etu'];
			$prenom = $row['prenom_etu'];
			$email = $row['email_etu'];
			$adresse = $row['adresse_etu'];
			$ville = $row['ville_etu'];
			$photo = $row['photo_etu'];
			$phone = $row['phone_etu'];

			// les copiés dans la table correspondante
			$data = array(
			   'id_user' => $id,
			   'nom_ens' => $nom,
			   'prenom_ens' => $prenom,
			   'email_ens' => $email,
			   'adresse_ens' => $adresse,
			   'ville_ens' => $ville,
			   'photo_ens' => $photo,
			   'phone_ens' => $phone
			);
			$this->db->insert('Enseignant', $data); 

			// les supprimer de la table ancienne 
			$this->db->delete('Etudiant', array('id_user' => $id)); 

		}


		public function ens_to_admin($email, $id, $type_user) {

			// On va passer par 4 etapes :
			// changer le type
			$this->db->where('id_user', $id);
			$this->db->update('User', $type_user);

			// selectionner les infos de cet utilisateur
			$query = $this->db->get_where('Enseignant', array('id_user' => $id));
			$row = $query->first_row('array');
			$nom = $row['nom_ens'];
			$prenom = $row['prenom_ens'];
			$email = $row['email_ens'];

			// les copiés dans la table correspondante
			$data = array(
			   'id_user' => $id,
			   'nom_admin' => $nom,
			   'prenom_admin' => $prenom,
			   'email_admin' => $email
			);
			$this->db->insert('Admin', $data); 

			// les supprimer de la table ancienne 
			$this->db->delete('Enseignant', array('id_user' => $id)); 
		}


		public function etu_to_admin($email, $id, $type_user) {

			// On va passer par 4 etapes :
			// changer le type
			$this->db->where('id_user', $id);
			$this->db->update('User', $type_user);

			// selectionner les infos de cet utilisateur
			$query = $this->db->get_where('Etudiant', array('id_user' => $id));
			$row = $query->first_row('array');
			$nom = $row['nom_etu'];
			$prenom = $row['prenom_etu'];
			$email = $row['email_etu'];

			// les copiés dans la table correspondante
			$data = array(
			   'id_user' => $id,
			   'nom_admin' => $nom,
			   'prenom_admin' => $prenom,
			   'email_admin' => $email
			);
			$this->db->insert('Admin', $data); 

			// les supprimer de la table ancienne 
			$this->db->delete('Etudiant', array('id_user' => $id)); 
		}


		public function ens_to_etu($email, $id, $type_user) {

			// On va passer par 4 etapes :
			// changer le type
			$this->db->where('id_user', $id);
			$this->db->update('User', $type_user);

			// selectionner les infos de cet utilisateur
			$query = $this->db->get_where('Enseignant', array('id_user' => $id));
			$row = $query->first_row('array');
			$nom = $row['nom_ens'];
			$prenom = $row['prenom_ens'];
			$email = $row['email_ens'];
			$adresse = $row['adresse_ens'];
			$ville = $row['ville_ens'];
			$photo = $row['photo_ens'];
			$phone = $row['phone_ens'];

			// les copiés dans la table correspondante
			$data = array(
			   'id_user' => $id,
			   'CNE' => 00000000,
			   'nom_etu' => $nom,
			   'prenom_etu' => $prenom,
			   'email_etu' => $email,
			   'adresse_etu' => $adresse,
			   'ville_etu' => $ville,
			   'photo_etu' => $photo,
			   'phone_etu' => $phone
			);
			$this->db->insert('Etudiant', $data); 

			// les supprimer de la table ancienne 
			$this->db->delete('Enseignant', array('id_user' => $id)); 

		}

		public function admin_to_etu($email, $id, $type_user) {

			// On va passer par 4 etapes :
			// changer le type
			$this->db->where('id_user', $id);
			$this->db->update('User', $type_user);

			// selectionner les infos de cet utilisateur
			$query = $this->db->get_where('Admin', array('id_user' => $id));
			$row = $query->first_row('array');
			$nom = $row['nom_admin'];
			$prenom = $row['prenom_admin'];
			$email = $row['email_admin'];

			// les copiés dans la table correspondante
			$data = array(
			   'id_user' => $id,
			   'CNE' => 00000000,
			   'nom_etu' => $nom,
			   'prenom_etu' => $prenom,
			   'email_etu' => $email
			);
			$this->db->insert('Etudiant', $data); 

			// les supprimer de la table ancienne 
			$this->db->delete('Admin', array('id_user' => $id)); 
		}


	}

?>