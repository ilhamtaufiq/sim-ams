$("#clickMe").click(function () {
    function onAccuratePositionError(e) {
      addStatus(e.message, 'error');
    }
  
    function onAccuratePositionProgress(e) {
      // var message = 'Mencari… (Akurasi: ' + e.accuracy + ')';
      // addStatus(message, 'progressing');
    }
  
    function onAccuratePositionFound(e) {
      // var message = 'Posisi ditemukan (Akurasi: ' + e.accuracy + ')';
      var message = 'Posisi ditemukan';
  
      addStatus(message, 'done');
      map.setView(e.latlng, 18);
      L.marker(e.latlng)
        .addTo(map)
        .bindPopup("Latitude : " + e.latlng.lat + " <br /> Longitude :" + e.latlng.lng);
      document.getElementById("lat").value = e.latlng.lat;
      document.getElementById("long").value = e.latlng.lng;
  
    }
  
    function addStatus(message, className) {
      var ul = document.getElementById('status'),
        li = document.createElement('li');
      li.appendChild(document.createTextNode(message));
      ul.className = className;
      ul.appendChild(li);
    }
  
    map.on('accuratepositionprogress', onAccuratePositionProgress);
    map.on('accuratepositionfound', onAccuratePositionFound);
    map.on('accuratepositionerror', onAccuratePositionError);
  
    map.findAccuratePosition({
      maxWait: 10000,
      desiredAccuracy: 20
    });
  
  });
  var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
  });
  
  var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/satellite-v9'
  });
  
  
  var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  });
  
  var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/dark-v10'
  });
  var map = L.map('map', {
    center: [-6.834567727116758, 107.13313579559328],
    zoom: 18,
    layers: [peta3
    ]
  });
  var mapid = L.map('mapid', {
    center: [-6.834567727116758, 107.13313579559328],
    zoom: 10,
  });
  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
      '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
      'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
  }).addTo(mapid);
  // Comment out the below code to see the difference.
  $('#modal-foto').on('shown.bs.modal', function() {
    map.invalidateSize();
  });
  var popup = L.popup();
  function onMapClick(e) {
    popup
      .setLatLng(e.latlng)
      .setContent("Latitude : " + e.latlng.lat + " <br /> Longitude :" + e.latlng.lng)
      .openOn(map);
    document.getElementById("lat").value = e.latlng.lat;
    document.getElementById("long").value = e.latlng.lng;
  
  }
  map.on('click', onMapClick);
  var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4,
  };
  L.control.layers(baseMaps).addTo(map);
  
  
  