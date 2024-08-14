// 
function likear(element) {
    var valor = $(element).data('id_producto');
    var param = {
       "idProducto": valor
    };

    $.ajax({
        data: param,
        url: "../usuarios/ctroUser.php?like=true",
        dataType: "html",
        method: "post",
        success: function(respuesta){
            if(respuesta == 1) {
                $(element).toggleClass('fas far liked');
            } else {
                console.log("Error al procesar el like.");
            }
        },
        error: function(status, xhr, error){
            console.log("Error: " + error);
        }
    });
}



// function likear(element) {
//     var valor = $(element).data('id_producto');
//     var param = {
//        "idProducto": valor
//     };

//     $.ajax({
//         data: param,
//         url: "../usuarios/ctroUser.php?like=true",
//         dataType: "html",
//         method: "post",
//         success: function(respuesta){
//             console.log(respuesta);
//         },
//         error: function(status, xhr, error){
//             console.log("eror: "+error);
//         }
//     });
// }


// function likear(element) {
//     var valor = $(element).data('id_producto');
//     var param = {
//        "idProducto": valor
//     };

//     $.ajax({
//         data: param,
//         url: "../usuarios/ctroUser.php?like=true",
//         dataType: "html",
//         method: "post",
//         success: function(respuesta){
//             console.log(respuesta);
//         },
//         error: function(status, xhr, error){
//             console.log("eror: "+error);
//         }
//     });
// }






    // function likear(element) {
    //     var valor = $(element).data('id_producto');
    //     var param = {
    //         "idProducto": valor
    //     };
    
    //     $.ajax({
    //         data: param,
    //         url: "../usuarios/ctroUser.php?like=true",
    //         dataType: "html",
    //         method: "post",
    //         success: function(respuesta){
    //             if (respuesta == 1) {
    //                 $(element).toggleClass('liked');
    //             } else {
    //                 console.log("Error al procesar la solicitud de like.");
    //             }
    //         },
    //         error: function(status, xhr, error){
    //             console.log("Error: " + error);
    //         }
    //     });
    // }










// function likear(){
//     var valor = $(this).data('id_producto');
//     var param = {
//        "idProducto": valor
//     }

//     $.ajax({
//         data: param,
//         url: "../admi/ctroAdmi.php?like=true",
//         dataType : "html",
//         method: "post",
//         success: function(respuesta){
//             console.log(respuesta);
            
//         },
//         error: function(status,xhr,error){
//             console.log(error);
//         }
//     })
// }

