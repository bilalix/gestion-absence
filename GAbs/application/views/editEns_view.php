<!DOCTYPE html>
<html>
<head>
    <title>Modifier Enseignant</title>
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
	                <h4>Modification d'un compte Enseignant</h4>
	            </div>
	            <div class="panel-body">
	                <?php $attributes = array("name" => "insertEnsForm");
	                echo form_open("edit/editEns", $attributes);?>
	                
	                <div class="form-group">
	                    <label for="name">Pseudo *</label>
	                    <input class="form-control" name="pseudo" placeholder="Pseudo" type="text" value="<?php echo $fillEnsInfo['login']; ?>" /> 
	                    <span class="text-danger"><?php echo form_error('pseudo'); ?></span>
	                </div>
					
					<div class="form-group">
	                    <label for="name">Prenom</label>
	                    <input class="form-control" name="fname" placeholder="Prenom" type="text" value="<?php echo $fillEnsInfo['prenom_ens']; ?>" />
	                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Nom</label>
	                    <input class="form-control" name="lname" placeholder="Nom" type="text" value="<?php echo $fillEnsInfo['nom_ens']; ?>" />
	                    <span class="text-danger"><?php echo form_error('lname'); ?></span>
	                </div>
	                
	                <div class="form-group">
	                    <label for="email">Email *</label>
	                    <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo $fillEnsInfo['email_ens']; ?>" />
	                    <span class="text-danger"><?php echo form_error('email'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Adresse</label>
	                    <input class="form-control" name="adrs" placeholder="Adresse" type="text" value="<?php echo $fillEnsInfo['adresse_ens']; ?>" />
	                    <span class="text-danger"><?php echo form_error('adrs'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Ville</label>
	                    <input class="form-control" name="ville" placeholder="Ville" type="text" value="<?php echo $fillEnsInfo['ville_ens']; ?>" />
	                    <span class="text-danger"><?php echo form_error('ville'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Telephone</label>
	                    <input class="form-control" name="phone" placeholder="Telephone" type="text" value="<?php echo $fillEnsInfo['phone_ens']; ?>" />
	                    <span class="text-danger"><?php echo form_error('phone'); ?></span>
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