<?php
/**
 * Shortcode [latest_posts] view.
 * For more detailed list see list of shortcode attributes.
 *
 * @var string  $title
 * @var boolean $title_underline
 * @var string  $number
 * @var string  $translate
 * @var srting  $read_more_text
 * @var string  $words_limit
 * @var boolean $ignore_sticky_posts
 * @var string  $css_class
 * @var string  $view
 * @var array   $items
 *
 * @author    Themedelight
 * @package   Themedelight/AdventureTours
 * @version   2.1.1
 */

if ( ! $items ) {
	return '';
}
$render_limit = isset( $number ) && $number > 0 ? $number : 0;

?>
<div class="at-last-posts<?php if ( ! empty( $css_class ) ) { echo ' ' . esc_attr( $css_class ); }; ?>">
<?php if ( $title ) { ?>
	<h3 class="at-last-posts__title"><?php echo $title; ?></h3>
<?php } ?>

<?php foreach ( $items as $post ) : ?>
	<?php
	$image = get_the_post_thumbnail( $post->ID, 'thumbnail' );
	$classItem = ($image) ? ' at-last-posts__item--with-images' : '';
	$post_link = get_permalink( $post->ID );
	?>
	<div class="at-last-posts__item<?php echo esc_attr( $classItem ); ?>">
		<?php
		printf( '<a href="%s" class="at-last-posts__item__image-wrap">%s</a>',
			esc_url( $post_link ),
			$image
		);
		?>
		<div class="at-last-posts__item__content">
			<h3 class="at-last-posts__item__title"><a href="<?php echo esc_url( $post_link ); ?>"><?php echo esc_html( $post->post_title ); ?></a></h3>
			<div class="at-last-posts__item__description"><?php echo esc_html( $post->post_content ); ?></div>
			<div class="at-last-posts__item__read-more"><a href="<?php echo esc_url( $post_link ); ?>"><?php echo esc_html( $read_more_text ); ?></a></div>
		</div>
	</div>
	<?php if ( $render_limit > 0 && --$render_limit < 1 ) {
		break;
	} ?>
<?php endforeach; ?>
</div>
