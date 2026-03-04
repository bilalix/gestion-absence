<?php 

	class Desactivate extends CI_Controller
	{

		public function desactivateAdmin() {

			$email = $this->input->get('email_admin');

			$this->load->model('desactivate_model');

			$this->desactivate_model->desactivate_admin($email);

			redirect('admin');

		}


		public function desactivateEns() {

			$email = $this->input->get('email_ens');

			$this->load->model('desactivate_model');

			$this->desactivate_model->desactivate_ens($email);

			redirect('admin');
		}

		public function desactivateEtu() {

			$email = $this->input->get('email_etu');

			$this->load->model('desactivate_model');

			$this->desactivate_model->desactivate_etu($email);

			redirect('admin');

		}


	}

?>