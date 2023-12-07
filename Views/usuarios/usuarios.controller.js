//archivo de donde llamar al procedimiento
//controlador

function init() {
  $("#form_usuarios").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos_controlador();
});

var todos_controlador = () => {
  var todos = new Usuarios_Model("", "", "", "", "", "", "", "", "todos");
  todos.todos();
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#form_usuarios")[0]);
  var UsuarioId = document.getElementById("UsuarioId").value;

  if (UsuarioId > 0) {
    var usuarios = new Usuarios_Model("", "", "", "", "", "", "", formData, "editar");
    usuarios.editar();
  } else {
    var usuarios = new Usuarios_Model("", "", "", "", "", "", "", formData, "insertar");
    usuarios.insertar();
  }
};

var editar = (UsuarioId) => {
  var uno = new Usuarios_Model(UsuarioId, "", "", "", "", "", "", "", "uno");
  uno.uno();
};
var algoritmo_cedula = () => {
  var cedula = $("#Cedula").val();

  if (cedula.length == 10) {
    var digito_region = cedula.substring(0, 2);
    if (digito_region >= 1 && digito_region <= 24) {
      // Extraigo el ultimo digito
      var ultimo_digito = cedula.substring(9, 10);
      var pares =
        parseInt(cedula.substring(1, 2)) +
        parseInt(cedula.substring(3, 4)) +
        parseInt(cedula.substring(5, 6)) +
        parseInt(cedula.substring(7, 8));
      var numero1 = cedula.substring(0, 1);
      var numero1 = numero1 * 2;
      if (numero1 > 9) {
        var numero1 = numero1 - 9;
      }
      var numero3 = cedula.substring(2, 3);
      var numero3 = numero3 * 2;
      if (numero3 > 9) {
        var numero3 = numero3 - 9;
      }
      var numero5 = cedula.substring(4, 5);
      var numero5 = numero5 * 2;
      if (numero5 > 9) {
        var numero5 = numero5 - 9;
      }
      var numero7 = cedula.substring(6, 7);
      var numero7 = numero7 * 2;
      if (numero7 > 9) {
        var numero7 = numero7 - 9;
      }
      var numero9 = cedula.substring(8, 9);
      var numero9 = numero9 * 2;
      if (numero9 > 9) {
        var numero9 = numero9 - 9;
      }
      var impares = numero1 + numero3 + numero5 + numero7 + numero9;
      var suma_total = pares + impares;
      // extraemos el primero digito
      var primer_digito_suma = String(suma_total).substring(0, 1);
      // Obtenemos la decena inmediata
      var decena = (parseInt(primer_digito_suma) + 1) * 10;
      // Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
      var digito_validador = decena - suma_total;
      // Si el digito validador es = a 10 toma el valor de 0
      if (digito_validador == 10) var digito_validador = 0;
      // Validamos que el digito validador sea igual al de la cedula
      if (digito_validador == ultimo_digito) {
        $("#errorCedula").addClass("d-none");
        $("button").prop("disabled", false);
      } else {
        $("#errorCedula").removeClass("d-none");
        $("#errorCedula").html("El número de cédula ingresado no es correcto");
        $("button").prop("disabled", true);
      }
    } else {
      // imprimimos en consola si la region no pertenece
      $("#errorCedula").removeClass("d-none");
      $("#errorCedula").html("El número de cédula ingresado no es correcto");
      $("button").prop("disabled", true);
    }
  }
};

var cedula_repetida = () => {
  var cedula = $("#Cedula").val();
  var usuarios = new Usuarios_Model("", cedula, "", "", "", "", "", "", "cedula_repetida");
  usuarios.cedula_repetida();
};
var verifica_correo = () => {
  var Correo = $("#Correo").val();
  var usuarios = new Usuarios_Model("", "", "", "", "", Correo, "", "", "verifica_correo");
  usuarios.verifica_correo();
};

var verifica_contrasenias = () => {
  var Contrasenia = $("#Contrasenia").val();
  var Contrasenia2 = $("#Contrasenia2").val();
  if (Contrasenia == Contrasenia2) {
    $("#errorContrasenia").addClass("d-none");
    $("button").prop("disabled", false);
  } else {
    $("#errorContrasenia").removeClass("d-none");
    $("#errorContrasenia").html("Las contraseñas no coinciden");
    $("button").prop("disabled", true);
  }
};

var eliminar = (UsuarioId) => {
  var eliminar = new Usuarios_Model(UsuarioId, "", "", "", "", "", "", "", "eliminar");
  eliminar.eliminar();
}


init();
