/**
 * Shortcodes generator javascript
 * @package Alaya_framework
 * @since 1.0
 */

	function alayashortcodes_plugin( url, params )
	{
		var popup = params;
		
		tb_show( "Insert Shortcode", url + '/shortcode-generator-form.php?popup=' + popup + "&width=" + 640 + "&height="+560 );
	}
	
	(function()
	{
		tinymce.create( 'tinymce.plugins.alayashortcodes',
							{
								init: function( ed, url )
								{
									ed.addButton( 'alayashortcodes',
													{
														title: 'Insert Shortcode',
														onclick: function()
														{
															ed.execCommand( 'mceInsertContent',
																				false,
																				alayashortcodes_plugin( url )
																			);
														},
														image: url + "/shortcode-generator.png"
													}
												);
								}
							}
						);
	 
		tinymce.PluginManager.add( 'alayashortcodes', tinymce.plugins.alayashortcodes );
	 
	})();

// -----------------------------------------------------------------------------------------------------------------------------------------------