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
			<div class="mr-5"><a href="<?= base_url();?>obras/" style="color:black;">Obras</a> / Modifica</div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
      <div class="card-header">Datos de la Obra <?= $id;?></div>
      <div class="card-body">
        <?php  echo form_open('obras/guardaModificaObra/'.$id);?>
		  <input name="estado" type="hidden" id="estado" value="1">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputName">Cliente</label>
				  <input name="nombre" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$obra->result()[0]->nombre; ?>" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">Nombre Obra</label>
				  <input name="nombreObra" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$obra->result()[0]->nombreObra;  ?>" aria-describedby="nameHelp">	
              </div>
			  <div class="col-md-3">
                <label for="exampleInputName">Dirección</label>
			  <input name="direccion" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$obra->result()[0]->direccion; ?>" aria-describedby="nameHelp">	
              </div>				
				<div class="col-md-3">
                <label for="exampleInputName">Nº Cuenta Cotización</label>
			  <input name="cuentaCotizacion" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$obra->result()[0]->cuentaCotizacion; ?>" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">Tipo de Obra</label>
			  <input name="tipoObra" type="text" class="form-control" id="exampleInputName" placeholder="" value="<?=$obra->result()[0]->tipoObra; ?>" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-3">
                <label for="exampleInputName">estado</label>
			  <select name="estado" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text">
				  <option value="0" <?php if($obra->result()[0]->estado==0){ echo 'selected="selected"';} ?>>En Proceso</option>
				  <option value="1" <?php if($obra->result()[0]->estado==1){ echo 'selected="selected"';} ?>>Finalizada</option>
				</select>
              </div>
				<div class="col-md-9">
                <label for="exampleInputName">Comentarios</label>
					<textarea name="comentarios" type="text" class="form-control" id="exampleInputName" placeholder=""> <?=$obra->result()[0]->comentarios; ?></textarea>
              </div>
            </div>
          </div>          
			<?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       