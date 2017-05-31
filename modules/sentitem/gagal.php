<?php
$gagal=mysqli_query($link,'select * from sentitems where Status="SendingError"');
    $gl=0;
    while ($g1=mysqli_fetch_array($gagal)) {
        $gl++;
    }
    ?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Layanan Informasi Pembayaran Kuliah Berbasis SMS | 
            <small>Informasi Pesan Terkirim</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Send Items</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="box box-info">
            <div class="box-header">
                <i class="fa fa-frown-o"></i>
                <h3 class="box-title"><b>Daftar Pesan Gagal Dikirim</b><br/>
                <small><?php echo $gl ?> Pesan Gagal Di Kirim</small>
                </h3>
                
                <!-- tools box -->


            </div>
            <?php
                $c = 0;
                
                $datas = array();
                $a = mysqli_query($link,"SELECT * from sentitems where Status='SendingError'");
                while ($b = mysqli_fetch_array($a)) {
                    $nomer = $b['DestinationNumber'];
                    $pesan = $b['TextDecoded'];
                    $status = $b['Status'];
                    
                    
                        $c++;
                        $datas[] = array($b['ID'], $b['DestinationNumber'],$b['TextDecoded']);
                    }
                
                ?>


            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-striped">
                    
                   <form action="index.php?admin=ulang" method="POST">
                                <div class="box-body">
                                
                                    <ul class="todo-list">
                                   
                                        <?php
                                        foreach ($datas as $value) {
                                            ?>
                                            <li>
                                                <input class="icheckbox_flat-blue checked" type="checkbox" name="id[]" value="<?php echo $value[0] ?>" />
                                                <span class="text"><?php echo $value[1] ?> | <?php echo $value[2]?></span><small class="label label-danger"><i class="fa fa-exclamation-triangle"></i> SendingError</small>      
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div><!-- /.box-body -->
                                <div class="box-footer clearfix no-border">
                                    <button class="btn btn-success pull-right" type="submit"><i class="glyphicon glyphicon-refresh"></i> Kirim Ulang</button>
                                </div>
                            </form>
                   

                </table>
            </div><!-- /.box-body -->
            <!-- Main row -->


    </section><!-- /.Left col -->

</section><!-- /.content -->
</aside><!-- /.right-side -->
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
                                                                        "bFilter": true,
                                                                        "bSort": true,
                                                                        "bInfo": true,
                                                                        "bAutoWidth": false
                                                                    });
                                                                });
</script>