(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'Subhsish',
			icon: 'my-mce-icon',
			type: 'menubutton',
			menu: [
			//recent post 
				{
					text: 'RECENT POST',
					menu: [
						{
							text: 'CREATE SHORTCODE',
							onclick: function() {
								editor.windowManager.open( {
									title: 'GET RECENT POST',
									body: [
										{
											type: 'textbox',
											name: 'post_type',
											label: 'Post Type',
											value: 'post'
										},
										{
											type: 'textbox',
											name: 'posts_per_page',
											label: 'POST PER PAGE',
											value: '2',
											
										},
										
									],
									onsubmit: function( e ) {
										editor.insertContent( '[our_shortcode post_type="' + e.data.post_type + '" posts_per_page="' + e.data.posts_per_page + '" ]');
									}
								});
							}
						}
					]
				},
				//recent post end
				
				
				// login form
				
				
				
				{
					text: 'LOGIN FORM',
					menu: [
						{
							text: 'CREATE SHORTCODE',
							onclick: function() {
								editor.windowManager.open( {
									title: 'GET LOGIN FORM',
									body: [
										{
											type: 'textbox',
											name: 'redirect_to',
											label: 'REDIRECT TO',
											value: ''
										}
										
									],
									onsubmit: function( e ) {
										editor.insertContent( '[new_sht redirect_to="' + e.data.redirect_to + '" ]');
									}
								});
							}
						}
					]
				},
				
				
				
				
				// end login form
				
				
				
				
				
				
				
				
				
			]
		});
	});
})();