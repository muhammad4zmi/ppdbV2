<html>
    <head>
        <title>Kirim SMS Informasi</title>
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
                  <h2><strong><big>Kirim Informasi</big></strong></h2>
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
                <div class="x_content">
                
                   <div class="tabs-x tabs-above tab-align-left tab-bordered">
                       <ul id="w1" class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#fa-icons" data-toggle="tab"><i class="fa fa-user"></i>  Kirim Pesan Individu</a></li>
                            <li><a href="#glyphicons" data-toggle="tab"><i class="fa fa-users"></i>  Kirim Pesan Group</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- Font Awesome icons -->
                            <div class="tab-pane active" id="fa-icons" >
                                <section id="new">
                                    <div class="box-body">

                                        <form action="index.php?admin=kirim_personal" name="form1" method="post">
                                            <div class="form-group">
                                                <div class="col-lg-12" id="pesan">        
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="inputNomer">Nomer Tujuan</label>
                                                <input type="text" name="nomer" id="inputNomer" class="form-control" placeholder="Masukkan Nomer Tujuan +62xx"/>
                                            </div>

                                            <div class="form-group">
                                                <label>Isi Pesan*</label><br>
                                            <span><font color="Red">Di Larang Memasukkan karakter tanda petik (') dalam pesan/informasi.!</font></span>
                                                <textarea class="form-control" rows="3" name="pesan" 
                                                          OnFocus="Count();" OnClick="Count();" onKeydown="Count();"
                                                          OnChange="Count();" onKeyup="Count();"  placeholder="Masukkan Pesan"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Maksimal Karakter:</label>
                                                <input type="text" class="form-control input-sm" size="5" maxlength="5" style="width: 50px;" name="counter" readonly="" placeholder="160">


                                            </div>

                                            <div class="box-footer clearfix">
                                                <button class="pull-right btn btn-success btn-flat" type="submit">Kirim Pesan <i class="fa fa-arrow-circle-right"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                            <div class="tab-pane" id="glyphicons">
                                <div class="box-body">

                                    <form action="index.php?admin=kirim_semua" method="post">
                                        <div class="form-group">
                                            <label>Tujuan Penerima</label><br>
                                            <select name="tujuan" class="form-control">
                                            <option value="">Pilih Tujuan:</option>
                                            <option value="Semua">Semua</option>
                                           
                                                
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Isi Pesan*</label><br>
                                            <span><font color="Red">Di Larang Memasukkan karakter tanda petik (') dalam pesan/informasi.!</font></span>
                                            <textarea class="form-control" name="message" rows="3" placeholder="Masukkan Pesan"></textarea>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <button type="submit"  name="send1" class="pull-right btn btn-success btn-flat">Kirim Pesan <i class="fa fa-arrow-circle-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                </div>
                </div>
                

                <!-- Main row -->



            </section><!-- /.Left col -->


        </aside><!-- /.right-side -->
    </body>
    <script src="http://127.0.0.1/SMS/pembayaran/js/select2.js" type="text/javascript"></script>
<script src="http://127.0.0.1/SMS/pembayaran/js/select2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#group").select2({
            placeholder: 'Pilih Group atau Ketik Nama Group',
            allowClear: true
        });
    });
</script>
</html>

