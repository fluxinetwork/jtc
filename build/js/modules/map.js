/*------------------------------*\

    #MAP

\*------------------------------*/

var mapJTC,basicIcon;

var mapStyle = {
    "color": "#ff7800",
    "weight": 5,
    "opacity": 0.65
};

function initMap (){

    mapJTC = L.map('map-events', {
        center: [47.07, 2.21],
        zoom: 5.3,
        scrollWheelZoom: false
    });

	L.tileLayer('https://api.mapbox.com/styles/v1/jtc2016/cirvv3gli001egynmqdliyk6t/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoianRjMjAxNiIsImEiOiJjaXJ2dW43cmEwMGhwaHVuaGlhaXJtZmJyIn0.waqWvkaPAVkIed9Xi5zxsw', {
		maxZoom: 14,
		attribution: 'Carte &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributeurs, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
		id: 'jtc2016'
	}).addTo(mapJTC);

	$.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: ajax_object.ajax_url,
        data: 'action=get_json_map',
        success: function(data){
            geojsonLayer = L.geoJson( 
                data, {
	            	style: mapStyle,
	            	onEachFeature: onEachFeature,
	        	}
	        ).addTo(mapJTC);            
        },
        error : function(jqXHR, textStatus, errorThrown) {
            //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
        }

    });
    return false;

}

/*function onEachFeature(feature, layer) {

	console.log(feature);

	var popupContent = "<p>I started out as a GeoJSON " +
			feature.geometry.type + ", but now I'm a Leaflet vector!</p>";

	if (feature.properties && feature.properties.popupContent) {
		popupContent += feature.properties.popupContent;
	}

	layer.bindPopup(popupContent);
}*/

function onEachFeature(f,l){
    var out = [];
    if (f.properties){
        for(key in f.properties){
            out.push(f.properties[key]);
        }
        l.bindPopup(out.join(""));
    }
}


function initMapMobil(){

    $('.js-open-map, .js-close-map').click(function(e){
        e.preventDefault();
        $('.map-holder').toggleClass('is-open');
    });
}

