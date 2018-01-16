+(function($) {
	var imagesPreview = function(input, placeToInsertImagesPreview) {
		$(placeToInsertImagesPreview).html('');
        if (input.files) {
            var filesAmount = input.files.length;
            for (var i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagesPreview);
                };
                reader.readAsDataURL(input.files[i]);
            }
            $(placeToInsertImagesPreview).addClass("active");
        }
    };

    $(document).on('change', '#cat_images', function () {
    	imagesPreview(this, '.gallery-preview');
    })
})(jQuery);