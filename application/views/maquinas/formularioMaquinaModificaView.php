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
            	<i class="fa fa-fw fa-wrench"></i>
            </div>
			<div class="mr-5">Maquinaria / <a href="<?= base_url();?>config/usuarios" style="color:black;">Modifica</a></div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
      <div class="card-header">Datos de la Maquina</div>
      <div class="card-body">
        <?php  echo form_open('maquinaria/guardaModificaMaquina/'.$id);?>
		  <input name="estado" type="hidden" id="estado" value="1">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputName">Marca</label>
				  <input name="marca" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$maquina->result()[0]->marca; ?>" aria-describedby="nameHelp">	
              </div>
			  <div class="col-md-3">
                <label for="exampleInputName">Modelo</label>
			  <input name="modelo" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$maquina->result()[0]->modelo; ?>" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">Tipo</label>
			  <input name="tipo" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$maquina->result()[0]->tipo; ?>" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">Matricula</label>
			  <input name="matricula" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$maquina->result()[0]->matricula; ?>" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">estado</label>
			  <select name="estado" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text">
				  <option value="0" <?php if($maquina->result()[0]->estado==0){ echo 'selected="selected"';} ?>>Alta</option>
				  <option value="1" <?php if($maquina->result()[0]->estado==1){ echo 'selected="selected"';} ?>>En Taller</option>
				  <option value="2" <?php if($maquina->result()[0]->estado==2){ echo 'selected="selected"';} ?>>Baja</option>
				</select>
              </div>
            </div>
          </div>          
			<?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       