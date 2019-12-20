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
                  <h2><strong><big>Data Panitia</big></strong></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                   
                   
                  </ul>
                  <div class="clearfix">
                  <div class="x_content">
                <a href="#" data-toggle="modal" data-target="#user"><button type="button" class="btn btn-primary" ><i class="fa fa-edit fa-lg"></i> Tambah Data</button></a>

                
                  </div>
                  
                </div>
                <?php
                        if (isset($_SESSION['alert'])) {
                            echo $_SESSION['alert'];
                        } unset($_SESSION['alert']);
                        ?>
                        <?php
                        $per_hal = 10;
        
                        $sql_panitia = mysqli_query($link, "SELECT * from tbl_panitia order by nama asc ");
                        $j = mysqli_num_rows($sql_panitia);
                        if ($j > 0) {
                            ?>
                

                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>

                         <th>#</th>
                                            <th>Nama</th>
                                            <!-- <th width="10">NIS</th> -->
                                            <th>Jabatan</th>
                                            <th>Username</th>
                                            <!-- <th width="10%">Kelamin</th> -->
                                            <th>Password</th>
                                            <th >NO HP</th>
                                            
                                            
                                            <th>Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                    <?php
                                        $no = 1;
                                        while ($data_panitia = mysqli_fetch_assoc($sql_panitia)) {
                                          
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $data_panitia['nama']; ?></a></td>
                                               <td><?php echo $data_panitia['jabatan']; ?></a></td>
                                                <td><?php echo $data_panitia['username']; ?></a></td>
                                                <td><?php echo md5($data_panitia['password']); ?></a></td>
                                                <td><?php echo $data_panitia['no_hp']; ?></a></td> 
                                               
                     
                                                </td>
                                                
                                                <td>
                                                 <div class="x_content">
                                              <button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-round" type="button" aria-expanded="false">Action <span class="caret"></span>
                  </button>
                  <ul role="menu" class="dropdown-menu">
                    <li><a href="?admin=ubah-user&username=<?php echo $data_panitia['username'];?>" data-toggle="tooltip" data-original-title="Ubah Data <?php echo $data_panitia['nama']?>" ><i class="fa fa-print"></i> Ubah</a>
                    </li>
                    <li><a href="?admin=detail_siswa&no_daftar=<?php echo $data_siswa['no_daftar']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Lihat Detail Siswa <?php echo $data_siswa['nama_lengkap']?>"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
                    </li>
                    <li><a href="#" data-href="?admin=del-user&username=<?php echo $data_panitia['username']; ?>" data-toggle="modal" data-target="#confirm-delete"> <i class="glyphicon glyphicon-trash"></i> Delete</a>
                    </li>
                   
                  </ul>
                  </div>
                                                   <!--  <a href="modules/siswa/cetak.php?no_daftar=<?php echo $data_siswa['no_daftar'];?>"  class="ubah"  title="" data-toggle="tooltip" data-original-title="Cetak Data <?php echo $data_siswa['no_daftar']?>" target=_blank>
                                                       <button type="button" class="btn btn-success btn-flat btn-sm"><i class="fa fa-print"></i> Cetak</button>
                                                   </a>
                                                   <a href="?admin=detail_siswa&no_daftar=<?php echo $data_siswa['no_daftar']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Lihat Detail Siswa <?php echo $data_siswa['nama_lengkap']?>">
                                                       <button type="button" class="btn btn-success btn-flat btn-xs"><i class="glyphicon glyphicon-eye-open"></i></button>
                                                   </a> -->

                                                   <!-- <a href="?admin=form_ubah&no_daftar=<?php echo $data_siswa['no_daftar']; ?>" class="ubah"  title="" data-toggle="tooltip" data-original-title="Ubah Siswa <?php echo $data_siswa['no_daftar']?>">
                                                       <button type="button" class="btn btn-info btn-flat btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                                                   </a>-->
                                                   <!-- <a href="#" data-href="?admin=del_siswa&no_daftar=<?php echo $data_siswa['no_daftar']; ?>" data-toggle="modal" data-target="#confirm-delete">
                                                    <button type="button" class="btn btn-danger btn-flat btn-xs"><i class="glyphicon glyphicon-trash"></i></button> -->

                                                </a>

                                                
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;}
                                    }else {
                                    ?>
                                    <div class="alert alert-dismissable alert-info">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Belum Ada Data Panitia Yang di Inputkan. . .
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-question-circle fa-fw fa-lg"></i>Konfirmasi Hapus</h4>
                </div> -->
                
                <div class="modal-body">
                    <h3 align="center"><i class="fa  fa-warning fa-fw fa-4x"></i></h3>
                    <h4 align="center"><strong><p>Yakin Hapus Data ini.??</p></strong></h4>
                    <!--  <p class="debug-url"></p> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round btn-warning" data-dismiss="modal"><i class="fa fa-times fa-fw fa-lg"></i>Batal</button>
                    <a class="btn btn-round btn-info btn-ok" >Ya, Hapus <i class="fa fa-sign-out fa-fw fa-lg"></i></a>
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
 <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
  <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
  <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>

  <script>
    $(function() {
      var cnt = 10; //$("#custom_notifications ul.notifications li").length + 1;
      TabbedNotification = function(options) {
        var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title +
          "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

        if (document.getElementById('custom_notifications') == null) {
          alert('doesnt exists');
        } else {
          $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
          $('#custom_notifications #notif-group').append(message);
          cnt++;
          CustomTabs(options);
        }
      }

      CustomTabs = function(options) {
        $('.tabbed_notifications > div').hide();
        $('.tabbed_notifications > div:first-of-type').show();
        $('#custom_notifications').removeClass('dsp_none');
        $('.notifications a').click(function(e) {
          e.preventDefault();
          var $this = $(this),
            tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
          others.removeClass('active');
          $this.addClass('active');
          $(tabbed_notifications).children('div').hide();
          $(target).show();
        });
      }

      CustomTabs();

      var tabid = idname = '';
      $(document).on('click', '.notification_close', function(e) {
        idname = $(this).parent().parent().attr("id");
        tabid = idname.substr(-2);
        $('#ntf' + tabid).remove();
        $('#ntlink' + tabid).parent().remove();
        $('.notifications a').first().addClass('active');
        $('#notif-group div').first().css('display', 'block');
      });
    })
  </script>
  <script type="text/javascript">
    var permanotice, tooltip, _alert;
    $(function() {
      new PNotify({
        title: "Perhatian..!!",
        type: "dark",
        text: "Data Panitia PPDB",
        nonblock: {
          nonblock: true
        },
        before_close: function(PNotify) {
          // You can access the notice's options with this. It is read only.
          //PNotify.options.text;

          // You can change the notice's options after the timer like this:
          PNotify.update({
            title: PNotify.options.title + " - Enjoy your Stay",
            before_close: null
          });
          PNotify.queueRemove();
          return false;
        }
      });

    });
  </script>
  <script>
    $(document).ready(function() {
      $('.progress .bar').progressbar(); // bootstrap 2
      $('.progress .progress-bar').progressbar(); // bootstrap 3
    });
  </script>
  <script src="js/moment/moment.min.js"></script>
  <script src="js/calendar/fullcalendar.min.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script src="js/input_mask/jquery.inputmask.js"></script>
  <script>
    $(document).ready(function() {
      $(":input").inputmask();
    });
  </script>
 <!-- Start Calender modal -->
 <div id="user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Panitia</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal" style="padding: 5px 20px;">
                <form id="antoform" class="form-horizontal calender" role="form" method="POST" action="?admin=add_user">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title"  name="nama" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Jabatan</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <!-- <input type="text" class="form-control" name="jabatan" required> -->
                        <select class="form-control" name="jabatan" required>
                        <option>Pilih Jabatan</option>
                          <option value="Panitia Guru">Panitia Guru</option>
                          <option value="Siswa">Siswa</option>
                          
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" class="form-control" name="username" required>
                        
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" class="form-control" name="password" required>
                        
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">No Hp</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                    <input type="text" class="form-control"  name="no_hp" required>
                        
                      </div>
                  </div>
                  
                  <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose" data-dismiss="modal"><i class="fa fa-close"></i>Keluar</button>
              <button type="submit" class="btn btn-primary antosubmit"name="tambah_user"><i class="fa fa-save"></i> Simpan</button>
            </div>
                </form>

              </div>
            </div>
            
          </div>
        </div>
      </div>