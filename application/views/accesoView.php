<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 
 
  <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          Acceso de usuario
        </div>
		<div class="card-body">
			<div class="form-group">
				<?php if(isset($_GET['error'])) :?>
				<div class="text-danger" id="error" style="text-align:center;">¡Nombre de usuario o contraseña erroneos!</div>
				<?php endif; ?>
			</div>
         
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Usuario</label>
              <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu usuario" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Contraseña</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Escribe tu contraseña">
            </div>
            <div class="form-group">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input">
                  recordar contraseña
                </label>
              </div>
            </div>
           <input type="submit" class="btn btn-primary btn-block" formmethod="POST" title="Entrar" value="Entar">            
          </form>         
        </div>
      </div>
    </div>
