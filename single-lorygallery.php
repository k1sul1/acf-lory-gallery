<?php
/**
 * Note that this file isn't loaded unless you uncomment the sample in index.php!
 */

get_header();
while (have_posts()) { the_post(); ?>

  <article <?php post_class(); ?>>
    <?php the_title(); ?>
    <?php
    echo do_shortcode("[acf_lory_gallery id='561' fullscreen='false' links='true']");
    echo "<p>lorem ipsum</p>";
    echo do_shortcode("[acf_lory_gallery id='561' fullscreen='true' links='true']");
    ?>
  </article>

<?php
}

get_footer();
