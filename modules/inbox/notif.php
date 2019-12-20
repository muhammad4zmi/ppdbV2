<?php
                    
                    $tandai = mysqli_query($link, "SELECT Count(inbox.Processed) as tanda FROM inbox 
                    WHERE inbox.Processed='false'");
                    $t0 = mysqli_fetch_assoc($tandai);
                    $notif = $t0['tanda'];
                    
                     $tandai2 = mysqli_query($link,"select inbox.ID,SenderNumber,TextDecoded,
                     DATE(inbox.ReceivingDateTime) as tanggl,
                     TIME(inbox.ReceivingDateTime)as v_j,
                     TIMESTAMPDIFF(HOUR,inbox.ReceivingDateTime,NOW()) as jam,
                     TIMESTAMPDIFF(MINUTE,inbox.ReceivingDateTime,NOW()) as min
                     FROM inbox WHERE inbox.ID and inbox.Processed='false' 
                     order by  inbox.ReceivingDateTime desc limit 0,3") or die('Gagal');
                     $row = mysqli_num_rows($tandai2);
if ($row > 0) {
    ?>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php
        while ($list0 = mysqli_fetch_assoc($tandai2)) {
            ?>
                    <li>
                    
                    
                            <a class="pull-left border-green profile_thumb">
                              <i class="fa fa-user green"></i> Pengirim : <?php echo $list0['SenderNumber']?>
                            </a>
                            
                           
                    <li><a href="?admin=inbox&data=<?php echo $list0['ID']; ?>"><?=substr($list0['TextDecoded'],0,30) . " (" . $list0['SenderNumber'] . ")<br>"; ?>
                    <i>
                            <?php
                            if ($list0['min'] < 1) {
                                echo "Baru Saja Masuk";
                            } else if ($list0['min'] >= 1 and $list0['min'] < 60) {
                                echo "Masuk " . $list0['min'] . " Menit yg lalu";
                            } else if ($list0['jam'] > 0 and $list0['jam'] < 24) {
                                echo "Masuk " . $list0['jam'] . " Jam yg lalu";
                            } else if ($list0['jam'] >= 24 and $list0['jam'] < 48) { //jika Jam lebih dari 24 jam
                                echo "Masuk Kemarin, Pukul " . $list0['v_j'];
                            } else if ($list0['jam'] >= 48) { //jika Jam lebih dari 24 jam
                                echo "Masuk Pada " . $list0['tanggl'] . ", Pukul " . $list0['v_j'];
                            }
                            ?>
                        </i></a>
                        <a href="#" class="edit-record" data-id="<?php echo $list0['SenderNumber'];?>" title="" data-original-title="">
                                                    <button type="button" class="btn btn-info btn-flat btn-xs"><i class="fa fa-mail-reply"></i> Balas?</button>
                                                </a>
                        
                        </li>
    <?php } ?>
    
    <li>
                      <div class="text-center">
                        <a href="?admin=inbox">
                          <strong>Lihat Semua Pesan</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>


                    
    </ul>
    <?php 
}
?>

 <div class="modal fade" id="balas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-comment fa-fw fa-lg"></i> Balas Pesan</h4>
            </div>
            <div class="modal-body">

            </div>



        </div>
    </div>
</div>

               

              <!-- footer content -->
              <script src="../js/bootstrap-transition.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script>
  $(function(){
    $(document).on('click','.edit-record',function(e){
        e.preventDefault();
        $("#balas").modal('show');
        $.post('modules/inbox/hasil.php',
            {SenderNumber:$(this).attr('data-id')},

            function(html){
                $(".modal-body").html(html);
            }   
            );
    });
});

</script>