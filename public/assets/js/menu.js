$(document).ready(function() {
    const menuButton = $('#menu-button');
    const dropdownMenu = $('#dropdown-menu');
    const menuItems = $('#menu-list li');

    // Toggle Dropdown Menu with Slide Animation
    menuButton.on('click', function(event) {
        event.stopPropagation(); // Mencegah penutupan dropdown saat tombol diklik
        dropdownMenu.slideToggle(300); // Slide the dropdown menu with animation
    });

    // Add click event for each menu item with delay
    menuItems.each(function(index) {
        $(this).on('click', function(e) {
            e.preventDefault(); // Prevent default link action
            const targetLink = $(this).find('a').attr('href');

            // Animate fade out with delay for each item
            $(this).delay(index * 300).fadeOut(200, function() {
                window.location.href = targetLink; // Redirect after animation
            });
        });
    });

    // Close dropdown when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#dropdown-menu, #menu-button').length) {
            if (dropdownMenu.is(':visible')) {
                dropdownMenu.slideUp(300); // Menutup dropdown jika terlihat
            }
        }
    });
});
