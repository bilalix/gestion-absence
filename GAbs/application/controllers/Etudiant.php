<?php 

	class Etudiant extends CI_Controller {

		public function index() {

			// Limiter l'access
			if($this->session->userdata('type') == 'etudiant') {
				
				// $idUser contient l'ID de l'utilisateur connecté
				$idUser = $this->session->userdata('idUser');

				// chargement du modele "show_model" pour qu'on peut utiliser ses méthodes 
				$this->load->model('show_model');
				
				// etuAbs_show() retourne tt les infos necessaire a partir des 3 tableau ;) 
				$data['etuAbsInfo'] = $this->show_model->etuAbs_show($idUser);
				
				// on passe les données obtenues a "etudiant_view"
				$this->load->view('etudiant_view', $data);

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}

	}

?>