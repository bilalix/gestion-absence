<!-- Ce fichier contient l'entete des pages et il charge les fichiers de bootstrap et jquery -->

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<div class="container">
     <div class="row">
          <div class="col-lg-6 col-sm-6">
               <!-- Le titre [FIX] -->
               <h1>Gestion des absences</h1>
          </div>
          <div class="col-lg-6 col-sm-6">               
               <ul class="nav nav-pills pull-right" style="margin-top:20px">

                    <!-- Si un utilisateur et déja connecter on affiche le bouton "logout" -->
                    <?php if($this->session->userdata('logged_in')): ?>

                         <?php echo form_open('logout'); ?>

                              <?php 
                                   $blue = array(
                                        'class' => 'btn btn-primary',
                                        'name' => 'submit',
                                        'value' => 'Logout'
                                        );
                              ?>

                              <?php if($this->session->userdata('username')): ?>
                                   <?php 
                                        echo "You are logged in as <b>" . $this->session->userdata('username') . "</b>";
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo form_submit($blue); 
                                   ?>
                                   <br><br>
                         <?php echo form_close(); ?>
                                   
                              <?php endif; ?>
                        
                    <!-- Sinon on affiche "login" --> 
                    <?php else: ?>
                         <li class="active"><a href="#">Login</a></li>
                    <?php endif; ?>

               </ul>
          </div>
     </div>
</div>