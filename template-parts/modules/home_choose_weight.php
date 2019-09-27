<?php 
$choose_titel = get_field('choose_titel', 'option');
$choose_tekst = get_field('choose_tekst', 'option');
$choose_meer_knop = get_field('choose_meer_knop', 'option');
$choose_meer_knop_url = get_field('choose_meer_knop_url', 'option');
$choose_our_story_tekst = get_field('choose_our_story_tekst', 'option');
$choose_our_story_url = get_field('choose_our_story_url', 'option');
$choose_afbeelding = get_field('choose_afbeelding', 'option')['url'];
?>

<div class="home--choose-weight">
    <div class="container">
        <div class="row choose-weight--content">
            <?php 
            echo ($choose_afbeelding) ? "<img class='choose-weight--image' src='$choose_afbeelding' alt='Calmzy weighted blanket'/>" : '';
            ?>
            <div class="col-6 ml-auto">
                <h2>How to choose weight?</h2>
                <?php echo ($choose_tekst) ? '<p>'. $choose_tekst .'</p>' : ''; ?>
                <p class="buttons">
                    <?php 
                    if($choose_meer_knop && $choose_meer_knop_url) {
                        echo "<a href='$choose_meer_knop_url' class='medium-button dark-blue-bordered'>$choose_meer_knop</a>";
                    }

                    if($choose_our_story_tekst && $choose_our_story_url) {
                        echo "<a href='$choose_our_story_url' class='medium-button dark-blue'>$choose_our_story_tekst</a>";
                    }
                    ?>
                </p>
            </div><!-- /.col-6 ml-auto -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.home-choose-weight -->