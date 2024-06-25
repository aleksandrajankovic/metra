

'taxonomy' => 'mt-listing-category2' 
'post_type' => 'mt_listing'

<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
	<?php
		if( $terms = get_terms( array( 'taxonomy' => 'mt-listing-category2', 'orderby' => 'name' ) ) ) : 
 
			echo '<select name="categoryfilter"><option value="">Select category...</option>';
			foreach ( $terms as $term ) :
				echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
			endforeach;
			echo '</select>';
		endif;
	?>
	<button>Apply filter</button>
	<input type="hidden" name="action" value="myfilter">
</form>
<div id="response">

<?php
// THIS LOOP WILL SHOW ALL POSTS BY DEFAULT
$args = array(
    'post_type' => 'mt_listing', // Define the post type
    'posts_per_page' => -1 // Display all posts
);
   
$the_query = new WP_Query( $args ); ?>
   
    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
   
          <h2><?php the_title(); ?></h2>
  
    <?php endwhile; endif; ?>
   
<?php wp_reset_postdata(); ?>







?>










 
<?php while ( have_posts() ) : the_post(); ?>
                    
   
                    <?php get_template_part( 'content', 'page' ); ?>

                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>

                <?php endwhile; // end of the loop. ?>