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
			<div class="mr-5"><a href="<?= base_url();?>empleados/" style="color:black;">Empleados</a> / Registro de bajas médicas</div>
        </div>
	</div>
 </div>
 <!--botones de usuario-->
 	<a href="<?= base_URL().'empleados/modificaEmpleado/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning" >Datos personales</button></a>
 	<a href="<?= base_URL().'empleados/horas/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning">Parte de personal</button></a>
 	<a href="<?= base_URL().'empleados/baja/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning" disabled="disabled">Bajas Médicas</button></a>
 <!-- FIN botones de usuario-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
			  <div class="card-header"><h4><?=$empleado->result()[0]->nombre;?></h4></div>
      <div class="card-body">
        <?php echo form_open('empleados/actualizarBaja/'.$id);?>
          <div class="form-group">
            <div class="form-row">
			<div class="col-md-6">
				<label for="exampleInputName">Motivo de la baja Médica</label>
				<input name="motivo" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
             <div class="col-md-3">
                <label for="exampleInputName">Estado</label>
			  <select name="estado" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text">
				 <option value="0">Alta</option>
				<option value="1">Baja</option>		
				</select>	
              </div>
				 <div class="col-md-3">
                <label for="exampleInputName">Fecha</label>
			  <input name="fecha" type="date" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>			
            </div>
          </div>          
			<?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>	<hr>
			  <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                    <th width="59%">Motivo</th>
                    <th width="21%">Fecha</th>
					<th width="10%">estado</th>
					<?php if($this->session->userdata('tipo')=='administrador'){ ?> 
                    <th width="40%">Creado</th>
					<?php } ?>  
                  </tr>
                </thead>               
                <tbody>
					<?php
					if($bajas){
						foreach ($bajas->result() as $baja){
    						echo '<tr><td>'.$baja->motivo.'</td>';
							echo '<td>'.date("d-m-Y", strtotime($baja->fecha)).'</td>';
							echo '<td>';
							if($baja->estado==1){echo 'Baja';}else{echo 'Alta';}
							echo '</td>';
							if($this->session->userdata('tipo')=='administrador'){
			  					echo '<td>';
								echo '<span style="font-size: 14px;">';
			                    foreach($usuarios->result() as $usuario){
				  					if($usuario->id==$baja->registradoPor){
					  					echo $usuario->nombre;
										}
			  					}
			  					echo '<br>'.date("d-m-Y H:i:s", strtotime($baja->regristradoFecha));
								echo '</span></td>';
			  				}
							echo '</tr>';			
						}
					}
					?>
			    </tbody>
			  </table>
			    </div>
			  </div>
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       