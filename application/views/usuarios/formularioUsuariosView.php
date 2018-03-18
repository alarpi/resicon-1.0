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
        
      <div class="card-header">Modificar datos de usuario</div>
      <div class="card-body">
         <?php  echo form_open('config/actualizarUsuario/'.$id);?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nombre Completo</label>
                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="" value="<?= $usuario->result()[0]->nombre;?>" aria-describedby="nameHelp">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Tipo de usuario</label>
					
				  <?php if($this->session->userdata('tipo')<>'administrador'){?>
				  
				  <input name="tipo" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?= $usuario->result()[0]->tipo;?>" readonly="readonly" aria-describedby="nameHelp">
				  <?php }else{ ?>
				  
                <select name="tipo" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text">
				<?php
					foreach($tiposUser->result() as $tipo){?>
				  <option value="<?= $tipo->tipoUser;?>" <? if($usuario->result()[0]->tipo ==$tipo->tipoUser){ echo 'selected="selected"';}?>><?= $tipo->tipoUser;?></option>
				<?php } ?>						
				</select>
				<?php } ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
				<div class="col-md-6">
                <label for="exampleInputName">Usuario</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="" value="<?= $usuario->result()[0]->username;?>" aria-describedby="nameHelp">
              </div>
              <div class="col-md-3">
                <label for="exampleInputPassword1">Contraseña</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="" value="<?= $usuario->result()[0]->password;?>">
              </div>
              <div class="col-md-3">
                <label for="exampleConfirmPassword">repetir contraseña</label>
                <input name="password2" type="password" class="form-control" id="exampleConfirmPassword" placeholder="" value="<?= $usuario->result()[0]->password;?>">
              </div>
            </div>
          </div>
          <?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>
			   <?php if($this->session->userdata('tipo')=='administrador'){ ?>
			  <span style="font-size: 14px;">última modificación: 
			  <?php 
			  foreach($nombreUsuarios->result() as $nombreUsuario){
				  if($usuario->result()[0]->registradoPor == $nombreUsuario->id){
					  echo $nombreUsuario->nombre;
				  }
			  }
			  echo ' el '.date("d-m-Y H:i:s", strtotime($usuario->result()[0]->registradoFecha));?>
			  </span>
			  <?php } ?>
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       