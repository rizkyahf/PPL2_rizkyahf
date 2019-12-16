<div class="row title-body">
    <div class="col-md-11">
        <h1> Daftar Souvenir </h1>
    </div>
    <!-- <div class="col-md-1">
        <a class='btn btn-danger' styles="" href="<?=base_url();?>index.php/C_cart/clear_all">
            Clear Cart
        </a>
    </div> -->
</div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-responsive table-filtered">
                <thead>
                    <tr class="success">
                        <th>ID Souvenir</th>
                        <th>Nama Souvenir</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Berat</th>
                        <th>Foto</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($souvenir as $row) {
                    ?>
                    <tr>
                        <td><?=$row['id_barang'];?></td>
                        <td><?=$row['nama_barang'];?></td>
                        <td><?=$row['stok'];?></td>
                        <td>Rp. <?=number_format($row['harga'], 0, ',', '.');?></td>
                        <td><?=$row['berat'];?> gram</td>
                        <td><?=$row['foto'];?></td>
                        <td><?=$row['keterangan'];?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <form method="post" enctype="multipart/form-data" action="<?=base_url();?>index.php/C_souvenir/import">
            <div class="col-md-3 col-md-offset-3">
                <input type="file" class="form-control" name="file_import">
            </div>
            <div class="col-md-2">
                <!-- <a class="btn btn-info btn-block" href="<?=base_url();?>index.php/C_souvenir/import">Import Data</a> -->
                <input type="submit" class="btn btn-info btn-block" name="import" value="Import Data">
            </div>
        </form>
        <div class="col-md-2">
            <a class="btn btn-info btn-block" href="<?=base_url();?>index.php/C_souvenir/export">Export Data</a>
        </div>
        <div class="col-md-2">
            <a class="btn btn-info btn-block" href="<?=base_url();?>index.php/C_souvenir/export_pdf" target="_blank">Export ke PDF</a>
        </div>
    </div>
     <!-- Custom Script -->
     <script>
        $('.table-filtered').DataTable({
            "lengthMenu": [[5,10,25,50,100,-1], [5,10,25,50,100,'All']],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "<<", // This is the link to the previous page
                    "sNext": ">>", // This is the link to the next page
                }
            }
        });
    </script>