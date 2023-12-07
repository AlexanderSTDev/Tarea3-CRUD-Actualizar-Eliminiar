<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Materias de la Malla Curricular</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_materias_aransel">
                        Nueva Materia
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Semestre</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Primera Materia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Segunda Materia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Tercera Materia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cuarta Materia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Quinta Materia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Sexta Materia</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Septima Materia</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_materias_aransel">

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
<div class="modal fade" id="Modal_materias_aransel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_materias_aransel">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Materias para el Semestre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="Id_Materias" id="Id_Materias">

                    <div class="form-group">
                        <label for="Semestre">Semestre</label>
                        <input type="text" required class="form-control" id="Semestre" name="Semestre" placeholder="Semestre">
                    </div>
                    <div class="form-group">
                        <label for="Primera_Materia">Primera Materia</label>
                        <input type="text" required class="form-control" id="Primera_Materia" name="Primera_Materia" placeholder="Primera Materia">
                    </div>
                    <div class="form-group">
                        <label for="Segunda_Materia">Segunda Materia</label>
                        <input type="text" required class="form-control" id="Segunda_Materia" name="Segunda_Materia" placeholder="Segunda Materia">
                    </div>
                    <div class="form-group">
                        <label for="Tercera_Materia">Tercera Materia</label>
                        <input type="text" required class="form-control" id="Tercera_Materia" name="Tercera_Materia" placeholder="Tercera Materia">
                    </div>
                    <div class="form-group">
                        <label for="Cuarta_Materia">Cuarta Materia</label>
                        <input type="text" required class="form-control" id="Cuarta_Materia" name="Cuarta_Materia" placeholder="Cuarta Materia">
                    </div>
                    <div class="form-group">
                        <label for="Quinta_Materia">Quinta Materia</label>
                        <input type="text" required class="form-control" id="Quinta_Materia" name="Quinta_Materia" placeholder="Quinta Materia">
                    </div>
                    <div class="form-group">
                        <label for="Sexta_Materia">Sexta Materia</label>
                        <input type="text" required class="form-control" id="Sexta_Materia" name="Sexta_Materia" placeholder="Sexta Materia">
                    </div>
                    <div class="form-group">
                        <label for="Septima_Materia">Septima Materia</label>
                        <input type="text" required class="form-control" id="Septima_Materia" name="Septima_Materia" placeholder="Septima Materia">
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

<script src="materias.controller.js"></script>
<script src="materias.model.js"></script>