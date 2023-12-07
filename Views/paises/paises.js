//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_paises").on("submit", function (e) {
    guardaryeditar(e);
  });
}


$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/paises.controller.php?op=todos", (res) => {
    res = JSON.parse(res);
    $.each(res, (index, valor) => {

      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${valor.PaisId
        })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.PaisId
        })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${valor.PaisId
        })'>Ver</button>
            </td></tr>
                `;
    });
    $("#tabla_paises").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_paises")[0]);
  var ruta = '';
  var PaisId = document.getElementById("PaisId").value
  if (PaisId > 0) {
    ruta = "../../Controllers/paises.controller.php?op=actualizar"
  } else {
    ruta = "../../Controllers/paises.controller.php?op=insertar"
  }
  $.ajax({
    url: ruta,
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
      res = JSON.parse(res);
      if (res == "ok") {
        Swal.fire("Paises", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("usuarios", "Error al guardo, intente mas rtarde", "error");
      }
    },
  });
}

var editar = (PaisId) => {

  $.post(
    "../../Controllers/paises.controller.php?op=uno",
    { PaisId: PaisId },
    (res) => {
      res = JSON.parse(res);
      $("#PaisId").val(res.PaisId);
      $("#Nombre").val(res.Nombre);

    }
  );
  $("#Modal_paises").modal("show");
}


var eliminar = (PaisId) => {
  Swal.fire({
    title: "Paises",
    text: "Esta seguro de eliminar el pais",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/paises.controller.php?op=eliminar",
        { PaisId: PaisId },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("Paises", "Pais Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  limpia_Cajas();
}

var limpia_Cajas = () => {
  document.getElementById("PaisId").value = "";
  document.getElementById("Nombre").value = "";
  $("#Modal_paises").modal("hide");

}
init();