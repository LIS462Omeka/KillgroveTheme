        </div><!-- end content -->

    </div><!-- end wrap -->


    <footer role="contentinfo">

        <div id="footerContent">
           <ul class="customFoot">
           		<li><?php echo __('<a  href="/killgrovepapers/exhibits/show/about-the-project">About the Project</a>'); ?></li>
           		<li><?php echo __('<a href="/killgrovepapers/copyright">Copyright Information</a>'); ?></li>
            	<li><?php echo __('<span><b>Last Updated: </b>April 22, 2016</span>');?></li>
            </ul>
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
