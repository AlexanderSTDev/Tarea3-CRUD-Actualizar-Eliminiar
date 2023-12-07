
class Materias_Aransel_Model {
    constructor(
        Id_Materias,
        Semestre,
        Primera_Materia,
        Segunda_Materia,
        Tercera_Materia,
        Cuarta_Materia,
        Quinta_Materia,
        Sexta_Materia,
        Septima_Materia,
        Ruta
    ) {
        this.Id_Materias = Id_Materias;
        this.Semestre = Semestre;
        this.Primera_Materia = Primera_Materia;
        this.Segunda_Materia = Segunda_Materia;
        this.Tercera_Materia = Tercera_Materia;
        this.Cuarta_Materia = Cuarta_Materia;
        this.Quinta_Materia = Quinta_Materia;
        this.Sexta_Materia = Sexta_Materia;
        this.Septima_Materia = Septima_Materia;
        this.Ruta = Ruta;
    }
    todos() {
        var html = "";
        $.get("../../Controllers/materias.controller.php?op=" + this.Ruta, (res) => {
            res = JSON.parse(res);
            $.each(res, (index, valor) => {
                html += `<tr>
                  <td>${index + 1}</td>
                  <td>${valor.Semestre}</td>
                  <td>${valor.Primera_Materia}</td>
                  <td>${valor.Segunda_Materia}</td>
                  <td>${valor.Tercera_Materia}</td>
                  <td>${valor.Cuarta_Materia}</td>
                  <td>${valor.Quinta_Materia}</td>
                  <td>${valor.Sexta_Materia}</td>
                  <td>${valor.Septima_Materia}</td>
              <td>
              <button class='btn btn-success' onclick='editar(${valor.Id_Materias
                    })'>Editar</button>
              <button class='btn btn-danger' onclick='eliminar(${valor.Id_Materias
                    })'>Eliminar</button>
              <button class='btn btn-info' onclick='ver(${valor.Id_Materias
                    })'>Ver</button>
              </td></tr>
                  `;
            });
            $("#tabla_materias_aransel").html(html);
        });
    }

    insertar() {
        var dato = new FormData();
        dato = this.Septima_Materia;
        $.ajax({
            url: "../../Controllers/materias.controller.php?op=insertar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Materias", "Materia Registrada", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            }
        });
        this.limpia_Cajas();
    }

    uno() {
        var Id_Materias = this.Id_Materias;
        $.post(
            "../../Controllers/materias.controller.php?op=uno",
            { Id_Materias: Id_Materias },
            (res) => {
                res = JSON.parse(res);
                $("#Id_Materias").val(res.Id_Materias);
                $("#Semestre").val(res.Semestre);
                // Hecho con Jquery
                $("#Primera_Materia").val(res.Primera_Materia);
                $("#Segunda_Materia").val(res.Segunda_Materia);
                $("#Tercera_Materia").val(res.Tercera_Materia);
                // Hecho con Js
                document.getElementById("Cuarta_Materia").value = res.Cuarta_Materia;
                document.getElementById("Quinta_Materia").value = res.Quinta_Materia;
                document.getElementById("Sexta_Materia").value = res.Sexta_Materia;
                document.getElementById("Septima_Materia").value = res.Septima_Materia;
            }
        );
        $("#Modal_materias_aransel").modal("show");
    }

    editar() {
        var dato = new FormData();
        dato = this.Septima_Materia;
        $.ajax({
            url: "../../Controllers/materias.controller.php?op=actualizar",
            type: "POST",
            data: dato,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if (res === "ok") {
                    Swal.fire("Materias", "Materia Actualizada", "success");
                    todos_controlador();
                } else {
                    Swal.fire("Error", res, "error");
                }
            }
        });
        this.limpia_Cajas();
    }

    eliminar() {
        var Id_Materias = this.Id_Materias;

        Swal.fire({
            title: "Materias",
            text: "Esta seguro de eliminar la materia",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Eliminar",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    "../../Controllers/materias.controller.php?op=eliminar",
                    { Id_Materias: Id_Materias },
                    (res) => {
                        res = JSON.parse(res);
                        if (res === "ok") {
                            Swal.fire("Materias", "Materia Eliminada", "success");
                            todos_controlador();
                        } else {
                            Swal.fire("Error", res, "error");
                        }
                    }
                );
            }
        });

        this.limpia_Cajas();
    }

    limpia_Cajas() {
        document.getElementById("Semestre").value = "";
        document.getElementById("Primera_Materia").value = "";
        document.getElementById("Segunda_Materia").value = "";
        document.getElementById("Tercera_Materia").value = "";
        document.getElementById("Cuarta_Materia").value = "";
        document.getElementById("Quinta_Materia").value = "";
        document.getElementById("Sexta_Materia").value = "";
        document.getElementById("Septima_Materia").value = "";
        $("#Id_Materias").val("");
        $("#Modal_materias_aransel").modal("hide");
    }
}
