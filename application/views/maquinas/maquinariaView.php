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
            	<i class="fa fa-fw fa-home"></i>
            </div>
            <div class="mr-5">Maquinaria</div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
	 <div class="col-xl-14 mb-3"><a href="<?= base_url();?>maquinaria/nuevaMaquina"><button type="button" class="btn btn-success">Crear Maquina</button></a></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Listado de Maquinas
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th width="38%">Marca</th>
                    <th width="30%">Modelo</th>
					<th width="7%">Matricula</th>
					<th width="6%">Tipo</th>
                    <th width="6%">Estado</th>
                    <th width="7%">Modificar</th>
					<th width="6%">Eliminar</th>
                  </tr>
                </thead>               
                <tbody>
                 <?php
					if($maquinas){
					foreach ($maquinas->result() as $maquina){
					if($maquina->estado==0){$estado='Alta'; $color='#fff';}elseif($maquina->estado==1){$estado='En Taller'; $color='#f48d8d';}else{$estado='Baja'; $color='#bdbdbd';}
    				echo '<tr style="background-color:'.$color.'"><td>'.$maquina->marca.'</td>';
					echo '<td>'.$maquina->modelo.'</td>';
					echo '<td>'.$maquina->matricula.'</td>';
					echo '<td>'.$estado.'</td>';
					echo '<td><a href="'.base_url().'maquinaria/modificaMaquina/'.$maquina->idMaquina.'"><button type="button" class="btn btn-primary btn-sm">Modificar</button></a></td>';
					echo '<td><a href="'.base_url().'maquinaria/eliminaMaquina/'.$maquina->idMaquina.'"><button type="button" class="btn btn-primary btn-danger" data-toggle="modal" data-target="#ventanaEliminar"';
					if($maquina->estado<>2){echo ' disabled="disabled" ';}
					echo '>Eliminar</button></a></td></tr>';
					}}
				?>                    
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div> 