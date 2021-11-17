
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Nombre</label>
                <?php if($edit) { ?>
                    <input type="text" class="form-control" id="inputEmail4" value="<?php echo$user['nombre']?>">
                <?php }else { ?>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="ingrese Nombre">
                <?php } ?>
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Usuario</label>
                <?php if($edit) { ?>
                    <input type="text" class="form-control" id="inputPassword" value="<?php echo$user['usuario']?>">
                <?php }else { ?>
                    <input type="text" class="form-control" id="inputPassword" placeholder="Ingrese Usuario">
                <?php } ?>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputAddress">Contraseña</label>
                    <?php if($edit) { ?>
                        <input type="password" class="form-control" id="inputPassword" value="<?php echo$user['password']?>">
                    <?php }else { ?>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Ingrese Contraseña">
                    <?php } ?>
                </div>
                <div class="form-group col-md-6"></div>
                    <label for="inputAddress2">Rol</label>
                    <select name="select">
                    <option value="value1">Administrador</option>
                    <option value="value2" selected>Profesor</option>
                    <option value="value3">Alumno</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
  