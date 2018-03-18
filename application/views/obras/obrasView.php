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
            <div class="mr-5">Obras</div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
	 <div class="col-xl-14 mb-3"><a href="<?= base_url();?>obras/nuevaObra"><button type="button" class="btn btn-success">Crear Obra</button></a></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
            Listado de Obras
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
					<th width="8%">Identificador</th>
                    <th width="32%">Cliente</th>
					<th width="32%">Obra</th>
                    <th width="27%">Dirección</th>
					<th width="12%">Estado</th>
					<th width="5%">Empleados</th>
                    <th width="5%">Vehiculos</th>
                    <th width="5%">Maquinaría</th>
					<th width="6%">Modificar</th>
                  </tr>
                </thead>               
                <tbody>
                 <?php
					if($obras){
					foreach ($obras->result() as $obra){
					if($obra->estado==0){$estado='En Proceso'; $color='#fff';}else{$estado='Finalizada'; $color='#bdbdbd';}
    				echo '<tr style="background-color:'.$color.'">';
					echo '<td>'.$obra->idObra.'</td>';
					echo '<td>'.$obra->nombre.'</td>';
					echo '<td>'.$obra->nombreObra.'</td>';
					echo '<td>'.$obra->direccion.'</td>';
					echo '<td>'.$estado.'</td>';
					echo '<td>&nbsp;</td>';
					echo '<td>&nbsp;</td>';
					echo '<td>&nbsp;</td>';
					echo '<td><a href="'.base_url().'obras/modificaObra/'.$obra->idObra.'"><button type="button" class="btn btn-primary btn-sm">Modificar</button></a></td></tr>';					
					}}
				?>                    
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div> 