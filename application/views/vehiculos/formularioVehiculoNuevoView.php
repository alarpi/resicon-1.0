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
            	<i class="fa fa-fw fa-car"></i>
            </div>
			<div class="mr-5">Vehículos / <a href="<?= base_url();?>config/usuarios" style="color:black;">Nuevo</a></div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
      <div class="card-header">Datos del nuevo Vehículo</div>
      <div class="card-body">
        <?php  echo form_open('vehiculos/guardaVehiculoNuevo');?>
		  <input name="estado" type="hidden" id="estado" value="1">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputName">Marca</label>
				  <input name="marca" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
			  <div class="col-md-3">
                <label for="exampleInputName">Modelo</label>
			  <input name="modelo" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">Matricula</label>
			  <input name="matricula" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>				
            </div>
          </div>          
			<?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       