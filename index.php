<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
  
      #map{
        height: 90%;
      }
	  
      body {
  position: relative;
  float:left;
  margin-top:250px;
  margin-left:50%;
  height:400px;
  width:400px;  
      }
	h2{
		float:right;
	}
    </style>
  </head>

  <body onload=getLocation()>
	<h1>מציאת מרחב מוגן</h1>
    <div id="map"></div>
	<h2>הוספת מרחב מוגן</h2>
		<form>
			<div>	
				<label>הזנת כתובת</label>
					<input type="text">
			</div>		
		</form>
    <script>
	
    var pointx;

    var pointy;

      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

      
		
		function getLocation() {

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(showPosition);

    } else { 

        alert("Geolocation is not supported by this browser.");

    }

}



function showPosition(position) {

    

    var pointx=position.coords.latitude;

     var pointy=position.coords.longitude;
	 alert(pointx);

}





  function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(pointx, pointy),
          zoom: 5
        });



		
		
		
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('resultado.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
	  /*
**
* Looks up the directions, overlays route on map,
* and prints turn-by-turn to #directions.
*/
 
function overlayDirections()
{
    fromAddress =
      document.getElementById("street").value
      + " " + document.getElementById("city").value
      + " " + document.getElementById("state").options[document.getElementById("state").selectedIndex].value
      + " " + document.getElementById("zip").value;
 
    gdir.load("from: " + fromAddress + " to: " + toAddress);
	
	



	
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArcdtxZOTzC0dK3Q9467iDtUC1cv7NtH4&callback=initMap">
    </script>
  </body>
</html>
