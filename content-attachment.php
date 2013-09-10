<?php
/**
 * Attachment Content Template
 *
 * Template used to show the post content of the attachment post type.
 *
 * @package Unique
 * @subpackage Template
 * @since 0.1.0
 * @author Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2012, Justin Tadlock
 * @link http://themehybrid.com/themes/unique
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

do_atomic( 'before_entry' ); // unique_before_entry ?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // unique_open_entry ?>

	<?php if ( is_singular() && is_main_query() ) { ?>

		<header class="entry-header">
			<?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h1 class="entry-title">', '</h1>', false ) ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php hybrid_attachment(); // Function for handling non-image attachments. ?>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'unique' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( 'Published on [entry-published] [entry-edit-link before="| "]', 'unique' ) . '</div>' ); ?>
		</footer><!-- .entry-footer -->

	<?php } else { ?>

		<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'thumbnail' ) ); ?>

		<header class="entry-header">
			<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'unique' ), 'after' => '</p>' ) ); ?>
		</div><!-- .entry-summary -->

	<?php } ?>

	<?php do_atomic( 'close_entry' ); // unique_close_entry ?>

</article><!-- .hentry -->

<?php do_atomic( 'after_entry' ); // unique_after_entry ?>