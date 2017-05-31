<?php
include "../../../config/config.php";

$sql_guru = mysqli_query($link,"SELECT * from tbl_user where nip='".$_POST['nip']."'");
$j = mysqli_fetch_array($sql_guru);

?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
   
   
   
   
   <link rel="stylesheet" href="http://localhost/e-raport/admin/css/datepicker/datepicker3.css">
   <style>
    .datepicker{z-index:1151;}
</style>
<script>
    $(function(){
        $("#tgl").datepicker({
            dateFormat : "dd/mm/yy",
            
            changeMonth : true,
            changeYear : true
        });
    });
    

</script>
</head>
<body>
   <form class="form-horizontal" method="POST" action="?admin=add-user" >
                    <fieldset>
                      <div class="form-group">
                             <label class="col-lg-3 control-label">Nip Guru</label>
                             <div class="col-lg-8">
                                <input class="form-control" id="nama_mhs" type="text" name="nip" value="<?php echo $j['nip']?>"  readonly/>
                            </div>
                        </div>
                         <div class="form-group">
                         <label class="col-lg-3 control-label">Nama Lengkap</label>
                         <div class="col-lg-8">
                             
                            <input class="form-control" id="nama_mhs" type="text" name="nama" value="<?php echo $j['nama_lengkap']?>"  readonly/>
                                
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-8">
                            <input class="form-control" id="nama_mhs" type="password" name="password" value="<?php echo $j['password']?>" required/>

                        </div>
                    </div>
                    
                <div class="form-group">
                    <label class="col-lg-3 control-label">Level/Jabatan</label>
                    <div class="col-lg-8">
                        <select name="level" id="" class="form-control">
                            <option>Pilih Level</option>
                <option value="1" <?php echo ($j['jabatan'] == "Kepala Sekolah") ? 'selected' : ''; ?>>Kepala Sekolah</option>
                <option value="2" <?php echo ($j['jabatan'] == "Wali Kelas") ? 'selected' : ''; ?>>Wali Kelas</option>
                        </select>

                    </div>
                </div>
                

        </fieldset>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-times fa-fw fa-lg"></i> Keluar</button>
        <button type="submit" class="btn btn-primary btn-flat" name="tambah_user"><i class="fa fa-save fa-fw fa-lg"></i> Simpan Data</button>
    </div>
</form>



<script src="http://localhost/e-raport/admin/js/bootstrap-datepicker.js"></script>
<script src="http://localhost/e-raport/admin/js/bootstrap-transition.js"></script>
<script src="http://localhost/e-raport/admin/js/jquery.js"></script>


</body>
</html>