jQuery( function( $ )
{
	$( 'body' ).on( 'click', '.the7-mb-thickbox-upload', function()
	{
		var $this = $( this ),
			$holder = $this.siblings( '.the7-mb-images' ),
			post_id = $( '#post_ID' ).val(),
			field_id = $this.data( 'field_id' ),
			backup = window.send_to_editor;

		window.send_to_editor = function( html )
		{
			var $img = $( '<div />' ).append( html ).find( 'img' ),
				url = $img.attr( 'src' ),
				img_class = $img.attr( 'class' ),
				id = parseInt( img_class.replace( /\D/g, '' ), 10 );

			html = '<li id="item_' + id + '">';
			html += '<img src="' + url + '">';
			html += '<div class="the7-mb-image-bar">';
			html += '<a class="the7-mb-delete-file" href="#" data-attachment_id="' + id + '">×</a>';
			html += '</div>';
			html += '<input type="hidden" name="' + field_id + '[]" value="' + id + '">';
			html += '</li>';

			$holder.append( $( html ) ).removeClass( 'hidden' );

			tb_remove();
			window.send_to_editor = backup;
		}
		tb_show( '', 'media-upload.php?post_id=' + post_id + '&TB_iframe=true' );

		return false;
	} );
} );
