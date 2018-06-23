<?php
include "../../config/config.php";

$sql_guru = mysqli_query($link,"SELECT * from inbox where SenderNumber='".$_POST['SenderNumber']."'");
$j = mysqli_fetch_array($sql_guru);
$nomer = mysqli_query($link,"SELECT nama_lengkap FROM tbl_siswa WHERE telpon = '$j[SenderNumber]'");
                            $d = mysqli_fetch_array($nomer);
                            if ($d['nama_lengkap'] == "")
                                $sendingname = $j['SenderNumber'];
                            else
                                $sendingname = $d['nama_lengkap'];

?>
<!DOCTYPE html>
<html>
<head>
   <title></title>
   <script>
            function Count() {
                var karakter, maksimum;
                maksimum = 160
                karakter = maksimum - (document.form1.pesan.value.length);
                if (karakter < 0) {
                    alert("Jumlah Karakter :" + maksimum + "");
                    document.form1.pesan.value = document.form1.pesan.value.
                            substring(0, maksimum);
                    document.form1.counter.value = karakter;
                } else {
                    document.form1.counter.value = maksimum - (document.form1.pesan.value.length);
                }
            }
        </script>
   
   
   
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
 <script>
            function Count() {
                var karakter, maksimum;
                maksimum = 160
                karakter = maksimum - (document.form1.pesan.value.length);
                if (karakter < 0) {
                    alert("Jumlah Karakter :" + maksimum + "");
                    document.form1.pesan.value = document.form1.pesan.value.
                            substring(0, maksimum);
                    document.form1.counter.value = karakter;
                } else {
                    document.form1.counter.value = maksimum - (document.form1.pesan.value.length);
                }
            }
        </script>
</head>
<body>
   <form class="form-horizontal" method="POST" action="?admin=kirim_personal" >
       <fieldset>
            <div class="form-group">
                                                <label for="inputNomer">Nomer Tujuan</label>
                                                <input type="text" name="nomer" id="inputNomer" class="form-control" placeholder="Masukkan Nomer Tujuan +62xx" value="<?php echo $sendingname;?>" readonly/>
                                            </div>
                                            <ul class="list-unstyled top_profiles scroll-view">
                          
                          <li class="media event">
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i>
                            </a>
                            <div class="media-body">
                              <a class="title" href="#">Pengirim: <?php echo $sendingname;?> </a>
                              <p><strong>Isi Pesan. </strong> </p>
                              <p> <small><?php echo $j['TextDecoded'];?></small>
                              </p>
                            </div>
                          </li>
</li>
         <div class="form-group">

                                                <label for="inputNomer">Isi Balasan</label>
                                                <textarea class="form-control" rows="3" name="pesan" 
                                                          OnFocus="Count();" OnClick="Count();" onKeydown="Count();"
                                                          OnChange="Count();" onKeyup="Count();"  placeholder="Masukkan Pesan"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Maksimal Karakter:</label>
                                                <input type="text" class="form-control input-sm" size="5" maxlength="5" style="width: 50px;" name="counter" readonly="" placeholder="160">


                                            </div>
                
            </div>
        
        
   
   


</fieldset>
 <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose" data-dismiss="modal"><i class="fa fa-close"></i>Batal</button>
              <button type="submit" class="btn btn-primary antosubmit"><i class="fa fa-send"></i> Kirim Pesan</button>
            </div>
</form>



<script src="http://localhost/e-raport/admin/js/bootstrap-datepicker.js"></script>
<script src="http://localhost/e-raport/admin/js/bootstrap-transition.js"></script>
<script src="http://localhost/e-raport/admin/js/jquery.js"></script>


</body>
</html>