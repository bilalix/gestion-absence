<?php

class Login_model extends CI_Model
{
     public function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     //get the username & password from User
     public function get_user($usr, $pwd)
     {
          $sql = "select * from User where login = '" . $usr . "' and password = '" . md5($pwd) . "'and access = 1"; 
          $query = $this->db->query($sql);
          // s'il existe un user on prend son type et son id_user
          if ($query->num_rows() > 0) {
               $this->session->set_userdata('type', $query->row(0)->type_user);
               // maintenant get the name of the stu or admin or ens ;)
               // .....
               $this->session->set_userdata('idUser', $query->row(0)->id_user);
          }
          return $query->num_rows();
     }

}?>