<aside id="sidebar_left" class="nano nano-primary affix">

    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
            <li class="sidebar-label pt20">Menu</li>
            <li>
                <a href="javascript:" class="accordion-toggle">
                    <span class="fa fa-users"></span>
                    <span class="sidebar-title">Usuarios</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="<?php echo $this->Html->url(array('controller' => 'Users','action' => 'index')); ?>">
                            Listado de Usuarios</a>
                    </li>
                    <li>
                        <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'usuario')); ?>');">
                            Nuevo Usuario</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo $this->Html->url(array('controller' => 'Flujos', 'action' => 'index')); ?>">
                    <span class="fa fa-square-o"></span>
                    <span class="sidebar-title">FLUJOS</span>
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