<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
        "language": {
            "lengthMenu": " _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "ver page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
} );
</script>
 <div class="container-fluid">
 <!-- Breadcrumbs -->        
 <div class="col-xl-14 mb-3">
 	<div class="card text-black o-hidden h-100" style="background-color:#e9ecef;">
    	<div class="card-body">
        	<div class="card-body-icon">
            	<i class="fa fa-fw fa-user"></i>
            </div>
			<div class="mr-5"><a href="<?= base_url();?>empleados/" style="color:black;">Empleados</a> / Parte de personal</div>
        </div>
	</div> 
 </div>
 <!--botones de usuario-->
 	<a href="<?= base_URL().'empleados/modificaEmpleado/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning" >Datos personales</button></a>
 	<a href="<?= base_URL().'empleados/horas/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning" disabled="disabled">Parte de personal</button></a>
 	<a href="<?= base_URL().'empleados/baja/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning">Bajas Médicas</button></a>
 <!-- FIN botones de usuario-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
			  <div class="card-header"><h4><?=$empleado->result()[0]->nombre;?></h4></div>
      <div class="card-body">
		  <a href="<?= base_URL().'empleados/nuevahora/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-success" >Nuevo</button></a>
			<hr>
			  <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                      <th width="20%">Fecha</th>
                      <th width="40%">Obra</th>
					  <th width="20%">Vale</th>
					  <th width="10%" style="text-align: center">Día</th>
					  <th width="10%" style="text-align: center">Horas</th>
					  <th width="10%" style="text-align: center">H.Extras</th>
					  <th width="10%" style="text-align: center">Viajes</th>
					  <th width="20%">Máquina/Vehículo</th>   
                  </tr>
                </thead>               
                <tbody>
					<?php
					if($horas){
						foreach($horas->result() as $hora){
							echo '<tr>';
							echo '<td>'.date("d-m-Y", strtotime($hora->fecha)).'</td>';
							echo '<td>';
							foreach($todasobras ->result() as $nombreObra){
								if($nombreObra->idObra == $hora->idObra){echo $nombreObra->nombreObra;}
							}
							echo '</td>';
							echo '<td>'.$hora->vale.'</td>';
							echo '<td style="text-align: center">';
							if(($hora->horas > 0)or($hora->viajes > 0)){echo 1;}
							echo '</td>';
							echo '<td style="text-align: center">'.$hora->horas.'</td>';
							echo '<td style="text-align: center">'.$hora->horasExtra.'</td>';
							echo '<td style="text-align: center">'.$hora->viajes.'</td>';
							echo '<td>';
							if($hora->camion !=''){
								foreach($vehiculos->result() as $maticulaCamion){
									if($maticulaCamion->idVehiculo == $hora->camion){echo $maticulaCamion->matricula;}
								}									
							}elseif($hora->maquina !=''){
								foreach($maquinas->result() as $maticulaMaquina){
									if($maticulaMaquina->idVehiculo == $hora->maquina){echo $maticulaMaquina->marca.' '.$matriculaMaquina->modelo;}
								}
							}
							echo '</td>';
							echo '<td><a href="'.base_URL().'empleados/modificaHoras/'.$hora->idEmpleado.'/'.$hora->idEmpleadoHoras.'"><button type="button" class="btn btn-primary btn-sm">Modificar</button></a></td>';
							echo '</tr>';
						}
					}
					?>
			    </tbody>
			  </table>
			</div>
			  </div>
		</div>	  
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       