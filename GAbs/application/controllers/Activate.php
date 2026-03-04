<?php 

	class Activate extends CI_Controller
	{

		public function activateAdmin() {

			$email = $this->input->get('email_admin');

			$this->load->model('activate_model');

			$this->activate_model->activate_admin($email);

			redirect('admin');

		}


		public function activateEns() {

			$email = $this->input->get('email_ens');

			$this->load->model('activate_model');

			$this->activate_model->activate_ens($email);

			redirect('admin');

		}

		public function activateEtu() {

			$email = $this->input->get('email_etu');

			$this->load->model('activate_model');

			$this->activate_model->activate_etu($email);

			redirect('admin');


		}


	}

?>