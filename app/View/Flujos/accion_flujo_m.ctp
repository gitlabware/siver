<?php if (!empty($flujos)): ?>
  <div class="panel">
      <div class="panel-heading">
          <span class="fa fa-star-o mr5"></span> Flujos Creados
      </div>
      <div class="panel-body p5">
          <?php foreach ($flujos as $flu): ?>
            <blockquote class="blockquote-info" style="cursor: pointer;" onclick="window.location = '<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'enflujo', $flu['FlujosUser']['id'])); ?>';">
                <p>
                    <small class="text-muted text-right"><?php echo $flu['FlujosUser']['created']; ?></small>
                    <b class="text-primary"><?php echo $flu['User']['nombre_completo']; ?></b> 
                    <?php echo $flu['FlujosUser']['descripcion']; ?>
                </p>
            </blockquote>
          <?php endforeach; ?>
      </div>
  </div>
<?php endif; ?>