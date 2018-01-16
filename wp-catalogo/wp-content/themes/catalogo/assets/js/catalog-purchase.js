var validateCatalogPurchase = function(willRedirect, redirectUrl, redirectHomeUrl) {
    var urlValidation = 'http://170.0.82.214/catalogos/api/receipt/';
    swal({
            title: "Validación de Catálogo",
            text: "Ingresa el código del ticket de compra del catálogo",
            type: "input",
            showCancelButton: false,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
        function(receipt) {
            if (receipt) {
                $.getJSON(urlValidation + receipt)
                    .done(function(response) {
                        if (response == null) {
                            swal("Oops...", "No se ha encontrado el ticket ingresado.", "error");
                            if (redirectHomeUrl) {
                                location.href = redirectHomeUrl;
                            }
                            return;
                        }
                        else {
                            sessionStorage.setItem("catalogValidation", "true");
                            swal("Gracias!", "Compra de catálogo validada correctamente", "success");
                            if (willRedirect) {
                                location.href = redirectUrl;
                            }
                        }
                    })
                    .fail(function(error) {
                        console.log("error", error);
                        swal("Oops...", "Ha ocurrido un error, vuelva a intentar y si persiste contacte a alguien de soporte por favor.", "error");
                        if (redirectHomeUrl) {
                            location.href = redirectHomeUrl;
                        }
                    });
            } else {
                if (redirectHomeUrl) {
                    location.href = redirectHomeUrl;
                }
            }
        });
};

var callCatalogValidation = function(willRedirect, redirectUrl, redirectHomeUrl) {
    var catalogValidated = Boolean(sessionStorage.getItem("catalogValidation"));
    if (!catalogValidated) {
        validateCatalogPurchase(willRedirect, redirectUrl, redirectHomeUrl);
    } else {
        if (redirectUrl !== null) {
            location.href = redirectUrl;
        }
    }
};