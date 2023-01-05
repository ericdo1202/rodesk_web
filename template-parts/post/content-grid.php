<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quiety
 */

$content       = apply_filters( 'the_content', get_the_content() );
$meta          = get_post_meta( get_the_ID(), 'quiety-post-video', true );
$videothumb    = ! empty( $meta['video-thumbnail'] ) ? $meta['video-thumbnail'] : '';
$meta_gallery  = get_post_meta( get_the_ID(), 'themename-post-gallery', true );
$category_list = get_the_category_list( ', ' );
$author = quiety_option( 'blog_list_meta_author', true );
$meta_date = quiety_option( 'blog_list_meta_date', false );
$meta_comments = quiety_option( 'blog_list_meta_comments', true );
$meta_category = quiety_option( 'blog_list_meta_categories', true );
$word_count = quiety_option('word_count_grid', '25');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-grid entry-post' ); ?>>

	<?php if (has_post_thumbnail()) : ?>
		<div class="post-thumbnail-wrapper">
			<?php Quiety_Theme_Helper::quiety_post_thumbnail(); ?>
		</div>
		<!-- /.post-thumbnail-wrapper -->
	<?php endif; ?>



	<div class="blog-content">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-meta-wrapper">

			<?php $category_list = get_the_category_list();

			$terms    = get_the_terms( get_the_ID(), 'category' );
			$cat_temp = '';

			if ( $terms && ! is_wp_error( $terms ) ) : ?>
				<div class="meta-category-wrapper">
					<?php foreach ( $terms as $term ) {
						$cat_temp .= '<a href="' . get_category_link( $term->term_id ) . '" class="tt-blog-meta-category" rel="category tag">' . esc_html( $term->name ) . '</a>';
					}
					echo wp_kses_post( $cat_temp ); ?>
				</div>
				<?php endif; ?>

			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<div class="entry-content">
			<p>
				<?php echo Quiety_Theme_Helper::quiety_substring( get_the_content(), $word_count, '...' ); ?>
			</p>

			<footer class="blog-footer">
				<?php if ( 'post' === get_post_type() ) : ?>
				<ul class="post-meta">
					<?php if ( $author == '1' ) : ?>
						<li class="author-simple">
							<?php echo Quiety_Theme_Helper::quiety_posted_author_avatar(); ?>
						</li>
					<?php endif; ?>

					<?php if ( $meta_date == '1' ) : ?>
						<li><i class="feather-calendar"></i><?php Quiety_Theme_Helper::quiety_posted_on(); ?></li>
					<?php endif; ?>

				</ul><!-- .entry-meta -->
				<?php endif; ?>
			</footer>

			<?php if ( is_singular() ) {
				wp_link_pages();
			} ?>
		</div>
	</div><!-- /.entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
