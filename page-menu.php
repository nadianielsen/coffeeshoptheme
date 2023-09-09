<?php
    get_template_part("parts/header");
?>

    <main class="main">
        <div class='title-search'>
            <?php 
                the_title("<h1 class=''>", "</h1>");
                // echo get_search_form();
            ?>
            <form class="search_form" action="<?php echo get_home_url() ?>">
                <input type="text" name="s" class="input-s">
                <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
            <article class="menu-page">
                <?php 
                    echo show_coffees();
                ?>
            </article>
    </main>
</body>

<?php
    get_template_part("parts/footer");
?>