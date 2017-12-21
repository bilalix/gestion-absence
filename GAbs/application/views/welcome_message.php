<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Main page</title>
</head>
<body>
	
	<div class="container">
		
		<div class="col-xs-12">

		
			<?php 

				// Obtenir le type de l'utilisateur
				$typeUsr = $this->session->userdata('type');

				// Si c'est un admin qui veut revenir à la page d'accueil, le dirige vers la page admin
				if ($typeUsr == 'admin') {
					redirect('http://localhost/GAbs/index.php/admin');
				}
				// mm chose pour ens et etu
				elseif ($typeUsr == 'enseignant') {
					redirect('http://localhost/GAbs/index.php/enseignant');
				}
				elseif ($typeUsr == 'etudiant') {
					redirect('http://localhost/GAbs/index.php/etudiant');
				}
				// Sinon -> login page :)
				else
				{
					$this->load->view('login_view');
				}

			?>
		
		</div>

	</div>

</body>
</html>