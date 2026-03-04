<?php 

	class Edit extends CI_Controller
	{
		
		// Fonction pour le remplissage des champs
		public function fillAdmin() {

			// get l'email de l'utilisateur selectionner
			$email = $this->input->get('email_admin');

			// je le reprendre
			$this->session->set_flashdata('email', $email);

			$this->load->model('edit_model');

			$data['fillAdminInfo'] = $this->edit_model->fill_admin($email); 

			$this->load->view('editAdmin_view', $data);

		}

		//
		public function editAdmin() {
			
			$this->load->model('edit_model');

			// attention !
			$email = $this->session->flashdata('email');
			$data['fillAdminInfo'] = $this->edit_model->fill_admin($email); 

			//set validation rules
			$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('fname', 'First Name', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');

			//validate form input
			if ($this->form_validation->run() == FALSE)
	        {
				// fails
                $this->load->view('editAdmin_view', $data);
	        }
			else
			{
				if ($this->input->post('submit') == "Update")
               	{
					//insert the user registration details into database
					// ce qui va etre inserer dans la table User
					$userData = array(
						'login' => $this->input->post('pseudo'),
						// 'type_user' => 'admin',
						// 'access' => '1'
					);
					// ce qui va etre inserer dans la table Admin
					$adminData = array(
						'nom_admin' => $this->input->post('lname'),
						'prenom_admin' => $this->input->post('fname'),
						'email_admin' => $this->input->post('email')
					);

					// update data
					if ($this->edit_model->edit_admin($email, $userData, $adminData))
					{				
						// successfully
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">les données sont modifiées avec succès !</div>');
						redirect('edit/editAdmin', $data);
					}
					else
					{
						// error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
						redirect('edit/editAdmin', $data);
					}
				}
				else
               	{
                    redirect('edit/editAdmin', $data);
               	}
			}
		}



		// Fonction pour le remplissage des champs
		public function fillEns() {

			// get l'email de l'utilisateur selectionner
			$email = $this->input->get('email_ens');

			// je le reprendre
			$this->session->set_flashdata('email', $email);

			$this->load->model('edit_model');

			$data['fillEnsInfo'] = $this->edit_model->fill_ens($email); 

			$this->load->view('editEns_view', $data);

		}


		public function editEns() {
			
			$this->load->model('edit_model');

			// attention !
			$email = $this->session->flashdata('email');
			$data['fillEnsInfo'] = $this->edit_model->fill_ens($email); 

			//set validation rules
			$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('fname', 'First Name', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('adrs', 'Adresse', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('ville', 'Ville', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|min_length[3]|max_length[30]|xss_clean');
		

			//validate form input
			if ($this->form_validation->run() == FALSE)
	        {
				// fails
                $this->load->view('editEns_view', $data);
	        }
			else
			{
				if ($this->input->post('submit') == "Update")
               	{
					//insert the user registration details into database
					// ce qui va etre inserer dans la table User
					$userData = array(
						'login' => $this->input->post('pseudo'),
					);
					// ce qui va etre inserer dans la table Enseignant
					$ensData = array(
						'nom_ens' => $this->input->post('lname'),
						'prenom_ens' => $this->input->post('fname'),
						'adresse_ens' => $this->input->post('adrs'),
						'ville_ens' => $this->input->post('ville'),
						'email_ens' => $this->input->post('email'),
						'phone_ens' => $this->input->post('phone')
					);

					// update data
					if ($this->edit_model->edit_ens($email, $userData, $ensData))
					{				
						// successfully
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">les données sont modifiées avec succès !</div>');
						redirect('edit/editEns', $data);
					}
					else
					{
						// error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
						redirect('edit/editEns', $data);
					}
				}
				else
               	{
                    redirect('edit/editEns', $data);
               	}
			}
		}



		// Fonction pour le remplissage des champs
		public function fillEtu() {

			// get l'email de l'utilisateur selectionner
			$email = $this->input->get('email_etu');

			// je le reprendre
			$this->session->set_flashdata('email', $email);

			$this->load->model('edit_model');

			$data['fillEtuInfo'] = $this->edit_model->fill_etu($email); 

			$this->load->view('editEtu_view', $data);

		}


		public function editEtu() {
			
			$this->load->model('edit_model');

			// attention !
			$email = $this->session->flashdata('email');
			$data['fillEtuInfo'] = $this->edit_model->fill_ens($email); 

			//set validation rules
			$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('fname', 'First Name', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
			$this->form_validation->set_rules('adrs', 'Adresse', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('ville', 'Ville', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('cne', 'CNE', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('date_naiss', 'Date Naissance');
			$this->form_validation->set_rules('ville_naiss', 'Ville Naissance ', 'trim|min_length[3]|max_length[30]|xss_clean');
		

			//validate form input
			if ($this->form_validation->run() == FALSE)
	        {
				// fails
                $this->load->view('editEtu_view', $data);
	        }
			else
			{
				if ($this->input->post('submit') == "Update")
               	{
					//insert the user registration details into database
					// ce qui va etre inserer dans la table User
					$userData = array(
						'login' => $this->input->post('pseudo'),
					);
					// ce qui va etre inserer dans la table Etudiant
					$etuData = array(
						'CNE' => $this->input->post('cne'),
						'nom_etu' => $this->input->post('lname'),
						'prenom_etu' => $this->input->post('fname'),
						'date_naiss_etu' => $this->input->post('date_naiss'),
						'ville_naiss_etu' => $this->input->post('ville_naiss'),
						'adresse_etu' => $this->input->post('adrs'),
						'ville_etu' => $this->input->post('ville'),
						'email_etu' => $this->input->post('email'),
						'phone_etu' => $this->input->post('phone')
					);

					// update data
					if ($this->edit_model->edit_etu($email, $userData, $etuData))
					{				
						// successfully
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">les données sont modifiées avec succès !</div>');
						redirect('edit/editEtu', $data);
					}
					else
					{
						// error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
						redirect('edit/editEtu', $data);
					}
				}
				else
               	{
                    redirect('edit/editEtu', $data);
               	}
			}
		}


		// Fonction pour le remplissage des champs
		public function fillMdl() {

			// get l'id du module selectionné
			$id = $this->input->get('id_module');

			// je le reprendre
			$this->session->set_flashdata('id_mdl', $id);

			$this->load->model('edit_model');

			$data['fillMdlInfo'] = $this->edit_model->fill_module($id); 

			$this->load->view('editModule_view', $data);

		}

		public function editMdl() {
			
			$this->load->model('edit_model');

			// attention !
			$id = $this->session->flashdata('id_mdl');
			$data['fillMdlInfo'] = $this->edit_model->fill_module($id); 

			//set validation rules
			$this->form_validation->set_rules('mname', 'Module Name', 'trim|required|min_length[3]|max_length[30]|xss_clean');

			//validate form input
			if ($this->form_validation->run() == FALSE)
	        {
				// fails
                $this->load->view('editModule_view', $data);
	        }
			else
			{
				if ($this->input->post('submit') == "Update")
               	{
					// ce qui va etre inserer dans la table Module
					$mdlData = array(
						'intitule_module' => $this->input->post('mname'),
					);

					// update data
					if ($this->edit_model->edit_mdl($id, $mdlData))
					{				
						// successfully
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">les données sont modifiées avec succès !</div>');
						redirect('edit/editMdl', $data);
					}
					else
					{
						// error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
						redirect('edit/editMdl', $data);
					}
				}
				else
               	{
                    redirect('edit/editMdl', $data);
               	}
			}
		}





	}

?>