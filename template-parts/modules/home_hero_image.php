<?php
$hero_section_image = get_field('hero_afbeelding', 'options');
$hero_section_title = get_field('hero_title', 'options');
$hero_section_text = get_field('hero_tekst', 'options');
$hero_section_meer_text = get_field('hero_lees_meer_knop', 'options');
$hero_lees_meer_url = get_field('hero_lees_meer_url', 'options');
$hero_section_buy_text = get_field('hero_buy_now', 'options');
$hero_buy_now_url = get_field('hero_buy_now_url', 'options');
?>
<div class="home--hero-image" style="background-image: url(<?php echo $hero_section_image['url']; ?>);"></div>
<!-- /.home--hero-image -->
<div class="container home--hero-section">
    <div class="row">
        <div class="col-8 ml-auto hero-section--content">
            <h1><?php echo $hero_section_title; ?></h1>
            <?php echo ($hero_section_text) ? '<p>' . $hero_section_text . '</p>' : ''; ?>
            <p>
                <?php
                if ($hero_section_meer_text && $hero_lees_meer_url) {
                    echo
                    "<a href='$hero_lees_meer_url' class='big-button white'>
                        $hero_section_meer_text
                    </a>";
                }

                if ($hero_section_buy_text && $hero_buy_now_url) {
                    echo
                    "<a href='$hero_buy_now_url' class='big-button light-blue'>
                        $hero_section_buy_text
                    </a>";
                }
                ?>
            </p>
        </div><!-- /.col-6 ml-auto -->
    </div>
</div><!-- /.col-12 -->