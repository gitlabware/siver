<link rel="stylesheet" type="text/css" href="<?php echo $this->request->webroot; ?>js/vendor/plugins/fullcalendar/fullcalendar.min.css" media="screen">
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
    <!-- begin: .tray-left -->
    <aside class="tray tray-left tray290" data-tray-mobile="#content > .tray-center">
        <!-- Demo HTML - Via JS we insert a cloned fullcalendar title -->
        <div class="fc-title-clone"></div>
        <!-- Demo HTML - Via JS we insert a sync minicalendar -->
        <div class="section admin-form theme-primary">
            <div class="inline-mp minimal-mp center-block"></div>
        </div>
        <h4 class="mt25"> Tareas Recientes
            <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'tarea_ajax')); ?>', true);">
                <span class="fa fa-plus-square"></span>
            </a>
        </h4>
        <hr class="mv15 br-light">
        <div id="external-events" class="bg-dotted">

            <!-- Standard Events -->
            <?php foreach ($tareas_re as $ta): ?>
            <div class='fc-event fc-event-primary' onclick="window.location = '<?php echo $this->Html->url(array('controller' => 'Tareas','action' => 'ver_tarea',$ta['Tarea']['flujos_user_id'],$ta['Tarea']['proceso_id'],$ta['Tarea']['id']))?>';" data-event="primary" data-permiso="no" data-miid="<?php echo $ta['Tarea']['id'] ?>">
                  <div class="fc-event-icon">
                      <span class="fa fa-tasks"></span>
                  </div>
                  <div class="fc-event-desc">
                      <b><?php echo $ta['Tarea']['created'] ?> </b><?php echo $ta['Tarea']['descripcion'] ?></div>
              </div>
            <?php endforeach; ?>


            <!-- Reoccuring Events -->
            <h6 class="mt20"> Tareas Pendientes: </h6>
            <?php foreach ($tareas_pe as $ta): ?>
              <div class="fc-event fc-event-system"  onclick="window.location = '<?php echo $this->Html->url(array('controller' => 'Tareas','action' => 'ver_tarea',$ta['Tarea']['flujos_user_id'],$ta['Tarea']['proceso_id'],$ta['Tarea']['id']))?>';" data-event="system" data-permiso="si" data-miid="<?php echo $ta['Tarea']['id'] ?>">
                  <div class="fc-event-icon">
                      <span class="fa fa-clock-o"></span>
                  </div>
                  <div class="fc-event-desc">
                      <b><?php echo $ta['Tarea']['created'] ?> </b><?php echo $ta['Tarea']['descripcion'] ?></div>
              </div>
            <?php endforeach; ?>

        </div>

        <h4 class="mt30"> Etiquetas </h4>

        <hr class="mv15 br-light">

        <ul class="list-group">
            <li class="list-group-item">
                <span class="badge badge-primary">14</span>
                Docuementos Importantes
            </li>
            <li class="list-group-item">
                <span class="badge badge-success">9</span>
                Encuentros
            </li>
            <li class="list-group-item">
                <span class="badge badge-info">11</span>
                Reuniones
            </li>
            <li class="list-group-item">
                <span class="badge badge-warning">18</span>
                Pendientes
            </li>

        </ul>


    </aside>
    <!-- end: .tray-left -->

    <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <!-- Calendar -->
        <div id='calendar' class="admin-theme"></div>

    </div>
    <!-- end: .tray-center -->

</section>
<!-- End: Content -->


<?php
echo $this->Html->script(array(
  'jquery-ui-monthpicker.min',
  'jquery-ui-datepicker.min',
  'vendor/plugins/fullcalendar/lib/moment.min',
  'vendor/plugins/fullcalendar/fullcalendar.min',
  'inifullcalendario'
  ), array('block' => 'scriptjs'));
?>
<script>
  var urldatjson = '<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'get_json_tareas')); ?>';

//  
  function saveMyData(event) {
      /*jQuery.post(
       '/event/save',
       {
       title: event.title,
       start: event.start,
       end: event.end
       }
       );*/
      //alert(event.id);

      //var postData = event.serializeArray();;
      var fecha_inicio = '';
      var fecha_fin = '';
      if (event.start !== null) {
          fecha_inicio = $.fullCalendar.moment(event.start).format('YYYY-MM-DD HH:mm');
          //alert($.fullCalendar.moment(event.start).format('YYYY-MM-DD HH:mm'));
      }
      if (event.end !== null) {
          fecha_fin = $.fullCalendar.moment(event.end).format('YYYY-MM-DD HH:mm');
      }

      var formURL = '<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'registra_fecha')) ?>';
      $.ajax(
              {
                  url: formURL,
                  type: "POST",
                  data: 'id=' + event.id + '&title=' + event.title + '&start=' + fecha_inicio + '&end=' + fecha_fin,
                  success: function (data, textStatus, jqXHR)
                  {
                      //data: return data from server
                      //$("#parte").html(data);
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      //if fails   
                      alert("error");
                  }
              });
  }
</script>