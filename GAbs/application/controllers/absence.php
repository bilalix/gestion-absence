<?php 

	class Absence extends CI_Controller
	{

		public function index() {

			$this->load->model('show_model');

			// get id de l'ens connecté
			$idUser = $this->session->userdata('idUser');

			$data['seaInfo'] = $this->show_model->seance_show($idUser);

			// ce variable qui va décider si on va afficher la table ou non
			$data['affTable'] = FALSE;

			$this->load->view('absence_view', $data);

		}

		public function abSeance() {

			$this->load->model('show_model');

			// get id de l'ens connecté
			$idUser = $this->session->userdata('idUser'); // (1)

			$data['seaInfo'] = $this->show_model->seance_show($idUser);

			// ce variable qui va décider si on va afficher la table ou non
			$data['affTable'] = FALSE;

			// get les données from post ;)
			$datSea = $this->input->post('date_sea'); // (2)
			$hr_deb = $this->input->post('heure_deb'); // (3)
			$hr_fin = $this->input->post('heure_fin'); // (4)

			// hop
			$this->session->set_userdata('datSea', $datSea);
			$this->session->set_userdata('hr_deb', $hr_deb);
			$this->session->set_userdata('hr_fin', $hr_fin);

			// dirhoum hna 
			$datSea = $this->session->userdata('datSea');
			$hr_deb = $this->session->userdata('hr_deb');
			$hr_fin = $this->session->userdata('hr_fin');

			// si les 3 sont pas null -> pass TRUE ;)
			if ($datSea && $hr_deb && $hr_fin) {
				// here it is :D
				$data['affTable'] = TRUE;
			}

			// combine (1), (2), (3) et (4) pour envoyer une requete à la bd ;)
			$this->load->model('absence_model');
			$data['TableSeaInfo'] = $this->absence_model->sea_etu_show($idUser, $datSea, $hr_deb, $hr_fin);

			// et enfiiiin, passer les données a la view 
			$this->load->view('absence_view', $data);

		} 


		// affectation d'absence
		public function AffectAbs() {

			$this->load->view('AffectAbs_view');

			// get id_etu from form :D
			$idEtu = $this->input->get('id');
			// and put it in a session ;)
			$this->session->set_flashdata('idEtu', $idEtu);

		}

		public function AffectAbsDone() {

			$this->load->model('absence_model');

			// je reprendre l'id de la seance pour l'inserer dans la table d'absence
			$idSea = $this->session->userdata('idSea');

			// je reprendre l'id de l'etudiant aussi
			$idEtu = $this->session->flashdata('idEtu');

			// get justif etat
			$justif_ckbox = $this->input->post('justif');
			
			// si $justif_ckbox est checked 
			if ($justif_ckbox == 'oui')
				$justif = 1;
			else
				$justif = 0;

			// enfin, get commentaire
			$comm = $this->input->post('comm');

			// ce qui va etre inserer dans la table Absence
			$absData = array(
				'id_seance' => $idSea,
				'id_user' => $idEtu,
				'justifiee' => $justif,
				'comm_abs' => $comm
				);


			// envoie des infos au BD ;)
			$this->absence_model->insert_absence($absData);

			// hop et on affiche la table again
			$this->abSeance();

		}





	}

?>