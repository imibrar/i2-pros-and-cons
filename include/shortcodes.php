<?php 

function i2_pros_and_cons($atts, $content = null)
{

	$atts = shortcode_atts([
		'pros' => '',
        'cons' => '',
        'show_title'=> false,
        'title' => '',
        'show_button'=> false,
        'link_text' => '',
        'link' => '',
        'pros_title' => __('Pros','i2-pros-and-cons'),
        'cons_title' =>  __('Cons', 'i2-pros-and-cons'),
        'link_icon'=>'',
        'pros_title_icon' => '',
        'cons_title_icon' =>  '',
        'pros_icon' => '',
        'cons_icon' => '',
        'pros_heading_icon' => '',
        'cons_heading_icon' => '',
    ], $atts, 'i2_pros_and_cons');

    // echo '<pre>'; 
    // echo "dd :" . $atts['show_title'] === true;
    // print_r($atts); 
    // echo '</pre>';
    // var_dump($atts['show_title']);
    // exit();
    
   if(strlen($content) > 10){
     $data = explode ("###ER##GF####", do_shortcode($content), 2);
     $atts['pros'] = $data[0];
     $atts['cons'] = $data[1];
   }
    $options = get_option( 'i2_pros_and_cons', i2_pros_and_cons_options_default());
    // $icon =  isset( $atts['type'] ) && $atts['type'] == 'cons' ? $options['cons_icon'] : $options['pros_icon'];  
    // $useIcon = $options['use_icons'] == 1? "has-icon" : "no-icon"; 
    
    // main wrapper classes
    $mwclasses = 'i2-pros-cons-main-wrapper theme-' . $options['parent_theme'];

    $mwclasses .=  $atts['show_title'] == 'true' ? ' has-title' : ' no-title' ;  
    $mwclasses .=  $atts['show_button'] == 'true' ? ' has-button' : ' no-button' ;   
    $mwclasses .=  $options['use_space_between_column'] == 1 ? ' space-between-column' : ' no-space-between-column' ;   
    $mwclasses .=  $options['use_outer_border'] == 1 ? ' outer-border' : ' no-outer-border' ;   


    $data  = '<div class="'. $mwclasses .'">';

    if($atts['show_title'] == 'true') {
        $data .= '<h3 class="i2pctitle">' . $atts['title']  .'</h3>'; 
    }

    $data .= '<div class="i2-pros-cons-wrapper"><div class="i2-pros">';
    $data .= '<h3 class="i2-pros-title">' . $atts['pros_title']  .'</h3>';
    $data .= '<div class="section">';
    $data .= i2_pros_cons_list($atts['pros'], $options['use_icons'] , $options['pros_icon']);
    $data .= '</div></div>';
    $data .= '<div class="i2-spacer"></div>';
    $data .= '<div class="i2-cons">';
    $data .= '<h3 class="i2-cons-title">' . $atts['cons_title']  .'</h3>';
    $data .= '<div class="section">';
    $data .= i2_pros_cons_list($atts['cons'], $options['use_icons'] , $options['cons_icon']);
    $data .= '</div></div></div>';

    if($atts['show_button'] == 'true') {
        $data .= '<div class="i2-button-wrapper"><a class="' . $options['button_theme'] .'" href="' .  $atts['link'] .'" target="_blank"> <i class="' .  $options['button_icon'] .'"></i> <span class="i2pc-btn-text">' .  $atts['link_text'] . '</span></a></div>'; 
    }
    $data .= '</div>';
    
    return $data;

	//return "<{$atts['heading']}>{$atts['title']}</{$atts['heading']}>";
}
add_shortcode('i2_pros_and_cons', 'i2_pros_and_cons');


function i2_pros_cons_list($data, $useIcon, $icon){
    // echo '<pre>'; 
    //  print_r($data); 
    //  echo '</pre>';
     $useIconClass = $useIcon == 1? "has-icon" : "no-icon"; 
    $lines = explode("\n", $data);
    $list = "<ul class='{$useIconClass}'>";
     foreach ($lines as $key => $value) {
         if(strlen($value) > 0){
         $list .= "<li>" . ($useIcon == 1 ? "<i class='{$icon}'></i>" : "") . $value . "</li>";
         }
     }
      return	$list . '</ul>';
}


add_shortcode('i2pc','i2_pros_and_cons');
function i2_cons_sc($attr, $content = null) {    
    return  $content;     
}
function i2_pros_sc($attr, $content = null) {    
    return  $content . "###ER##GF####";   
}
add_shortcode('i2pros','i2_pros_sc');
add_shortcode('i2cons','i2_cons_sc');