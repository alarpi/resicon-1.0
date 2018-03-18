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
<script type="text/javascript">
	$('#ventanaEliminar').on('click',
	function () {
    	alert($(this).data("data-id"));
	});
</script>
 <div class="container-fluid">
 <!-- Breadcrumbs -->        
 <div class="col-xl-14 mb-3">
 	<div class="card text-black o-hidden h-100" style="background-color:#e9ecef;">
    	<div class="card-body">
        	<div class="card-body-icon">
            	<i class="fa fa-fw fa-car"></i>
            </div>
            <div class="mr-5">Vehículos</div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
	 <div class="col-xl-14 mb-3"><a href="<?= base_url();?>vehiculos/nuevoVehiculo"><button type="button" class="btn btn-success">Crear Vehículo</button></a></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Listado de Vehículos
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th width="37%">Marca</th>
                    <th width="17%">Modelo</th>
					<th width="4%">Matricula</th>
					<th width="4%">Estado</th> 
					<th width="5%">Modificar</th>
					<th width="4%">Eliminar</th>
                  </tr>
                </thead>               
                <tbody>
                 <?php
					if($vehiculos){
					foreach ($vehiculos->result() as $vehiculo){
					if($vehiculo->estado==0){$estado='Alta'; $color='#fff';}elseif($vehiculo->estado==1){$estado='En Taller'; $color='#f48d8d';}else{$estado='Baja'; $color='#bdbdbd';}
    				echo '<tr style="background-color:'.$color.'"><td>'.$vehiculo->marca.'</td>';
					echo '<td>'.$vehiculo->modelo.'</td>';
					echo '<td>'.$vehiculo->matricula.'</td>';
					echo '<td>'.$estado.'</td>';
					echo '<td><a href="'.base_url().'vehiculos/modificaVehiculo/'.$vehiculo->idVehiculo.'"><button type="button" class="btn btn-primary btn-sm">Modificar</button></a></td>';
					echo '<td><a href="'.base_url().'vehiculos/eliminaVehiculo/'.$vehiculo->idVehiculo.'"><button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#ventanaEliminar">Eliminar</button></a></td></tr>';
					}}
				?>                    
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div> 