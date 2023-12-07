//aqui va a estar el codigo de usuarios.model.js

function init() {
  $("#frm_provincias").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  todos();
});

var todos = () => {
  var html = "";
  $.get("../../Controllers/provincias.controller.php?op=todos", (res) => {
    console.log(res);
    res = JSON.parse(res);
    $.each(res, (index, valor) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombre}</td>
                <td>${valor.pais}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.ProvinciasId
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.ProvinciasId
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.ProvinciasId
            })'>Ver</button>
            </td></tr>
                `;
    });
    $("#tabla_paises").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var dato = new FormData($("#frm_provincias")[0]);
  var ruta = "";
  var ProvinciasId = document.getElementById("ProvinciasId").value;
  if (ProvinciasId > 0) {
    ruta = "../../Controllers/provincias.controller.php?op=actualizar";
  } else {
    ruta = "../../Controllers/provincias.controller.php?op=insertar";
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
        Swal.fire("provincias", "Registrado con éxito", "success");
        todos();
        limpia_Cajas();
      } else {
        Swal.fire("provincias", "Error al guardo, intente mas tarde", "error");
      }
    },
  });
};

var cargaPaises = () => {
  return new Promise((resolve, reject) => {
    $.post("../../Controllers/paises.controller.php?op=todos", (res) => {
      res = JSON.parse(res);
      var html = "";
      $.each(res, (index, val) => {
        html += `<option value="${val.PaisId}"> ${val.Nombre}</option>`;
      });
      $("#PaisId").html(html);
      resolve();
    }).fail((error) => {
      reject(error);
    });
  });
};

var editar = async (ProvinciasId) => {
  await cargaPaises();
  $.post(
    "../../Controllers/provincias.controller.php?op=uno",
    { ProvinciasId: ProvinciasId },
    (res) => {
      res = JSON.parse(res);

      $("#ProvinciasId").val(res.ProvinciasId);
      $("#PaisId").val(res.PaisesId);
      //document.getElementById("PaisId").value = res.PaisesId;


      $("#Nombre").val(res.Nombre);
    }
  );
  $("#Modal_provincia").modal("show");
};

var eliminar = (ProvinciasId) => {
  Swal.fire({
    title: "Paises",
    text: "Esta seguro de eliminar la provincia",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#d33",
    cancelButtonColor: "#3085d6",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "../../Controllers/provincias.controller.php?op=eliminar",
        { ProvinciasId: ProvinciasId },
        (res) => {
          res = JSON.parse(res);
          if (res === "ok") {
            Swal.fire("provincias", "Provincia Eliminado", "success");
            todos();
          } else {
            Swal.fire("Error", res, "error");
          }
        }
      );
    }
  });

  impia_Cajas();
};

var limpia_Cajas = () => {
  document.getElementById("ProvinciasId").value = "";
  document.getElementById("PaisId").value = "";
  document.getElementById("Nombre").value = "";
  $("#Modal_provincia").modal("hide");
};
init();
