 function initMap() {
        var qro = {lat: 20.58806, lng:  -100.38806};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: qro
        });
        var marker = new google.maps.Marker({
          position: qro,
          map: map
        });
      }