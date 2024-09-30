
const map = L.map('map').setView({ lat : lat, lon : lon }, 13)

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map)

map.on('click', function(e) {
    const latitude = e.latlng.lat
    const longitude = e.latlng.lng

    $('#ipAlamat').val(latitude + ',' + longitude)

    $.ajax({
        url: `https://nominatim.openstreetmap.org/search?format=json&q=${latitude},${longitude}`,
        dataType: 'json',
        success: (response) => {
            if ( response[0] && response[0].display_name ) {
                const data = response[0].display_name.split(',')
                $('.kecamatan-input').val(data[data.length - 6])
                $('.alamat_lengkap-input').val(response[0].display_name)
            }
        }
    })

    if ( !marker ) {
        marker = L.marker({lat: latitude, lon: longitude}).bindPopup('Lokasi kandang ternak').addTo(map)
    } else {
        marker.setLatLng(e.latlng)
    }
})