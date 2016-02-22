//permet d'ouvrir la pop-up permettant de selectionner un media depuis la biblihotèque wordpress

jQuery(function($){

  // Set all variables to be used in scope
  var frame,
      metaBox = $('#meta-box-id.postbox'), // Your meta box id here
      addImgLink = metaBox.find('.upload-custom-img'),
      delImgLink = metaBox.find( '.delete-custom-img'),
      imgContainer = metaBox.find( '.custom-img-container'),
      imgIdInput = metaBox.find( '.custom-img-id' );
  
  // ADD IMAGE LINK
  addImgLink.on( 'click', function( event ){
    
    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: 'Select or Upload Media Of Your Chosen Persuasion',
      button: {
        text: 'Use this media'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      imgContainer.append( '<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>' );

      // Send the attachment id to our hidden input
      imgIdInput.val( attachment.id );

      // Hide the add image link
      addImgLink.addClass( 'hidden' );

      // Unhide the remove image link
      delImgLink.removeClass( 'hidden' );
    });

    // Finally, open the modal on click
    frame.open();
  });
  
  
  // DELETE IMAGE LINK
  delImgLink.on( 'click', function( event ){

    event.preventDefault();

    // Clear out the preview image
    imgContainer.html( '' );

    // Un-hide the add image link
    addImgLink.removeClass( 'hidden' );

    // Hide the delete image link
    delImgLink.addClass( 'hidden' );

    // Delete the image id from the hidden input
    imgIdInput.val( '' );

  });



            // closing event for the media manager
	var gk_media_init = function(selector, button_selector)  {
	    var clicked_button = false;
	 
	    jQuery(selector).each(function (i, input) {
	        var button = jQuery(input).next(button_selector);
	        button.click(function (event) {
	            event.preventDefault();
	            var selected_img;
	            clicked_button = jQuery(this);
	 
	            // check for media manager instance
	            if(wp.media.frames.gk_frame) {
	                wp.media.frames.gk_frame.open();
	                return;
	            }
	            // configuration of the media manager new instance
	            wp.media.frames.gk_frame = wp.media({
	                title: 'Select image',
	                multiple: false,
	                library: {
	                    type: 'image'
	                },
	                button: {
	                    text: 'Use selected image'
	                }
	            });
	 
	            // Function used for the image selection and media manager closing
	            var gk_media_set_image = function() {
	                var selection = wp.media.frames.gk_frame.state().get('selection');
	 
	                // no selection
	                if (!selection) {
	                    return;
	                }
	 
	                // iterate through selected elements
	                selection.each(function(attachment) {
	                    var url = attachment.attributes.url;
	                    clicked_button.prev(selector).val(url);
	                });
	            };
	 
	            // closing event for media manger
	            wp.media.frames.gk_frame.on('close', gk_media_set_image);
	            // image selection event
	            wp.media.frames.gk_frame.on('select', gk_media_set_image);
	            // showing media manager
	            wp.media.frames.gk_frame.open();
	        });
	   });
	};

gk_media_init('.media-input', '.media-button');
});