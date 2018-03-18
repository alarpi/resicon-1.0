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
			<div class="mr-5"><a href="<?= base_url();?>empleados/" style="color:black;">Empleados</a> / Parte de personal</div>
        </div>
	</div>
 </div>
 <!--botones de usuario-->
 	<a href="<?= base_URL().'empleados/modificaEmpleado/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning" >Datos personales</button></a>
 	<a href="<?= base_URL().'empleados/horas/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning" disabled="disabled">Parte de personal</button></a>
 	<a href="<?= base_URL().'empleados/baja/'.$empleado->result()[0]->idEmpleado; ?>"><button type="button" class="btn btn-warning">Bajas Médicas</button></a>
 <!-- FIN botones de usuario-->
<div class="col-xl-14 mb-3"></div>
<!--tabla de usuarios -->
         <div class="card mb-3">
          <div class="card-header">           
        
			  <div class="card-header"><h4><?=$empleado->result()[0]->nombre;?></h4></div>
      <div class="card-body">
        <?php echo form_open('empleados/registrahoras/'.$id);?>
          <div class="form-group">
            <div class="form-row">
			  <div class="col-md-2">
					<label for="exampleInputName">Nº de Vale</label>
			  <input name="vale" type="text" required="required" class="form-control" id="exampleInputName" placeholder="" value="" size="50" aria-describedby="nameHelp">
				</div>
				<div class="col-md-10">&nbsp;
				</div>
			  <div class="col-md-2">
                <label for="exampleInputName">Fecha</label>
			  <input name="fecha" type="date" required="required" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              </div>
			<div class="col-md-2"><label for="exampleInputName">Vehículo</label>
				<select name="camion" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text">
					<option value="">&nbsp;</option>
				  <?php if($vehiculos){
							foreach ($vehiculos->result() as $vehiculo){
    							echo '<option value="'.$vehiculo->idVehiculo.'">'.$vehiculo->matricula.'</option>';
							}
						}
				  ?>
				</select>	
			</div>
				<div class="col-md-2"><label for="exampleInputName">Máquina</label>
				<select name="maquina" class="form-control" id="exampleInputLastName" aria-describedby="nameHelp" type="text">
					<option value="">&nbsp;</option>
				  <?php if($maquinas){
							foreach ($maquinas->result() as $maquina){
    							echo '<option value="'.$maquina->idMaquina.'">'.$maquina->modelo.'</option>';
							}
						}
				  ?>
				</select>
			</div>
				<div class="col-md-3"><label for="exampleInputName">Cliente</label>
				 <select name="cliente" required="required" class="form-control" id="cliente" aria-describedby="nameHelp" type="text">
					 <option value="">&nbsp;</option>
				  <?php if($clientes){
							foreach ($clientes->result() as $cliente){
    							echo '<option value="'.$cliente->idObra.'">'.$cliente->nombre.'</option>';
							}
						}
				  ?>
				</select>	
			</div>
             <div class="col-md-3"><label for="exampleInputName">Obra</label>
			  <select name="obra" required="required" class="form-control" id="obra" aria-describedby="nameHelp" type="text">
				  <option value="">&nbsp;</option>
				  <?php if($obras){
							foreach ($obras->result() as $obra){
    							echo '<option value="'.$obra->idObra.'">'.$obra->nombreObra.'</option>';
							}
						}
				  ?>
				</select>	
              </div>
				<div class="col-md-2">&nbsp;</div>
				<div class="col-md-12">&nbsp;</div>
				<div class="col-md-1"><input name="horas" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				<div class="col-md-2"><center>Horas  Trabajo:</center></div>
				<div class="col-md-9"><input name="horasConcepto" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				
				<div class="col-md-12">&nbsp;</div>
				<div class="col-md-1"><input name="horasExtra" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				<div class="col-md-2"><center>Horas  Extra de Trabajo:</center></div>
				<div class="col-md-9"><input name="horasExtraConcepto" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				
				<div class="col-md-12">&nbsp;</div>
				<div class="col-md-1"><input name="horasAveriado" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				<div class="col-md-2"><center>Horas  Averiado:</center></div>
				<div class="col-md-9"><input name="horasAveriadoConcepto" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				
				<div class="col-md-12">&nbsp;</div>
				<div class="col-md-1"><input name="viajes" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				<div class="col-md-2"><center>Viajes:</center></div>
				<div class="col-md-9"><input name="viajesConcepto" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				
				<div class="col-md-12">&nbsp;</div>
				<div class="col-md-1"><input name="litrosGasoil" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				<div class="col-md-2"><center>Litros Gasoil:</center></div>
				<div class="col-md-9"><input name="litrosGasoilConcepto" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				
				<div class="col-md-12">&nbsp;</div>
				<div class="col-md-1"><input name="horasMartillo" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				<div class="col-md-2"><center>Horas  con martillo:</center></div>
				<div class="col-md-9"><input name="horasMartilloConcepto" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				
				<div class="col-md-12">&nbsp;</div>
				<div class="col-md-1"><input name="horasRetro" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				<div class="col-md-2"><center>Horas con retro:</center></div>
				<div class="col-md-9"><input name="horasRetroConcepto" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp"></div>
				<div class="col-md-12"><hr></div>
				
				<div class="col-md-2"><label for="exampleInputName">Km Salida</label>
			  		<input name="kmSalida" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				
				<div class="col-md-2"><label for="exampleInputName">Km Llegada</label>
			  		<input name="kmLlegada" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				
				<div class="col-md-2"><label for="exampleInputName">Hora AM</label>
			  		<input name="horaAM" type="time" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				
				<div class="col-md-2"><label for="exampleInputName">Hora PM</label>
			  		<input name="horaPM" type="time" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				<div class="col-md-4">&nbsp;</div>
			 
			   <div class="col-md-2"><label for="exampleInputName">Horas de parada</label>
			  		<input name="horasParada" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				
				<div class="col-md-10"><label for="exampleInputName">Razón de parada</label>
			  		<input name="horasParadaConcepto" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				<div class="col-md-2"><label for="exampleInputName">Litros Gasoil</label>
			  		<input name="litrosGasoil" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				<div class="col-md-2"><label for="exampleInputName">Aceite HID</label>
			  		<input name="aceiteHID" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				<div class="col-md-8"><label for="exampleInputName">otros</label>
			  		<input name="otros" type="text" class="form-control" id="exampleInputName" placeholder="" value="" aria-describedby="nameHelp">	
              	</div>
				
			<div class="col-md-12">&nbsp;</div>	
          </div>          
			<?php echo form_submit('botonSubmit', 'Guardar','class="btn btn-success"');?>
        <?php echo form_close(); ?>      
      </div>
		</div>	  
	</div>	        
          <div class="card-footer small text-muted"></div>
        </div> 
       