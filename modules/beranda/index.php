<?php
$q = mysqli_query($link,'select ID, ReceivingDateTime,SenderNumber,TextDecoded from inbox where ID') or die('Gagal');
$counter = 0;
$now = date('Y-m-d');
$online = date('d-m-Y');
$jam = date("h:m");
while ($r = mysqli_fetch_array($q)) {
    $a = $r['ReceivingDateTime'];
    $pengirim = $r['SenderNumber'];
    $pesan = $r['TextDecoded'];
    $tgl = substr($a, 0, 10);
    if ($tgl == $now)
   
    $counter++;
}
?>
<div class="row">

<div class="col-md-5 col-sm-5 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Petunjuk Alur <small>Pendaftaran</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                 
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <ul class="list-unstyled timeline">
                  <li>
                    <div class="block">
                      <div class="tags">
                        <a href="" class="tag">
                          <span>Alur 1</span>
                        </a>
                      </div>
                      <div class="block_content">
                        <h2 class="title">
                                        <a>Langakah 1</a>
                                    </h2>
                        
                        <p class="excerpt">Calon Siswa Baru Mengisi Formulir Pendaftaran yang sudah di siapkan PANITIA</a>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="tags">
                        <a href="" class="tag">
                          <span>Alur 2</span>
                        </a>
                      </div>
                      <div class="block_content">
                        <h2 class="title">
                                        <a>Langkah 2</a>
                                    </h2>
                        
                        <p class="excerpt">Siswa Baru Melengkapi Berkas- Berkas Pendaftaran</a>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="tags">
                        <a href="" class="tag">
                          <span>Alur 3</span>
                        </a>
                      </div>
                      <div class="block_content">
                        <h2 class="title">
                                        <a>Langkah 3</a>
                                    </h2>
                        
                        <p class="excerpt">Panitia Memasukkan data siswa baru kedalam sistem, kemudian panitia mencetak lembar keterangan yang disatukan dengan KWITANSI dan diberikan ke SISWA BARU</a>
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>

              </div>
            </div>
          </div>
       
            <div class="col-md-7 col-sm-7 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Kalender Kegiatan <small>MA Mu'allimin NW Anjani</small></h2>

                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#" data-toggle="modal" data-target="#CalenderModalNew">Tambah Kegiatan</a>
                        </li>
                        
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div id='calendar'></div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- footer content -->
       
        <!-- /footer content -->

      </div>


      <!-- Start Calender modal -->
      <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel">Tambah Kegiatan</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal" style="padding: 5px 20px;">
                <form id="antoform" class="form-horizontal calender" role="form" method="POST" action="modules/beranda/simpan_event.php">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Kegiatan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title" name="title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Start</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" class="form-control" name="start" data-inputmask="'mask': '99/99/9999'">
                        <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">End</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" class="form-control" name="end" data-inputmask="'mask': '99/99/9999'">
                        <span class="fa fa-calendar-o form-control-feedback right" aria-hidden="true"></span>
                      </div>
                  </div>
                  <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose" data-dismiss="modal"><i class="fa fa-close"></i>Keluar</button>
              <button type="submit" class="btn btn-primary antosubmit"><i class="fa fa-save"></i> Simpan</button>
            </div>
                </form>

              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Edit Calender Entry</h4>
            </div>
            <div class="modal-body">

              <div id="testmodal2" style="padding: 5px 20px;">
                <form id="antoform2" class="form-horizontal calender" role="form">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title2" name="title2">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
      <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>

      <!-- End Calender modal -->
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  
  <!-- bootstrap progress js -->
 

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

  <script>
    $(window).load(function() {

      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
      var started;
      var categoryClass;

      var calendar = $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          $('#fc_create').click();

          started = start;
          ended = end

          $(".antosubmit").on("click", function() {
            var title = $("#title").val();
            if (end) {
              ended = end
            }
            categoryClass = $("#event_type").val();

            if (title) {
              calendar.fullCalendar('renderEvent', {
                  title: title,
                  start: started,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            $('#title').val('');
            calendar.fullCalendar('unselect');

            $('.antoclose').click();

            return false;
          });
        },
        eventClick: function(calEvent, jsEvent, view) {
          //alert(calEvent.title, jsEvent, view);

          $('#fc_edit').click();
          $('#title2').val(calEvent.title);
          categoryClass = $("#event_type").val();

          $(".antosubmit2").on("click", function() {
            calEvent.title = $("#title2").val();

            calendar.fullCalendar('updateEvent', calEvent);
            $('.antoclose2').click();
          });
          calendar.fullCalendar('unselect');
        },
        editable: true,
        events: [{
          title: 'All Day Event',
          start: new Date(y, m, 1)
        }, {
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2)
         }]
        //   title: 'Meeting',
        //   start: new Date(y, m, d, 10, 30),
        //   allDay: false
        // }, {
        //   title: 'Lunch',
        //   start: new Date(y, m, d + 14, 12, 0),
        //   end: new Date(y, m, d, 14, 0),
        //   allDay: false
        // }, {
        //   title: 'Birthday Party',
        //   start: new Date(y, m, d + 1, 19, 0),
        //   end: new Date(y, m, d + 1, 22, 30),
        //   allDay: false
        // }, {
        //   title: 'Click for Google',
        //   start: new Date(y, m, 28),
        //   end: new Date(y, m, 29),
        //   url: 'http://google.com/'
        // }]
      });
    });
  </script>
  <script>
  $(document).ready(function() {  
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      allDayDefault: true,
      editable: false,
      events: {
        url: 'modules/beranda/get-events.php',
        error: function() {
          $('#script-warning').show();
        }
      },
      loading: function(bool) {
        $('#loading').toggle(bool);
      }
    });
    
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
        text: "Selamat Datang di Sistem PPDB MA Mu'allimin NW Anjani!! <br> Ada <strong><?php echo $counter;?></strong> Pesan Masuk Hari ini, Silahkan di buka..!!" ,
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

