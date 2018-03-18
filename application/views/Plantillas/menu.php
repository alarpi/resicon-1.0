   <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="#"><img src="../../../img/logo.png" alt=""/></a>
      
		
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="margin-top: 87px;">
          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url().'dashboard';?>">
              <i class="fa fa-fw fa-dashboard"></i>
              <span class="nav-link-text">
                Vista rápida</span>
            </a>
          </li>
         <!-- menú desplegable
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Empleados">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#empleados" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-user"></i>
              <span class="nav-link-text">
                Empleados</span>
            </a>
            <ul class="sidenav-second-level collapse" id="empleados">
              <li>
                <a href="#">Todos</a>
              </li>
              <li>
                <a href="#">Nuevo</a>
              </li>
              <li>
                <a href="#">Listados</a>
              </li>
            </ul>
          </li>-->
         
         
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Empleados">
            <a class="nav-link" href="<?php echo  base_url().'empleados/';?>">
              <i class="fa fa-fw fa-user" style="color: #007bff;"></i>
              <span class="nav-link-text">
                Empleados</span>
            </a>            
          </li>          
          
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="vehiculos">
            <a class="nav-link" href="<?php echo  base_url().'vehiculos';?>">
              <i class="fa fa-fw fa-car" style="color:#ffc107;"></i>
              <span class="nav-link-text">
                Vehículos</span>
            </a>            
          </li>
          
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="maquinaria">
            <a class="nav-link" href="<?php echo  base_url().'maquinaria';?>">
              <i class="fa fa-fw fa-wrench" style="color:#28a745;"></i>
              <span class="nav-link-text">
                Maquinaria</span>
            </a>            
          </li>
          
          
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="obras">
            <a class="nav-link" href="<?php echo  base_url().'obras';?>">
              <i class="fa fa-fw fa-home" style="color:#dc3545;"></i>
              <span class="nav-link-text">
                Obras</span>
            </a>           
          </li>
          
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="config">
            <a class="nav-link" href="<?php echo  base_url().'informes';?>">
              <i class="fa fa-fw fa-list"></i>
              <span class="nav-link-text">
                Informes</span>
            </a>
          </li>
          
           <li class="nav-item" data-toggle="tooltip" data-placement="right" title="config">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#config" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-cog"></i>
              <span class="nav-link-text">
                Configuración</span>
            </a>
            <ul class="sidenav-second-level collapse" id="config">
              
			<?php if($this->session->userdata('tipo')=='administrador'){ ?>	
			  <li>
                <a href="<?php echo base_url().'config/usuarios';?>">Usuarios</a>
              </li> 
				<?php }else{ ?>
				<li>
                <a href="<?php echo base_url().'config/modificaUsuario/'.$this->session->userdata('id');?>">Usuario</a>
              </li> 				
				<?php } ?>
            </ul>
          </li>
          
        </ul>
        <!-- barra superior-->
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-envelope"></i>
              <span class="d-lg-none">Messages
                <span class="badge badge-pill badge-primary">12 New</span>
              </span>
              <span class="new-indicator text-primary d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">12</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">New Messages:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>David Miller</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>Jane Smith</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>John Doe</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all messages
              </a>
            </div>
          </li>-->
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Alerts
                <span class="badge badge-pill badge-warning">6 New</span>
              </span>
              <span class="new-indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">6</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all alerts
              </a>
            </div>
          </li>-->
          <!--<li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-fw fa-sign-out"></i>
              Salir</a>
          </li>
        </ul>
      </div>
</nav>

    <div class="content-wrapper">