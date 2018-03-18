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
            	<i class="fa fa-fw fa-user"></i>
            </div>
            <div class="mr-5">Empleados</div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
	 <div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Listado de Empleados 
          para reconocimiento Médico</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th width="39%">Nombre</th>
                    <th width="20%">DNI</th>
					<th width="15%">Fecha Reconocimiento</th>
					<th width="11%">Estado SS</th>
                    <th width="8%">Modificar</th>
                    <th width="7%">Eliminar</th>                   
                  </tr>
                </thead>               
                <tbody>
                 <?php 
					//if($debaja){
						foreach ($rMedicos->result() as $rMedico){
							if($rMedico->estado==0){$estado='Alta'; $color='#fff';}elseif($rMedico->estado==1){$estado='Baja Laboral'; $color='#f48d8d';}else{$estado='Baja'; $color='#bdbdbd';}
    						echo '<tr style="background-color:'.$color.'"><td>'.$rMedico->nombre.'</td>';
							echo '<td>'.$rMedico->dni.'</td>';
							echo '<td>'.date ('j-m-Y', strtotime('+1 year', strtotime($rMedico->reconoMedico))).'</td>';
							echo '<td>'.$estado.'</td>';
							echo '<td><a href="'.base_url().'empleados/modificaEmpleado/'.$rMedico->idEmpleado.'/Medico/"><button type="button" class="btn btn-primary btn-sm">Modificar</button></a></td>';
							echo '<td><a href="'.base_url().'empleados/eliminaEmpleado/'.$rMedico->idEmpleado.'"><button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#ventanaEliminar"';
							if($rMedico->fechaBaja=='0000-00-00'){echo ' disabled="disabled" ';}
							echo '>Eliminar</button></a></td></tr>';
						}
					//}
				?>                    
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>