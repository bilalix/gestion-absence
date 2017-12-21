<?php
// if (!defined('BASEPATH'))
    // exit('No direct script access allowed');

class Export extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the Library
        $this->load->library("excel");
        // Load the Model
        $this->load->model("show_model");
    }

    public function exportAllAbs() {

        $idUser = $this->session->userdata('idUser');

        $this->excel->setActiveSheetIndex(0);
        // Gets all the data using show_model.php ;)
        $data = $this->show_model->get_all_abs($idUser);
        // les transformer en array
        $data = $data->result();

        $this->excel->stream('exportAllAbs.xls', $data);
    }


    public function exportAbsEtu() {

        $idUser = $this->session->userdata('idUser');

        $cne = $this->session->flashdata('cne');

        $this->excel->setActiveSheetIndex(0);
        // Gets all the data using show_model.php ;)
        $data = $this->show_model->get_abs_etu($idUser, $cne);
        // les transformer en array
        $data = $data->result();

        $this->excel->stream('exportAbsEtu.xls', $data);
    }


    public function exportAllAdmin() {

        $this->excel->setActiveSheetIndex(0);
        // Gets all the data using show_model.php ;)
        $data = $this->show_model->all_admin_show();
        // les transformer en array
        $data = $data->result();

        $this->excel->stream('exportAllAdmin.xls', $data);
    }


    public function exportAllMdl() {

        $this->excel->setActiveSheetIndex(0);
        // Gets all the data using show_model.php ;)
        $data = $this->show_model->all_module_show();
        // les transformer en array
        $data = $data->result();

        $this->excel->stream('exportAllMdl.xls', $data);
    }

    public function exportAllEns() {

        $this->excel->setActiveSheetIndex(0);
        // Gets all the data using show_model.php ;)
        $data = $this->show_model->export_all_ens();
        // les transformer en array
        $data = $data->result();

        $this->excel->stream('exportAllEns.xls', $data);

    }


    public function exportAllEtu() {

        $this->excel->setActiveSheetIndex(0);
        // Gets all the data using show_model.php ;)
        $data = $this->show_model->export_all_etu();
        // les transformer en array
        $data = $data->result();

        $this->excel->stream('exportAllEtu.xls', $data);

    }

}