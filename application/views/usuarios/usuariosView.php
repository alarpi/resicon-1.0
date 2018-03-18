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
            	<i class="fa fa-fw fa-cog"></i>
            </div>
            <div class="mr-5">Configuración / Usuarios</div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
	 <div class="col-xl-14 mb-3"><a href="<?= base_url();?>config/nuevoUsuario"><button type="button" class="btn btn-success">Crear usuario</button></a></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Listado de usuarios del sistema
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th width="30%">Nombre de usuario</th>
                    <th width="25%">Tipo de usuario</th>
                    <th width="35%">Fecha de alta</th> 
                    <th width="5%">Modificar</th>
                    <th width="5%">Eliminar</th>                   
                  </tr>
                </thead>
                <!--<tfoot>
                  <tr>
                    <th>Nombre de usuario</th>
                    <th>Tipo de usuario</th>
                    <th>Fecha de alta</th>
                  </tr>
                </tfoot>-->
                <tbody>
                 <?php 
					foreach ($usuarios->result() as $usuario){
    				echo '<tr><td>'.$usuario->username.'</td>';
					echo '<td>'.$usuario->tipo.'</td>';
					echo '<td>'.date("d-m-Y", strtotime($usuario->alta)).'</td>';
					echo '<td><a href="modificaUsuario/'.$usuario->id.'"><button type="button" class="btn btn-primary btn-sm">Modificar</button></a></td>';
					echo '<td><a href="eliminaUsuario/'.$usuario->id.'"><button type="button" class="btn btn-primary btn-danger">Eliminar</button></a></td></tr>';
					}
				?>                    
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div> 
       