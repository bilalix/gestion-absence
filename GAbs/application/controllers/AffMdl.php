<?php 

	class AffMdl extends CI_Controller {

		public function index() {

			// $this->load->model('AffMdlEns_model');
			$this->load->model('show_model');

			$data['ModuleInfo'] = $this->show_model->all_module_show();

			$this->load->view('affMdl_view', $data);

			// get l'email de l'enseignant(ou l'etudiant) choisi 
			// and save it in a session to use it in "AffMdlDone()")
			// l'un des deux doit etre null si l'autre est not null ;)
			$this->session->set_userdata('email_ens_choisi', $this->input->get('email_ens'));
			$this->session->set_userdata('email_etu_choisi', $this->input->get('email_etu'));

		}

		// le truc ici c'est : aprés le clique sur Update
		public function AffMdlDone() {


			$this->load->model('affMdl_model');

			$this->load->model('show_model');
			$data['ModuleInfo'] = $this->show_model->all_module_show();

			$this->load->view('affMdl_view', $data);

			
			if ($this->input->post('submit')) {
				// on prend le module choisi
				$module_choisi = $this->input->post('cmdl');

				// hop ! ici on les recuperes
				$email_en = $this->session->email_ens_choisi;
				$email_et = $this->session->email_etu_choisi;

				// Si l'email_en n'est pas null
				if ($email_en != null) {
					// on l'envoie avec le module choisi au model
					if ($this->affMdl_model->aff_module_ens($email_en, $module_choisi))
					{				
						// successfully
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">le module est affecté avec succès !</div>');
						redirect('AffMdl', $data);
					}
					else
					{
						// error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
						redirect('AffMdl', $data);
					}
				}

				// Si l'email_et n'est pas null
				elseif ($email_et != null) {
					// on l'envoie avec le module choisi au model
					if ($this->affMdl_model->aff_module_etu($email_et, $module_choisi))
					{				
						// successfully
						$this->session->set_flashdata('msg','<div class="alert alert-success text-center">le module est affecté avec succès !</div>');
						redirect('AffMdl', $data);
					}
					else
					{
						// error
						$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error. Veuillez réessayer plus tard !</div>');
						redirect('AffMdl', $data);
					}
				}
					
			}
			else
           	{
                redirect('AffMdl', $data);
           	}

		}


	}


?>