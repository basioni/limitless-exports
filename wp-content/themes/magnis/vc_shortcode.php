<?php 
//Flex Slider
if(function_exists('vc_map')){

  vc_map( array(

   "name"      => __("OT Flex Slider", 'magnis'),

   "base"      => "flexslider",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

    array(

      "type"      => "attach_images",

      "holder"    => "div",

      "class"     => "",

      "heading"   => __("Images Slider", 'magnis'),

      "param_name"=> "gallery",

      "value"     => "",

      "description" => __("Upload Image Slider", 'magnis')

      ),

    )));

}

//Custom Heading
if(function_exists('vc_map')){
   vc_map( array(

   "name"      => __("OT Heading", 'magnis'),

   "base"      => "heading",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

      array(

         "type"      => "textarea",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Text", 'magnis'),

         "param_name"=> "text",

         "value"     => "",

         "description" => __("Ex: Heading", 'magnis')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Element Tag', 'magnis'),

        "param_name" => "tag",

        "value" => array(   
                     __('h1', 'magnis') => 'h1',
                     __('h2', 'magnis') => 'h2',

                     __('h3', 'magnis') => 'h3',  

                     __('h4', 'magnis') => 'h4',

                     __('h5', 'magnis') => 'h5',

                     __('h6', 'magnis') => 'h6',  

                     __('p', 'magnis')  => 'p',

                     __('div', 'magnis') => 'div',
                    ),

        "description" => __("Section Element Tag", 'magnis'),      

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Text Align', 'magnis'),

        "param_name" => "align",

        "value" => array(   
                      
                     __('left', 'magnis') => 'left',

                     __('right', 'magnis') => 'right',  

                     __('center', 'magnis') => 'center',

                     __('justify', 'magnis') => 'justify',
                     
                    ),

        "description" => __("Section Overlay", 'magnis'),      

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Font Size", 'magnis'),

         "param_name"=> "size",

         "value"     => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type"      => "colorpicker",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Color", 'magnis'),

         "param_name"=> "color",

         "value"     => "",

         "description" => __("", 'magnis')

      ),

    )));

}

// About We Are
if(function_exists('vc_map')){
   vc_map( array(

   "name" => __("OT Who We Are", 'magnis'),

   "base" => "weare",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("Title call to action", 'magnis')

      ),

      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Description", 'magnis'),

         "param_name" => "content",

         "value" => '',

         "description" => __("Description about", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Sign Author", 'magnis'),

         "param_name" => "sign",

         "value" => "",

         "description" => __("", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Position Author", 'magnis'),

         "param_name" => "pos",

         "value" => '',

         "description" => __("", 'magnis')

      ),

      
    )
    ));

}

//Services

if(function_exists('vc_map')){
   vc_map( array(

   "name"      => __("OT Services", 'magnis'),

   "base"      => "features",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Icon Left", 'magnis'),

         "param_name"=> "icon",

         "value"     => "",

         "description" => __("Input class icon. Ex: magic. Find here: <a href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title Feature", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("", 'magnis')

      ),

      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Description Feature", 'magnis'),

         "param_name" => "content",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Style Show', 'magnis'),

        "param_name" => "style",

        "value" => array(   
                     
                     __('Style1: Align Center', 'magnis') => 'style1',

                     __('Style2: Align Left', 'magnis') => 'style2', 

                    ),

        "description" => __("", 'magnis'),      

      )

    )));

}


// Call To Action 1
if(function_exists('vc_map')){
   vc_map( array(

   "name" => __("OT Call To Action 1", 'magnis'),

   "base" => "cta1",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("Title call to action", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Subtitle", 'magnis'),

         "param_name" => "stitle",

         "value" => '',

         "description" => __("Subtitle call to action", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Text", 'magnis'),

         "param_name" => "btntext1",

         "value" => "",

         "description" => __("Label button", 'magnis')

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Icon Button", 'magnis'),

         "param_name"=> "icon",

         "value"     => "",

         "description" => __("Input class icon. Ex: check-circle. Find here: <a href='http://fontawesome.io/icons/'>http://fontawesome.io/icons/</a>", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Link", 'magnis'),

         "param_name" => "btnlink1",

         "value" => '',

         "description" => __("", 'magnis')

      ),

    )
    ));

}

// Call To Action 2
if(function_exists('vc_map')){
   vc_map( array(

   "name" => __("OT Call To Action 2", 'magnis'),

   "base" => "cta2",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("Title call to action", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Subtitle", 'magnis'),

         "param_name" => "stitle",

         "value" => '',

         "description" => __("Subtitle call to action", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Text 1", 'magnis'),

         "param_name" => "btntext1",

         "value" => "",

         "description" => __("Label button 1", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Link 1", 'magnis'),

         "param_name" => "btnlink1",

         "value" => '',

         "description" => __("Link 1", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Text 2", 'magnis'),

         "param_name" => "btntext2",

         "value" => "",

         "description" => __("Label button 1", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Link 2", 'magnis'),

         "param_name" => "btnlink2",

         "value" => '',

         "description" => __("Link 2", 'magnis')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Style Call To Action', 'magnis'),

        "param_name" => "style",

        "value" => array(   
                      
                     __('Style1: Align Left', 'magnis') => 'style1',  

                     __('Style2: Align Center', 'magnis') => 'style2',                   

                    ),

        "description" => __("Section Overlay", 'magnis'),      

      ),
    )
    ));

}

// Toggle Accordion 
if(function_exists('vc_map')){
	vc_map( array(

   "name" => __("OT Accordion", 'magnis'),

   "base" => "accordion",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Icon", 'magnis'),

         "param_name" => "icon",

         "value" => '',

         "description" => __("Icon display left title. Ex: heart. Find here: <a href='http://fontawesome.io/icons/'>http://fontawesome.io/icons</a>", 'magnis')

      ),

       array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Content", 'magnis'),

         "param_name" => "content",

         "value" => "",

         "description" => __("", 'magnis')

      ),

    )

    ));

}

// Buttons

if(function_exists('vc_map')){
   vc_map( array(

   "name" => __("OT Button", 'magnis'),

   "base" => "button",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Text", 'magnis'),

         "param_name" => "btntext",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Icon", 'magnis'),

         "param_name" => "icon",

         "value" => '',

         "description" => __("Ex: heart. Find here: <a href='http://fontawesome.io/icons/'>http://fontawesome.io/icons</a>", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Link", 'magnis'),

         "param_name" => "btnlink",

         "value" => '',

         "description" => __("", 'magnis')

      ),

      array(

         "type" => "dropdown",

         "holder" => "div",

         "class" => "",

         "heading" => __("Button Type", 'magnis'),

         "param_name" => "type",

         "value" => array(   
                      
                     __('Color', 'magnis') => 'color',  

                     __('Dark', 'magnis') => 'dark',

                     __('Border', 'magnis') => 'border',
                    ),

         "description" => __("", 'magnis')

      ),
      
    )
    ));

}


//Testimonials by Davis Hoang

if(function_exists('vc_map')){

	vc_map( array(

   "name"      => __("OT Testimonials", 'magnis'),

   "base"      => "testimonials",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

	  array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Title", 'magnis'),

         "param_name"=> "title",

         "value"     => "",

         "description" => __("Title Testimonials", 'magnis')

      ),
	   
     array(

        "type" => "dropdown",

        "heading" => __('Style Testimonials', 'magnis'),

        "param_name" => "style",

        "value" => array(   
                    
                     __('Style1', 'magnis') => 'style1',  

                     __('Style2', 'magnis') => 'style2',

                    ),

        "description" => __("", 'magnis'),      

      )

    )));

}


//Clients Logo

if(function_exists('vc_map')){

	vc_map( array(

   "name"      => __("OT Clients Logo", 'magnis'),

   "base"      => "clients",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

		array(

			"type"      => "attach_images",

			"holder"    => "div",

			"class"     => "",

			"heading"   => __("Logo", 'magnis'),

			"param_name"=> "gallery",

			"value"     => "",

			"description" => __("Upload Logo Client", 'magnis')

      ),

    )));

}


//blog Post latest news
if(function_exists('vc_map')){

   vc_map( array(

   "name" => __("OT Latest News", 'magnis'),

   "base" => "latest_news",

   "class" => "",

   "icon" => "icon-st",

   "category" => 'Content',

   "params" => array(

      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Title Latest News", 'magnis'),

         "param_name"=> "title",

         "value"     => "",

         "description" => __("Title Latest News.", 'magnis')

      ),
      array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Number Post", 'magnis'),

         "param_name"=> "showpost",

         "value"     => 5,

         "description" => __("number post view.", 'magnis')

      ),
	  array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Show Number of excerpt length", 'magnis'),

         "param_name"=> "excerpt_length",

         "value"     => 15,

         "description" => __("number excerpt length view.", 'magnis')

      ),
      
      array(

        "type" => "dropdown",

        "heading" => __('Visible Posts', 'magnis'),

        "param_name" => "visible",

        "value" => array(   
                     
                     __('1', 'magnis') => '1',

                     __('2', 'magnis') => '2', 

                    ),

        "description" => __("", 'magnis'),      

      )

    )));

}



// Latest Projects

if(function_exists('vc_map')){

   vc_map( array(

   "name"      => __("OT Latest Projects", 'magnis'),

   "base"      => "lproject",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

       array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Title", 'magnis'),

         "param_name"=> "title",

         "value"     => "",

         "description" => __("", 'magnis')

      ),

      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Description", 'magnis'),

         "param_name" => "content",

         "value" => "",

         "description" => __("", 'magnis')

      ),
	  
	  array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Show number of Portfolio", 'magnis'),

         "param_name"=> "number",

         "value"     => 6,

         "description" => __("", 'magnis')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Visible Portfolio', 'magnis'),

        "param_name" => "visible",

        "value" => array(   
                      
                     __('5', 'magnis') => '5',  

                     __('4', 'magnis') => '4',

                     __('3', 'magnis') => '3',
                    ),

        "description" => __("", 'magnis'),      

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Style Show', 'magnis'),

        "param_name" => "style",

        "value" => array(   
                     
                     __('Style1: Full Width', 'magnis') => 'style1',

                     __('Style2: Title Left', 'magnis') => 'style2', 

                    ),

        "description" => __("", 'magnis'),      

      )

    )));

}


// Team

if(function_exists('vc_map')){

   vc_map( array(

   "name" => __("OT Our Team", 'magnis'),

   "base" => "team",

   "class" => "",

   "icon" => "icon-st",

   "category" => 'Content',

   "params" => array(

      array(

         "type" => "attach_image",

         "holder" => "div",

         "class" => "",

         "heading" => __("Photo", 'magnis'),

         "param_name" => "photo",

         "value" => "",

         "description" => __("Image of team: 500x500", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Name", 'magnis'),

         "param_name" => "name",

         "value" => "",

         "description" => __("Name of team", 'magnis')

      ),
      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Details", 'magnis'),

         "param_name" => "content",

         "value" => "",

         "description" => __("Details of team", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Icon Social 1", 'magnis'),

         "param_name" => "icon1",

         "value" => "",

         "description" => __("Icon of social 1", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Link Social 1", 'magnis'),

         "param_name" => "soc1",

         "value" => "",

         "description" => __("Link of social 1", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Icon Social 2", 'magnis'),

         "param_name" => "icon2",

         "value" => "",

         "description" => __("Icon of social 2", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Link Social 2", 'magnis'),

         "param_name" => "soc2",

         "value" => "",

         "description" => __("Link of social 2", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Icon Social 3", 'magnis'),

         "param_name" => "icon3",

         "value" => "",

         "description" => __("Icon of social 3", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Link Social 3", 'magnis'),

         "param_name" => "soc3",

         "value" => "",

         "description" => __("Link of social 3", 'magnis')

      ),


    )));

}


// Team Slider

if(function_exists('vc_map')){

   vc_map( array(

   "name" => __("OT Team Slider", 'magnis'),

   "base" => "teamslider",

   "class" => "",

   "icon" => "icon-st",

   "category" => 'Content',

   "params" => array(
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title Slider", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      

    )));

}

// Skills 

if(function_exists('vc_map')){

   

   vc_map( array(

   "name" => __("OT Our Skills", 'magnis'),

   "base" => "skills",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("Title Skill.", 'magnis')

      ),

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Percent", 'magnis'),

         "param_name" => "percent",

         "value" => 0,

         "description" => __("Percent Skill", 'magnis')

      ),
      
    )));

}

// List FAQs

if(function_exists('vc_map')){

   vc_map( array(

   "name" => __("OT List FAQs", 'magnis'),

   "base" => "faqs",

   "class" => "",

   "icon" => "icon-st",

   "category" => 'Content',

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Extra Class", 'magnis'),

         "param_name" => "exclass",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Text Before Filter", 'magnis'),

         "param_name" => "textbf",

         "value" => "",

         "description" => __("", 'magnis')

      ),

    )));

}


//Services

if(function_exists('vc_map')){

   vc_map( array(

   "name"      => __("OTQuick Question", 'magnis'),

   "base"      => "question",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Quick Question", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("", 'magnis')

      ),

      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Quick Answer", 'magnis'),

         "param_name" => "content",

         "value" => "",

         "description" => __("", 'magnis')

      ),
     
    )));

}


// Pricing Tables 
if(function_exists('vc_map')){
   vc_map( array(

   "name" => __("OT Pricing Tables", 'magnis'),

   "base" => "pricing",

   "class" => "",

   "category" => 'Content',

   "icon" => "icon-st",

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Recommended", 'magnis'),

         "param_name" => "rec",

         "value" => '',

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Price", 'magnis'),

         "param_name" => "price",

         "value" => '',

         "description" => __("Ex: $0.00", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Long Time", 'magnis'),

         "param_name" => "time",

         "value" => '',

         "description" => __("Ex: per month", 'magnis')

      ),
      array(

         "type" => "textarea",

         "holder" => "div",

         "class" => "",

         "heading" => __("Description", 'magnis'),

         "param_name" => "des",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Details", 'magnis'),

         "param_name" => "details",

         "value" => "",

         "description" => __("Ex: <ul></ul>", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Label Button", 'magnis'),

         "param_name" => "btntext",

         "value" => '',

         "description" => __("Ex: Purchase", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Link Button", 'magnis'),

         "param_name" => "btnlink",

         "value" => '',

         "description" => __("", 'magnis')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Style', 'magnis'),

        "param_name" => "style",

        "value" => array(   
                     
                     __('Style1', 'magnis') => 'style1',

                     __('Style2', 'magnis') => 'style2',
                     
                    ),

        "description" => __("Seclect One", 'magnis'),      

      )
    )));

}


// Feature Box

if(function_exists('vc_map')){

   vc_map( array(

   "name" => __("OTFeatured Box", 'magnis'),

   "base" => "featurebox",

   "class" => "",

   "icon" => "icon-st",

   "category" => 'Content',

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Description", 'magnis'),

         "param_name" => "des",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Text Button", 'magnis'),

         "param_name" => "btn",

         "value" => "",

         "description" => __("Label Button", 'magnis')

      ),
      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Link Button", 'magnis'),

         "param_name" => "link",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type"      => "colorpicker",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Background Color", 'magnis'),

         "param_name"=> "bg",

         "value"     => "",

         "description" => __("Background Color Box", 'magnis')

      ),
      array(

         "type"      => "colorpicker",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Text Color", 'magnis'),

         "param_name"=> "color",

         "value"     => "",

         "description" => __("Text Color Box", 'magnis')

      ),
      array(

         "type"      => "colorpicker",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Border Color", 'magnis'),

         "param_name"=> "border",

         "value"     => "",

         "description" => __("Border Color Box", 'magnis')

      ),
      
    )));

}

//Newsletters
if(function_exists('vc_map')){

   vc_map( array(

   "name"      => __("OT Newsletters", 'magnis'),

   "base"      => "magnis_newsletter",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

     array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Title", 'magnis'),

         "param_name"=> "title",

         "value"     => "",

         "description" => __("", 'magnis')

      ),
      
     array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Subtitle", 'magnis'),

         "param_name"=> "stitle",

         "value"     => "",

         "description" => __("", 'magnis')

      ),
     array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Button Submit", 'magnis'),

         "param_name"=> "btntext",

         "value"     => "",

         "description" => __("", 'magnis')

      ),

    )));

}



//Download Box

if(function_exists('vc_map')){

   vc_map( array(

   "name"      => __("OT Download Box", 'magnis'),

   "base"      => "download",

   "class"     => "",

   "icon" => "icon-st",

   "category"  => 'Content',

   "params"    => array(

     array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Title", 'magnis'),

         "param_name"=> "title",

         "value"     => "",

         "description" => __("", 'magnis')

      ),
     array(

         "type"      => "attach_image",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Image File", 'magnis'),

         "param_name"=> "img",

         "value"     => "",

         "description" => __("", 'magnis')

      ),
      
     array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("File Name", 'magnis'),

         "param_name"=> "filename",

         "value"     => "",

         "description" => __("", 'magnis')

      ),
     array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Text Button Download", 'magnis'),

         "param_name"=> "btn",

         "value"     => "",

         "description" => __("Ex: Download", 'magnis')

      ),
     array(

         "type"      => "textfield",

         "holder"    => "div",

         "class"     => "",

         "heading"   => __("Link Download", 'magnis'),

         "param_name"=> "link",

         "value"     => "",

         "description" => __("", 'magnis')

      ),

    )));

}

// Message Box

if(function_exists('vc_map')){

   vc_map( array(

   "name" => __("OT Message Box", 'magnis'),

   "base" => "message",

   "class" => "",

   "icon" => "icon-st",

   "category" => 'Content',

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Description", 'magnis'),

         "param_name" => "des",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

        "type" => "dropdown",

        "heading" => __('Type', 'magnis'),

        "param_name" => "type",

        "value" => array(   
                      
                     __('Success', 'magnis') => 'success',

                     __('Error', 'magnis') => 'error',

                     __('Info', 'magnis') => 'info',

                     __('Attention', 'magnis') => 'attention',
                     
                    ),

        "description" => __("Section Overlay", 'magnis'),      
      )
    )));

}

// Contact Info
if(function_exists('vc_map')){

   vc_map( array(

   "name" => __("OT Contact Info", 'magnis'),

   "base" => "contactinfo",

   "class" => "",

   "icon" => "icon-st",

   "category" => 'Content',

   "params" => array(

      array(

         "type" => "textfield",

         "holder" => "div",

         "class" => "",

         "heading" => __("Title", 'magnis'),

         "param_name" => "title",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      array(

         "type" => "textarea_html",

         "holder" => "div",

         "class" => "",

         "heading" => __("Description", 'magnis'),

         "param_name" => "content",

         "value" => "",

         "description" => __("", 'magnis')

      ),
      
    )));

}


// Google Map
if(function_exists('vc_map')){
   vc_map( array(
   "name" => __("OT Google Map", 'magnis'),
   "base" => "ggmap",
   "class" => "",
   "icon" => "icon-st",
   "category" => 'Content',
   "params" => array(  
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("ID Map", 'magnis'),
         "param_name" => "idmap",
         "value" => "",
         "description" => __("Please enter ID Map, map-canvas, map-canvas1, map-canvas2, map-canvas3, ..etc", 'magnis')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Height Map", 'magnis'),
         "param_name" => "height",
         "value" => 420,
         "description" => __("Please enter number height Map, 300, 350, 380, ..etc. Default: 420.", 'magnis')
      ),    
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Latitude", 'magnis'),
         "param_name" => "lat",
         "value" => -37.817,
         "description" => __("Please enter <a href='http://www.latlong.net/'>Latitude</a> google map", 'magnis')
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Longitude", 'magnis'),
         "param_name" => "long",
         "value" => 144.962,
         "description" => __("Please enter <a href='http://www.latlong.net/'>Longitude</a> google map", 'magnis')

      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Zoom Map", 'magnis'),
         "param_name" => "zoom",
         "value" => 15,
         "description" => __("Please enter Zoom Map, Default: 15", 'magnis')
      ),
    array(
            "type" => "colorpicker",
            "holder" => "div",
            "class" => "",
            "heading" => __("Map color", 'magnis'),
            "param_name" => "mapcolor",
            "value" => '', //Default White color
            "description" => __("Choose Map color, Ex: #37c878", 'magnis')
         ),
    array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Company Name", 'magnis'),
         "param_name" => "address",
         "value" => "",
         "description" => __("Please enter Title, Ex: We are Magnis", 'magnis')
      ),   
       
    array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => "Icon Map marker",
         "param_name" => "icon",
         "value" => "",
         "description" => __("Icon Map marker, 47 x 68", 'magnis')
      ),  
       
    )));

}

 ?>