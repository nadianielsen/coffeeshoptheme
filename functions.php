<?php
//menu access

register_nav_menus(
    array(
        "primary_menu" => "Primary Menu", 
        "footer_menu" => "Footer Menu"
    )
);

//theme support
add_theme_support("custom-logo");
add_theme_support("post-thumbnails");

//change excerpt length
function return_excerpt_length() {
    return 6;
}

add_filter("excerpt_length", "return_excerpt_length", 999);

//shortcode
function returnGreeting() {
    return "Ho ho, merry christmas!";
}

add_shortcode("greeting", "returnGreeting");

function returnSignature($atts) {
    $greeting = "Written by "; 
    if($atts) {
         if($atts["nr"] == "1") {
        $greeting = "Love from "; 
        }
        elseif($atts["nr"] == "2") {
        $greeting = "Merry christmas from "; 
        }
        //  else {
        // $greeting = "Fuck off: from "; 
        // }
    }

    $greeting = $greeting.get_the_author();
    // var_dump($atts["nr"]); - opføre sig som en console.log i php
    return $greeting;
}

add_shortcode("sign", "returnSignature");

//Register new posttype (advent calendars)

function coffee_posttype() {
    register_post_type(
        //advent calendars
        "drinks",
        array(
            "show_in_rest" => true,
            "labels" => array(
                // den skal kunne oversætte
                "name" => __("Coffees and teas"),
                //ingen oversættelse her -->
                // "name" => "Advent Calenders",
                "singular_name" => __("Coffee and tea")
            ),
            "public" => true,
            "exclude_from_search" => false,
            // "exclude_from_search" => true,
            "has_archive" => true,
            //om den skal hedde et post id eller calendar i url 
            //hvis der er flere ting, så er det bedst at du ikke bruger rewrite, fordi hvis alle produkterne hedder det samme!!
            "rewrite" => true,
            //hvad der skal være supportet
            "supports" => array(
                "title",
                "editor",
                "thumbnail",
                "custom-fields"
            )
        )
    );
}
//action hook
add_action("init", "coffee_posttype");

//custom functions
function show_coffees() {
    // return "something";

    ob_start();

    $args = array(
        "post_status" => "publish",
        "order" => "DSC",
        // "order" => "ASC",
        //stor abc række
        "orderby" => "name",
        "post_per_page" => "100",
        "post_type" => "drinks"
    );

    $query = new WP_query($args); 

    // var_dump($query);

    //javascript dot et eller andet
    while($query->have_posts()) {
        $query->the_post();
        $price = get_post_meta(get_the_ID(), "Price", true);
        $stock = get_post_meta(get_the_ID(), "Stock", true);

        ?>
           <a class="drinks" href="<?php echo get_the_permalink(); ?>">
                <h2 class="drinks-title"><?php echo get_the_title(); ?></h2>
                <figure class="drinks-figure"><?php the_post_thumbnail("thumbnail"); ?></figure>
                <p class="drinks-price"><?php echo $price  ?>$</p>
           </a> 
        <?php
    }
    return ob_get_clean();
}

//widgets
function custom_widgets_init() {
    register_sidebar(
        array(
            // "name" => "Header widgets",
            // "id" => "header-widgets",
            // "before_widget" => "<div class='widget'> ",
            // "after_widget" => "</div>",
            "name" => "Footer widgets",
            "id" => "footer-widgets",
            "before_widget" => "<article class='footer-widget'>",
            "after_widget" => "</article>"
        )
    );
} 



add_action("widgets_init", "custom_widgets_init");

//Scripts & styles
function load_scripts() {
    //function
    wp_enqueue_script(
        "main_js",
        get_template_directory_uri()."/scripts/julepynt.js",
        NULL,
        false,
        true
        
    );
    wp_enqueue_style(
        "style",
        get_stylesheet_uri(), ' ', '1.0.0'
    );
}

// add_action("wp_enqueue_scripts", "load_scripts");
//          hook --->