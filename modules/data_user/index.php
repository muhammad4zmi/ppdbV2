<?php
if (!isset($_SESSION['admin-username']))
    header("location:../../login.php");
function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
     // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
    $BulanIndo = array("Januari", "Februari", "Maret",
       "April", "Mei", "Juni",
       "Juli", "Agustus", "September",
       "Oktober", "November", "Desember");
    $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
    $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
    $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    return($result);
    
}
?>

<link rel="stylesheet" href="../css/datepicker/datepicker3.css">

<style>
    .datepicker{z-index:1151;}
</style>
<script>
    $(function(){
        $("#tanggal").datepicker({
            dateFormat : "dd/mm/yy",

            changeMonth : true,
            changeYear : true
        });
    });


</script>
<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
}
.example-modal .modal {
    background: transparent !important;
}
</style>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Raport Online SMPN 1 Mataram | 
            <small>Dashboard</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <h3 class="page-header"><i class="fa fa-users fa-fw fa-2x"></i> Halaman Data User
           </h3>
        <div class="row-fluid placeholders">
            <div class="col-md-12 text-left">
                <div class="col-md-12 text-left">
                    <p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-flat dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-edit fa-lg"></i> Tambah Data <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#" data-toggle="modal" data-target="#Tambah"><i class="fa fa-user fa-lg"></i> Data Guru</a></li>
                            </ul>
                        </div>
                        <br/>
                    </p>
                    <?php
                    if (isset($_SESSION['alert'])) {
                        echo $_SESSION['alert'];
                    } unset($_SESSION['alert']);
                    ?>
                    <?php
        //             $per_hal = 10;
        //             $jumlah_record = mysqli_query ($link,"SELECT * FROM tbl_guru");
        // //$jum = mysql_result($jumlah_record,0);
        //             $jmldata    = mysqli_num_rows($jumlah_record);
        //             $halaman = ceil($jmldata/$per_hal);
        //             $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        //             $start = ($page - 1) * $per_hal;
                    $sql_guru = mysqli_query($link, "SELECT * from tbl_user order by nip asc");
                    $j = mysqli_num_rows($sql_guru);
                    if ($j > 0) {
                        ?>
                        <div class="panel panel-primary">
                            <!-- Default panel contents -->
                            <div class="panel-heading"><i class="fa fa-users fa-fw fa-2x"></i> Data User</div><br/>
                            <div class="panel-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIP (Username)</th>
                                        <th>Nama Lengkap</th>
                                        <th>Password</th>
                                        <th>Level</th>
                                        

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    while ($data_user = mysqli_fetch_assoc($sql_guru)) {

                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data_user['nip']; ?></a></td>
                                            <td><?php echo $data_user['nama_lengkap']; ?></td>
                                            <td><?php echo md5($data_user['password']); ?></td>
                                            <td><?php echo $data_user['jabatan']; ?></td>
                                            <td>

                                                <a href="#" class="edit-record" data-id="<?php echo $data_user['nip'];?>" title="" data-original-title="">
                                                    <button type="button" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                                                </a>
                                                <a href="#" data-href="index.php?admin=del-user&nip=<?php echo $data_user['nip']; ?>" data-toggle="modal" data-target="#confirm-delete">
                                                    <button type="button" class="btn btn-danger btn-flat btn-xs"><i class="glyphicon glyphicon-trash"></i></button>

                                                </a>


                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-dismissable alert-info">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Belum Ada Data Guru Yang di Inputkan. . .
                                    </div>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <!-- nav>
                            <ul class="pagination">

                                <li class="disabled"><a href="?admin=dt_guru&page=<?php echo $page -1 ?>" aria-label="Previous"> <span aria-hidden="true">«</span></a></li>
                            </ul>
                            <?php 
                            //for($x=1;$x<=$halaman;$x++)
                            {
                                ?>
                                <ul class="pagination">
                                    <li class="active"><a href="?admin=dt_guru&page=<?php echo $x ?>"><?php echo $x ?><span class="sr-only">(current)</span></a></li>
                                </ul>
                                <?php
                            }
                            ?>
                            <ul class="pagination">
                                <li><a href="?admin=dt_guru&page=<?php echo $page +1 ?>" aria-label="Next"> <span aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>

<!-- Modal Tambah Alternatif-->
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil fa-fw fa-lg"></i> Tambah Data User</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="?admin=add-user" >
                    <fieldset>
                      <div class="form-group">
                             <label class="col-lg-3 control-label">Nip Guru</label>
                             <div class="col-lg-8">
                                <select name="nip" id="nis" class="form-control">
                                    <?php
                                    include "../../../config/config.php";
                                    $q = mysqli_query($link,"SELECT nip, nama_guru from tbl_guru");
                                    while($r = mysqli_fetch_array($q)) {
                                        ?>
                                        <option value="<?php echo $r['nip'] ?>">
                                            <?php echo $r['nip'] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                         <label class="col-lg-3 control-label">Nama Lengkap</label>
                         <div class="col-lg-8">
                             
                            <select name="nama" id="SK" class="form-control">
                                
                            </select>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Password</label>
                        <div class="col-lg-8">
                            <input class="form-control" id="nama_mhs" type="password" name="password"  required/>

                        </div>
                    </div>
                    
                <div class="form-group">
                    <label class="col-lg-3 control-label">Level/Jabatan</label>
                    <div class="col-lg-8">
                        <select name="level" id="" class="form-control">
                            <option value="">Pilih Level</option>
                            <option value="1">Kepala sekolah</option>
                            <option value="2">Wali Kelas</option>
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
</div>
</div>
</div>

<div class="modal fade" id="myEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-pencil fa-fw fa-lg"></i> Ubah Data User</h4>
            </div>
            <div class="modal-body">

            </div>



        </div>
    </div>
</div>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="example-modal">
       <div class="modal modal-danger">
        <div class="modal-dialog">

            <div class="modal-content">

                <!-- <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle fa-fw fa-lg"></i>Konfirmasi Hapus</h4>
                </div> -->

                <div class="modal-body">
                    <h3 align="center"><i class="fa  fa-times-circle-o fa-fw fa-4x"></i></h3>
                    <h4 align="center"><strong><p>Yakin Hapus Data ini.??</p></strong></h4>
                    <!--  <p class="debug-url"></p> -->
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times fa-fw fa-lg"></i>Batal</button>
                    <a class="btn btn-danger btn-ok" >Ya, Hapus <i class="fa fa-sign-out fa-fw fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<script src="../js/bootstrap-transition.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script>
  $(function(){
    $(document).on('click','.edit-record',function(e){
        e.preventDefault();
        $("#myEdit").modal('show');
        $.post('modules/data_user/hasil.php',
            {nip:$(this).attr('data-id')},

            function(html){
                $(".modal-body").html(html);
            }   
            );
    });
});

</script>
<script>
    $("#nis").change(function(){
        
        var id_md = $("#nis").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "modules/data_user/ambil-nama.php",
            data: "md="+id_md,
            success: function(msg){     
                if(msg == ''){
                    alert('Tidak ada data Siswa');
                }
                else{
                    $("#SK").html(msg);
                    
                    
                }
            }
        }); 
    });   
</script>
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
</script>
 <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
                    <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
                    <!-- AdminLTE App -->
                    <script src="js/AdminLTE/app.js" type="text/javascript"></script>
                    <!-- AdminLTE for demo purposes -->

                    <!-- page script -->
                   <script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>


