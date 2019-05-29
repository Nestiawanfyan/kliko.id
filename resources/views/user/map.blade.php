<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
      Maps - Kliko
    </title>
    <link rel="icon" type="image/png" href="{{ asset('img/kliko/kliko-Icon.png') }}">
    <link rel="stylesheet" href="//identity.uchicago.edu/c/fonts/proximanova.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Bitter:700|Didact+Gothic|Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/kliko.css') }}">  
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">  
    <link rel="stylesheet" href="{{ asset('dist/css/nouislider.min.css') }}">

    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script-->
    <script src="{{ asset('dist/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.form.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/kliko.js') }}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAh7znf86DomKGdnc7LkiHla3XMYWtgoTM&amp;libraries=places&amp;sensor=false&amp;region=id&amp;language=id"></script>
  </head>
  <body>
    @include('contentUser.homes')

    <style>
      html, body {
        margin: 0;
        padding: 0;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
    </style>


    <script type="text/javascript" src="https://googlemaps.github.io/js-marker-clusterer/src/markerclusterer.js"></script>
    <input id="pac-input" class="controls" value="{{ $alamat }}" type="text" placeholder="Search Box">
    <div id="map" style="margin:0;"></div>

<script>
    var markerdata = [
      <?php $no=1; ?>
      <?php
        $male = "<img src='{{ asset('img/kliko/Male-Icon-Kliko.png') }}' alt='male-icon' style='width:20px;height:20px;'>"
      ?>
      @foreach($kosts as $kost)
        @if($no>1)
        ,
        @endif
        {
          latitude: {{ $kost->latitude }},
          longitude: {{ $kost->longitude }},
          nama: "{{ $kost->namaKost }}",
          penghuni: "{{ $kost->penghuni }}",
          @if($kost->penghuni == "Putri")
          icon: '{!! URL::to('img/kliko/Icon-Marker-Female.png') !!}',
          @elseif($kost->penghuni == "Putra")
          icon: '{!! URL::to('img/kliko/Male-Icon-Kliko.png') !!}',
          @else
          icon: '{!! URL::to('img/kliko/Icon-Marker-Male+Female.png') !!}',
          @endif
          @if(!empty($kost->sewaHari))
          sewa: "Rp {{ number_format($kost->sewaHari, 0, ',', '.') }}/Hari",
          @endif
          @if(!empty($kost->sewaMinggu))
          sewa: "Rp {{ number_format($kost->sewaMinggu, 0, ',', '.') }}/Minggu",
          @endif
          @if(!empty($kost->sewaBulan))
          sewa: "Rp {{ number_format($kost->sewaBulan, 0, ',', '.') }}/Bulan",
          @endif
          @if(!empty($kost->sewaTahun))
          sewa: "Rp {{ number_format($kost->sewaTahun, 0, ',', '.') }}/Tahun",
          @endif
          url: "{{ route('kost.view', ['kost' => $kost->seoTitle]) }}"
        }
        <?php $no++;  ?>
      @endforeach
    ];
    $(function () {
       var lat = {{ $lat }},
           lng = {{ $long }},
           latlng = new google.maps.LatLng(lat, lng),
           image = '{!! URL::to('img/marker.png') !!}';
       //zoomControl: true,
       //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,
       var mapOptions = {
           center: new google.maps.LatLng(lat, lng),
           zoom: {{ $zoom }},
           mapTypeId: google.maps.MapTypeId.ROADMAP,
           panControl: true,
           panControlOptions: {
               position: google.maps.ControlPosition.TOP_RIGHT
           },
           zoomControl: true,
           zoomControlOptions: {
               style: google.maps.ZoomControlStyle.LARGE,
               position: google.maps.ControlPosition.TOP_left
           }
       },
       map = new google.maps.Map(document.getElementById('map'), mapOptions),
           marker = new google.maps.Marker({
               position: latlng,
               map: map,
               icon: image
           });
       var input = document.getElementById('pac-input');
       var autocomplete = new google.maps.places.Autocomplete(input);
       map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
       autocomplete.bindTo('bounds', map);
       var infowindow = new google.maps.InfoWindow();
       google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
           infowindow.close();
           var place = autocomplete.getPlace();
           if (place.geometry.viewport) {
               map.fitBounds(place.geometry.viewport);
           } else {
               map.setCenter(place.geometry.location);
               map.setZoom(17);
           }
           moveMarker(place.name, place.geometry.location);
       });

       function moveMarker(placeName, latlng) {
           marker.setIcon(image);
           marker.setPosition(latlng);
           infowindow.setContent(placeName);
           //infowindow.open(map, marker);
       }


          var dataMarkers = [];
          infoWindows = [];
          for (var i = 0; i < markerdata.length; i++) {
            var latLng = new google.maps.LatLng(markerdata[i].latitude,
                markerdata[i].longitude);
            var markerAdd = new google.maps.Marker({
              position: latLng,
              icon: markerdata[i].icon,
              infoWindowIndex : i
            });

            var content = '<a href="' + markerdata[i].url + '" target="_blank" style="text-decoration:none; font-weight: 600; color: #427fed">' + markerdata[i].nama + '</a><br>' +
                       '<span>' + markerdata[i].penghuni + '</span><br>'+
                       '<span>' + markerdata[i].sewa + '</span>';
            var myInfoWindow = new google.maps.InfoWindow({
              content:   content
            });

            google.maps.event.addListener(markerAdd, 'click', function() {
                infoWindows[this.infoWindowIndex].open(map, this);
            });
            infoWindows.push(myInfoWindow);
            dataMarkers.push(markerAdd);

          }
          var markerCluster = new MarkerClusterer(map, dataMarkers, {imagePath: 'https://googlemaps.github.io/js-marker-clusterer/images/m'});
    });
</script>
  </body>
</html>
