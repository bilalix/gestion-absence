<!DOCTYPE html>
<html>
<head>
    <title>Insert Admin</title>
</head>
<body>
	<div class="container">

	<!-- header -->
	<?php $this->load->view('include/header_view'); ?>
	
	<!-- navbar -->
	<?php $this->load->view('include/navbar_view'); ?>

	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <?php echo $this->session->flashdata('verify_msg'); ?>
	    </div>
	</div>

	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h4>Modification d'un compte admin</h4>
	            </div>
	            <div class="panel-body">
	                <?php $attributes = array("name" => "insertAdminForm");
	                echo form_open("edit/editAdmin", $attributes);?>
	                
	                <div class="form-group">
	                    <label for="name">Pseudo *</label>
	                    <input class="form-control" name="pseudo" placeholder="Pseudo" type="text" value="<?php echo $fillAdminInfo['login']; ?>" /> 
	                    <span class="text-danger"><?php echo form_error('pseudo'); ?></span>
	                </div>

					<!-- Je vais utiliser cette partie dans le changement du password 

					<?php 
						// décryptage du password
						$this->load->library('encrypt');
						$encrypted_password = $fillAdminInfo->password;
						$key = 'aoinosora';
						$decrypted_string = $this->encrypt->decode($encrypted_password, $key);
						var_dump($decrypted_string);
					?>

	                <div class="form-group">
	                    <label for="subject">Nouveau Password *</label>
	                    <input class="form-control" name="password" placeholder="Password" type="password" value="<?php echo $decrypted_string; ?>" />
	                    <span class="text-danger"><?php echo form_error('password'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="subject">Confirm Password *</label>
	                    <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" value="<?php echo $fillAdminInfo->password; ?>" />
	                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
	                </div>

	                -->
					
					<div class="form-group">
	                    <label for="name">Prenom</label>
	                    <input class="form-control" name="fname" placeholder="Prenom" type="text" value="<?php echo $fillAdminInfo['nom_admin']; ?>" />
	                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Nom</label>
	                    <input class="form-control" name="lname" placeholder="Nom" type="text" value="<?php echo $fillAdminInfo['prenom_admin']; ?>" />
	                    <span class="text-danger"><?php echo form_error('lname'); ?></span>
	                </div>
	                
	                <div class="form-group">
	                    <label for="email">Email *</label>
	                    <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo $fillAdminInfo['email_admin']; ?>" />
	                    <span class="text-danger"><?php echo form_error('email'); ?></span>
	                </div>

	                <div class="form-group">
	                    <input name="submit" type="submit" class="btn btn-primary" value="Update" />
	                    <input name="cancel" type="reset" class="btn btn-default" value="Cancel" />
	                </div>
	                <?php echo form_close(); ?>
	                <?php echo $this->session->flashdata('msg'); ?>
	            </div>
	        </div>
	    </div>
	</div>
</div>
	<!-- footer -->
	<?php $this->load->view('include/footer_view'); ?>
</body>
</html>