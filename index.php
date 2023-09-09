<?php
    get_template_part("parts/header");
?>

    <main class="main">
        <?php
            echo "<div class=''>";
            // the_title("<h1 class='title'>", "</h1>");
            the_content();
            echo "</div>";
        ?>
    </main>
</body>

<?php
    get_template_part("parts/footer");
?>