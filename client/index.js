//Seleccionamos lo que será el editor y lo configuramos
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/c_cpp");
editor.setFontSize('14px');


//Ponemos el código cargado del archivo desde el backend (server.js)
fetch("/CodeBase").then(response=>response.text()).then(text=>{
    editor.setValue(text,{Selection:false});
}).catch(error=>console.error(error));

function descargar() {
    var code = editor.getValue();
    var blob = new Blob([code], { type: "text/plain;charset=utf-8" });
    const link = document.createElement("a");
    link.download = "mi_codigo.c";
    link.href = URL.createObjectURL(blob);
    link.click();

}

function subido(){
    fetch("/subir/actualizar").then(response=>response.text()).then(text=>{
        editor.setValue(text,{Selection:false});
    }).catch(error=>console.error(error));
}

$('#compilar').click(function () {
    var code = editor.getValue();
    var ruta = "texto=" + code;
    document.getElementById("compilando").className = "progress center-align container";
    $.ajax({
        url: './Compilar.php',
        type: 'POST',
        data: ruta,
    })
        .done(function (res) {
            document.getElementById("resultado").innerHTML = res;
            document.getElementById("resul").className = "container row animate__animated animate__fadeInUp";
            document.getElementById("compilando").className = "hide";
            window.scrollTo(0, document.body.scrollHeight);
        })
        .fail(function () {
            console.log("error");
        })
        .always(function () {
            console.log("complete");
        })
});


$("#ejecutar").click(function () {
    $.ajax({
        url: './Debugging.php',
        type: 'POST',
    })
        .done(function () {
            console.log("todo correcto");
        })
        .fail(function () {
            console.log("error");
        })
        .always(function () {
            console.log("complete");
        })
})
