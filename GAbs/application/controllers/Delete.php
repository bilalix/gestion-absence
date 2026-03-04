<?php 

	class Delete extends CI_Controller
	{
		
		public function deleteAdmin() {

			$this->load->model('delete_model');

			$email = $this->input->get('email_admin');

			$this->delete_model->delete_admin($email);

			redirect('admin');

		}

		public function deleteEns() {

			$this->load->model('delete_model');

			$email = $this->input->get('email_ens');

			$this->delete_model->delete_ens($email);

			redirect('admin');

		}

		public function deleteEtu() {

			$this->load->model('delete_model');

			$email = $this->input->get('email_etu');

			$this->delete_model->delete_etu($email);

			redirect('admin');

		}


		public function deleteMdl() {

			$this->load->model('delete_model');

			$id = $this->input->get('id_module');

			$this->delete_model->delete_mdl($id);

			redirect('admin');

		}
		
	}

?>