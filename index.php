<?php
/*
Plugin Name: ACF Lory gallery
Author: Christian Nikkanen
Version: 1.0.0
*/

defined("ABSPATH") or die("Wat r u doing?");


require_once "class.cpt-template.php";
require_once "acf.php";

add_action("init", function() {
  $blog = new CPT_Template();
  $blog
    ->registerTemplateDirectory(plugin_dir_path(__FILE__))
    ->createCustomPostType("lorygallery", [
      "labels" => [
        "name" => "Gallery",
      ],
      "public" => true,
      "publicly_queryable" => true,
      "supports" => ["title", "editor", "thumbnail", "excerpt"],
      "has_archive" => true,
      "menu_position" => 15
    ])
    ->captureSingle()
    ->captureArchive();

  // Flush rules *once* after creating a new post type or taxonomy, don't
  // leave on because the operation is expensive.
  if (get_option("acf-lory-gallery-flushed", false)) {
    flush_rewrite_rules();
    update_option("acf-lory-gallery-flushed", true);
  }
});

add_action("wp_enqueue_scripts", function() {
  $url = plugin_dir_url(__FILE__) . "dist/";
  wp_enqueue_script("lory-js", "https://cdnjs.cloudflare.com/ajax/libs/lory.js/2.3.3/lory.min.js", [], null, true);
  wp_enqueue_script("acflory-js", $url . "bundle.js", ["lory-js"], null, true);
  wp_enqueue_style("acflory-css", $url . "bundle.css", [], null);
}, 0, 99999);

add_shortcode("acf_lory_gallery", function ($atts) {
  $atts = shortcode_atts(
    [
      "id" => null,
      "fullscreen" => "false",
      "links" => "false", // Values come as strings.
    ],
    $atts,
    "acf_lory_gallery"
  );

  if (!$atts["id"]) {
    return false;
  }

  $gallery = get_field("gallery", $atts["id"]);
  $i = 0;
  ob_start(); ?>

  <div class="slider js_slider acflory" data-fullscreen="<?=$atts["fullscreen"]?>">
    <div class="frame js_frame">
      <ul class="slides js_slides">
        <?php foreach ($gallery as $item) { //print_r($item); ?>
        <li class="js_slide item" style="background-image: url('<?=$item["image"]["url"]?>')">
          <a
            class="item-link"
            data-index="<?=$i++?>"
            <?=$atts["links"] === "true" && !empty($item["link"])
              ? "href=\"{$item["link"]}\""
              : ""?>
          ></a>
          <!--<img class="item-img" src="<?=$item["image"]["url"]?>">-->
          <span class="item-desc"><?=$item["description"]?></span>
        </li>
        <?php } ?>
      </ul>
    </div>
    <span class="js_prev prev" role="button">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path  d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
    </span>
    <span class="js_next next" role="button">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path  d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>
    </span>
  </div>

  <?php
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
});
