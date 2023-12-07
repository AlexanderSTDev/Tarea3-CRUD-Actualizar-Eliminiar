//archivo de donde llamar al procedimiento
//controlador

function init() {
    $("#form_materias_aransel").on("submit", function (e) {
        guardaryeditar(e);
    });
}

$().ready(() => {
    //detecta carga de la pagina
    todos_controlador();
});

var todos_controlador = () => {
    var todos = new Materias_Aransel_Model("", "", "", "", "", "", "", "", "", "todos");
    todos.todos();
}

var guardaryeditar = (e) => {
    e.preventDefault();
    var formData = new FormData($("#form_materias_aransel")[0]);
    var Id_Materias = document.getElementById("Id_Materias").value;

    if (Id_Materias > 0) {
        var materias = new Materias_Aransel_Model("", "", "", "", "", "", "", "", formData, "editar");
        materias.editar();
    } else {
        var materias = new Materias_Aransel_Model("", "", "", "", "", "", "", "", formData, "insertar");
        materias.insertar();
    }
}

var editar = (Id_Materias) => {
    var uno = new Materias_Aransel_Model(Id_Materias, "", "", "", "", "", "", "", "", "uno");
    uno.uno()
}

var eliminar = (Id_Materias) => {
    var eliminar = new Materias_Aransel_Model(Id_Materias, "", "", "", "", "", "", "", "", "eliminar");
    eliminar.eliminar();
}

    ; init();
