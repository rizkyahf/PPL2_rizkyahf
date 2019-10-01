<div class="row title-body">
    <div class="col-md-10">
        <h1> Our Souvenir </h1>
    </div>
</div>
    <div class="row">
        <?php foreach($souvenir as $row): ?>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        $img = "person-default.png";
                        if($row['foto'] != NULL) $img = $row['foto'];
                    ?>
                    <img src="<?=base_url();?>assets/img/upload/<?=$img; ?>" class="photo-list">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-10">
                        <p><?=$row['nama_barang']; ?></p>
                        <p><?="Rp. ".number_format($row['harga'],2,',','.'); ?></p>
                        <p>Stok: <?=$row['stok']; ?></p>
                        <a class="btn btn-primary" href="">Lihat Detil Barang</a>
                        <a class="btn btn-success <?php if($row['stok']==0){echo "disabled";} ?>" href="<?=base_url();?>index.php/c_cart/add/<?=$row['id_barang']; ?>"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                    </div>
                </div>
            </div>
        
            <hr>
        </div>
        <?php endforeach; ?>
    </div>