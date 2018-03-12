<?php
/**
 * Advanced Custom Fields (ACF) settings
 *
 * @package Worx
 */

/**
 * Include ACF
 */

// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
 
function my_acf_settings_path( $path ) {
 
    // update path
    //$path = get_stylesheet_directory() . '/inc/acf/';
    $path = get_template_directory() . '/inc/acf/';
    
    // return
    return $path;
    
}
 
// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
 
function my_acf_settings_dir( $dir ) {
 
    // update path
    $dir = get_stylesheet_directory_uri() . '/inc/acf/';
    
    // return
    return $dir;
    
}
 
// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
//include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );
include_once( get_template_directory() . '/inc/acf/acf.php' );


if( class_exists( 'ACF' ) ) :

/**
 * Custom Fields
 */
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_550ac22514a00',
	'title' => 'Details',
	'fields' => array (
		array (
			'key' => 'field_550ac24b96086',
			'label' => 'Date',
			'name' => '_project_date',
			'type' => 'text',
			'instructions' => ' e.g. "Januari 2015".',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_550ac25796087',
			'label' => 'Client',
			'name' => '_project_client',
			'type' => 'text',
			'instructions' => 'e.g. "Steve Jobs" or "Apple".',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5533ef56df2b3',
			'label' => 'Location',
			'name' => '_project_location',
			'type' => 'text',
			'instructions' => 'e.g. "Amsterdam" or "Mars".',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_550ac2bf96088',
			'label' => 'URL',
			'name' => '_project_url',
			'type' => 'text',
			'instructions' => 'e.g. "http://themes.tienvooracht.nl".',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_559af3135d118',
			'label' => 'External',
			'name' => '_project_url_external',
			'type' => 'true_false',
			'instructions' => 'Link thumb directly to the project url',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Yes please!',
			'default_value' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolio_project',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_550abf0bb2028',
	'title' => 'Media',
	'fields' => array (
		array (
			'key' => 'field_550abf23fcc61',
			'label' => 'Media',
			'name' => 'project_media',
			'type' => 'flexible_content',
			'instructions' => 'Create and manage the media for this project.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'button_label' => 'Add Media',
			'min' => '',
			'max' => '',
			'layouts' => array (
				array (
					'key' => '550ac0bb103cc',
					'name' => 'project_gallery',
					'label' => 'Gallery',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_5530bb99d9f18',
							'label' => 'Type',
							'name' => 'gallery_type',
							'type' => 'radio',
							'instructions' => 'The type of gallery you want to include.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'stacked' => 'Stacked',
								'carousel' => 'Carousel',
							),
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => 'stacked',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_550ac0c443cff',
							'label' => 'Gallery',
							'name' => 'gallery',
							'type' => 'gallery',
							'instructions' => 'Add images to your gallery.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'min' => '',
							'max' => '',
							'preview_size' => 'thumbnail',
							'library' => 'all',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '550ac12afab19',
					'name' => 'project_video',
					'label' => 'Video',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_5534d64b80f36',
							'label' => 'Type',
							'name' => 'video_type',
							'type' => 'radio',
							'instructions' => 'The type of video you want to include.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'embed' => 'Embed',
								'custom' => 'Custom',
							),
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_550ac135fab1a',
							'label' => 'Embed',
							'name' => 'video_embed',
							'type' => 'oembed',
							'instructions' => 'The oEmbed URL for your video. More info about oEmbeds can be found in the WordPress <a href="http://codex.wordpress.org/Embeds#oEmbed">codex</a>.',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5534d64b80f36',
										'operator' => '==',
										'value' => 'embed',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'width' => '',
							'height' => '',
						),
						array (
							'key' => 'field_5534d67e80f37',
							'label' => 'URL',
							'name' => 'video_url',
							'type' => 'url',
							'instructions' => 'The URL to your custom video file.',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5534d64b80f36',
										'operator' => '==',
										'value' => 'custom',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
				array (
					'key' => '5534d6c8093eb',
					'name' => 'project_audio',
					'label' => 'Audio',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_5534d6c8093ec',
							'label' => 'Type',
							'name' => 'audio_type',
							'type' => 'radio',
							'instructions' => 'The type of audio you want to include.',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array (
								'embed' => 'Embed',
								'custom' => 'Custom',
							),
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => '',
							'layout' => 'horizontal',
						),
						array (
							'key' => 'field_5534d6c8093ed',
							'label' => 'Embed',
							'name' => 'audio_embed',
							'type' => 'oembed',
							'instructions' => 'The oEmbed URL for your audio. More info about oEmbeds can be found in the WordPress <a href="http://codex.wordpress.org/Embeds#oEmbed">codex</a>.',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5534d6c8093ec',
										'operator' => '==',
										'value' => 'embed',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'width' => '',
							'height' => '',
						),
						array (
							'key' => 'field_5534d6c8093ee',
							'label' => 'URL',
							'name' => 'audio_url',
							'type' => 'url',
							'instructions' => 'The URL to your custom audio file.',
							'required' => 0,
							'conditional_logic' => array (
								array (
									array (
										'field' => 'field_5534d6c8093ec',
										'operator' => '==',
										'value' => 'custom',
									),
								),
							),
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
						),
					),
					'min' => '',
					'max' => '',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'portfolio_project',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_550953e7d842e',
	'title' => 'Gallery',
	'fields' => array (
		array (
			'key' => 'field_550953ec7912f',
			'label' => 'Gallery',
			'name' => 'gallery',
			'type' => 'gallery',
			'instructions' => 'Add images to your gallery.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'min' => '',
			'max' => '',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'gallery',
			),
		),
	),
	'menu_order' => 10,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5533f28634892',
	'title' => 'Video',
	'fields' => array (
		array (
			'key' => 'field_5533f2863701a',
			'label' => 'Type',
			'name' => 'video_type',
			'type' => 'radio',
			'instructions' => 'The type of video you want to include.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'embed' => 'Embed',
				'custom' => 'Custom',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'embed : Embed',
			'layout' => 'horizontal',
		),
		array (
			'key' => 'field_5533f28637032',
			'label' => 'Embed',
			'name' => 'video_embed',
			'type' => 'oembed',
			'instructions' => 'The oEmbed URL for your video. More info about oEmbeds can be found in the WordPress <a href="http://codex.wordpress.org/Embeds#oEmbed">codex</a>.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5533f2863701a',
						'operator' => '==',
						'value' => 'embed',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'width' => '',
			'height' => '',
		),
		array (
			'key' => 'field_5533f28637043',
			'label' => 'URL',
			'name' => 'video_url',
			'type' => 'text',
			'instructions' => 'The URL to your custom video file.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5533f2863701a',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'video',
			),
		),
	),
	'menu_order' => 11,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5509562cd8787',
	'title' => 'Audio',
	'fields' => array (
		array (
			'key' => 'field_5533f16309a9a',
			'label' => 'Type',
			'name' => 'audio_type',
			'type' => 'radio',
			'instructions' => 'The type of audio you want to include.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'embed' => 'Embed',
				'custom' => 'Custom',
			),
			'other_choice' => 0,
			'save_other_choice' => 0,
			'default_value' => 'embed : Embed',
			'layout' => 'horizontal',
		),
		array (
			'key' => 'field_550956331bd65',
			'label' => 'Embed',
			'name' => 'audio_embed',
			'type' => 'oembed',
			'instructions' => 'The oEmbed URL for your audio. More info about oEmbeds can be found in the WordPress <a href="http://codex.wordpress.org/Embeds#oEmbed">codex</a>.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5533f16309a9a',
						'operator' => '==',
						'value' => 'embed',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'width' => '',
			'height' => '',
		),
		array (
			'key' => 'field_5533f1b309a9b',
			'label' => 'URL',
			'name' => 'audio_url',
			'type' => 'url',
			'instructions' => 'The URL to your custom audio file.',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_5533f16309a9a',
						'operator' => '==',
						'value' => 'custom',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
			array (
				'param' => 'post_format',
				'operator' => '==',
				'value' => 'audio',
			),
		),
	),
	'menu_order' => 12,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5583c60a56b28',
	'title' => 'Subtitle',
	'fields' => array (
		array (
			'key' => 'field_5583c60f173bd',
			'label' => 'Add a subtitle',
			'name' => 'subtitle',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'team',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'testimonial',
			),
		),
	),
	'menu_order' => 20,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;

endif;