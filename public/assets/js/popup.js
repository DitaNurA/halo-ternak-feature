$(function() {
    $('body').before().on('click', '.popup-before', function() {
        $('.popup-container').each(function() {
            $(this).addClass('hidden')
            $(this).find('.popup-card').removeClass('popup-animation')
        })
    })

    $('body').on('click', '.popup-btn', function() {
        const popupContainer = $('.' + $(this).attr('data-target'))

        popupContainer.removeClass('hidden')
        popupContainer.find('.popup-card').addClass('popup-animation')
    })

    $('body').on('click', '.popup-btn-close', function() {
        const popupContainer = $('.' + $(this).attr('data-target'))
        
        popupContainer.addClass('hidden')
        popupContainer.find('.popup-card').removeClass('popup-animation')
    })
})