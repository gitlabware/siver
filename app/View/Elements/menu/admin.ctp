<ul class="nav navbar-nav navbar-left">
    <li>
        <a class="topbar-menu-toggle" href="javascript:">
            <span class="ad ad-wand fs16"></span>
        </a>
    </li>
</ul>
<?php echo $this->fetch('bbuscador'); ?>

<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" title="Alerta de Tareas Vencidas" href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Tareas','action' => 'ver_a_tar_ven')); ?>');">
            <i class="fa fa-tasks fs18"></i>
            <span class="badge badge-hero badge-danger"><?php echo $this->requestAction(array('controller' => 'Tareas','action' => 'get_a_tar_ven')) ?></span>
        </a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown"title="Alerta de Procesos Vencidos" href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Tareas','action' => 'ver_a_prof_ven')); ?>');">
            <i class="fa fa-th-large fs18"></i>
            <span class="badge badge-hero badge-danger"><?php echo $this->requestAction(array('controller' => 'Tareas','action' => 'get_a_prof_ven')) ?></span>
        </a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" title="Alerta de Procesos a vencer" href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Tareas','action' => 'ver_a_pro_ven')); ?>');">
            <i class="fa fa-dedent fs18"></i>
            <span class="badge badge-hero badge-danger"><?php echo $this->requestAction(array('controller' => 'Tareas','action' => 'get_a_pro_ven')) ?></span>
        </a>
    </li>
    <li class="dropdown">

        <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <?php echo $this->Session->read('Auth.User.username') ?>
            <span class="caret caret-tp hidden-xs"></span>
        </a>
        <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="list-group-item">
                <a href="javascript:" class="animated animated-short fadeInUp" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Users','action' => 'usuario',$this->Session->read('Auth.User.id')))?>');">
                    <span class="fa fa-edit"></span> Editar Cuenta </a>
            </li>
            <li class="list-group-item">
                <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'salir')); ?>" class="animated animated-short fadeInUp">
                    <span class="fa fa-power-off"></span> Salir </a>
            </li>
        </ul>
    </li>
</ul>

<script type="text/javascript">
  $('.topbar-menu-toggle').click(
          function ()
          {
              $('html,body').animate({scrollTop: '0px'}, 500);
            return false;
          }
  );
</script>