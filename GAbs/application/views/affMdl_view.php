<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Changement de role</title>
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
		    <div class="col-md-4 col-md-offset-4">
		        <h3><b>Choix du Module</b></h3>
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <h4>Choix du Module</h4>
		            </div>
		            <div class="panel-body">

						<?php $attributes = array("name" => "mdlForm", "class" => "form-inline");
			            echo form_open("AffMdl/AffMdlDone", $attributes);?>

			            <div class="form-group">
			                <label for="cmdl">Nom du Module </label>
			            	<select name="cmdl" class="form-control">
							    <?php 
								    foreach ($ModuleInfo->result() as $row)
									{
								?>
							    <option value="<?php echo $row->intitule_module; ?>">
								<?php 
									echo $row->intitule_module;
						  echo "</option>";
							    	}
								?>
							</select>
			            </div>
						<br><br>
						<center>
			            <div class="form-group">
			                <input name="submit" type="submit" class="btn btn-primary" value="Affecter" />
			            </div>
			            </center>
			            <?php echo form_close(); ?>
			            <br>
			            <?php echo $this->session->flashdata('msg'); ?>
		            </div>
		        </div>
		    </div>
		</div>

	</div>

	<!-- footer -->
     <footer class="container-fluid bg-4 text-center navbar-fixed-bottom">
          <?php $this->load->view('include/footer_view'); ?>
     </footer>
</body>
</html>