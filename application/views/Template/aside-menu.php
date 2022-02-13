<div class="col-2 aside m-0 p-0">
    <div class="contenedor-menu">
        <ul class="menu">
            <li>
                <a href="<?= base_url() . 'dashboard'; ?>" class="<?php $this->uri->segment(1) == 'dashboard' ? print 'activo' : print '' ?>">
                    <i class="fas fa-columns fa-lg icono izquierda"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="<?= base_url() . 'entidades'; ?>" class="<?php $this->uri->segment(1) == 'entidades' ? print 'activo' : print '' ?>">
                    <i class="fas fa-industry fa-lg icono izquierda"></i>Entidades
                </a>
            </li>
            <li>
                <a id="acordion" class="<?php $this->uri->segment(1) == 'convenios' || $this->uri->segment(1) == 'actividades' || $this->uri->segment(1) == 'reportes'  ? print 'activo' : print '' ?>">
                    <i class="fas fa-file-alt fa-lg icono izquierda"></i>Convenios
                    <i class="fas fa-angle-down icono derecha"></i>
                </a>
                <ul class="submenu" id="submenu-aside">
                    <li>
                        <a href="<?= base_url() . 'convenios'; ?>" class="<?php $this->uri->segment(1) == 'convenios' ? print 'activo' : print '' ?>">
                            <i class="fas fa-file icono izquierda"></i>Convenios
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() . 'actividades'; ?>" class="<?php $this->uri->segment(1) == 'actividades' ? print 'activo' : print '' ?>">
                            <i class="fas fa-paste icono izquierda"></i>Actividades
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url() . 'reportes'; ?>" class="<?php $this->uri->segment(1) == 'reportes' ? print 'activo' : print '' ?>">
                            <i class="fas fa-archive icono izquierda"></i>Reportes
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url() . 'facultades'; ?>" class="<?php $this->uri->segment(1) == 'facultades' ? print 'activo' : print '' ?>">
                    <i class="fas fa-graduation-cap fa-lg icono izquierda"></i>Facultades
                </a>
            </li>
            <li>
                <a href="<?= base_url() . 'oficinas'; ?>" class="<?php $this->uri->segment(1) == 'oficinas' ? print 'activo' : print '' ?>">
                    <i class="fas fa-landmark fa-lg icono izquierda"></i>Oficinas
                </a>
            </li>
            <br>
            <li>
                <p class="colorusam" id="liveclock" style="
					text-align: center;
					margin-left: auto;
					margin-right: -15%;">
                </p>
            </li>
        </ul>
    </div>
</div>