<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Enseignant Page</title>
</head>
<body>
	
	<div class="container">
		
		<!-- header -->
		<?php $this->load->view('include/header_view'); ?>

		<!-- navbar -->
		<?php $this->load->view('include/navbar_ens_view'); ?>

	<hr>

        

		<?php if ($EtuAbsInfo) : ?>

			<?php // var_dump($EtuAbsInfo->result()); ?>
			<h2>Les absence de <?php echo $EtuAbsInfo->row(0)->nom_etu; ?>:</h2>
			<center>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>intitule_module</th>
		        		<th>CNE</th>
		        		<th>nom_etu</th>
		        		<th>prenom_etu</th>
		        		<th>justifiee</th>
		        		<th>comm_abs</th>
		        		<th>date_seance</th>
		        		<th>heure_debut</th>
		        		<th>heure_fin</th>
		        		<th>type_seance</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php
						foreach ($EtuAbsInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->intitule_module . "</td>";
						        echo "<td>" . $row->CNE . "</td>";
						        echo "<td>" . $row->nom_etu . "</td>";
						        echo "<td>" . $row->prenom_etu . "</td>";
						        echo "<td>" . $row->justifiee . "</td>";
						        echo "<td>" . $row->comm_abs . "</td>";
						        echo "<td>" . $row->date_seance . "</td>";
						        echo "<td>" . $row->heure_debut . "</td>";
						        echo "<td>" . $row->heure_fin . "</td>";
						        echo "<td>" . $row->type_seance . "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
				<?php echo "Nombre Total des Absences de l'étudiant ". $EtuAbsInfo->row(0)->nom_etu ." : ". $EtuAbsInfo->num_rows(); ?>
				<br><br>
				<button type="button" class="btn btn-default btn">
		        	<a href="http://localhost/GAbs/index.php/export/exportAbsEtu">
				    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
				    Export as XLS</a>
				</button>
				<br><br>
		</center>


		<!-- Si allAbsInfo affiche la table de allAbsInfo-->
		<?php else : ?>
			<?php $attributes = array("name" => "selectCNEForm", "class" => "form-inline");
	            echo form_open("enseignant/listeAbs", $attributes);?>

	            <div class="form-group">
	                <label for="cne">CNE</label>
	            	<select name="cne" class="form-control">
	            		<option value="" selected disabled>CNE</option>
					    <?php 
						    foreach ($CNEEtuAbsInfo->result() as $row)
							{
						?>
					    <option value="<?php echo $row->CNE; ?>">
						<?php 
							echo $row->CNE;
				  echo "</option>";
					    	}
						?>
					</select>
	            </div>

	            <div class="form-group">
	                <input name="submit" type="submit" class="btn btn-primary" value="Afficher" />
	            </div>
	            <?php echo form_close(); ?>

			<br>



			<h2>Liste des absence :</h2>
			<center>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>intitule_module</th>
		        		<th>CNE</th>
		        		<th>nom_etu</th>
		        		<th>prenom_etu</th>
		        		<th>justifiee</th>
		        		<th>comm_abs</th>
		        		<th>date_seance</th>
		        		<th>heure_debut</th>
		        		<th>heure_fin</th>
		        		<th>type_seance</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php
						foreach ($allAbsInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->intitule_module . "</td>";
						        echo "<td>" . $row->CNE . "</td>";
						        echo "<td>" . $row->nom_etu . "</td>";
						        echo "<td>" . $row->prenom_etu . "</td>";
						        echo "<td>" . $row->justifiee . "</td>";
						        echo "<td>" . $row->comm_abs . "</td>";
						        echo "<td>" . $row->date_seance . "</td>";
						        echo "<td>" . $row->heure_debut . "</td>";
						        echo "<td>" . $row->heure_fin . "</td>";
						        echo "<td>" . $row->type_seance . "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
				<?php echo "Nombre Total des Absences: " . $allAbsInfo->num_rows(); ?>
				<br><br>
				<button type="button" class="btn btn-default btn">
		        	<a href="http://localhost/GAbs/index.php/export/exportAllAbs">
				    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
				    Export Data</a>
				</button>
				<br><br>
		</center>
	<?php endif; ?>

	</div>

	<!-- footer -->
	<?php $this->load->view('include/footer_view'); ?>
</body>
</html>