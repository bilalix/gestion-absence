<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Affectation d'absence</title>
</head>
<body>

	<div class="container">

	<!-- header -->
	<?php $this->load->view('include/header_view'); ?>
	<!-- navbar -->
	<?php $this->load->view('include/navbar_ens_view'); ?>	
		
		<div class="row">
		    <div class="col-md-4 col-md-offset-4">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <h4>Affectation d'absence</h4>
		            </div>
		            <div class="panel-body">
						<?php

							$oui = array(
							    'name'        => 'justif',
							    'id'          => 'oui',
							    'value'       => 'oui',
							    'checked'	  => FALSE,
							    );

							$non = array(
							    'name'        => 'justif',
							    'id'          => 'non',
							    'value'       => 'non',
							    'checked'	  => TRUE,
							    );
						?>

						<?php echo form_open('absence/AffectAbsDone'); ?>
							<label>Absence Justifié ?</label><br>
							<?php 
								echo form_radio($oui);
								echo form_label('Oui', 'oui');
								echo "<br>"; 
								echo form_radio($non);
								echo form_label('Non', 'non');
								echo "<br><br>"; 
								?>
								<div class="form-group">
								  <label for="comm">Commentaire:</label>
								  <textarea class="form-control" rows="5" name="comm"></textarea>
								</div>
								<?php 

				                $blue = array(
				                    'class' => 'btn btn-warning',
				                    'name' => 'submit',
				                    'value' => 'Affecter'
				                    );
				                echo form_submit($blue);
					         ?>
						<?php echo form_close(); ?>
		            </div>
		        </div>
		    </div>
		</div>

	</div>

	<!-- footer -->
	<?php $this->load->view('include/footer_view'); ?>
</body>
</html>