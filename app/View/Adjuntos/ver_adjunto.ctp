
<div class="panel-heading">
    <span class="panel-title">
        <i class="fa fa-file"></i>Archivo</span>
</div>
<!-- end .panel-heading section -->



<div class="panel-body p25">

    <?= $this->Form->create('Adjunto', ['action' => 'eliminar_archivo','id' => 'ideliminar']); ?>
    <div class="section row">
        <div class="col-md-12">
            <?php echo $this->Form->hidden('direccion', array('value' => $direccion)); ?>
            <button class="btn btn-danger btn-block" type="button" onclick="if(confirm('Esta seguro de eliminar el archivo??')){$('#ideliminar').submit();}">Eliminar</button>
            <?php //echo $this->Form->submit('Eliminar', array('class' => 'btn btn-danger btn-block')); ?>
        </div>
    </div>
    <?= $this->Form->end(); ?>
</div>
<!-- end .form-body section -->

<script>

</script>