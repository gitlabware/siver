<section id="content" class=" animated fadeIn">

    <h2><?php echo $proceso['Proceso']['nombre'] ?> <small> <?php echo $flujo['FlujosUser']['descripcion'] ?></small></h2>
    <div class="panel mb25 mt5">

        <div class="panel">
            <div class="panel-menu p12 admin-form theme-primary">
                <div class="row">
                    <div class="col-md-4">
                        <a class="btn btn-dark btn-block" href="<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'enflujo', $flujo['FlujosUser']['id'])); ?>"><i class="fa fa-reply"></i> IR A FLUJO</a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-success btn-block" href="<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'tarea', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'])); ?>"><i class="fa fa-plus"></i> NUEVO TAREA</a>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Html->link('<i class="fa fa-stop"></i> FINALIZAR PROCESO', array('action' => 'finaliza_proceso', $flujo['FlujosUser']['id'], $proceso['Proceso']['id']), array('class' => 'btn btn-danger btn-block', 'escape' => false, 'confirm' => 'Esta seguro de finalizar el Proceso???')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-icon">
                <i class="fa fa-clock-o"></i>
            </span>
            <span class="panel-title"> Actividades</span>
        </div>
        <div class="panel-body ptn pbn p10">
            <?php foreach ($tareas as $ta): ?>
            <table class="table table-bordered">
                <tr>
                    <td>
                        <span class="fa fa-clock-o fa-lg"></span>
                    </td>
                </tr>
            </table>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="panel">
        <div class="panel-heading">
            <span class="panel-icon">
                <i class="fa fa-clock-o"></i>
            </span>
            <span class="panel-title"> Actividades</span>
        </div>
        <div class="panel-body ptn pbn p10">
            <ol class="timeline-list">
                <?php foreach ($tareas as $ta): ?>
                  <li class="timeline-item">
                      <div class="timeline-icon bg-dark light">
                          <span class="fa fa-tags"></span>
                      </div>
                      <div class="timeline-desc">

                      </div>
                      <div class="timeline-date"><?php echo $ta['Tarea']['created'] ?></div>
                      <b><?php echo $ta['User']['nombre_completo'] ?> fdsf vdsfs</b>
                      <?php
                      if (!empty($ta['Asignado']['nombre_completo'])) {
                        echo ' asigno a <b>' . $ta['Asignado']['nombre_completo'] . '</b> ';
                      }
                      ?>
                      <?php echo $ta['Tarea']['descripcion'] ?>
                      <a href="#">Ipod</a>
                      <small>
                          <?php
                          if (!empty($ta['Tarea']['fecha_inicio'])) {
                            echo 'Empieza ' . $ta['Tarea']['fecha_inicio'];
                          }
                          if (!empty($ta['Tarea']['fecha_fin'])) {
                            echo ' - Termina ' . $ta['Tarea']['fecha_fin'];
                          }
                          if (!empty($ta['Tarea']['porcentaje'])) {
                            echo ' - Porcentaje ' . $ta['Tarea']['porcentaje'];
                          }
                          ?>
                      </small>
                  </li>
                <?php endforeach; ?>
                <li class="timeline-item">
                    <div class="timeline-icon bg-dark light">
                        <span class="fa fa-tags"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Michael</b> Added to his store:
                        <a href="#">Ipod</a>
                    </div>
                    <div class="timeline-date">1:25am</div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon bg-dark light">
                        <span class="fa fa-tags"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Sara</b> Added his store:
                        <a href="#">Notebook</a>
                    </div>
                    <div class="timeline-date">3:05am</div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon bg-success">
                        <span class="fa fa-usd"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Admin</b> created invoice for:
                        <a href="#">Software</a>
                    </div>
                    <div class="timeline-date">4:15am</div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon bg-success">
                        <span class="fa fa-usd"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Admin</b> created invoice for:
                        <a href="#">Apple</a>
                    </div>
                    <div class="timeline-date">7:45am</div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon bg-success">
                        <span class="fa fa-usd"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Admin</b> created invoice for:
                        <a href="#">Software</a>
                    </div>
                    <div class="timeline-date">4:15am</div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon bg-success">
                        <span class="fa fa-usd"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Admin</b> created invoice for:
                        <a href="#">Apple</a>
                    </div>
                    <div class="timeline-date">7:45am</div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon bg-dark light">
                        <span class="fa fa-tags"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Michael</b> Added his store:
                        <a href="#">Ipod</a>
                    </div>
                    <div class="timeline-date">8:25am</div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon bg-system">
                        <span class="fa fa-fire"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Admin</b> created invoice for:
                        <a href="#">Software</a>
                    </div>
                    <div class="timeline-date">4:15am</div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-icon bg-dark light">
                        <span class="fa fa-tags"></span>
                    </div>
                    <div class="timeline-desc">
                        <b>Sara</b> Added to his store:
                        <a href="#">Notebook</a>
                    </div>
                    <div class="timeline-date">3:05am</div>
                </li>
            </ol>
        </div>
    </div>

    <div id="timeline" class="timeline-single mt30">

        <!-- Timeline Divider -->
        <div class="timeline-divider mtn">
            <div class="divider-label">Sucesos</div>
            <div class="pull-right">
                <button id="timeline-toggle" class="btn btn-default btn-sm">
                    <span class="ad ad-lines fs16 lh20"></span>
                </button>
            </div>
        </div>

        <div class="row">

            <!-- Timeline - Left Column -->
            <div class="col-sm-6 left-column">
                <div class="timeline-item">
                    <div class="timeline-icon">
                        <span class="fa fa-edit text-warning"></span>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs">Working Content Form</span>
                            <ul class="nav panel-tabs">
                                <li class="active">
                                    <a href="#tab1" data-toggle="tab">Image</a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">Basic</a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="admin-form theme-primary">
                                <div class="tab-content pn pt10 border-none">

                                    <div id="tab1" class="tab-pane active">
                                        <form id="timeline-image-form" role="form">

                                            <div class="fileupload fileupload-new" data-provides="fileupload">

                                                <div class="tab-body">
                                                    <div class="fileupload-preview thumbnail">
                                                        <img data-src="holder.js/100%x140" alt="holder">
                                                    </div>
                                                    <div class="row mv25">
                                                        <div class="col-md-3">
                                                            <span class="button btn-system btn-file btn-block">
                                                                <span class="fileupload-new">Select image</span>
                                                                <span class="fileupload-exists">Change File</span>
                                                                <input type="file">
                                                            </span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="name2" class="field prepend-icon">
                                                                <input type="text" name="name2" id="name2" class="event-name gui-input" placeholder="Event Title">
                                                                <label for="name2" class="field-icon">
                                                                    <i class="fa fa-pencil"></i>
                                                                </label>
                                                            </label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="date2" class="field prepend-icon">
                                                                <input type="text" name="date2" id="date2" class="datepicker gui-input" placeholder="Event Date">
                                                                <label for="date2" class="field-icon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </label>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="panel-footer mhn15 mbn15">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <a href="#" class="button btn-danger btn-block fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                        </div>
                                                        <div class="col-md-9 text-right">
                                                            <button type="submit" class="button btn-primary submit-btn">Create Event</button>
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- end .form-footer section -->

                                            </div>

                                        </form>
                                    </div>

                                    <div id="tab2" class="tab-pane">
                                        <form id="timeline-basic-form" role="form">

                                            <div class="section row">

                                                <div class="col-md-6">
                                                    <label for="name1" class="field prepend-icon">
                                                        <input type="text" name="name1" id="name1" class="event-name gui-input" placeholder="Event Title">
                                                        <label for="name1" class="field-icon">
                                                            <i class="fa fa-pencil"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <!-- end section -->

                                                <div class="col-md-6">
                                                    <label for="date1" class="field prepend-icon">
                                                        <input type="text" name="date1" id="date1" class="datepicker gui-input" placeholder="First name">
                                                        <label for="date1" class="field-icon">
                                                            <i class="fa fa-calendar"></i>
                                                        </label>
                                                    </label>
                                                </div>
                                                <!-- end section -->

                                            </div>
                                            <!-- end section row section -->

                                            <div class="section mb30">
                                                <label class="field prepend-icon">
                                                    <textarea class="event-desc gui-textarea" id="desc1" name="desc1" placeholder="Type the description for the event here..."></textarea>
                                                    <label for="desc1" class="field-icon">
                                                        <i class="fa fa-comments"></i>
                                                    </label>
                                                    <span class="input-footer">
                                                        <strong>Hint:</strong> Don't be negative or off topic! just be awesome...</span>
                                                </label>
                                            </div>
                                            <!-- end section row section -->

                                            <div class="panel-footer mhn15 mbn15 text-right">
                                                <button type="submit" class="button btn-primary submit-btn">Create Event</button>
                                            </div>
                                            <!-- end .form-footer section -->

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($linea_tiempo as $li): ?>
                  <?php
                  $tarea = $this->requestAction(array('controller' => 'Tareas', 'action' => 'get_tarea', $li[0]['id']));
                  ?>
                  <div class="timeline-item">
                      <div class="timeline-icon">
                          <span class="fa fa-edit text-warning"></span>
                      </div>
                      <div class="panel">
                          <div class="panel-heading">
                              <span class="panel-title hidden-xs"><?php echo $li[0]['nombre_completo'] . ' - ' . $li[0]['created'] ?></span>
                              <ul class="nav panel-tabs">
                                  <li class="active">
                                      <a href="#<?php echo $li[0]['tipo_t'] . '-' . $li[0]['id'] ?>-1" data-toggle="tab">Tarea</a>
                                  </li>
                                  <?php if ($this->Session->read('Auth.User.id') == $tarea['Tarea']['user_id']): ?>
                                    <li>
                                        <a href="#<?php echo $li[0]['tipo_t'] . '-' . $li[0]['id'] ?>-2" data-toggle="tab">Editar</a>
                                    </li>
                                  <?php endif; ?>
                              </ul>
                          </div>
                          <div class="panel-body">
                              <div class="admin-form theme-primary">
                                  <div class="tab-content pn pt10 border-none">
                                      <div id="<?php echo $li[0]['tipo_t'] . '-' . $li[0]['id'] ?>-1" class="tab-pane active">
                                          <blockquote class="mbn ml10">
                                              <h4>Asignado a: <?php echo $tarea['Asignado']['nombre_completo']; ?></h4>
                                              <p><?php echo $tarea['Tarea']['descripcion']; ?></p>

                                          </blockquote>
                                      </div>
                                      <div id="<?php echo $li[0]['tipo_t'] . '-' . $li[0]['id'] ?>-2" class="tab-pane">
                                          <form id="timeline-basic-form" role="form">

                                              <div class="section row">

                                                  <div class="col-md-6">
                                                      <label for="name1" class="field prepend-icon">
                                                          <input type="text" name="name1" id="name1" class="event-name gui-input" placeholder="Event Title">
                                                          <label for="name1" class="field-icon">
                                                              <i class="fa fa-pencil"></i>
                                                          </label>
                                                      </label>
                                                  </div>
                                                  <!-- end section -->

                                                  <div class="col-md-6">
                                                      <label for="date1" class="field prepend-icon">
                                                          <input type="text" name="date1" id="date1" class="datepicker gui-input" placeholder="First name">
                                                          <label for="date1" class="field-icon">
                                                              <i class="fa fa-calendar"></i>
                                                          </label>
                                                      </label>
                                                  </div>
                                                  <!-- end section -->

                                              </div>
                                              <!-- end section row section -->

                                              <div class="section mb30">
                                                  <label class="field prepend-icon">
                                                      <textarea class="event-desc gui-textarea" id="desc1" name="desc1" placeholder="Type the description for the event here..."></textarea>
                                                      <label for="desc1" class="field-icon">
                                                          <i class="fa fa-comments"></i>
                                                      </label>
                                                      <span class="input-footer">
                                                          <strong>Hint:</strong> Don't be negative or off topic! just be awesome...</span>
                                                  </label>
                                              </div>
                                              <!-- end section row section -->

                                              <div class="panel-footer mhn15 mbn15 text-right">
                                                  <button type="submit" class="button btn-primary submit-btn">Create Event</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Timeline Divider -->
        <div class="timeline-divider">
            <div class="divider-label">Sucesos</div>
        </div>

    </div>
</section>

<script>
  $('#carga-proc').load('<?php echo $this->Html->url(array('controller' => 'Procesos', 'action' => 'verproceso', $flujo['FlujosUser']['id'], $proceso['Proceso']['id'])); ?>', function () {

  });
</script>