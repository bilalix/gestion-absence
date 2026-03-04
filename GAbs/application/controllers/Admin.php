<?php 

	class Admin extends CI_Controller {

		public function index() {

			// Limiter l'access
			if($this->session->userdata('type') == 'admin') {

				$this->load->model('show_model');

				// all_etu_show() retourne tt les infos sur les etudiants
				$data['etuInfo'] = $this->show_model->all_etu_show();

				// all_ens_show() retourne tt les infos sur les enseignants
				$data['ensInfo'] = $this->show_model->all_ens_show();

				// all_admin_show() retourne tt les infos sur les admins
				$data['adminInfo'] = $this->show_model->all_admin_show();

				// all_module_show() retourne tt les infos sur les modules
				$data['moduleInfo'] = $this->show_model->all_module_show();

				// choix (role) de radio botton (jebnaha mn name d radio button)
				$data['role'] = $this->input->post('type');

				// on passe les données obtenues a "admin_view"
				$this->load->view('admin_view', $data);

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}


		// fonction d'upload d'image avec un nom random
		private function do_upload($etu,$ens) {

			$type = explode('.', $_FILES["photo"]["name"]);

			$type = strtolower($type[count($type)-1]);

			if($ens)
				$url = "img/ens/".uniqid(rand()).'.'.$type;
			elseif($etu)
				$url = "img/etu/".uniqid(rand()).'.'.$type;

			if(in_array($type, array("jpg", "jpeg", "gif", "png")))

				if(is_uploaded_file($_FILES["photo"]["tmp_name"]))

					if(move_uploaded_file($_FILES["photo"]["tmp_name"],$url))

						return $url;

			return "";
		}


		public function insertEtu() {

			// Limiter l'access
			if($this->session->userdata('type') == 'admin') {
			
				$this->load->model('insert_model');

				//set validation rules
				$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
				$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|md5');
				$this->form_validation->set_rules('cne', 'CNE', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('date_naiss', 'Date Naissance');
				$this->form_validation->set_rules('ville_naiss', 'Ville Naissance ', 'trim|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('adrs', 'Adresse', 'trim|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('ville', 'Ville', 'trim|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[etu.email_etu]');
				$this->form_validation->set_rules('phone', 'Phone', 'trim|min_length[3]|max_length[30]|xss_clean');


				//validate form input
				if ($this->form_validation->run() == FALSE)
		        {
					// fails
	                $this->load->view('insertEtu_view');
		        }
		        else
				{
					if ($this->input->post('submit') == "Inserer")
	               	{

	               		// get url de l'image
	               		$etu = true;
	               		$ens = false;
	               		$url = $this->do_upload($etu,$ens);

						// insert etu registration details into database
						// ce qui va etre inserer dans la table User
						$userData = array(
							'login' => $this->input->post('pseudo'),
							'password' => $this->input->post('password'),
							'type_user' => 'etudiant',
							'access' => '1'
						);

						// insert ens registration details into database
						// ce qui va etre inserer dans la table User
						$userData = array(
							'login' => $this->input->post('pseudo'),
							'password' => $this->input->post('password'),
							'type_user' => 'etudiant',
							'access' => '1'
						);

						// ce qui va etre inserer dans la table etudiant
						$etuData = array(
							'CNE' => $this->input->post('cne'),
							'nom_etu' => $this->input->post('lname'),
							'prenom_etu' => $this->input->post('fname'),
							'date_naiss_etu' => $this->input->post('date_naiss'),
							'ville_naiss_etu' => $this->input->post('ville_naiss'),
							'adresse_etu' => $this->input->post('adrs'),
							'ville_etu' => $this->input->post('ville'),
							'photo_etu' => $url,
							'email_etu' => $this->input->post('email'),
							'phone_etu' => $this->input->post('phone')
						);

						// insert form data into database
						if ($this->insert_model->insert_etu($userData, $etuData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Le nouveau utilisateur est enregistré avec succès !</div>');
							redirect('admin/insertEtu');
						}
						else
						{
							// error
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
							redirect('admin/insertEtu');
						}
					}
					else
	               	{
	                    redirect('admin/insertEtu');
	               	}	

	            }

            } else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}

		public function insertEns() {

			// Limiter l'access
			if($this->session->userdata('type') == 'admin') {
			
				$this->load->model('insert_model');

				//set validation rules
				$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
				$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|md5');
				$this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('adrs', 'Adresse', 'trim|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('ville', 'Ville', 'trim|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[admin.email_admin]');
				$this->form_validation->set_rules('phone', 'Phone', 'trim|min_length[3]|max_length[30]|xss_clean');
			

				//validate form input
				if ($this->form_validation->run() == FALSE)
		        {
					// fails
	                $this->load->view('insertEns_view');
		        }
		        else
				{
					if ($this->input->post('submit') == "Inserer")
	               	{

						// insert ens registration details into database
						// ce qui va etre inserer dans la table User
						$userData = array(
							'login' => $this->input->post('pseudo'),
							'password' => $this->input->post('password'),
							'type_user' => 'enseignant',
							'access' => '1'
						);

						// get url de l'image
						$etu = false;
	               		$ens = true;
	               		$url = $this->do_upload($etu, $ens);

						var_dump($url);

						// ce qui va etre inserer dans la table enseignant
						$ensData = array(
							'nom_ens' => $this->input->post('lname'),
							'prenom_ens' => $this->input->post('fname'),
							'adresse_ens' => $this->input->post('adrs'),
							'ville_ens' => $this->input->post('ville'),
							'photo_ens' => $url,
							'email_ens' => $this->input->post('email'),
							'phone_ens' => $this->input->post('phone')
						);

						// insert form data into database
						if ($this->insert_model->insert_ens($userData, $ensData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Le nouveau utilisateur est enregistré avec succès !</div>');
							redirect('admin/insertEns');
						}
						else
						{
							// error
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
							redirect('admin/insertEns');
						}
					}
					else
	               	{
	                    redirect('admin/insertEns');
	               	}

				}

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}


		public function insertAdmin() {

			// Limiter l'access
			if($this->session->userdata('type') == 'admin') {

				$this->load->model('insert_model');

				//set validation rules
				$this->form_validation->set_rules('pseudo', 'Pseudo', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
				$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|md5');
				$this->form_validation->set_rules('fname', 'First Name', 'trim|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('lname', 'Last Name', 'trim|min_length[3]|max_length[30]|xss_clean');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[admin.email_admin]');
				
				//validate form input
				if ($this->form_validation->run() == FALSE)
		        {
					// fails
	                $this->load->view('insertAdmin_view');
		        }
				else
				{
					if ($this->input->post('submit') == "Inserer")
	               	{
						//insert the user registration details into database
						// ce qui va etre inserer dans la table User
						$userData = array(
							'login' => $this->input->post('pseudo'),
							'password' => $this->input->post('password'),
							'type_user' => 'admin',
							'access' => '1'
						);
						// ce qui va etre inserer dans la table Admin
						$adminData = array(
							'nom_admin' => $this->input->post('lname'),
							'prenom_admin' => $this->input->post('fname'),
							'email_admin' => $this->input->post('email')
						);
						
						// insert form data into database
						if ($this->insert_model->insert_admin($userData, $adminData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Le nouveau utilisateur est enregistré avec succès !</div>');
							redirect('admin/insertAdmin');
						}
						else
						{
							// error
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
							redirect('admin/insertAdmin');
						}
					}
					else
	               	{
	                    redirect('admin/insertAdmin');
	               	}
				}

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}


		public function insertModule() {

			// Limiter l'access
			if($this->session->userdata('type') == 'admin') {

				$this->load->model('insert_model');

				//set validation rules
				$this->form_validation->set_rules('mname', 'Module name', 'trim|required|min_length[3]|max_length[30]|xss_clean');
				
				//validate form input
				if ($this->form_validation->run() == FALSE)
		        {
					// fails
	                $this->load->view('insertModule_view');
		        }
				else
				{
					if ($this->input->post('submit') == "Inserer")
	               	{
						// ce qui va etre inserer dans la table Module
						$mdlData = array(
							'intitule_module' => $this->input->post('mname')
						);

						// insert form data into database
						if ($this->insert_model->insert_module($mdlData))
						{				
							// successfully
							$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Le nouveau module est enregistré avec succès !</div>');
							redirect('admin/insertModule');
						}
						else
						{
							// error
							$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
							redirect('admin/insertModule');
						}
					}
					else
	               	{
	                    redirect('admin/insertModule');
	               	}
				}

			} else {
				echo "<h1>VOUS N'AVEZ PAS LE DROIT D'ÊTRE ICI !!</h1>";
			}

		}


		// add no access !!
		public function import_export() {
			echo "this is import_export !";
		}

		// add no access !!
		public function save_reset() {
			echo "this is save_reset !";
		}


	}

?>

