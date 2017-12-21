<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form</title>
     <style type="text/css">
     .colbox {
          margin-left: 0px;
          margin-right: 0px;
     }
     /*.well {
          padding: 100px;
          padding-right: 100px;
     }*/
     </style>
</head>
<body>
     <div class="container">
     <!-- header -->
     <?php $this->load->view('include/header_view'); ?>
          <hr/>
          
          <div class="row">
               <div class="col-md-4 col-md-offset-4 well">
               <?php 
               $attributes = array(
               	"class" => "form-horizontal", 
               	"id" => "loginform", 
               	"name" => "loginform"
               	);
               echo form_open("login", $attributes);?> 
               <fieldset>
                    <legend>Login</legend>
                    <div class="form-group">
                    <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                         <label for="txt_username" class="control-label pull-right">Username</label>
                    </div>
                    <div class="col-lg-7 col-sm-7">
                         <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
                         <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                    </div>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="row colbox">
                    <div class="col-lg-4 col-sm-4">
                    <label for="txt_password" class="control-label pull-right">Password</label>
                    </div>
                    <div class="col-lg-7 col-sm-7">
                         <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                         <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                    </div>
                    </div>
                    </div>
                                   
                    <div class="form-group">
                    <div class="col-lg-12 col-sm-12 text-center">
                         <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="Login" />
                         <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Cancel" />
                    </div>
                    </div>
               </fieldset>
               <?php echo form_close(); ?>

               <?php echo $this->session->flashdata('msg'); ?>
               </div>
          </div>
     </div>
     <!-- footer -->
     <footer class="container-fluid bg-4 text-center navbar-fixed-bottom">
          <?php $this->load->view('include/footer_view'); ?>
     </footer>
     
</body>
</html>