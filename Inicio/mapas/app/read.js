function _displayMapRead (divtarget) {
	divtarget = typeof divtarget !== 'undefined' ? divtarget : 'app';
	document.getElementById(divtarget).innerHTML = "<div id='map' class='map-wrapper'></div>";
	
	var map, isCollapsed, openStreetMaps;
	
	if (document.body.clientWidth <= 767) {
		isCollapsed = true;
	} else {
		isCollapsed = false;
	}
	
	var promisePoint = $.ajax({
		url: "./dataservice/read_point.php",
		method: "GET",
		dataType: "json",
		data: {command:"POINT"},
		username: null,
		password: null
	});
	
	var pointObjects = L.geoJson(null, {
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				layer.on({
					click: function (e) {
						var htmlformcomponent = "" +
								"<table id='feature_data' class='table table-condensed table-bordered table-striped'>" +
									"<thead>" +
										"<tr>" +
											"<th colspan='2' class='text-center'>Feature Data</th>" +
										"</tr>" +
									"</thead>" +
									"<tbody>" +
										"<tr>" +
											"<td class=''>Notes</td>" +
											"<td class=''><strong>"+feature.properties.notes+"</strong></td>" +
										"</tr>" +
									"</tbody>" +
								"</table>" +
							"";
						$("#app_modal_body").empty();
						$("#app_modal_body").removeClass().addClass('modal-body');
						$("#app_modal_size").removeClass().addClass('modal-dialog');
						$("#app_modal_body").html(htmlformcomponent);
						$("#app_modal_label").html("POINT");
						
						$("#modalbox").modal('show');
					}
				});
			}
		}
	});
	promisePoint.then(function (data) {
		pointObjects.addData(data);
		map.addLayer(pointObjects);
	});
	
	var promiseLinestring = $.ajax({
		url: "./dataservice/read_linestring.php",
		method: "GET",
		dataType: "json",
		data: {command:"LINESTRING"},
		username: null,
		password: null
	});
	
	var linestringObjects = L.geoJson(null, {
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				layer.on({
					click: function (e) {
						var htmlformcomponent = "" +
								"<table id='feature_data' class='table table-condensed table-bordered table-striped'>" +
									"<thead>" +
										"<tr>" +
											"<th colspan='2' class='text-center'>Feature Data</th>" +
										"</tr>" +
									"</thead>" +
									"<tbody>" +
										"<tr>" +
											"<td class=''>Notes</td>" +
											"<td class=''><strong>"+feature.properties.notes+"</strong></td>" +
										"</tr>" +
									"</tbody>" +
								"</table>" +
							"";
						$("#app_modal_body").empty();
						$("#app_modal_body").removeClass().addClass('modal-body');
						$("#app_modal_size").removeClass().addClass('modal-dialog');
						$("#app_modal_body").html(htmlformcomponent);
						$("#app_modal_label").html("LINESTRING");
						
						$("#modalbox").modal('show');
					}
				});
			}
		}
	});
	promiseLinestring.then(function (data) {
		linestringObjects.addData(data);
		map.addLayer(linestringObjects);
	});
	
	var promisePolygon = $.ajax({
		url: "./dataservice/read_polygon.php",
		method: "GET",
		dataType: "json",
		data: {command:"POLYGON"},
		username: null,
		password: null
	});
	
	var polygonObjects = L.geoJson(null, {
		onEachFeature: function (feature, layer) {
			if (feature.properties) {
				layer.on({
					click: function (e) {
						var htmlformcomponent = "" +
								"<table id='feature_data' class='table table-condensed table-bordered table-striped'>" +
									"<thead>" +
										"<tr>" +
											"<th colspan='2' class='text-center'>Datos del Registro</th>" +
										"</tr>" +
									"</thead>" +
									"<tbody>" +
										"<tr>" +
											"<td class=''>Contenido</td>" +
											"<td class=''><strong>"+feature.properties.notes+"</strong></td>" +
										"</tr>" +
									"</tbody>" +
								"</table>" +
							"";
						$("#app_modal_body").empty();
						$("#app_modal_body").removeClass().addClass('modal-body');
						$("#app_modal_size").removeClass().addClass('modal-dialog');
						$("#app_modal_body").html(htmlformcomponent);
						$("#app_modal_label").html("POLYGON");
						
						$("#modalbox").modal('show');
					}
				});
			}
		}
	});
	promisePolygon.then(function (data) {
		polygonObjects.addData(data);
		map.addLayer(polygonObjects);
	});

	openStreetMaps = new L.TileLayer("https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {
		minZoom: 3, 
		maxZoom: 20, 
		attribution: 'AgroIniap'
	  });
	  
	  map = L.map("map", {
		zoom: 6,
		center: [-0.1926044, -78.4900989],
		layers: [openStreetMaps],
		minZoom: 3,
		maxZoom: 20,
		zoomControl: false,
		attributionControl: true
	  });
	  
	  //map.setMaxBounds([[-12.6406520507, 94.1211943626], [7.4970404951, 142.1802794933]]);

	var zoomControl = L.control.zoom({
		position: "topleft"
	}).addTo(map);

	var baseLayers = {
		"OpenStreetMap": openStreetMaps
	};
	
	var overlayLayers = {
		"Points": pointObjects,
		"Lines": linestringObjects,
		"Polygons": polygonObjects
	};
	
	var layerControl = L.control.layers(baseLayers, overlayLayers,  {
		collapsed: isCollapsed
	}).addTo(map);
	
	var attributionControl = L.control({
		position: "bottomright"
	});
}