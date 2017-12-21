<?php 

	class Delete_model extends CI_Model {
		
		public function delete_admin($email) {	
			// get the id
			$sql = "SELECT id_user FROM Admin WHERE email_admin = ?";
			$query  = $this->db->query($sql, array($email));
			$row = $query->row(0);
			$id = $row->id_user;

			// delete admin where id
			$this->db->query('DELETE FROM Admin WHERE email_admin = "'.$email.'" ');

			//delete user where id
			$this->db->query('DELETE FROM User WHERE id_user = "'.$id.'" ');
		}

		public function delete_ens($email) {	
			// get the id
			$sql = "SELECT id_user FROM Enseignant WHERE email_ens = ?";
			$query  = $this->db->query($sql, array($email));
			$row = $query->row(0);
			$id = $row->id_user;

			// delete admin where id
			$this->db->query('DELETE FROM Enseignant WHERE email_ens = "'.$email.'" ');

			//delete user where id
			$this->db->query('DELETE FROM User WHERE id_user = "'.$id.'" ');
		}

		public function delete_etu($email) {	
			// get the id
			$sql = "SELECT id_user FROM Etudiant WHERE email_etu = ?";
			$query  = $this->db->query($sql, array($email));
			$row = $query->row(0);
			$id = $row->id_user;

			// delete admin where id
			$this->db->query('DELETE FROM Etudiant WHERE email_etu = "'.$email.'" ');

			//delete user where id
			$this->db->query('DELETE FROM User WHERE id_user = "'.$id.'" ');
		}


		public function delete_mdl($id) {	
			
			// très simple !
			$this->db->query('DELETE FROM Module WHERE id_module = "'.$id.'" ');
		}

	}

?>