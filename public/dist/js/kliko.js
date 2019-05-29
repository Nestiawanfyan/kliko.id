// window.onscroll = function() {myFunction()};

// var navbar      = document.getElementById("scrollFixed");
// var fixNav      = navbar.offsetTop;

// function myFunction() {
//     if (window.pageYOffset >= fixNav) {
//         console.log('berhasil');
//       navbar.classList.add("scroll-fixed");
//     } else {
//         console.log('gagal');
//         navbar.classList.remove("scroll-fixed");
//     }
//   }

$(function () {
    var input = document.getElementById('input-maps');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
        var place = autocomplete.getPlace();
        $('#city').val(place.name);
        $('#Lat').val(place.geometry.location.lat());
        $('#Long').val(place.geometry.location.lng());
    });
});

var slider = document.getElementById('slider');
    noUiSlider.create(slider, {
        start: [0, 5000000],
        snap: true,
        connect: true,
        range: {
            'min' : 0,
            '5%'  : 500000,
            '10%' : 1000000,
            '15%' : 1500000,
            '20%' : 2000000,
            '25%' : 2500000,
            '30%' : 3000000,
            '35%' : 3500000,
            '40%' : 4000000,
            '45%' : 4500000,
            '50%' : 5000000,
            '55%' : 5500000,
            '60%' : 6000000,
            '65%' : 6500000,
            '70%' : 7000000,
            '75%' : 7500000,
            '80%' : 8000000,
            '85%' : 8500000,
            '90%' : 9000000,
            '95%' : 9500000,
            'max' : 10000000
        }
    });

    var snapValues = [
        document.getElementById('slider-snap-value-lower'),
        document.getElementById('slider-snap-value-upper')
    ];

    slider.noUiSlider.on('update', function( values, handle ) {
        snapValues[handle].innerHTML = values[handle];
        document.getElementById("min-harga").value = document.getElementById('slider-snap-value-lower').innerHTML;
        document.getElementById("max-harga").value = document.getElementById('slider-snap-value-upper').innerHTML;
    });