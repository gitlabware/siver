<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

    <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <!-- Begin: Content Header -->
        <div class="content-header">
            <h2> Formulario de Tarea</h2>
            <p class="lead">Para el proceso "Remision del expediente"</p>
        </div>

        <!-- Validation Example -->
        <div class="admin-form theme-primary mw1000 center-block" style="padding-bottom: 175px;">

            <div class="panel heading-border panel-primary">

                <form method="post" action="/" id="admin-form">

                    <div class="panel-body bg-light">

                        <div class="section-divider mt20 mb40">
                            <span> Tarea de Gonzalo </span>
                        </div>
                        <!-- .section-divider -->

                        <div class="section row">
                            <div class="col-md-6">
                                <div class="section">
                                    <label class="field select">
                                        <select id="language" name="language">
                                            <option value="">Asignar a...</option>
                                            <option value="EN">Jorge Teran</option>
                                            <option value="FR">Pedro Mendoza</option>
                                            <option value="SP">Yolanda Pinto</option>
                                            <option value="CH">Jose Chavez</option>
                                        </select>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>
                                <div class="section">
                                    <label for="datepicker1" class="field prepend-icon">
                                        <input type="text" id="datepicker1" name="datepicker1" class="gui-input" placeholder="Fecha Inicio">
                                        <label class="field-icon">
                                            <i class="fa fa-calendar-o"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="section">
                                    <label for="datepicker1" class="field prepend-icon">
                                        <input type="text" id="datepicker2" name="datepicker1" class="gui-input" placeholder="Fecha Fin">
                                        <label class="field-icon">
                                            <i class="fa fa-calendar-o"></i>
                                        </label>
                                    </label>
                                </div>
                                <div class="section">
                                    <label class="field select">
                                        <select id="language" name="language">
                                            <option value="">Seleccione Prioridad</option>
                                            <option value="EN">Urgente</option>
                                            <option value="FR">Alta</option>
                                            <option value="SP">Normal</option>
                                            <option value="CH">Baja</option>s
                                        </select>
                                        <i class="arrow double"></i>
                                    </label>
                                </div>

                            </div>
                            <!-- end section -->

                            <div class="col-md-6">
                                <div class="section" id="spy3">
                                    <label for="comment" class="field prepend-icon">
                                        <textarea class="gui-textarea"  id="comment" name="comment" placeholder="Tu Descripcion"></textarea>
                                        <label for="comment" class="field-icon">
                                            <i class="fa fa-comments"></i>
                                        </label>
                                        <span class="input-footer">
                                            <strong>Nota:</strong> Use este campo para describir la tarea
                                        </span>
                                    </label>
                                </div>
                                <div class="section">
                                    <label for="useremail" class="field prepend-icon">
                                        <input type="email" name="useremail" id="useremail" class="gui-input" placeholder="Porcentaje de la tarea">
                                        <label for="useremail" class="field-icon">
                                            <i class="fa fa-neuter"></i>
                                        </label>
                                    </label>

                                </div>
                            </div>
                            <!-- end section -->
                        </div>





                    </div>
                    <!-- end .form-body section -->
                    <div class="panel-footer text-right">
                        <button type="submit" class="button btn-primary"> Registrar Tarea </button>
                        <button type="reset" class="button"> Cancelar </button>
                    </div>
                    <!-- end .form-footer section -->
                </form>

            </div>

        </div>
        <!-- end: .admin-form -->

    </div>
    <!-- end: .tray-center -->

</section>
<?php echo $this->Html->script(array('jquery-ui-datepicker.min', 'inicalendario2'), array('block' => 'scriptjs')) ?>