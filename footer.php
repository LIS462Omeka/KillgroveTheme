        </div><!-- end content -->

    </div><!-- end wrap -->


    <footer role="contentinfo">

        <div id="footer-text">
            <?php echo get_theme_option('Footer Text'); ?>
            <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                <p><?php echo $copyright; ?></p>
            <?php endif; ?>
            <p><?php echo __('<ul>
            <li><a style="color:#404040" href="http://dany.simmons.edu/killgrovepapers/about">About</a></li>
            <li><a style="color:#404040" href="http://dany.simmons.edu/killgrovepapers/help">Help</a></li>
            <li><a style="color:#404040" href="http://dany.simmons.edu/killgrovepapers/contact">Contact</a></li>
            </ul>'); ?></p>
        </div>

        <?php fire_plugin_hook('public_footer', array('view' => $this)); ?>

    </footer><!-- end footer -->

    <script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu();
        ThanksRoy.moveNavOnResize();
        ThanksRoy.mobileMenu();
    });
    </script>

</body>
</html>
