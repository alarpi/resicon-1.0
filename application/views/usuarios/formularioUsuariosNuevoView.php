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
			<div class="mr-5">Configuración / <a href="<?= base_url();?>config/usuarios" style="color:black;">Usuarios</a></div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
      <div class="card-header">Datos del nuevo usuario</div>
      <div class="card-body">
        <?php  echo form_open('config/recibirDatos');?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Nombre Completo</label>
				 <input name="nombre" type="text" class="form-control" id="nombre" placeholder="" value="">		
              </div>				
              <div class="col-md-6">
                <label for="exampleInputLastName">Tipo de usuario</label>
					
				<select name="tipo" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text">
				<?php
					foreach($tiposUser->result() as $tipo){?>
				  <option value="<?= $tipo->tipoUser;?>"><?= $tipo->tipoUser;?></option>
				<?php } ?>						
				</select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
				<div class="col-md-6">
                <label for="exampleInputName">Usuario</label>
				  <input name="username" type="text" class="form-control" id="username" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				
              <div class="col-md-3">
                <label for="exampleInputPassword1">Contraseña</label>
				 <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="" value="">		
              </div>
              <div class="col-md-3">
                <label for="exampleConfirmPassword">repetir contraseña</label>
                <input name="password2" type="password" class="form-control" id="exampleConfirmPassword" placeholder="" value="">
              </div>
            </div>
          </div>
			<?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       