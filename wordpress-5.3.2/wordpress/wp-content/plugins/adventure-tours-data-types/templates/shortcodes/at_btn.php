<?php
/**
 * Shortcode [at_btn] view.
 * For more detailed list see list of shortcode attributes.
 *
 * @var string  $text
 * @var string  $url
 * @var string  $type
 * @var string  $style
 * @var string  $size
 * @var string  $corners
 * @var boolean $light
 * @var boolean $transparent
 * @var string  $icon_class
 * @var string  $icon_align
 * @var string  $css_class
 * @var string  $view
 *
 * @author    Themedelight
 * @package   Themedelight/AdventureTours
 * @version   2.1.7
 */

if ( ! $type || ! in_array( $type, array( 'link','button','submit' ) ) ) {
	$type = !empty( $url ) ? 'link' : 'button';
}

$class_parts = array();
if ( 'default' != $style ) {
	$class_parts[] = 'at-atbtn--' . $style;
}
if ( 'large' != $size ) {
	$class_parts[] = 'at-atbtn--' . $size;
}
if ( 'square' != $corners ) {
	$class_parts[] = 'at-atbtn--' . $corners;
}
if ( $light ) {
	$class_parts[] = 'at-atbtn--light';
}
if ( $transparent ) {
	$class_parts[] = 'at-atbtn--transparent';
}
if ( $class_parts ) {
	if ( $css_class ) {
		$class_parts[] = $css_class;
	}
	$css_class =  join( ' ', $class_parts );
}

$icon_html_left = '';
$icon_html_right = '';
if ( $icon_class ) {
	if ( 'right' == $icon_align ) {
		$icon_class .= ' at-atbtn__icon--right';
	}

	$icon_html = sprintf( '<i class="at-atbtn__icon %s"></i>', esc_attr( $icon_class ) );
	if ( 'right' == $icon_align ) {
		$icon_html_right = $icon_html;
	} else {
		$icon_html_left = $icon_html;
	}
}

switch ( $type ) {
case 'link':
case 'link in a new tab':
	printf( '<a href="%s" class="at-atbtn%s"%s>%s%s%s</a>',
		$url ? esc_url( $url ) : '',
		$css_class ? esc_attr( ' ' . $css_class ) : '',
		'link in a new tab' == $type ? ' target="_blank"' : '',
		$icon_html_left,
		$content ? esc_html( $content ) : esc_html( $text ),
		$icon_html_right
	);
	break;

default:
	printf( '<button class="at-atbtn%s"%s>%s%s%s</button>',
		$css_class ? esc_attr( ' ' . $css_class ) : '',
		'submit' == $type ? ' type="submit"' : '',
		$icon_html_left,
		$content ? esc_html( $content ) : esc_html( $text ),
		$icon_html_right
	);
	break;
}
