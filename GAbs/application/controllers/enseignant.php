<?php 

	class Enseignant extends CI_Controller {

		public function index() {

			// Limiter l'access
			if($this->session->userdata('type') == 'enseignant') {

				$this->load->model('show_model');

				// $idUser contient l'ID de l'utilisateur connecté
				$idUser = $this->session->userdata('idUser');

				// module_show() retourne tt les modules ensignés par cet enseignant
				$data['ModuleInfo'] = $this->show_model->module_show($idUser);

				// seance_show() retourne tt les seances enseignés par cet ens
				$data['SeanceInfo'] = $this->show_model->seance_show($idUser);

				// on passe les données obtenues a "admin_view"
				$this->load->view('enseignant_view', $data);

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}
		

		public function insertSeance() {

			// Limiter l'access
			if($this->session->userdata('type') == 'enseignant') {

				$this->load->model('insert_model');

				// get id de l'utilisateur connecté actuellement
				$idUser = $this->session->userdata('idUser');

				//set validation rules
				$this->form_validation->set_rules('module', 'Module', 'trim|required');
				$this->form_validation->set_rules('date_sea', 'Date seance', 'trim|required');
				$this->form_validation->set_rules('heure_deb', 'Heur debut', 'trim|required');
				$this->form_validation->set_rules('heure_fin', 'Heure fin', 'trim|required');
				$this->form_validation->set_rules('type_sea', 'Type Seance', 'trim|required');
				
				// get les modules affecter a cet ens
				$this->load->model('show_model');
				$data['ModuleInfo'] = $this->show_model->module_show($idUser);

				//validate form input
				if ($this->form_validation->run() == FALSE)
		        {
					// fails
	                $this->load->view('insertSeance_view', $data);
		        }
				else
				{
					if ($this->input->post('submit') == "Inserer")
	               	{
	               		// get le module choisie (le nom)
	               		$nom_module = $this->input->post('module');
						
						// get id_module
						$idModule = $this->show_model->get_id_module($nom_module);

						//inserer les info de la seance dans la bd
						// ce qui va etre inserer dans la table Seance
						$seanceData = array(
							'id_module' => $idModule,
							'id_user' => $idUser,
							'date_seance' => $this->input->post('date_sea'),
							'heure_debut' => $this->input->post('heure_deb'),
							'heure_fin' => $this->input->post('heure_fin'),
							'type_seance' => $this->input->post('type_sea'),
							'heure_debut' => $this->input->post('heure_deb')
						);

						// insert form data into database
						if ($this->insert_model->insert_seance($seanceData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">La seance créée avec succès !</div>');
							redirect('enseignant/insertSeance', $data);
						}
						else
						{
							// error
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">take it easy. Veuillez réessayer plus tard !</div>');
							redirect('enseignant/insertSeance', $data);
						}
					}
					else
	               	{
	                    redirect('enseignant/insertSeance');
	               	}
				}

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}


		public function listeAbs() {

			// Limiter l'access
			if($this->session->userdata('type') == 'enseignant') {

				// On va passer par 7 étapes :
				// étape 1 : get id_ens from ens table (l'utilisateur connecté actuellement)
				// étape 2 : get id_module from affecter table where id = id_ens (les modules affecter a cet ens)
				// étape 3 : get nom_module from Module table à l'aide de id_module
				// étape 4 : get id_etu from Etudier table where id = id_module
				// étape 5 : get * from Etudiant table where id = id_etu
				// étape 6 : get * from seance table where id = id_etu
				// étape 7 : get * from absence table where id = id_etu

				// here we go !!!
				$this->load->model('show_model');

				// étape 1
				$idUser = $this->session->userdata('idUser');

				// Si il n'a pas encore cliquer sur afficher, y a affichage de tt les abs
				if (!$this->input->post('submit')) {
					
					// ici les étapes 2 -> 7
					$data['allAbsInfo'] = $this->show_model->get_all_abs($idUser);

					// get CNE etudiant (see model)
					$data['CNEEtuAbsInfo'] = $this->show_model->get_cne_abs($idUser);

					// pour eviter l'erreur de "Undefined variable bla bla bla"
					$data['EtuAbsInfo'] = FALSE;

					$this->load->view('listeAbs_view', $data);

				}


				// pour avoir les infos d'un etudiant spécifique, selon son CNE
				elseif ($this->input->post('submit')) {

					// get le CNE selectionner
					$cne = $this->input->post('cne');
					// je vais le garder, pour le passer à l'export aprés ;)
					$this->session->set_flashdata('cne', $cne);

					$data['EtuAbsInfo'] = $this->show_model->get_abs_etu($idUser, $cne);

					// pour eviter l'erreur de "Undefined variable bla bla bla"
					$data['allAbsInfo'] = FALSE;

					$this->load->view('listeAbs_view', $data);

				}

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}

		// Fonction pour avoir les infos d'un etudiant spécifique, selon son CNE
		public function listeAbsEtu() { // pas encore traité

			// Limiter l'access
			if($this->session->userdata('type') == 'enseignant') {

				$this->load->model('show_model');

				$idUser = $this->session->userdata('idUser');

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}


		public function listeEtu() { // pas encore traité

			// Limiter l'access
			if($this->session->userdata('type') == 'enseignant') {

				$this->load->model('show_model');

				// get id de l'utilisateur connecté actuellement
				$idUser = $this->session->userdata('idUser');

				// get les modules affecter a cet ens
				$data['ModuleInfo'] = $this->show_model->module_show($idUser);

				// get les etudiants qui etudient ces modules
				// ops 7sélt XD
				// kso desu yo ne ! :P

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}

		public function toExcel() { // peut etre supprimer (je pense)
		
			// $this->load->view('spreadsheet_view');

			$this->load->library('excel');

			
		
		}

	}

?>