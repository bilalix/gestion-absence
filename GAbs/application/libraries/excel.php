<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Excel {

    private $excel;

    public function __construct() {
        require_once APPPATH . 'third_party/PHPExcel.php';
        $this->excel = new PHPExcel();
    }

    public function load($path) {
        $objReader = PHPExcel_IOFactory::createReader('Excel5');
        $this->excel = $objReader->load($path);
    }

    public function save($path) {
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save($path);
    }

    public function stream($filename, $data = null) {
        if ($data != null) {
            $col = 'A';
            foreach ($data[0] as $key => $val) {
                $objRichText = new PHPExcel_RichText();
                $objPayable = $objRichText->createTextRun(str_replace("_", " ", $key));
                $this->excel->getActiveSheet()->getCell($col . '1')->setValue($objRichText);
                $col++;
            }
            $rowNumber = 2;
            foreach ($data as $row) {
                $col = 'A';
                foreach ($row as $cell) {
                    $this->excel->getActiveSheet()->setCellValue($col . $rowNumber, $cell);
                    $col++;
                }
                $rowNumber++;
            }
        }
        header('Content-type: application/ms-excel');
        header("Content-Disposition: attachment; filename=\"" . $filename . "\"");
        header("Cache-control: private");
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save("export/$filename");
        header("location: " . base_url() . "export/$filename");
        unlink(base_url() . "export/$filename");
    }

    public function __call($name, $arguments) {
        if (method_exists($this->excel, $name)) {
            return call_user_func_array(array($this->excel, $name), $arguments);
        }
        return null;
    }
}