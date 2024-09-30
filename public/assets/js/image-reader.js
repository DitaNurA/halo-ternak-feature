$(function() {
    $('#image-reader').on('change', function(e) {
        var reader = new FileReader()
        reader.onload = function(){
            $('#image-reader-preview').attr('src', reader.result)
        }
        reader.readAsDataURL(e.target.files[0])
    })
})