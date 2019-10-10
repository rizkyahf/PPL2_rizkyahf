<div class="row title-body">
    <div class="col-md-11">
        <h1> Daftar Penjualan </h1>
    </div>
    <!-- <div class="col-md-1">
        <a class='btn btn-danger' styles="" href="<?=base_url();?>index.php/c_cart/clear_all">
            Clear Cart
        </a>
    </div> -->
</div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive">
                <tr class="primary">
                    <th>No. Transaksi</th>
                    <th>Tgl. Transaksi</th>
                    <th>Nama Customer</th>
                    <th>Total</th>
                    <th>Status Transaksi</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    foreach($transaksi as $row) {
                        if($row['status'] == 'blm_bayar') $class = 'warning';
                        else if($row['status'] == 'sdh_bayar') $class = 'info';
                        else if($row['status'] == 'sdh_kirim') $class = 'success';

                ?>
                <tr class="<?=$class;?>">
                    <td><?=$row['no_penjualan'];?>.</td>
                    <td><?=date('d-M-Y H:i:s', strtotime($row['tanggal']));?></td>
                    <td><?=$row['nama'];?></td>
                    <td>Rp. <?=number_format($row['total'], 0, ',', '.');?></td>
                    <td><?=$row['status'];?></td>
                    <td>
                        <?php if($row['status'] == 'blm_bayar') { ?>
                        <a class="btn btn-primary btn-xs" href="<?=base_url();?>index.php/c_transaksi/update_sudahbayar/<?=$row['no_penjualan'];?>">
                            Update Sudah Bayar
                        </a>
                        <?php } ?>
                        <?php if($row['status'] == 'sdh_bayar') { ?>
                        <a class="btn btn-success btn-xs" href="<?=base_url();?>index.php/c_transaksi/update_sudahkirim/<?=$row['no_penjualan'];?>">
                            Update Sudah Kirim
                        </a>
                        <?php } ?>
                        <!-- <a class="btn btn-danger btn-xs" href="<?=base_url();?>index.php/c_transaksi/update_bataltransaksi/<?=$row['no_penjualan'];?>">
                            Batalkan Transaksi
                        </a> -->
                    </td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-2 col-md-offset-10">
            <?php if(isset($_SESSION['cart'])){ ?>
            <a class="btn btn-warning btn-block" href="<?=base_url();?>index.php/c_transaksi/add_data_pembeli">Checkout</a>
            <?php } ?>
        </div>
    </div> -->