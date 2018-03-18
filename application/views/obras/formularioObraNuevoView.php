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
            	<i class="fa fa-fw fa-home"></i>
            </div>
			<div class="mr-5">Obras / <a href="<?= base_url();?>maquinas/" style="color:black;">Nueva Obra</a></div>
        </div>
	</div>
 </div>
 <!--boton de añadir usuarios-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
      <div class="card-header">Datos de la nueva Obra</div>
      <div class="card-body">
        <?php  echo form_open('obras/guardaObraNueva');?>
		  <input name="estado" type="hidden" id="estado" value="1">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <label for="exampleInputName">Cliente</label>
				  <input name="nombre" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				 <div class="col-md-3">
                <label for="exampleInputName">Nombre Obra</label>
				  <input name="nombreObra" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
			  <div class="col-md-3">
                <label for="exampleInputName">Dirección</label>
			  <input name="direccion" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>				
				<div class="col-md-3">
                <label for="exampleInputName">Nº Cuenta Cotización</label>
			  <input name="cuentaCotizacion" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-2">
                <label for="exampleInputName">Tipo de Obra</label>
			  <input name="tipoObra" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
				<div class="col-md-10">
                <label for="exampleInputName">Comentarios</label>
				<textarea name="comentarios" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></textarea>
			  </div>				
            </div>
          </div>          
			<?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       