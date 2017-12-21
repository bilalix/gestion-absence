<!DOCTYPE html>
<html>
<head>
    <title>Modifier Etudiant</title>
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
	                <h4>Modification d'un compte Etudiant</h4>
	            </div>
	            <div class="panel-body">
	                <?php $attributes = array("name" => "insertEtuForm");
	                echo form_open("edit/editEtu", $attributes);?>

	                <div class="form-group">
	                    <label for="cne">CNE *</label>
	                    <input class="form-control" name="cne" placeholder="CNE" type="text" value="<?php echo $fillEtuInfo['CNE']; ?>" />
	                    <span class="text-danger"><?php echo form_error('cne'); ?></span>
	                </div>
	                
	                <div class="form-group">
	                    <label for="name">Pseudo *</label>
	                    <input class="form-control" name="pseudo" placeholder="Pseudo" type="text" value="<?php echo $fillEtuInfo['login']; ?>" /> 
	                    <span class="text-danger"><?php echo form_error('pseudo'); ?></span>
	                </div>
					
					<div class="form-group">
	                    <label for="name">Prenom</label>
	                    <input class="form-control" name="fname" placeholder="Prenom" type="text" value="<?php echo $fillEtuInfo['prenom_etu']; ?>" />
	                    <span class="text-danger"><?php echo form_error('fname'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Nom</label>
	                    <input class="form-control" name="lname" placeholder="Nom" type="text" value="<?php echo $fillEtuInfo['nom_etu']; ?>" />
	                    <span class="text-danger"><?php echo form_error('lname'); ?></span>
	                </div>
	                
	                <div class="form-group">
	                    <label for="email">Email *</label>
	                    <input class="form-control" name="email" placeholder="Email" type="text" value="<?php echo $fillEtuInfo['email_etu']; ?>" />
	                    <span class="text-danger"><?php echo form_error('email'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="date_naiss">Date Naissance</label>
	                    <input class="form-control" name="date_naiss" placeholder="Date Naissance" type="date" value="<?php echo $fillEtuInfo['date_naiss_etu']; ?>" />
	                    <span class="text-danger"><?php echo form_error('date_naiss'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="ville_naiss">Ville Naissance</label>
	                    <input class="form-control" name="ville_naiss" placeholder="Ville Naissance" type="text" value="<?php echo $fillEtuInfo['ville_naiss_etu']; ?>" />
	                    <span class="text-danger"><?php echo form_error('ville_naiss'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Adresse</label>
	                    <input class="form-control" name="adrs" placeholder="Adresse" type="text" value="<?php echo $fillEtuInfo['adresse_etu']; ?>" />
	                    <span class="text-danger"><?php echo form_error('adrs'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Ville</label>
	                    <input class="form-control" name="ville" placeholder="Ville" type="text" value="<?php echo $fillEtuInfo['ville_etu']; ?>" />
	                    <span class="text-danger"><?php echo form_error('ville'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Telephone</label>
	                    <input class="form-control" name="phone" placeholder="Telephone" type="text" value="<?php echo $fillEtuInfo['phone_etu']; ?>" />
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