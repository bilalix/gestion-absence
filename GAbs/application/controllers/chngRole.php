<?php 

	class ChngRole extends CI_Controller {

		// constructeur pour loader

		public function index() {

			$this->load->model('chngRole_model');

			$this->load->view('chngRole_view');

			// get l'email de l'utilisateur choisi
			// $email = $this->input->get('email_admin');
			// pour recuperer l'email de l'admin choisie
			$this->session->set_userdata('email_admin_user', $this->input->get('email_admin'));
			$this->session->set_userdata('email_ens_user', $this->input->get('email_ens'));
			$this->session->set_userdata('email_etu_user', $this->input->get('email_etu'));
		}

		// le truc ici c'est : aprés le clique sur Update
		public function chngRoleAdminDone() {

			$this->load->model('chngRole_model');

			$this->load->view('chngRole_view');

			// on prend le nouveau role choisie,
			if ($this->input->post('submit')) {
				$nv_role = $this->input->post('nv_type');
			}

			// l'un de ces trois qui va etre NOT NULL
			$email_ad = $this->session->email_admin_user;
			$email_en = $this->session->email_ens_user;
			$email_et = $this->session->email_etu_user;
			// et on l'envoie avec les emails au model
			$this->chngRole_model->index($email_ad, $email_en, $email_et, $nv_role);
			// apres que le model effectue le traitement on redirige l'user vers la page admin
			redirect('admin');

		}


	}


?>