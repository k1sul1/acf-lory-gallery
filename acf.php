<?php
if(function_exists('acf_add_local_field_group')):

  acf_add_local_field_group(array (
    'key' => 'group_59e62e66745ef',
    'title' => 'Lory gallery',
    'fields' => array (
      array (
        'key' => 'field_59e63375827b2',
        'label' => 'Instructions',
        'name' => '',
        'type' => 'message',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array (
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'message' => 'To show the gallery on a page, include this shortcode in the content:
        [acf_lory_gallery id="POST_ID" links="false" fullscreen="false"]

        Replace POST_ID with the ID you get when you save this post. Lost? The URL contains the ID: /wp-admin/post.php?post=556&action=edit

        links can be true or false, setting it to true will use links in the gallery.
        fullscreen can be true or false, setting it to true will allow the user to open the gallery fully.',
'new_lines' => 'wpautop',
'esc_html' => 0,
   ),
   array (
     'key' => 'field_59e62ee6ebceb',
     'label' => 'Gallery',
     'name' => 'gallery',
     'type' => 'repeater',
     'value' => NULL,
     'instructions' => 'To show the gallery on a page, include this shortcode in the content:
     [acf_lory_gallery id="POST_ID" links="false" fullscreen="false"]

     Replace POST_ID with the ID you get when you save this post. Lost? The URL contains the ID: /wp-admin/post.php?post=556&action=edit

     links can be true or false, setting it to true will use links in the gallery.
     fullscreen can be true or false, setting it to true will allow the user to open the gallery fully.',
'required' => 0,
'conditional_logic' => 0,
'wrapper' => array (
  'width' => '',
  'class' => '',
  'id' => '',
),
'collapsed' => '',
'min' => 0,
'max' => 0,
'layout' => 'table',
'button_label' => '',
'sub_fields' => array (
  array (
    'key' => 'field_59e62ef6ebcec',
    'label' => 'Image',
    'name' => 'image',
    'type' => 'image',
    'value' => NULL,
    'instructions' => '',
    'required' => 0,
    'conditional_logic' => 0,
    'wrapper' => array (
      'width' => '',
      'class' => '',
      'id' => '',
    ),
    'return_format' => 'array',
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
  array (
    'key' => 'field_59e62f4eebced',
    'label' => 'Description',
    'name' => 'description',
    'type' => 'text',
    'value' => NULL,
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
  ),
  array (
    'key' => 'field_59e62f5eebcee',
    'label' => 'Link',
    'name' => 'link',
    'type' => 'text',
    'value' => NULL,
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
  ),
),
   ),
 ),
 'location' => array (
   array (
     array (
       'param' => 'post_type',
       'operator' => '==',
       'value' => 'lorygallery',
     ),
   ),
 ),
 'menu_order' => 0,
 'position' => 'normal',
 'style' => 'default',
 'label_placement' => 'top',
 'instruction_placement' => 'label',
 'hide_on_screen' => array (
   0 => 'permalink',
   1 => 'the_content',
   2 => 'excerpt',
   3 => 'custom_fields',
   4 => 'discussion',
   5 => 'comments',
   6 => 'revisions',
   7 => 'slug',
   8 => 'author',
   9 => 'format',
   10 => 'page_attributes',
   11 => 'featured_image',
   12 => 'categories',
   13 => 'tags',
   14 => 'send-trackbacks',
 ),
 'active' => 1,
 'description' => '',
));

endif;
