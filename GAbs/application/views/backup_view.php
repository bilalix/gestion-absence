<?php error_reporting(E_ALL ^ E_WARNING); ?>
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
		.message_box {
			margin-top: 10px;
		}

		.error, .success {
			max-width: 1000px;
			margin: auto;
			padding: 10px 10px 10px 45px;
			margin-bottom: 5px;
			border-style: solid;
			border-width: 1px;
			background-position: 10px 10px;
			background-repeat: no-repeat;
		}

		.error {
			background-color: #f5dfdf;
			background-image: url(../assets/images/error.png);
			border-color: #ce9e9e;
		}

		.success {
			background-color: #e8f5df;
			background-image: url(../assets/images/success.png);
			border-color: #9ece9e;
		}
		</style>
	</head>
	<body>

	<div class="container">

	<!-- header -->
	<?php $this->load->view('include/header_view'); ?>
	<!-- navbar -->
	<?php $this->load->view('include/navbar_view'); ?>	

	<div class="message_box">
		<?php
		if (isset($success) && strlen($success)) {
			echo '<div class="success">';
			echo '<p>' . $success . '</p>';
			echo '</div>';
		}

		if (isset($errors) && strlen($errors)) {
			echo '<div class="error">';
			echo '<p>' . $errors . '</p>';
			echo '</div>';
		}

		if (validation_errors()) {
			echo validation_errors('<div class="error">', '</div>');
		}
		?>
	</div>

	<div class="row">
		    <div class="col-md-4 col-md-offset-4">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <h4>Sauvegarde du Site et la BD</h4>
		            </div>
		            <div class="panel-body">

					
					<?php
						$back_url = $this->uri->uri_string();
						$key = 'referrer_url_key';
						$this->session->set_flashdata($key, $back_url);
					?>
					<div class="body body-s">
						<?php
							echo form_open($this->uri->uri_string());
						?>
							<div class="form-group">
							<table>
								<tr>
									<td>
										<label>Type de Sauvegarde</label>
									</td>
									<td>
										<label>
											<select name="backup_type" class="form-control">
												<option value="" selected disabled>Backup Type</option>
												<option value="1" <?php echo (isset($success) && strlen($success) ? '' : (set_value('backup_type') == '1' ? 'selected' : '')) ?>>DB Backup</option>
												<option value="2" <?php echo (isset($success) && strlen($success) ? '' : (set_value('backup_type') == '2' ? 'selected' : '')) ?>>Site Backup</option>
											</select>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label>Type de fichier</label>
									</td>
									<td>
										<label>
											<select name="file_type" class="form-control">
												<option value="" selected disabled>File Type</option>
												<option value="1" <?php echo (isset($success) && strlen($success) ? '' : (set_value('file_type') == 1 ? 'selected' : '')) ?>>ZIP</option>
												<option value="2" <?php echo (isset($success) && strlen($success) ? '' : (set_value('file_type') == 2 ? 'selected' : '')) ?>>GZIP</option>
											</select>
										</label>
									</td>
								</tr>
							</table>
							</div>
						<footer>
						<center>
							<button type="submit" name="backup" value="backup" class="btn btn-success">Backup</button>
						</center>
						</footer>
						<?php
						echo form_close();
						?>
					</div>
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