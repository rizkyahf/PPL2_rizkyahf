<?php
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

    curl_close($curl);

    echo "<select name='id_provinsi' id='id_provinsi' class='form-control'>";
    echo "<option> -- Pilih Provinsi Tujuan -- </option>";
    $data = json_decode($response, true);
    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
    }
    echo "</select>";

?>