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
        <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <?php echo $this->Session->read('Auth.User.username') ?>
            <span class="caret caret-tp hidden-xs"></span>
        </a>
        <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="list-group-item">
                <a href="#" class="animated animated-short fadeInUp">
                    <span class="fa fa-gear"></span> Account Settings </a>
            </li>
            <li class="list-group-item">
                <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'salir')); ?>" class="animated animated-short fadeInUp">
                    <span class="fa fa-power-off"></span> Salir </a>
            </li>
        </ul>
    </li>
</ul>