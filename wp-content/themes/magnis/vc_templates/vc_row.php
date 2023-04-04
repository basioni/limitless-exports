<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
    'css' => '',
	'fullwidth'=>'',
    'wrap_class'=>'',
	'ses_title'=>'',
    'ses_sub_title'=>'',
    'align_title'   =>'',
), $atts));

// wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
// wp_enqueue_style('js_composer_custom_css');

$text_align = '';
if($align_title == 'left'){
	$text_align = 'left';
}elseif($align_title == 'right'){
	$text_align = 'right';
}elseif($align_title == 'center'){
	$text_align = 'center';
}else{
	$text_align = 'left';
}

$el_class = $this->getExtraClass($el_class);
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ''. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);
$output .='<section class="bg-fixed '.$css_class.'"'.$style.'>';
if($fullwidth != 'yes'){
    if($wrap_class != ''){
        $output .= '<div class="'.$wrap_class.'">';
    }
	$output .= '<div class="container">';
}
if($ses_title!=""){
    $output .='<h2 class="'.$text_align.'">'.$ses_title.'</h2>';
}
if($ses_sub_title!=''){
    $output .='<div class="visual_subtitle">'.wpautop(do_shortcode(htmlspecialchars_decode($ses_sub_title))).'</div>';
}
$output .= '<div class="row">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>'.$this->endBlockComment('row');
if($fullwidth != 'yes'){
	$output .= '</div>';
    if($wrap_class != ''){
        $output .= '</div>';
    }
}
$output .='</section>';
echo $output;