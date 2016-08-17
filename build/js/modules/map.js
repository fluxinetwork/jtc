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

    mapJTC = L.map('map-events').setView([47.07, 2.21], 5.3);   

	L.tileLayer('https://api.mapbox.com/styles/v1/jtc2016/cirvv3gli001egynmqdliyk6t/tiles/256/{z}/{x}/{y}?access_token=pk.eyJ1IjoianRjMjAxNiIsImEiOiJjaXJ2dW43cmEwMGhwaHVuaGlhaXJtZmJyIn0.waqWvkaPAVkIed9Xi5zxsw', {
		maxZoom: 14,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
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
            console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
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

    console.log(f);

    console.log(l);

    var out = [];
    if (f.properties){
        for(key in f.properties){
            out.push(key+": "+f.properties[key]);
        }
        l.bindPopup(out.join("<br />"));
    }
}

