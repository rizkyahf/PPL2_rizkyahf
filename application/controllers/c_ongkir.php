<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ongkir extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_souvenir');
    }

    private $api_url = "https://api.rajaongkir.com/starter/";
    private $api_key = "bcb8256f74db81e4e88198e707d017c0";

    public function ajax_province_dropdown(){
        $api_url = "https://api.rajaongkir.com/starter/";
        $api_key = "bcb8256f74db81e4e88198e707d017c0";
        //Get Data Provinsi
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url."province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key
        ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);

        echo "<select name='id_provinsi' id='provinsi' class='form-control'>";
        echo "<option> -- Pilih Provinsi Tujuan -- </option>";
        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
            echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
        }
        echo "</select>";
    }

    public function ajax_city_dropdown(){
        $api_url = "https://api.rajaongkir.com/starter/";
        $api_key = "bcb8256f74db81e4e88198e707d017c0";
        $id_prov = $this->input->get('prov_id');

        //Get Data kota
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url."city?province=$id_prov",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$api_key
        ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
        //echo $response;
        }

        echo "<option> -- Pilih Kota Tujuan -- </option>";
        $data = json_decode($response, true);
        for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
            echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']." (".$data['rajaongkir']['results'][$i]['type'].")</option>";
        }
    }

    public function ajax_calculate_ongkir(){
        $api_url = "https://api.rajaongkir.com/starter/";
        $api_key = "bcb8256f74db81e4e88198e707d017c0";

        $asal           = $_POST['asal'];
        $kota_tujuan    = $_POST['kota_tujuan'];
        $kurir          = $_POST['kurir'];
        $berat          = $_POST['berat'];

        //Get Data Provinsi
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $api_url."cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$kota_tujuan."&weight=".$berat."&courier=".$kurir."",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ".$api_key
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {	  echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response, true);
            echo($data['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value']);
        }
    }

}
?>