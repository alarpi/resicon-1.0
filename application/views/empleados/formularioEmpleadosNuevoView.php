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
			<div class="mr-5">Empleados / <a href="<?= base_url();?>config/usuarios" style="color:black;">Nuevo</a></div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
      <div class="card-header">Datos del nuevo empleado</div>
      <div class="card-body">
        <?php  echo form_open('empleados/recibirDatos');?>
		  <input name="estado" type="hidden" id="estado" value="0">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nombre</label>
				  <input name="nombre" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
			  <div class="col-md-6">
                <label for="exampleInputName">DNI</label>
			  <input name="dni" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-6">
                <label for="exampleInputName">Dirección</label>
			  <input name="direccion" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">Teléfono</label>
			  <input name="telefono" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">Móvil</label>
			  <input name="movil" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-6">
                <label for="exampleInputName">Correo Electrónico</label>
			  <input name="correo" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
              <div class="col-md-3">
                <label for="exampleInputLastName">Puesto</label>
					
				<select name="cargo" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text">
				
				  <?php foreach($cargos->result() as $cargo){?>
				  <option value="<?= $cargo->cargoEmpleado;?>"><?= $cargo->cargoEmpleado;?></option>				  
				  <?php } ?>						
				</select>
              </div>
				<div class="col-md-3">
				</div>
			  <div class="col-md-3">
                <label for="exampleInputName">Número de la Seguridad Social</label>
			  <input name="numeroSS" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
			  <div class="col-md-3">
                <label for="exampleInputName">Fecha de Alta Seguridad Social</label>
			  <input name="fechaAlta" type="date" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				 <div class="col-md-3">
                <label for="exampleInputName">Último reconocimiento Médico</label>
			  <input name="reconoMedico" type="date" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				
            </div>
          </div>          
			<?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       