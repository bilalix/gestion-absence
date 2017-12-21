<!DOCTYPE html>
<html>
<head>
    <title>Insert Seance</title>
</head>
<body>
	<div class="container">

	<!-- header -->
	<?php $this->load->view('include/header_view'); ?>
	
	<!-- navbar -->
	<?php $this->load->view('include/navbar_ens_view'); ?>

	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <?php echo $this->session->flashdata('verify_msg'); ?>
	    </div>
	</div>

	<div class="row">
	    <div class="col-md-6 col-md-offset-3">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h4>Creation d'une seance</h4>
	            </div>
	            <div class="panel-body">
	                <?php $attributes = array("name" => "insertSeanceForm");
	                echo form_open("enseignant/insertSeance", $attributes);?>
	                
	                <div class="form-group">
	                    <label for="name">Module *</label>
	                	<select name="module" class="form-control">
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

	                <div class="form-group">
	                    <label for="subject">Date *</label>
	                    <input class="form-control" name="date_sea" placeholder="Date Seance" type="date" />
	                    <span class="text-danger"><?php echo form_error('date_sea'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="subject">Heure debut *</label>
	                    <input class="form-control" name="heure_deb" placeholder="Heure debut" type="time" />
	                    <span class="text-danger"><?php echo form_error('heure_deb'); ?></span>
	                </div>
					
					<div class="form-group">
	                    <label for="name">Heure fin *</label>
	                    <input class="form-control" name="heure_fin" placeholder="Heure fin" type="time" value="<?php echo set_value('heure_fin'); ?>" />
	                    <span class="text-danger"><?php echo form_error('heure_fin'); ?></span>
	                </div>

	                <div class="form-group">
	                    <label for="name">Type *</label>
	                	<select name="type_sea" class="form-control">
						        <option value="Cours" <?php echo set_select('type_sea', 'one', TRUE); ?> >Cours</option>
						        <option value="TD" <?php echo set_select('type_sea', 'two'); ?> >TD</option>
						        <option value="TP" <?php echo set_select('type_sea', 'three'); ?> >TP</option>
						</select>
	                </div>

	                <div class="form-group">
	                    <input name="submit" type="submit" class="btn btn-primary" value="Inserer" />
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