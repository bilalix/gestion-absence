<!DOCTYPE html>
<html>
<head>
    <title>Insert Module</title>
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
	                <h4>Creation d'un Module</h4>
	            </div>
	            <div class="panel-body">
	                <?php $attributes = array("name" => "insertModuleForm");
	                echo form_open("admin/insertModule", $attributes);?>
	                
	                <div class="form-group">
	                    <label for="name">Nom du Module *</label>
	                    <input class="form-control" name="mname" placeholder="Nom du Module" type="text" value="<?php echo set_value('mname'); ?>" />
	                    <span class="text-danger"><?php echo form_error('mname'); ?></span>
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
     <footer class="container-fluid bg-4 text-center navbar-fixed-bottom">
          <?php $this->load->view('include/footer_view'); ?>
     </footer>
</body>
</html>