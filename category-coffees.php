<?php
    get_template_part("parts/header");
?>

    <main class="main">
        <h1 class="title">Coffees</h1>
        <article class="coffees">
        <?php
            //check om der er indhold 
            if(have_posts()) {
                //main loop
                while(have_posts()){
                    the_post();
                    // the_title("<h2 class='excerpt-title'>", "</h2>");
                    // the_post_thumbnail("thumbnail");
                    // the_excerpt();
                    // echo "<a href='".get_the_permalink()."'>";
                    // echo "<div>Read more...</div>";
                    // echo "</a>";
                    // echo "</div>";
                    ?>
                    <a class="drinks" href="<?php echo get_the_permalink(); ?>">
                    <h2 class="drinks-title"><?php echo get_the_title(); ?></h2>
                    <figure class="drinks-figure"><?php the_post_thumbnail("thumbnail"); ?></figure>
                    </a> 
                    <?php
    
                }
            }
        ?>
        </article>
    </main>
</body>

<?php
    get_template_part("parts/footer");
?>