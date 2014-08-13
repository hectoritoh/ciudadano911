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

function generarString(emergenciaJSON){
    var direccion = obtenerNobreCalles(emergenciaJSON["latitud"], emergenciaJSON["longitud"]);
    
    var contentString = '<div id="content">'+                
                '<h1 id="firstHeading" class="firstHeading">' + emergenciaJSON["tipoEmergencia"] + '</h1>'+
                '<div id="bodyContent">'+
                '<p><strong>Descripci&oacute;n: </strong>' + emergenciaJSON["descripcion"] + '</p>' +
                '<hr>'+
                '<p>'+
                '<strong>Latitud: </strong>' + emergenciaJSON["latitud"] + '<br>' +
                '<strong>Longitud: </strong>' + emergenciaJSON["longitud"] + '<br>' +
                '<strong>Usuario: </strong>' + emergenciaJSON["username"] + '<br>' +
                '</p>'+
                '<hr>'+
                '<p>'+
                '<strong>Direccion: </strong>' + direccion["results"][0]["formatted_address"] + '<br>' +
                '<strong>Fecha: </strong>' + emergenciaJSON["fecha"] + '<br>' +
                '</p>'+
                '<hr>'+
                '<a href="'+ Routing.generate('atender_emergencia', { idEmergencia: emergenciaJSON["idEmergencia"] }) + '" class="btn btn-danger">Atender</a>'
                '</div>'+
                '</div>';
                
                
/*
    {
    "codigo": 1,
    "mensaje": "Emergencias encontradas",
    "emergenciaDetalle": {
        "idEmergencia": 2,
        "tipoEmergencia": "cte",
        "descripcion": null,
        "latitud": "-2.205647",
        "longitud": "-79.906241",
        "idUsuario": 2,
        "username": "admin"
    }
}

*/
    return(contentString);

}


function obtenerContenidoTooltipEmergencia(emergencia){
    var contentString = "";
    var parametros = {
        emergencia: emergencia
    }

    $.ajax({
        url: Routing.generate('get_emergencia'),
        type: 'POST',
        async: false,
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
          if(respuesta.codigo == 1){
            console.log("Okay: " + respuesta.mensaje);
            contentString = generarString(respuesta.emergenciaDetalle);

          }else{
            console.log("Error: " + respuesta.mensaje);
          }
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });

    return(contentString);
}

function obtenerNobreCalles(latitud, longitud){
    var arrDireccion = new Array();
    $.ajax({
        url: 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitud +','+longitud+'&sensor=true_or_false&region=ec',
        async: false,
        dataType: "json",
        success: function (respuesta) {
          //console.log(respuesta);
          arrDireccion = respuesta;
        }, 
        error: function (error) {
          console.log("ERROR: " + error);
        }
    });
    return arrDireccion;
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

        var marcador = null;
        var infowindow = null;
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


            
            var infowindow = new google.maps.InfoWindow({
                //content: contentString
                content: obtenerContenidoTooltipEmergencia(emergenciasMapa[i])
            });

            google.maps.event.addListener(marcador, 'click', function() {
                infowindow.open(map,this);
            });
        }

        var mapType = new google.maps.StyledMapType(stylez, {name: "Emergencias"});
        map.mapTypes.set('tehgrayz', mapType);
        map.setMapTypeId('tehgrayz');
        
    }

});



