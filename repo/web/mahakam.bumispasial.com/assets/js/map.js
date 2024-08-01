// CEK APAKAH ADA PARAMETER GET DI URL
function check_url_params(param) {

    // var field = '';
    var url = window.location.href;
    if (url.indexOf('?' + param + '=') != -1)
        return true;
    else if (url.indexOf('&' + param + '=') != -1)
        return true;
    return false
}

// AMBIL GET PARAM DI URL
function get_url_param(param) {
    var url_string = window.location.href;

    var url_object = new URL(url_string);
    return url_object.searchParams.get(param);
}

// LOAD MAP
var map = L.map('map', {
    zoomControl: false
}).setView([3.2700, 98.2590], 8);

// MENGISI CONTAINER 1
function occupy_container1(kph = null,blok = null,petak = null,titik = null,fid = null) {
    $("h4#kph_here").html(kph);
    $("h4#blok_here").html(blok);
    $("h4#petak_here").html(petak);
    $("h4#titik_here").html(titik);
    $("h4#fid_here").html(fid);
  }
  
  // MENGISI CONTAINER 2
  function occupy_container2(x = null,y = null) {
    $("span#koord_x").html(x);
    $("span#koord_y").html(y);
  }

  // MENGISI CONTAINER 3
  function occupy_container3(desa = null,kec = null,kab = null,prov = null) {
    $("span#desa_here").html(desa);
    $("span#kec_here").html(kec);
    $("span#kab_here").html(kab);
    $("span#prov_here").html(prov);
  }

  // MENGISI CONTAINER 4
  function occupy_container4(jml_petak = null,fungsi_kws = null,batang_total = null,luas = null) {
    $("h5#jml_petak").html(jml_petak);
    $("h5#fungsi_kws").html(fungsi_kws);
    $("h5#batang_total").html(batang_total);
    $("h5#luas").html(luas);
  }
  
  // MENGISI CONTAINER 5
  function occupy_container5(jns_tanaman = null,pelaksana = null,jenis_kontrak = null,kegiatan = null) {
    $("span#jns_tanaman").html(jns_tanaman);
    $("span#pelaksana").html(pelaksana);
    $("span#jenis_kontrak").html(jenis_kontrak);
    $("span#kegiatan").html(kegiatan);
  }

// basemap
var googlemaps = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: 'Google Satellite'
});

stamenterrain = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    attribution: 'Google Terrain'
});

osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

googlemaps.addTo(map);

//Sidebar Popup
var sidebarpopup = L.control.sidebar('sidebarpopup', {
    closeButton: true,
    position: 'left'
});

map.addControl(sidebarpopup);

//geojson
// DAS
function tooltip(f, l) {
    var out = [];
    if (f.properties) {
        out.push("DAS " + f.properties['NAMA_DAS']);
        l.bindTooltip(out.join("<br />"));
    }
}

var batasDAS = new L.GeoJSON.AJAX(["assets/geojson/DAS.geojson"], {
    style: styleDAS,
    onEachFeature: tooltip
}).addTo(map);

// RHL
map.createPane("pane_RHL");
map.getPane("pane_RHL").style.zIndex = 400;

// SIDEBAR POPUP + label
function infoRHL(feature, layer) {
    
    layer.on('click', function(e) {

        var props = e.target.feature.properties;
        //place attributes in panel table.
        console.log(props);

        // ----------- MENGOSONGKAN ISI

          // CONTAINER1
          $("h4#kph_here").html();
          $("h4#blok_here").html();
          $("h4#petak_here").html();
          $("h4#titik_here").html();
          $("h4#fid_here").html();

          // CONTAINER2
          $("span#koord_x").html();
          $("span#koord_y").html();

          // CONTAINER3
          $("span#desa_here").html();
          $("span#kec_here").html();
          $("span#kab_here").html();
          $("span#prov_here").html();
          
          // CONTAINER4
          $("h5#jml_petak").html();
          $("h5#fungsi_kws").html();
          $("h5#batang_total").html();
          $("h5#luas").html();
          
          // CONTAINER5
          $("span#jns_tanaman").html();
          $("span#pelaksana").html();
          $("span#jenis_kontrak").html();
          $("span#kegiatan").html();

          // ----------- END MENGOSONGKAN ISI

          if(get_url_param('jenis_rhl') == 1) {
            occupy_container1(props.KPH,props.Nama_BLOK,props.Petak_OK,'-','-');
            occupy_container2(props.X,props.Y);
            occupy_container3(props.Desa,props.Kecamatan,props.Kabupaten,props.Provinsi);
            occupy_container4('-',props.Fungsi_Kws,'-',props.Luas_Ha);
            occupy_container5('-','-','-','-');
          } else if(get_url_param('jenis_rhl') == 2 || get_url_param('jenis_rhl') == 3) {
            occupy_container1(props.PEMANGKU_K,props.NO_BLOK,'-','-','-');
            occupy_container2(props.X,props.Y);
            occupy_container3(props.DESA,props.KECAMATAN,props.KABUPATEN,props.PROVINSI);
            occupy_container4(props.JML_PTK,props.FUNGSI_KWS,props.BTG_TOTAL,props.LUAS_HA);
            occupy_container5(props.JENIS_TANA,props.PELAKSANA,props.JENIS_KONT,props.Nama_Kel);
          }
    });


    layer.bindTooltip(layer.feature.properties['Nama_BLOK'] + ',<br>Petak ' + layer.feature.properties['Petak_OK'], {
        direction: 'auto',
        permanent: false,
        className: 'styleLabel'
    }); //label
}

var blokRHL = new L.GeoJSON.AJAX('', {
    pane: "pane_RHL",
    style: style,
    onEachFeature: infoRHL
}).addTo(map).on('click', function() {
    sidebarpopup.toggle();
});

// reset label / zoomout labelnya hilang
resetLabels([blokRHL]);
map.on("move", function() {
    resetLabels([blokRHL]);
});
map.on("zoomend", function() {
    resetLabels([blokRHL]);
});
map.on("layeradd", function() {
    resetLabels([blokRHL]);
});
map.on("layerremove", function() {
    resetLabels([blokRHL]);
});

// Foto
var markers = L.markerClusterGroup();

var titik = new L.GeoJSON.AJAX(["assets/geojson/RHL_foto.geojson"], {
    style: style,
    onEachFeature: function(f, l) {
        var out = [];
        if (f.properties) {
            out.push("Foto: <br>" + "<img src='" + f.properties['gambar'] + "'/>");
            l.bindPopup(out.join("<br />"));
        }
    }
});

titik.on('data:loaded', function() {
    markers.addLayer(titik);
});


//CONTROL LAYER
var baseLayers = {
    "Google Maps Sattelite": googlemaps,
    "Google Stamen Terrain": stamenterrain,
    "OpenStreetMap": osm
};
var overlays = {
    "Blok RHL": blokRHL,
    "Batas DAS": batasDAS,
    "Titik Foto": markers,
};

//Kontrol Layer
L.control.layers(baseLayers, overlays, {
    collapsed: false
}).addTo(map);

//warna (klasifikasi)	
function getColor(KLS) {
    return KLS == 'BBKSDA' ? '#ff2d00' :
        KLS == 'BBTNGL' ? '#ffbd00' :
        KLS == 'V GAYO LUES' ? '#f0ff00' :
        KLS == 'VI SUBULUSSALAM' ? '#74ff00' :
        KLS == 'XV KABANJAHE' ? '#00ffbd' :
        KLS == 'II PEMATANG SIANTAR' ? '#0097ff' :
        KLS == 'XIV SIDIKALANG' ? '#9b00ff' :
        KLS == 'I STABAT' ? '#ff00c9' :
        KLS == 'TAHURA' ? ' #e74c3c  ' :
        '#FFEDA0';
}

function style(feature) {
    return {
        weight: 2,
        opacity: 0.5,
        // color: getColor(feature.properties.KPH),
        color : "#ff2d00",
        dashArray: '3',
        fillOpacity: 0.1,
        // fillColor: getColor(feature.properties.KPH)
        fillColor : "#ff2d00"
    };
}

function clickedstyle(feature) {
    return {
        weight: 2,
        opacity: 0.8,
        // color: getColor(feature.properties.KPH),
        color : "#ff00c9",
        dashArray: '3',
        fillOpacity: 0.1,
        // fillColor: getColor(feature.properties.KPH)
        fillColor : "#ff00c9"
    };
}

function styleDAS(feature) {
    return {
        weight: 2.5,
        opacity: 0.5,
        color: 'white',
        dashArray: '3',
        //fillOpacity: 0.3,
        //fillColor: getColor(feature.properties.KPH)
    };
}

//==============================Mouse Coordinate
L.control.mousePosition({
    separator: ',',
    prefix: 'Koordinat : '
}).addTo(map);

//========================Scale Bar================
L.control.scale({
    maxWidth: 150,
    imperial: false,
}).addTo(map);

//zoomhome
var zoomHome = L.Control.zoomHome();
zoomHome.addTo(map);

//=============Geolocation
var locateControl = L.control.locate({
    position: "topleft",
    drawCircle: true,
    follow: true,
    setView: true,
    keepCurrentZoomLevel: false,
    markerStyle: {
        weight: 1,
        opacity: 0.8,
        fillOpacity: 0.8,
    },
    circleStyle: {
        weight: 1,
        clickable: false,
    },
    icon: "fa fa-crosshairs",
    metric: true,
    strings: {
        title: "Klik untuk mengetahui lokasimu",
        popup: "Lokasimu sekarang di sini. Akurasi {distance} {unit}",
        outsideMapBoundsMsg: "Kamu berada di luar area peta"
    },
    locateOptions: {
        maxZoom: 15,
        watch: true,
        enableHighAccuracy: true,
        maximumAge: 10000,
        timeout: 10000
    }
}).addTo(map);

//============measurement
var measureControl = new L.Control.Measure({
    primaryLengthUnit: 'meters',
    secondaryLengthUnit: 'kilometers',
    primaryAreaUnit: 'hectares',
    secondaryAreaUnit: 'sqmeters',
    activeColor: 'green',
    completedColor: 'blue'
});
measureControl.addTo(map);


// Loading control
var loadingControl = L.Control.loading({
    separate: true
});
map.addControl(loadingControl);




if (check_url_params('jenis_rhl')) {

$.post('../coba/bin/model/get_geojson_by_rhl.php', {
    id_rhl: get_url_param("jenis_rhl")
}, function (response, status) {

    // console.log(response);

    file_petak = "../coba/assets/geojson/" + response.file;

    map.flyTo([response.view_x, response.view_y], response.view_zoom);

    $.getJSON(file_petak, function (data) {
        if (jQuery.isEmptyObject(data)) {
            console.log("no data");
        }
        else {
            blokRHL.addData(data);
        }
    });

    map.addLayer(blokRHL);

}, 'json');
// .done(function() { alert('Request done!'); })
// .fail(function(jqxhr, settings, ex) { console.log(ex); })

$("a.nav-link.kph_btn").on("click",function(){
    $.post('../coba/bin/model/get_kph_by_id.php', {
        id: $(this).data("kphid")
      }, function(response) {
        // console.log(response);
        map.flyTo([response.center_x,response.center_y],response.center_zoom);
      },'json');
    //   .done(function() { alert('Request done!'); })
    // .fail(function(jqxhr, settings, ex) { console.log(ex); });
});

$("a.kph-blok-btn").on("click",function(){
    $.post('../coba/bin/model/get_blok_by_id.php', {
        id: $(this).data("blokid")
      }, function(response) {
        // console.log(response);
        map.flyTo([response.center_x,response.center_y],response.center_zoom);
        // map.panTo(new L.LatLng(response.center_x, response.center_y));
      },'json');
    //   .done(function() { alert('Request done!'); })
    // .fail(function(jqxhr, settings, ex) { console.log(ex); });
});
}