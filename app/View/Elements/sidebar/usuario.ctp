<aside id="sidebar_left" class="nano nano-primary affix">
    <div class="sidebar-left-content nano-content">
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Menu</li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'tablero')); ?>">
                    <span class="fa fa-dashboard"></span>
                    <span class="sidebar-title">Principal</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'Adjuntos', 'action' => 'index')); ?>">
                    <span class="fa fa-files-o"></span>
                    <span class="sidebar-title">Archivos</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'calendario')); ?>">
                    <span class="fa fa-calendar"></span>
                    <span class="sidebar-title">Calendario</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'index2')); ?>">
                    <span class="fa fa-square-o"></span>
                    <span class="sidebar-title">Recursos</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'Tareas', 'action' => 'index')); ?>">
                    <span class="fa fa-tasks"></span>
                    <span class="sidebar-title">TAREAS</span>
                </a>
            </li>
        </ul>
        <!-- End: Sidebar Menu -->

        <!-- Start: Sidebar Collapse Button -->
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
        <!-- End: Sidebar Collapse Button -->

    </div>
    <!-- End: Sidebar Left Content -->

</aside>