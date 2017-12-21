<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/style.css" ?>">
</head>
<body>

	<div class="container">

	<!-- header -->
	<?php $this->load->view('include/header_view'); ?>

	<!-- navbar -->
	<?php $this->load->view('include/navbar_view'); ?>

		<h3><b>Quel type d'utilisateur voulez vous afficher ?</b></h3>
		<?php 

			// pour garder les statues des radios bouttons ;)
			if ($role=='admin') {
				$chckAdmin=TRUE;  $chckEns=FALSE;  $chckEtu=FALSE;  $chckMdl=FALSE;
			}
			elseif ($role=='ens') {
				$chckAdmin=FALSE;  $chckEns=TRUE;  $chckEtu=FALSE;  $chckMdl=FALSE;
			}
			elseif ($role=='etu') {
				$chckAdmin=FALSE;  $chckEns=FALSE;  $chckEtu=TRUE;  $chckMdl=FALSE;
			}
			// bah, le module n'est pas un role mais pas prob :)
			elseif ($role=='mdl') {
				$chckAdmin=FALSE;  $chckEns=FALSE;  $chckEtu=FALSE;  $chckMdl=TRUE;
			} 
			// else cocher l'admin par default ^^ 
			else {
				$chckAdmin=TRUE;  $chckEns=FALSE;  $chckEtu=FALSE;  $chckMdl=FALSE;
			}
			

			$admin = array(
			    'name'        => 'type',
			    'id'          => 'admin',
			    'value'       => 'admin',
			    'checked'	  => $chckAdmin,
			    );

			$ens = array(
			    'name'        => 'type',
			    'id'          => 'ens',
			    'value'       => 'ens',
			    'checked'	  => $chckEns,
			    );

			$etu = array(
			    'name'        => 'type',
			    'id'          => 'etu',
			    'value'       => 'etu',
			    'checked'	  => $chckEtu,
			    );

			$mdl = array(
			    'name'        => 'type',
			    'id'          => 'mdl',
			    'value'       => 'mdl',
			    'checked'	  => $chckMdl,
			    );
		?>

		<?php echo form_open('admin'); ?>
			<table class="choix">
				<tr>
					<td>
						<?php 
							echo form_radio($admin);
							echo form_label('Admin', 'admin'); 
						?>
					</td>
					<td>
						<?php 
							echo form_radio($ens);
							echo form_label('Enseignant', 'ens'); 
						?>
					</td>
					<td>
						<?php 
							echo form_radio($etu);
							echo form_label('Etudiant', 'etu'); 
						?>
					</td>
					<td>
						<?php 
							echo form_radio($mdl);
							echo form_label('Module', 'mdl'); 
						?>
					</td>
					<td>
						<?php 
			                $blue = array(
			                    'class' => 'btn btn-primary',
			                    'name' => 'submit',
			                    'value' => 'Afficher'
			                    );
			                echo form_submit($blue);
				         ?>
					</td>
				</tr>
			</table>
		<?php echo form_close(); ?>
		
		<!-- AFFICHAGE DES LISTES -->
		<!-- Si le radio box choisi et celui de l'admin affiche tous les admins -->
		<?php if($role=='admin'): ?>
			<h3>Liste des admins</h3>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>Pseudo</th>
		        		<th>Nom</th>
		        		<th>Prenom</th>
		        		<th>Email</th>
		        		<th>Access</th>
		        		<th class="ico">Changer le role</th>
		        		<th class="ico">Activer/Désactiver</th>
		        		<th class="ico">Modifier/Supprimer</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php  
						foreach ($adminInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->login . "</td>";
						        echo "<td>" . $row->nom_admin . "</td>";
						        echo "<td>" . $row->prenom_admin . "</td>";
						        echo "<td>" . $row->email_admin . "</td>";
						        echo "<td>" . $row->access . "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="chngRole?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="activate/activateAdmin?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="desactivate/desactivateAdmin?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="edit/fillAdmin?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="delete/deleteAdmin?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
			<br>
			<center>
	  			<?php echo "Il y en a : <b>" . $adminInfo->num_rows() . " admin(s) </b>" ?>
	  			<br><br>
				<button type="button" class="btn btn-default btn">
		        	<a href="http://localhost/GAbs/index.php/export/exportAllAdmin">
				    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
				    Export as XLS</a>
				</button>
			</center>	
			<br><br>
		<!-- Si le radio box choisi et celui de l'enseignant affiche tous les enseignants -->
		<?php elseif($role=='ens'): ?>
			<h3>Liste des enseignant</h3>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>Photo</th>
		        		<th>Nom</th>
		        		<th>Prenom</th>
		        		<th>Adresse</th>
		        		<th>Ville</th>
		        		<th>Email</th>
		        		<th>Telephone</th>
		        		<th>Access</th>
		        		<th class="ico">Affecter à un cours</th>
		        		<th class="ico">Changer le role</th>
		        		<th class="ico">Activer/Désactiver</th>
		        		<th class="ico">Modifier/Supprimer</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php  
						foreach ($ensInfo->result() as $row)
						{
							echo "<tr>";
								echo "<td> <img src=\"../" . $row->photo_ens . "\" height=\"100\" width=\"100\" class=\"pull-left\" alt=\"Pas d'image\"> </td>";
						        echo "<td>" . $row->nom_ens . "</td>";
						        echo "<td>" . $row->prenom_ens . "</td>";
						        echo "<td>" . $row->adresse_ens . "</td>";
						        echo "<td>" . $row->ville_ens . "</td>";
						        echo "<td>" . $row->email_ens . "</td>";
						        echo "<td>" . $row->phone_ens . "</td>";
						        echo "<td>" . $row->access . "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="AffMdl?email_ens=<?php echo $row->email_ens;?>">
									    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="chngRole?email_ens=<?php echo $row->email_ens;?>">
									    <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="activate/activateEns?email_ens=<?php echo $row->email_ens;?>">
									    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="desactivate/desactivateEns?email_ens=<?php echo $row->email_ens;?>">
									    <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="edit/fillEns?email_ens=<?php echo $row->email_ens;?>">
									    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="delete/deleteEns?email_ens=<?php echo $row->email_ens;?>">
									    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
			<br>
			<center>
	  			<?php echo "Il y en a : <b>" . $ensInfo->num_rows() . " enseignant(s) </b>" ?>
	  			<br><br>
				<button type="button" class="btn btn-default btn">
		        	<a href="http://localhost/GAbs/index.php/export/exportAllEns">
				    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
				    Export as XLS</a>
				</button>
			</center>	
			<br><br>
		<!-- Si le radio box choisi et celui de l'etudiant affiche tous les etudiants -->
		<?php elseif($role=='etu'): ?>
			<h3>Liste des etudiants</h3>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>Photo</th>
		        		<th>CNE</th>
		        		<th>Nom</th>
		        		<th>Prenom</th>
		        		<th>Date naissance</th>
		        		<th>ville naissance</th>
		        		<th>Adresse</th>
		        		<th>Ville</th>
		        		<th>Email</th>
		        		<th>Telephone</th>
		        		<th>A</th>
		        		<th class="ico">Affecter à un cours</th>
		        		<th class="ico">Changer le role</th>
		        		<th class="ico">A/D</th>
		        		<th class="ico">Edit/Del</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php  
						foreach ($etuInfo->result() as $row)
						{
							echo "<tr>";
								echo "<td> <img src=\"../" . $row->photo_etu . "\" height=\"80\" width=\"80\" class=\"pull-left\" alt=\"Pas d'image\"> </td>";
						        echo "<td>" . $row->CNE . "</td>";
						        echo "<td>" . $row->nom_etu . "</td>";
						        echo "<td>" . $row->prenom_etu . "</td>";
						        echo "<td>" . $row->date_naiss_etu . "</td>";
						        echo "<td>" . $row->ville_naiss_etu . "</td>";
						        echo "<td>" . $row->adresse_etu . "</td>";
						        echo "<td>" . $row->ville_etu . "</td>";
						        echo "<td>" . $row->email_etu . "</td>";
						        echo "<td>" . $row->phone_etu . "</td>";
						        echo "<td>" . $row->access . "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="AffMdl?email_etu=<?php echo $row->email_etu;?>">
									    <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="chngRole?email_etu=<?php echo $row->email_etu;?>">
									    <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="activate/activateEtu?email_etu=<?php echo $row->email_etu;?>">
									    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="desactivate/desactivateEtu?email_etu=<?php echo $row->email_etu;?>">
									    <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="edit/fillEtu?email_etu=<?php echo $row->email_etu;?>">
									    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="delete/deleteEtu?email_etu=<?php echo $row->email_etu;?>">
									    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
			<br>
			<center>
	  			<?php echo "Il y en a : <b>" . $etuInfo->num_rows() . " etudiant(s) </b>" ?>
	  			<br><br>
				<button type="button" class="btn btn-default btn">
		        	<a href="http://localhost/GAbs/index.php/export/exportAllEtu">
				    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
				    Export as XLS</a>
				</button>
			</center>	
			<br><br>
	  	<!-- Si le radio box choisi et celui des modules affiche tous les modules -->
		<?php elseif($role=='mdl'): ?>
			<h3>Liste des Modules</h3>
			<center>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>ID</th>
		        		<th>Module</th>
		        		<th class="ico">Modifier/Supprimer</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php  
						foreach ($moduleInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->id_module . "</td>";
						        echo "<td>" . $row->intitule_module . "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="edit/fillMdl?id_module=<?php echo $row->id_module;?>">
									    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="delete/deleteMdl?id_module=<?php echo $row->id_module;?>">
									    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
	  			<?php echo "Il y en a : <b>" . $moduleInfo->num_rows() . " module(s) </b>" ?>
	  			<br><br>
				<button type="button" class="btn btn-default btn">
		        	<a href="http://localhost/GAbs/index.php/export/exportAllMdl">
				    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
				    Export as XLS</a>
				</button>
			</center>	
			<br><br>
	  	<!-- Sinon affiche la liste des admins (dés le depart) -->
	  	<?php else: ?>
			<h3>Liste des admins</h3>
			<table class="table table-striped">
		    	<thead>
		    		<tr>
		        		<th>Pseudo</th>
		        		<th>Nom</th>
		        		<th>Prenom</th>
		        		<th>Email</th>
		        		<th>Access</th>
		        		<th class="ico">Changer le role</th>
		        		<th class="ico">Activer/Désactiver</th>
		        		<th class="ico">Modifier/Supprimer</th>
		      		</tr>
		    	</thead>
		    	<tbody>
					<?php  
						foreach ($adminInfo->result() as $row)
						{
							echo "<tr>";
						        echo "<td>" . $row->login . "</td>";
						        echo "<td>" . $row->nom_admin . "</td>";
						        echo "<td>" . $row->prenom_admin . "</td>";
						        echo "<td>" . $row->email_admin . "</td>";
						        echo "<td>" . $row->access . "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="chngRole?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-random" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="activate/activateAdmin?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="desactivate/desactivateAdmin?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						        echo "<td class=\"ico\">";
					        		?>
							        <button type="button" class="btn btn-default btn-sm">
							        	<a href="edit/fillAdmin?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
									</button>
									<button type="button" class="btn btn-default btn-sm">
							        	<a href="delete/deleteAdmin?email_admin=<?php echo $row->email_admin;?>">
									    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</button>
									<?php
								echo "</td>";
						    echo "</tr>";
						}
					?>
				</tbody>
	  		</table>
	  		<br>
			<center>
	  			<?php echo "Il y en a : <b>" . $adminInfo->num_rows() . " admin(s) </b>" ?>
	  			<br><br>
				<button type="button" class="btn btn-default btn">
		        	<a href="http://localhost/GAbs/index.php/export/exportAllAdmin">
				    <span class="glyphicon glyphicon-export" aria-hidden="true"></span>
				    Export as XLS</a>
				</button>
			</center>	
			<br><br>
	  	<?php endif; ?>
	</div>

	<!-- footer -->
	<?php $this->load->view('include/footer_view'); ?>
</body>
</html>