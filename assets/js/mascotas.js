jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});   

$( function() {
    $( "#fecha_nac" ).datepicker({dateFormat: 'y/mm/d'});
    $( "#fecha_chip" ).datepicker({dateFormat: 'y/mm/d'});
} );

function addMascota() {
    var confirm= alertify.confirm('Confirmación','Esta seguro que desea agregar esta nueva  mascota?',null,null).set('labels', {ok:'Si', cancel:'No'}); 	

    confirm.set({transition:'slide'});   	

    confirm.set('onok', function(){ //callbak al pulsar botón positivo
        alertify.success('Has confirmado');
        var nombre = $( "#nombre" ).val();
        var especies = $( "#especies" ).val();
        var raza = $( "#raza" ).val();
        var sexo = $( "#gender" ).val();
        var fecha_nac = $( "#fecha_nac" ).val();
        var esteril = $( "#esteril" ).val();
        var alergias = $( "#alergias" ).val();
        var chip = $( "#chip" ).val();
        var fecha_chip = $( "#fecha_chip" ).val();
        url="http://controlmascota.dev/index.php/amo/Mascotas/guardar_mascota";
        $.post(url,{nombre:nombre,especies:especies,raza:raza,sexo:sexo,fecha_nac:fecha_nac,esteril:esteril,alergias:alergias,chip:chip,fecha_chip:fecha_chip}).done(function(resp){
            alertify.alert("<b>Confirmación</b>",resp, function () {
                location.reload(true);  
            });          
        })
            .fail(function() {
            alertify.alert("<b>Confirmación</b>",resp);
        })
    });
    confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
        alertify.error('Has Cancelado');
    });   
}
