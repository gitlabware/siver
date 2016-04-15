
<!-- begin: .tray-center -->
<div class="tray tray-center">

    <div class="mw1000 center-block">

        <!-- Begin: Content Header -->
        <div class="content-header">
            <h2> Registro del cliente</h2>
        </div>

        <!-- Begin: Admin Form -->
        <div class="admin-form">

            <div class="panel heading-border">
                <?php echo $this->Form->create('Cliente', array('class' => 'form-validacion', 'id' => 'f-add')); ?>
                <div class="panel-body bg-light">
                    <div class="section-divider mb40" id="spy1">
                        <span>Datos basicos del cliente</span>
                    </div>
                    <!-- .section-divider -->

                    <!-- Basic Inputs -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('nombre', array('class' => 'gui-input', 'placeholder' => 'Nombre Completo', 'required')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('ci', array('class' => 'gui-input', 'placeholder' => 'C.I.')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-credit-card"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Input Icons -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('domicilio', array('class' => 'gui-input', 'placeholder' => 'Domicilio')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('ciudad', array('class' => 'gui-input', 'placeholder' => 'Ciudad')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-pencil"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('pais', array('class' => 'gui-input', 'placeholder' => 'Pais')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-pencil"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('telefono', array('class' => 'gui-input', 'placeholder' => 'Telefono')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-phone"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('celular', array('class' => 'gui-input', 'placeholder' => 'Celular')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-mobile"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('fax', array('class' => 'gui-input', 'placeholder' => 'Fax')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-fax"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('telefono_referencia', array('class' => 'gui-input', 'placeholder' => 'Telefono Referencia')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-phone"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('nombre_contacto', array('class' => 'gui-input', 'placeholder' => 'Nombre de contacto')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="section-divider mb40" id="spy1">
                        <span>Datos Especificos</span>
                    </div>
                    <!-- Input Formats -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('razon_social', array('class' => 'gui-input', 'placeholder' => 'Nombre Razon Social')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-pencil"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('representante_legal', array('class' => 'gui-input', 'placeholder' => 'Representante Legal')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-user"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('ci_representante', array('class' => 'gui-input', 'placeholder' => 'C.I.')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-credit-card"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('domicilio_legal', array('class' => 'gui-input', 'placeholder' => 'Domicilio')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('ciudad_representante', array('class' => 'gui-input', 'placeholder' => 'Ciudad')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-pencil"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('pais_representante', array('class' => 'gui-input', 'placeholder' => 'Pais')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-pencil"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('telefono_representante', array('class' => 'gui-input', 'placeholder' => 'Telefono')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-phone"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('celular_representante', array('class' => 'gui-input', 'placeholder' => 'Celular')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-mobile"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('fax_representante', array('class' => 'gui-input', 'placeholder' => 'Fax')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-fax"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('nit', array('class' => 'gui-input', 'placeholder' => 'Nit')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-credit-card"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('email', array('class' => 'gui-input', 'placeholder' => 'E-mail')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-envelope"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('matricula_comercio', array('class' => 'gui-input', 'placeholder' => 'Matricula Comercio')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-credit-card"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="section">
                                <label class="field prepend-icon">
                                    <?php echo $this->Form->text('web', array('class' => 'gui-input', 'placeholder' => 'Pagina Web')); ?>
                                    <label for="firstname" class="field-icon">
                                        <i class="fa fa-globe"></i>
                                    </label>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end .form-body section -->
                <div class="panel-footer text-right">
                    <button type="submit" class="button btn-primary"> Guardar </button>
                    <button type="reset" class="button"> Cancelar </button>
                </div>
                <!-- end .form-footer section -->
                <?php echo $this->Form->hidden('id'); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php
echo $this->Html->script([
    'jquery.validate.min',
    'inivalidacion_reg'
]);
?>