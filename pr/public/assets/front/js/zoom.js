jQuery(function ($) {
    var zoomConfig = {cursor: 'crosshair', zoomType: "inner"};
    var image = $('#gallery_01 a');
    var zoomImage = $('img.zoom_03');

    zoomImage.elevateZoom(zoomConfig);//initialise

    image.on('click', function () {
        // Remove old instance od EZ
        $('.zoomContainer').remove();
        zoomImage.removeData('elevateZoom');

        // Update source for images
        zoomImage.attr('src', $(this).data('image'));
        zoomImage.data('zoom-image', $(this).data('zoom-image'));
        // Reinitialize EZ
        zoomImage.elevateZoom(zoomConfig);
    });

    var zoomConfigx = {cursor: 'crosshair', zoomType: "inner"};
    var imagex = $('#gallery_02 a');
    var zoomImagex = $('img.zoom_03');

    zoomImagex.elevateZoom(zoomConfigx);//initialise

    imagex.on('click', function () {
        // Remove old instance od EZ
        $('.zoomContainer').remove();
        zoomImagex.removeData('elevateZoom');

        // Update source for images
        zoomImagex.attr('src', $(this).data('image'));
        zoomImagex.data('zoom-image', $(this).data('zoom-image'));
        // Reinitialize EZ
        zoomImagex.elevateZoom(zoomConfigx);
    });
});