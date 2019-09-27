<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rt-uno
 */

 $networks = get_field('networks', 'option');

?>

</div> <!-- // .row -->
</div> <!-- // .container -->
</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="site-info">
                <div class="footer-menu">
                    <?php 
					if(has_custom_logo()) {
					echo '<div class="footer-menu--logo">';
					the_custom_logo();
					echo '</div><!-- /.footer-menu--logo -->';
					}
					?>

                    <?php 
					if(has_nav_menu( 'footer' )) {
						echo '<div class="footer-menu--menu">';
						headlab_menu('footer');
						echo '</div><!-- /.footer-menu--menu -->';
					}
					?>

                    <?php if($networks) { ?>
                    <div class="footer-menu--social">
                        <h3>Volg ons</h3>
                        <?php 
							foreach ($networks as $network) {
								$n = $network['network_name'];
								$u = $network['network_url'];
								echo "<a href='$u' target='_blank'>$n</a>";
							}
						?>
                    </div><!-- /.footer-menu--social -->
                    <?php } ?>
                </div><!-- /.footer-menu -->
            </div><!-- .site-info -->
        </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="footer-copy col-md-6">
                    © Calmzy - All rights reserved - <?php echo date('Y'); ?> -
                    <?php (has_nav_menu( 'legals' )) ? headlab_menu('legals') : ''; ?>
                </div><!-- /.footer-copy -->
                <div class="footer-by col-md-6 text-right">
                    Designed & developed by <a href="http://www.wappstars.nl/" target="_blank">WappstarsBV</a>
                </div><!-- /.footer-by -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.copyright -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();?>

</body>

</html>