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
                        Kota
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="kota" placeholder="Kota">
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