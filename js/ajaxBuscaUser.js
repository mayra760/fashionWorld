function buscarUser(event) {
    event.preventDefault();

    var valor = document.getElementById('id_persona').value;

    var param = {
        "busqueda": valor
    };

    $.ajax({
        data: param,
        url: '../admi/ctroAdmi.php?buscarU=true',
        dataType: 'text',
        method: 'post',
        beforeSend: function() {
            document.getElementById("personas").innerHTML = "Se está buscando el usuario...";
        },
        success: function(respuesta) {
            document.getElementById('personas').innerHTML = "";
            document.getElementById('idDato').innerHTML = respuesta;
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}