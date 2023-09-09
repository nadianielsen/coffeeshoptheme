<?php
    get_template_part("parts/header");
?>

    <main class="main search-main">
        <?php
            //check om der er indhold 
            if(have_posts()) {
                //main loop
                echo "<div class='searchbar-page'>";
                ?>
                <form class="search_form center-searchpage" action="<?php echo get_home_url() ?>">
                <input type="text" name="s" class="input-s">
                <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            <?php
                echo "</div>";

                while(have_posts()){
                    the_post();
                    echo "<div class='content-search'>";
                    ?> <h2 class='excerpt-title'> <?php echo the_excerpt(); ?> </h2><?php
                    // the_post_thumbnail("thumbnail");
                    echo "<a href='".get_the_permalink()."'>";
                    echo "<div class='seemore-btn'>See more</div>";
                    echo "</a>";
                    echo "</div>";
                }
            }
        ?>
    </main>
</body>

<?php
    get_template_part("parts/footer");
?>

<!-- vi lavede search.php bare for at ikke have et featured image -->