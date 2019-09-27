<?php 
$nieuwsbrief_titel = get_field('nieuwsbrief_titel', 'options');
$nieuwsbrief_tekst = get_field('nieuwsbrief_tekst', 'options');
$nieuwsbrief_shortcode = get_field('nieuwsbrief_shortcode', 'options');
?>
<div class="newsletter">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 newsletter-content">
                <h2><?php echo $nieuwsbrief_titel; ?></h2>
                <?php echo ($nieuwsbrief_tekst) ? "<p>$nieuwsbrief_tekst</p>" : ''; ?>
            </div><!-- /.col-md-6 -->
            <div class="col-10 newletter-form">
                <?php 
                if($nieuwsbrief_shortcode) {
                    echo do_shortcode( $nieuwsbrief_shortcode );
                } else {
                    echo '<div class="alert alert-danger text-center" role="alert" style="width: 50%; margin: 0 auto;">Don\'t forget form shortcode!</div>';
                }
                ?>
            </div><!-- /.col-12 newletter-form -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.newsletter -->