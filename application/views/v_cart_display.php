<div class="row title-body">
    <div class="col-md-11">
        <h1> Cart </h1>
    </div>
    <div class="col-md-1">
        <a class='btn btn-danger' styles="" href="<?=base_url();?>index.php/c_cart/clear_all">
            Clear Cart
        </a>
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive">
                <tr class="success">
                    <td>No. </td>
                    <td>Nama Barang </td>
                    <td>Jumlah </td>
                    <td>Harga </td>
                    <td>Total </td>
                    <td>Hapus </td>
                </tr>
                <?php
                    $i = 1;
                    $sum = 0;
                    $count = 0;
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $row) {
                            // $id = $_SESSION['cart'][]
                            $count = $row['harga'] * $row['jumlah'];
                            $sum = $sum + $count;
                ?>
                <tr>
                    <td><?=$i;?>.</td>
                    <td><?=$row['nama_barang'];?></td>
                    <td><?=$row['jumlah'];?></td>
                    <td>Rp. <?=number_format($row['harga'], 0, ',', '.');?></td>
                    <td>Rp. <?=number_format($count, 0, ',', '.');?></td>
                    <td>
                        <a class="btn btn-danger" href="<?=base_url();?>index.php/c_cart/clear_by_id/<?=$row['id'];?>">
                            <span class="glyphicon glyphicon-remove-sign"></span>
                        </a>
                    </td>
                </tr>
                <?php
                            $i++;
                        }
                    }
                    else {
                ?>
                <tr>
                    <td colspan='6' style="text-align: center;">
                        There's no item selected
                    </td>
                </tr>
                <?php
                    }
                ?>
                <tr class='success'>
                    <td colspan='4' style="text-align: right;">
                        <b>Total</b>
                    </td>
                    <td>Rp. <?=number_format($sum, 0, ',', '.');?></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-10">
            <?php if(isset($_SESSION['cart'])){ ?>
            <a class="btn btn-warning btn-block" href="<?=base_url();?>index.php/c_transaksi/add_data_pembeli">Checkout</a>
            <?php } ?>
        </div>
    </div>