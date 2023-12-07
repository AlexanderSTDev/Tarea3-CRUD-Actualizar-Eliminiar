<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Usuarios</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_usuario">
                        Nuevo Usuario
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombres</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Apellidos</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Rol</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_usuarios">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_usuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_usuarios">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Usuarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="UsuarioId" id="UsuarioId">


                    <div class="form-group">
                        <label for="Cédula">Cédula</label>
                        <input type="text" onfocusout="algoritmo_cedula();cedula_repetida();" required class="form-control" id="Cedula" name="Cedula" placeholder="Cédula">
                        <div class="alert alert-danger d-none" role="alert" id="errorCedula">
                        </div>
                        <div class="alert alert-danger d-none" role="alert" id="CedulaRepetida">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input type="text" required class="form-control" id="Nombres" name="Nombres" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <label for="Apellidos">Apellidos</label>
                        <input type="text" required class="form-control" id="Apellidos" name="Apellidos" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input type="text" required class="form-control" id="Telefono" name="Telefono" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="Rol">Rol</label>
                        <select name="Rol" id="Rol" class="form-control">
                            <option value="Administrador">Administrador</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="Cliente">Cliente</option>
                            <option value="Gerente">Gerente</option>
                            <option value="Cajero">Cajero</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Correo">Correo</label>
                        <input type="text" required onfocusout="verifica_correo()" class="form-control" id="Correo" name="Correo" placeholder="Correo">
                        <div class="alert alert-danger d-none" role="alert" id="CorreoRepetido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Contrasenia">Contraseña</label>
                        <input type="password" required onfocusout="verifica_contrasenias()" class="form-control" id="Contrasenia" name="Contrasenia" placeholder="Contrasenia">
                        <div class="alert alert-danger d-none" role="alert" id="errorContrasenia">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Repita su contraseña</label>
                        <input type="password" required class="form-control" onfocusout="verifica_contrasenias()"  id="Contrasenia2" placeholder="Contrasenia2">
                        <div class="alert alert-danger d-none" role="alert" id="errorContrasenia">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="usuarios.controller.js"></script>
<script src="usuarios.model.js"></script>