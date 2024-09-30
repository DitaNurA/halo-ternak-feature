
    $(document).ready(function() {
        $('#start-button').on('click', function(event) {
            event.preventDefault(); // Prevent the default action of the link

            $('#loadingOverlay').removeClass('hidden'); // Show the overlay
            
            // Simulate a process (e.g., redirect after a delay)
            setTimeout(() => {
                window.location.href = $(this).attr('href'); // Redirect to the link's href
            }, 1500); // Delay for 1.5 seconds to simulate loading
        });
    });