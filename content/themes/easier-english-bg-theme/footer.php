<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	
</div><!-- #page -->

<footer class="page-footer">
	<div class="page_wrapper group">

		<p class="footer_title">Въпроси? Свържи се с нас:</p>
		<div class="footer-contacts-holder group">
			<div class="left">
				<div class="person-left-holder group">
					<img src="<?= get_template_directory_uri(); ?>/img/Kaloyan_Kosev_160.jpg" width="80" height="80" class="right" alt="Калоян Косев" />
					<div class="right">
						Калоян Косев,<br />
						<a href="mailto:stoyan.panayotov@easierenglish.bg">kaloyan.kosev@easierenglish.bg</a><br />
						<a href="tel:+359883352972">+359 883 352 972</a>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="person-right-holder group">
					<img src="<?= get_template_directory_uri(); ?>/img/Stoyan_Panayotov_160.jpg" width="80" height="80" class="left" alt="Стоян Панайотов" />
					<div class="left">
						Стоян Панайотов,<br />
						<a href="mailto:stoyan.panayotov@easierenglish.bg">stoyan.panayotov@easierenglish.bg</a><br />
						<a href="tel:+359883696905">+359 883 696 905</a>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-links">
			<a itemprop="url" href="http://easierenglish.bg" title="Уроци по английски език | EasierEnglish.BG">EasierEnglish.BG</a> &copy; 2013 - <?php echo date("Y"); ?>
			<a href="http://easierenglish.bg/мисия/">Мисия</a>
			<a href="http://easierenglish.bg/свържи-се-с-нас/" title="Свържи се с нас">Контакти</a>
			<a href="http://easierenglish.bg/feed/" target="_blank" title="Пълна RSS Емисия">RSS Емисия</a>
		</div>
	</div>

</footer>

<script>
	var templateUrl = '<?= get_bloginfo("template_url"); ?>';
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?= plugins_url(); ?>/mailchimp/js/jquery.form.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/js/script.min.js"></script>

<?php wp_footer(); ?>

<script>
	//Facebook Group:
	(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=195363947331773";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));


	//Google+ Badge and Google+ Button:
	window.___gcfg = {lang: 'bg'};
	(function() {
	var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	po.src = 'https://apis.google.com/js/platform.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	})();
</script>

</body>
</html>
