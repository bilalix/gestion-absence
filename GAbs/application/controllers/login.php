<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Pour garder le type de l'utilisateur
// $this->session->set_userdata('type', 'administrateur');
 
class Login extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          // $this->load->library('session');
          // $this->load->helper('form');
          // $this->load->helper('url');
          // $this->load->helper('html');
          // $this->load->database();
          // $this->load->library('form_validation');
          //load the login model (??)
          $this->load->model('login_model');
     }

     public function index()
     {
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('login_view');
          }
          else
          {
               //validation succeeds
               if ($this->input->post('btn_login') == "Login")
               {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                         //set the session variables
                         $sessiondata = array(
                              'username' => $username,
                              'logged_in' => TRUE,
                              // Obtenu a partir du login_model->get_user() ;)
                              'type' => $this->session->userdata('type'),
                              'idUser' => $this->session->userdata('idUser')
                         );
                         $this->session->set_userdata($sessiondata);
                         // il y on a 3 possibilite comme type : admin, enseignant ou etudiant
                         redirect($sessiondata['type']);
                    }
                    else
                    {
                         // affichage d'un message d'erreur puis redirection
                         $this->session->set_flashdata('msg',
                               '<div class="alert alert-danger text-center">login ou password invalid! Si vous etes sur que les données sont correct veuillez contacter l\'admin pour qu\'il active votre compte</div>');
                         redirect('login/index');
                    }
               }
               else
               {
                    redirect('login');
               }
          }
     }
}
?>