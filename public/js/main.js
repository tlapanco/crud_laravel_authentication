let catalogos = [
    '/cuatrimestres',
    '/areas',
    '/administradores',
    '/tipodeusuarios',
    '/carreras',
    '/grupos',
    '/ciclos'
];

checkUrlSidebar(catalogos);

$(document).ready(() => {
    window.scrollTo(0, 0);

    Alerts();
});

function Alerts() {
    const alertError = $(".alert-error");
    const alertMessage = $(".alert-message");

    setTimeout(() => {
        alertError.hide("slide", { direction: "left" }, 400);
    }, 3500);
    setTimeout(() => {
        alertMessage.hide("slide", { direction: "left" }, 400);
    }, 3500);
}

function checkUrlSidebar(catalogos){
    catalogos.forEach( catalogo =>{
        if (window.location.href.indexOf(catalogo) > -1) {
            $('.catalogos-link').attr('aria-expanded', true);
            $('.collapse-catalogos').addClass('show');
            $('#inactive-icon').hide();
            $('#active-icon').removeClass('d-none');
            $('#active-icon').show();
        }
    })
}
