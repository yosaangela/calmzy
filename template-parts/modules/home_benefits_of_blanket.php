<?php 
$benefits_titel = get_field('benefits_titel', 'option');
$benefits_tekst = get_field('benefits_tekst', 'option');
$benefits_punten = get_field('benefits_punten', 'option');
$benefits_meer_knop = get_field('benefits_meer_knop', 'option');
$benefits_meer_knop_url = get_field('benefits_meer_knop_url', 'option');
$benefits_calmzy_knop = get_field('benefits_calmzy_knop', 'option');
$benefits_calmzy_knop_url = get_field('benefits_calmzy_knop_url', 'option');
$benefits_afbeelding = get_field('benefits_afbeelding', 'option');
?>
<div class="home--benefits-of-blanket">
    <div class="container">
        <div class="row section-content">
            <div class="col-md-7 section-content--content">
                <h2><?php echo $benefits_titel; ?></h2>

                <?php echo ($benefits_tekst) ? '<p>'.$benefits_tekst.'</p>' : ''; ?>

                <?php 
                if($benefits_punten) {
                    echo '<ul>';
                    foreach ($benefits_punten as $punt) {
                        $p = $punt['punt'];
                        echo "<li>$p</li>";
                    }
                    echo '</ul>';
                }
                ?>

                <p class="buttons">
                    <?php 
                    if($benefits_meer_knop && $benefits_meer_knop_url) {
                        echo "<a href='$benefits_meer_knop_url' class='medium-button dark-blue'>$benefits_meer_knop</a>";
                    }
                    
                    if($benefits_calmzy_knop && $benefits_calmzy_knop_url) {
                        echo "<a href='$benefits_calmzy_knop_url' class='medium-button dark-blue-bordered'>$benefits_calmzy_knop</a>";
                    }
                    ?>
                </p>
            </div>
            <div class="col-md-5 section-content--image">
                <img src="<?php echo $benefits_afbeelding['url']; ?>" alt="Weighted blanket">
            </div><!-- /.col-6 section-content--image -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.home--benefits-of-blanket -->