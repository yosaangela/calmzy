<?php 
$reviews_titel = get_field('reviews_titel', 'option');
$reviews_knop_tekst = get_field('reviews_knop_tekst', 'option');
$reviews_knop_url = get_field('reviews_knop_url', 'option');
$reviews_afbeelding = get_field('reviews_afbeelding', 'option')['url'];

if($reviews_afbeelding) {
    $bgi = "style='background-image: url($reviews_afbeelding);'";
} else {
    $bgi = '';
}

?>

<div class="home--reviews">
    <div class="container">
        <div class="row section-content" <?php echo $bgi; ?>>
            <div class="col-md-6 section-content--content">
                <h2><?php echo $reviews_titel; ?></h2>

                <div class="section-content--review">
                    <h3 class="title">Wat een geweldige deken!</h3>

                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime blanditiis quos
                        expedita doloremque earum, quaerat, commodi laudantium doloribus voluptatibus ipsam aliquam
                        exercitationem autem iste iusto. Est sequi error quia molestiae?</p>

                    <p class="name">Juine van de Broek - 5/5</p>
                </div><!-- /.section-content--review -->
                <div class="dots-arrows">
                </div>
            </div>
            <?php 
            if ($reviews_knop_tekst && $reviews_knop_url) {
                echo "<a href='$reviews_knop_url' class='leave-review medium-button white'>$reviews_knop_tekst</a>";
            }
            ?>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.home--benefits-of-blanket -->