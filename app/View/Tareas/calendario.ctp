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
        <h4 class="mt25"> Tareas Pendientes
            <a id="compose-event-btn" href="#calendarEvent" data-effect="mfp-flipInY">
                <span class="fa fa-plus-square"></span>
            </a>
        </h4>
        <hr class="mv15 br-light">
        <div id="external-events" class="bg-dotted">

            <!-- Standard Events -->
            <div class='fc-event fc-event-primary' data-event="primary">
                <div class="fc-event-icon">
                    <span class="fa fa-exclamation"></span>
                </div>
                <div class="fc-event-desc">
                    <b>2:30am - </b>Evaluacion de Procesos de Jorge</div>
            </div>
            <div class='fc-event fc-event-info' data-event="info">
                <div class="fc-event-icon">
                    <span class="fa fa-info"></span>
                </div>
                <div class="fc-event-desc">
                    <b>2:30am - </b>Presentacion de ambas partes</div>
            </div>
            <div class='fc-event fc-event-success' data-event="success">
                <div class="fc-event-icon">
                    <span class="fa fa-check"></span>
                </div>
                <div class="fc-event-desc">
                    <b>2:30am - </b>Importante para Miguel</div>
            </div>
            <div class='fc-event fc-event-warning' data-event="warning">
                <div class="fc-event-icon">
                    <span class="fa fa-question"></span>
                </div>
                <div class="fc-event-desc">
                    <b>2:30am - </b>Recoger papeles de CFVG</div>
            </div>

            <!-- Reoccuring Events -->
            <h6 class="mt20"> Tareas Pendientes: </h6>
            <div class='fc-event fc-event-alert event-recurring' data-event="alert">
                <div class="fc-event-icon">
                    <span class="fa fa-clock-o"></span>
                </div>
                <div class="fc-event-desc">
                    <b>2:30am - </b>LLamadas Urgentes</div>
            </div>
            <div class='fc-event fc-event-system event-recurring' data-event="system">
                <div class="fc-event-icon">
                    <span class="fa fa-bell-o"></span>
                </div>
                <div class="fc-event-desc">
                    <b>2:30am - </b>Nelson Cabrera</div>
            </div>

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