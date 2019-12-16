<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'third_party/PhpSpreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_souvenir extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_souvenir');
        require_once APPPATH.'third_party/PhpSpreadsheet/vendor/phpoffice/phpspreadsheet/src/Bootstrap.php';
    }
    
    // READ FILE DARI PRIVATE
    private function returnFile( $filename ) 
    {
        // Check if file exists, if it is not here return false:
        if ( !file_exists( $filename )) return false;
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        // Suggest better filename for browser to use when saving file:
        header('Content-Disposition: attachment; filename='.basename($filename));
        header('Content-Transfer-Encoding: binary');
        // Caching headers:
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        // This should be set:
        header('Content-Length: ' . filesize($filename));
        // Clean output buffer without sending it, alternatively you can do ob_end_clean(); to also turn off buffering.
        ob_clean();
        // And flush buffers, don't know actually why but php manual seems recommending it:
        flush();
        // Read file and output it's contents:
        readfile( $filename );
        // You need to exit after that or at least make sure that anything other is not echoed out:
        exit;
    }
    
    public function display(){
        $data1['souvenir'] = $this->M_souvenir->get_all();
        $data['content_div'] = $this->load->view('v_souvenir_display', $data1, TRUE);
        $this->load->view('v_template', $data);
    }
    
    
	public function display_all(){
        $data1['souvenir'] = $this->M_souvenir->get_all();
        $data['content_div'] = $this->load->view('v_souvenir_display_admin', $data1, TRUE);
        $this->load->view('v_template', $data);
	}

    public function export(){
        $date = date('Y-m-d');
        $all = $this->M_souvenir->get_all();
         
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->setCellValue('A1', 'ID Souvenir');
        $sheet->setCellValue('B1', 'Nama Souvenir');
        $sheet->setCellValue('C1', 'Stok');
        $sheet->setCellValue('D1', 'Harga');
        $sheet->setCellValue('E1', 'Berat');
        $sheet->setCellValue('F1', 'Foto');
        $sheet->setCellValue('G1', 'Keterangan');
        
        $i = 2;
        
        foreach($all as $value) {
            echo "aa ";
            $value['id_barang']     = isset($value['id_barang']) ? $value['id_barang'] : '';
            $value['nama_barang']   = isset($value['nama_barang']) ? $value['nama_barang'] : '';
            $value['stok']          = isset($value['stok']) ? $value['stok'] : '';
            $value['harga']         = isset($value['harga']) ? $value['harga'] : '';
            $value['foto']          = isset($value['foto']) ? $value['foto'] : '';
            $value['keterangan']    = isset($value['keterangan']) ? $value['keterangan'] : '';
            $value['berat']         = isset($value['berat']) ? $value['berat'] : '';

            $sheet->setCellValue('A'.$i, $value['id_barang']);
            $sheet->setCellValue('B'.$i, $value['nama_barang']);
            $sheet->setCellValue('C'.$i, $value['stok']);
            $sheet->setCellValue('D'.$i, $value['harga']);
            $sheet->setCellValue('E'.$i, $value['berat']);
            $sheet->setCellValue('F'.$i, $value['foto']);
            $sheet->setCellValue('G'.$i, $value['keterangan']);
            $i++;
        }
        echo "<br>";

        echo "b ";
        $writer = new Xlsx($spreadsheet);
        
        $writer->save('assets/files/Souvenir-'.$date.'.xlsx');
        
        $full = 'assets/files/Souvenir-'.$date.'.xlsx';
        
        $this->returnFile( $full );
    }

    public function import(){
        $this->load->library('excel');
        if(isset($_FILES["file_import"]["name"])){
            $path = $_FILES["file_import"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++){
                    $id             = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $nama           = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $stok           = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $harga          = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $berat          = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $foto           = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $keterangan     = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

                    $data = array(
                        'id_barang'     => $id,
                        'nama_barang'   => $nama,
                        'harga'         => $harga,
                        'stok'          => $stok,
                        'foto'          => $foto,
                        'keterangan'    => $keterangan,
                        'berat'         => $berat
                    );
                    $this->M_souvenir->insert($data);
                }
            }
            redirect(base_url("index.php/C_souvenir/display_all"));
        } 
    }

    public function export_pdf(){
        $this->load->library('Pdf');
        
        $data['souvenir'] = $this->M_souvenir->get_all();
		$this->load->view('v_pdf_export', $data);
    }

    public function blank(){
        $data['content_div'] = "";
        $this->load->view('v_template', $data);
    }
}