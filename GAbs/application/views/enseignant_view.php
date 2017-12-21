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
		

		<h2>Vos Modules</h2>

		<?php 

			foreach ($ModuleInfo->result() as $row)
			{
				echo "<h3>";
				echo "<ul>";
					echo "<li>";
						echo $row->intitule_module;
					echo "</li>";
				echo "</ul>";
				echo "</h3>";
			}

		?>

	<hr>
		<h2>Liste des seances :</h2>
		<br>           
		<center>
		<table class="table table-striped">
	    	<thead>
	    		<tr>
	        		<th>Module</th>
	        		<th>Date seance</th>
	        		<th>Heure debut</th>
	        		<th>Heure fin</th>
	        		<th>Type seance</th>
	      		</tr>
	    	</thead>
	    	<tbody>
				<?php
					foreach ($SeanceInfo->result() as $row)
					{
						echo "<tr>";
					        echo "<td>" . $row->intitule_module . "</td>";
					        echo "<td>" . $row->date_seance . "</td>";
					        echo "<td>" . $row->heure_debut . "</td>";
					        echo "<td>" . $row->heure_fin . "</td>";
					        echo "<td>" . $row->type_seance . "</td>";
					    echo "</tr>";
					}
				?>
			</tbody>
  		</table>
			<?php echo "Nombre Total des Seance: " . $SeanceInfo->num_rows(); ?>
			<br><br>
	</center>

	</div>

	<!-- footer -->
	<?php $this->load->view('include/footer_view'); ?>
</body>
</html>