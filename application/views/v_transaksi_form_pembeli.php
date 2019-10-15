    <div class="row title-body">
        <div class="col-md-12">
            <h1> Checkout </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="<?=base_url();?>index.php/c_transaksi/proses_transaksi ">
                <div class="row">
                    <div class="col-md-2">
                        Kode Penjualan
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="no_penjualan" value="<?=uniqid(); ?>" readonly>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-2">
                        Nama
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Customer" required>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-2">
                        No. HP
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="hp" placeholder="No. HP" required>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-2">
                        Alamat
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-2">
                        Provinsi
                    </div>
                    <div class="col-md-10" id="province">
                        <?=$dropdown_provinsi;?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Kota
                    </div>
                    <div class="col-md-10" id="city">
                        <select id="id_kota" name="id_kota" class="form-control">
                            <option> -- Pilih Kota -- </option>
                        </select>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-md-2">
                        Kode Pos
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos">
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-2">
                        Total Harga Barang
                    </div>
                    <div class="col-md-10">
                        <?php
                            $sum = 0;
                            foreach($_SESSION['cart'] as $row) {
                                // $id = $_SESSION['cart'][]
                                $count = $row['harga'] * $row['jumlah'];
                                $sum = $sum + $count;
                            }
                        ?>
                        Rp. <?=number_format($sum, 0, ',', '.');?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Total Berat Barang
                    </div>
                    <div class="col-md-10">
                        <?php
                            $berat = 0;
                            foreach($_SESSION['cart'] as $row) {
                                $count = $row['jumlah'] * $row['berat'];
                                $berat = $berat + $count;
                            }
                        ?>
                        <?=$berat; ?> Gram
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Ongkos Kirim (JNE)
                    </div>
                    <div class="col-md-2" id="calculated_ongkir">
                        
                    </div>
                    <div class="col-md-8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        Total
                    </div>
                    <div class="col-md-10" id="harga_total">
                        
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-3">
                        <input type="submit" name="submit" value="Lanjutkan Transaksi" class="btn btn-primary btn-block">
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-danger btn-block" href="<?=base_url();?>index.php/c_cart/display">Batalkan Transaksi</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function currencyFormatID(num) {
            return (
                'Rp. ' + num
                // .toFixed(0) // always two decimal digits
                .replace('.', ',') // replace decimal point character with ,
                .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
            ) // use . as a separator
        }
        $('#id_provinsi').change(function(){
            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
            var prov = $('#id_provinsi').val();
            console.log('in3');

            $.ajax({
                type : 'GET',
                url : '<?=base_url();?>index.php/c_ongkir/ajax_city_dropdown',
                data :  'prov_id=' + prov,
                success: function (data) {
                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#id_kota").html(data);
                }
            });
        });

        $('#id_kota').change(function(){
            var asal        = 22; // id bandung
            var kota_tujuan = $('#id_kota').val();
            var kurir       = 'jne'; // id kurir jne
            var berat       = <?=$berat; ?>; // satuannya gram
            var total       = 0;
            var harga       = <?=$sum; ?>*1;

            console.log(kota_tujuan);
            if(kota_tujuan === ''){
                alert('Harap isi Kota Tujuan!');
            }
            else{
                $.ajax({
                    type : 'POST',
                    url : '<?=base_url();?>index.php/c_ongkir/ajax_calculate_ongkir',
                    data :  {'kota_tujuan' : kota_tujuan, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
                    success: function (data) {
                        //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                        $("#calculated_ongkir").html(currencyFormatID(data));
                        total = parseInt(data) + parseInt(harga);
                        $("#harga_total").html(currencyFormatID(""+total));
                    }
                });
            }
        });
            
    </script>