    <?php if($this->session->flashdata('warning') != NULL){ ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning" role="alert">
                <b>Error!!</b><br>
                <?=$this->session->flashdata('warning');?>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="row title-body">
        <div class="col-md-12">
            <h1> Input Data Mahasiswa </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form method="POST" action="<?=base_url();?>index.php/C_mahasiswa/upload">       
                <div class="row">
                    <div class="col-md-2">
                        NIM
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nim" placeholder="Nim" required>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-md-2">
                        Nama
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" required>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-2">
                        Jenis Kelamin
                    </div>
                    <div class="col-md-10">
                        <!-- <input type="text" class="form-control" name="nama" placeholder="Nama Mahasiswa" required> -->
                        <div class="">
                            <input type="radio" id="l" name="jk" value="1">
                            <label for="l">Laki-Laki</label>
                            <input type="radio" id="p" name="jk" value="0">
                            <label class="custom-control-label" for="p">Perempuan</label>
                            <br><br>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-md-2">
                        Pendidikan
                    </div>
                    <div class="col-md-10">
                        <select id="pendidikan" name="pendidikan" class="form-control">
                            <option> -- Pilih Pendidikan -- </option>
                            <?php foreach($pendidikan as $res){ ?>
                            <option value="<?=$res['id'];?>"><?=$res['nama_pend']; ?></option>
                            <?php } ?>
                        </select>
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
                        Email
                    </div>
                    <div class="col-md-10">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-2">
                        Hobi
                    </div>
                    <div class="col-md-10">
                        <?php foreach($hobi as $res){ ?>
                        <!-- <option value="<?=$res['id'];?>"><?=$res['nama_pend']; ?></option> -->
                        <div class="checkbox">
                            <label><input type="checkbox" name="hobi[]" value="<?=$res['id'];?>"><?=$res['hobi'];?></label>
                        </div>
                        <?php } ?>
                    </div>
                </div>         
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-3">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-block">
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-danger btn-block" href="<?=base_url();?>index.php/C_cart/display">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>