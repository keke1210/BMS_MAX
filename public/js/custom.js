jQuery(document).ready(function($) {
	toastr.options = {
        "closeButton": true,
        "debug": true,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('body').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    /*pour le menu, si le client est sur les liens dde 2eme niveaux */
    if ($("#second > a" ).is( ".active" )) {

        $("#gescom").addClass('in');
        
    };

    /*pour le menu, si le client est sur les liens dde 2eme niveaux */
    if ($("#second_b > a" ).is( ".active" )) {

        $("#biblio").addClass('in');
        
    };

    setAfNoLocked();


});


function setAfNoLocked(less){
    if(less == 'undefined' || less == undefined){
        less = 0;
    }
    var nb = localStorage.getItem('af_no_locked');
    nb = nb - less;
    localStorage.setItem('af_no_locked', nb);
    $('#af_no_locked').html('('+nb+')');
    $('#nb_reste').html(nb);
}

//partie sur le calcul de la tva intra
function litnombre(aChaineNombre)
{
    // retire les espaces les points et autres caractères différents des nombres
    var li=0;
    var lChaine=""+aChaineNombre;

    while (li<eval(lChaine.length))
    {
        if (lChaine.charCodeAt(li)<48 || lChaine.charCodeAt(li)>57)
        {
            lChaine=lChaine.substring(0,li)+lChaine.substring(li+1,lChaine.length);
            li=li-1;
        }

        li++;
    }
    return lChaine;
}

function fCalculeSiret(siren)
{
    if (siren!="")
    {
        var lSIREN=litnombre(siren);

        var lTVAFR=( ( (eval(lSIREN) % 97) *3 ) + 12 ) % 97;
        if (eval(lTVAFR)<10){
            lTVAFR="0"+lTVAFR;
        }

        return "FR"+lTVAFR+lSIREN;
    }
}

function getCompany(item) {
    if( item.value ) return item.value;
    if( item.city ) return item.city;
}