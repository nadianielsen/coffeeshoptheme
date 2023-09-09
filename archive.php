<?php
    get_template_part("parts/header");
?>

    <main class="main">
        <?php
            //check om der er indhold 
            if(have_posts()) {
                //main loop
                while(have_posts()){
                    the_post();
                    echo "<div class='content'>";
                    the_title("<h2 class='excerpt-title'>", "</h2>");
                    the_post_thumbnail("thumbnail");
                    echo "</div>";
                    echo "<div class='content'>";
                    the_excerpt();
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