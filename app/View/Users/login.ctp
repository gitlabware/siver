
<div class="row mb15 table-layout">
    <div class="col-xs-6 va-m pln">
        <a href="javascript:" title="Return to Dashboard">
            <img src="<?php echo $this->request->webroot; ?>img/logos/logo_white.png" title="Sistema de facturacion de recargas" class="img-responsive w250">
        </a>
    </div>
</div>

<div class="panel panel-info mt10 br-n">

    <!-- end .form-header section -->
    <?php echo $this->Form->create('User',['class' => 'form-validacion']);?>
        <div class="panel-body bg-light p30">
            <div class="row">
                <div class="col-sm-12 pr30">
                    <div class="section">
                        <label for="username" class="field-label text-muted fs18 mb10">Usuario</label>
                        <label for="username" class="field prepend-icon">
                            <?php echo $this->Form->text('username',['class' => 'gui-input','placeholder' => 'Ingrese el usuario','required']);?>
                            <label for="username" class="field-icon">
                                <i class="fa fa-user"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                    <div class="section">
                        <label for="username" class="field-label text-muted fs18 mb10">Contrase&ntilde;a</label>
                        <label for="password" class="field prepend-icon">
                            <?php echo $this->Form->password('password',['class' => 'gui-input','placeholder' => 'Ingrese la contrasena','required']);?>
                            <label for="password" class="field-icon">
                                <i class="fa fa-lock"></i>
                            </label>
                        </label>
                    </div>
                    <!-- end section -->

                </div>
            </div>
        </div>
        <!-- end .form-body section -->
        <div class="panel-footer clearfix p10 ph15">
            <button type="submit" class="button btn-primary mr10 pull-right">Ingresar</button>
        </div>
        <!-- end .form-footer section -->
    <?php echo $this->Form->end();?>
</div>
<?php
echo $this->Html->script([
  'jquery.validate.min',
  'inivalidacion_reg'
  ], ['block' => 'addjs']);
?>