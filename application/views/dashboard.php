<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
     <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            Vista rápida
          </li>
        </ol>

        <!-- Icon Cards -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-user"></i>
                </div>
                <div class="mr-5">
                  <?php
					if($bajas != 1){$textoBajas=' Bajas';}elseif($bajas==1){$textoBajas=' Baja';}
					echo $empleados.' Empleados<br>';
					echo '<a href="'.base_URL().'empleados/bajaLaboral" style="color:#fff;">'.$bajas.$textoBajas.'</a>';
					echo '<p>';
					if($reconocimientoMedico->result()[0]->cuenta !=1){$textoMedico=' Reconocimientos Médicos caducan';}elseif($reconocimientoMedico->result()[0]->cuenta ==1){$textoMedico=' Reconocimiento Médico caduca';}
					echo '<a href="'.base_URL().'empleados/reconocimientoMedico" style="color:#fff;">'.$reconocimientoMedico->result()[0]->cuenta.$textoMedico.'</a>';
					echo '</p>';
				  ?>
                </div>
              </div>
              <a href="<?= base_URL().'empleados';?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">Ver listado</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-car"></i>
                </div>
                <div class="mr-5">
                  <?php if($bajasvehiculos > 0){$textoBajasVehiculos=' En el Taller';}else{$textoBajasVehiculos='';}
					echo $vehiculos.' Vehiculos<br>';
					echo $bajasvehiculos.$textoBajasVehiculos;
					?>
                </div>
              </div>
              <a href="<?= base_URL().'vehiculos';?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">ver detalle</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-wrench"></i>
                </div>
                <div class="mr-5">
                  <?php if($bajasmaquinas > 0){$textoBajasMaquinas=' En el Taller';}else{$textoBajasMaquinas='';}
					echo $maquinas.' Maquinas<br>';
					echo $bajasmaquinas.$textoBajasMaquinas;
					?>
                </div>
              </div>
              <a href="<?= base_URL().'maquinaria';?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">ver listado</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-home"></i>
                </div>
                <div class="mr-5">
                  <?php echo $obras; ?> Obras en proceso
                </div>
              </div>
              <a href="<?= base_URL().'obras';?>" class="card-footer text-white clearfix small z-1">
                <span class="float-left">ver detalle</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

