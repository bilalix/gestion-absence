<?php 

class Logout extends CI_Controller {

	public function index() {
		// Removing session data
    	$this->session->sess_destroy();
    	redirect('login');
	}
}

?>