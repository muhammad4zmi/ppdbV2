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
    <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>
                   
                </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
     <div class="col-md-12 portlets">
              <div class="x_panel">
                <div class="x_title">
                  <h2><strong><big>Daftar Peserta Didik Baru</big></strong></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                   
                   
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <?php
                        if (isset($_SESSION['alert'])) {
                            echo $_SESSION['alert'];
                        } unset($_SESSION['alert']);
                        ?>
                        <?php
                        $per_hal = 10;
        
                        $sql_siswa = mysqli_query($link, "SELECT * from tbl_siswa order by no_daftar asc ");
                        $j = mysqli_num_rows($sql_siswa);
                        if ($j > 0) {
                            ?>
                <div class="x_content">
                <a href="?admin=form_siswa"><button type="button" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i> Tambah Data</button></a>

                  <a href="modules/siswa/excel.php"><button type="button" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export Data Excel</button></a>

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>

                         <th>#</th>
                                            <th width="5%">No Pendaftaran</th>
                                            <!-- <th width="10">NIS</th> -->
                                            <th width="5%">NISN</th>
                                            <th width="20%">Nama Lengkap</th>
                                            <!-- <th width="10%">Kelamin</th> -->
                                            <th width="15%">Tgl Lahir</th>
                                            <!-- <th width="10%">Agama</th>
                                            <th width="20%">Alamat</th> -->
                                            <th width="5%">Telpon</th>
                                            <th width="20%">Berkas</th>
                                            <th width="5%">Ket. Berkas</th>
                                            <th width="10%">Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                     <?php
                                        $no = 1;
                                        while ($data_siswa = mysqli_fetch_assoc($sql_siswa)) {
                                            $daftar=$data_siswa['no_daftar'];
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data_siswa['no_daftar']; ?></a></td>
                                               <!--  <td><?php echo $data_siswa['nis']; ?></a></td> -->
                                                <td><?php echo $data_siswa['nisn']; ?></a></td>
                                                <td><?php echo $data_siswa['nama_lengkap']; ?></a></td>
                                                <!-- <td><?php echo $data_siswa['jk']; ?></a></td> -->
                                                <td><?php echo (DateToIndo("$data_siswa[tgl_lahir]")); ?></td>
                                               <!--  <td><?php echo $data_siswa['agama']; ?></a></td>-->
                                                <td><?php echo $data_siswa['telpon']; ?></td> 
                                                <td>
                                                    <?php
                                                    $data = array();
                                                    $query = "SELECT tbl_siswa.no_daftar,tbl_siswa.nis,tbl_siswa.nisn,tbl_siswa.nama_lengkap,tbl_siswa.tgl_lahir,tbl_siswa.telpon,
                                                        tbl_syarat.no_daftar,tbl_syarat.syarat
                                                        from tbl_siswa INNER JOIN tbl_syarat ON tbl_syarat.no_daftar=tbl_siswa.no_daftar where tbl_syarat.no_daftar='$daftar' order by tbl_syarat.no_daftar asc";
                                                        
                                                    $result = mysqli_query($link, $query);
                                                    
                                                    while ($row = mysqli_fetch_object($result)) {
                                                        $p = $row->syarat;
                                                        ?>
                                                        <div>
                                                            <!--ingat : name harus berupa array (ada tanda []). lalu jika $p ada dalam $data ditambahkan atribute cheked-->
                                                            <input type="checkbox"  checked value="<?php echo $p; ?>" disabled 
                                                            <?php echo in_array($p, $data) ? 'checked' : ''; ?>>
                                                            <?php echo $p; ?>
                                                           <!--  <?php include 'checked.php';?> -->
                                                        </div>
                                                        <?php
                                                    }?>
                                              
                                                
                                                </td>
                                                <td>
                                                <?php
                                                $j1 = mysqli_num_rows($result);
                                                        if ($j1 >=5) {
                                                            echo '<span class="badge bg-green"><i class="fa  fa-check-circle" readonly></i> Lengkap';
                                                        }elseif ($j1 < 5) {
                                                            echo '<span class="badge bg-yellow"><i class="fa   fa-exclamation-triangle " readonly></i> Kurang';
                                                        }

                                                            ?>


                                                </td>
                                                
                                                <td>
                                                    <a href="modules/siswa/cetak.php?no_daftar=<?php echo $data_siswa['no_daftar'];?>"  class="ubah"  title="" data-toggle="tooltip" data-original-title="Cetak Data <?php echo $data_siswa['no_daftar']?>" target=_blank>
                                                       <button type="button" class="btn btn-success btn-flat btn-sm"><i class="fa fa-print"></i> Cetak</button>
                                                   </a>

                                                   <!-- <a href="?admin=form_ubah&no_daftar=<?php echo $data_siswa['no_daftar']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Ubah Siswa <?php echo $data_siswa['no_daftar']?>">
                                                       <button type="button" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                                                   </a>-->
                                                   <a href="#" data-href="?admin=del_siswa&no_daftar=<?php echo $data_siswa['no_daftar']; ?>" data-toggle="modal" data-target="#confirm-delete">
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
                                        Belum Ada Data Siswa Yang di Inputkan. . .
                                    </div>
                                    <?php
                                }
                                ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            <!-- </div>

           
               </div> -->

               

              <!-- footer content -->
              
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle fa-fw fa-lg"></i>Konfirmasi Hapus</h4>
                </div> -->
                
                <div class="modal-body">
                    <h3 align="center"><i class="fa  fa-times-circle-o fa-fw fa-4x"></i></h3>
                    <h4 align="center"><strong><p>Yakin Hapus Data ini.??</p></strong></h4>
                    <!--  <p class="debug-url"></p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-times fa-fw fa-lg"></i>Batal</button>
                    <a class="btn btn-danger btn-ok btn-flat" >Ya, Hapus <i class="fa fa-sign-out fa-fw fa-lg"></i></a>
                </div>
            </div>
        </div>
    </div>
        


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>

<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        
        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
</script>