var emergenciasMapa = new Array();

function obtenerPuntosBase(){
    var puntosMapa = new Array();

    $.ajax({
        url: Routing.generate('get_emergencias'),
        type: 'POST',
        async: false,
        //data: parametros,
        dataType: "json",
        success: function (respuesta) {
          if(respuesta.codigo == 1){
            console.log("Okay: " + respuesta.mensaje);
            puntosMapa = respuesta.listaEmergencias;
          }else{
            console.log("Error: " + respuesta.mensaje);
          }
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });

    return puntosMapa;
}

$(document).ready(function() {

    emergenciasMapa = obtenerPuntosBase();

    if( emergenciasMapa.length > 0 ){
    	var marcadorAzul = new google.maps.MarkerImage("../../web/bundles/celmediaadmintheme/img/puntero-azul.png",
    	    new google.maps.Size(50,50),
    	    new google.maps.Point(0,0),
    	    new google.maps.Point(50,50)
    	);

    	var marcadorRojo = new google.maps.MarkerImage("../../web/bundles/celmediaadmintheme/img/puntero-rojo.png",
    	    new google.maps.Size(50,50),
    	    new google.maps.Point(0,0),
    	    new google.maps.Point(50,50)
    	);

    	//////////////////////////////////////////////////////////////

        var map;

        var zona0 = new google.maps.LatLng(emergenciasMapa[0]["latitud"],emergenciasMapa[0]["longitud"]);

        var stylez = [
            {
                featureType: "all",
                elementType: "all",
                stylers: [
                    {saturation: -100} // <-- THIS
                ]
            }
        ];

        var mapOptions = {
        	zoom: 15,
            zoomControl: true,
            scaleControl: false,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
            center: zona0,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'tehgrayz']
            }
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        for (var i = 0; i < emergenciasMapa.length; i++) {
        	
        	var ubicacion = new google.maps.LatLng(emergenciasMapa[i]["latitud"], emergenciasMapa[i]["longitud"]);

        	var icono;
        	if(i%2 == 0){
        		icono = marcadorAzul;
        	}else{
        		icono = marcadorRojo;
        	}

    		var marcador = new google.maps.Marker({
    			position: ubicacion,
    			map: map,
    			icon: icono,
    			title: emergenciasMapa[i]["tipoEmergencia"],
    			zIndex: 3
    		});
    	}

        var mapType = new google.maps.StyledMapType(stylez, {name: "Emergencias"});
        map.mapTypes.set('tehgrayz', mapType);
        map.setMapTypeId('tehgrayz');
        
    }

});



