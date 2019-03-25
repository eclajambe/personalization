<?php
	$edit_link = '/admin/structure/entity-type/startup_sections/' . $section->type . '/' . $section->id . '/edit';
	drupal_add_css('/sites/all/modules/custom_concur/concur_startup/css/local_styles/static_1.css', array('preprocess' => FALSE));
	drupal_add_js("/sites/all/modules/custom_concur/concur_startup/js/local_scripts/static_1.js", array('scope' => 'footer', 'preprocess' => FALSE));
?>

<?php if ($tabsPresent): ?>
	<div class='edit-link'>
		<a target='_blank' href='<?php print($edit_link); ?>'><i class='icon-cogs large'></i><br />Edit</a>
	</div>
<?php endif; ?>

<section class="hero_numbers theme_white angle_bg">
	<div class="container">
		<div class="headline row">
			<div class="col-xs-12">
				<h1 class="lg">Helping businesses with their top travel and expense challenges.</h1>
			</div>
		</div>

		<div class="numbers row">
			<div class="col-sm-12">
				<div class="row">
				
					<div class="count-box col-sm-4 text-center">
						<div class="col-sm-12 col-lg-10 col-lg-offset-1">
							<p class="h1"><span class="count" data-value="69">0</span>%</p>
							<h5>report cumbersome manual processes</h5>
						</div>
					</div>
					<div class="count-box col-sm-4 text-center">
						<div class="col-sm-12 col-lg-10 col-lg-offset-1">
							<p class="h1"><span class="count" data-value="60">0</span>%</p>
							<h5>have difficulty tracking spending trends and behaviors</h5>
						</div>
					</div>
					<div class="count-box col-sm-4 text-center">
						<div class="col-sm-12 col-lg-10 col-lg-offset-1">
							<p class="h1"><span class="count" data-value="54">0</span>%</p>	
							<h5>experience delays in approvals and reimbursement </h5>		
						</div>
					</div>

				</div>				
			</div>
		</div>

		<div class="citation row">
			<div class="col-xs-8 col-sm-12">
				<div class="col-sm-10 col-sm-offset-1">
					<cite>AMI-Partners Study: Expense, Travel, and Invoice Management Infographic</cite>
				</div>
			</div>
		</div>		

	</div>
</section>

<style>
/* Overrides */
.content_13_logo_list .logo-item img {
      filter: none;
}
/* Global */ 
body {
	background: #f6f6f6;
}
/* Utility */
.gold-text {
	color: #f0ab06;
}
/* (Not being used)
.angle_bg {
	transform: skew(0deg, -3deg);
}
.angle_bg .container {
	transform: skew(0deg, 3deg);
	padding-top: 40px;
}
@media (max-width: 767px) {
	.angle_bg {
		transform: skew(0deg, 3deg);	
	}
	.angle_bg .container {
		transform: skew(0deg, -3deg);
	}
}*/
/* Block */ 
.hero_numbers {
    padding: 60px 0 80px;
    margin-bottom: 80px;
}
.hero_numbers:after {
    content: url(http://assets.concur.com/DigitalTools/origami.svg);
    position: absolute;
    right: 0;
    bottom: -50px;
    height: auto;
    width: 500px;
	transform: skew(0deg, 3deg);
}
@media (max-width: 991px) {
	.hero_numbers:after {
		bottom: -42px;
		width: 400px;
	}
}
@media (max-width: 767px) {
	.hero_numbers {
		padding-top: 40px;
	}	
}
/* Headline */ 
.hero_numbers .headline {
	margin-bottom: 20px;
	text-align: center;
}
.hero_numbers .headline h1.lg {
	margin-top: 0;
}
@media (max-width: 767px) {
	.hero_numbers .headline {
		text-align: left;
		padding: 0 15px;
		font-size: 80%;
	}
	.hero_numbers .headline h2 {
		margin-bottom: .5rem;
	}
}
/* Numbers */ 
.hero_numbers a:hover, 
.hero_numbers a:focus {
	text-decoration: none;
}
.hero_numbers p.h1 {
    font-size: 4.5rem;
    font-weight: bold;
    line-height: 100%;
    color: #f0ab06;
    margin: 0;
}
.hero_numbers .numbers {
	margin-bottom: 20px;
}
.hero_numbers .numbers h5 {
	font-weight: 300;
	line-height: 1.4;
	margin-top: 5px;
}
.hero_numbers .numbers .count-box {
	text-align: center;
}
/*
* Uncomment if you wish to prevent numbers from showing as 0% at first. (Will also need to adjust HTML and JS)
*
.hero_numbers .count {
	visibility: hidden;
	display: inline-block;
}
.hero_numbers .count.active {
	visibility: visible;
}*/
@media (max-width: 767px) {
	.hero_numbers p.h1 {
		font-size: 3rem;
	}
	.hero_numbers .numbers .count-box {
		text-align: left;
	}
}
/* Citation */ 
.hero_numbers .citation {
	text-align: center;
}
.hero_numbers cite {
	color: #999;
    font-style: italic;
	font-size: 12px;
}
@media (max-width: 767px) {
	.hero_numbers .citation {
		text-align: left;
	}
}
</style>

<script>
/*
* Check if element is visible in viewport
*/	
jQuery.fn.inView = function(){

	var win = jQuery(window),
		obj = jQuery(this),
		scrollPosition = win.scrollTop(),
		visibleArea = win.scrollTop() + win.height(),
		objEndPos = (obj.offset().top + obj.outerHeight());
		
	return(visibleArea >= objEndPos && scrollPosition <= objEndPos ? true : false)
	
};
/*
* Animate numbers
*/
jQuery.fn.animateNumbers = function(selector) {

	jQuery(selector).each(function (i) {

		jQuery(this).delay(200*i).addClass('active');

		if(jQuery(this).text() == 0){
			jQuery(this).prop('Counter',0).animate({
				Counter: jQuery(this).attr('data-value')
			}, {
				duration: 1000,
				easing: 'swing',
				step: function (now) {
					jQuery(this).text(Math.ceil(now));
				}
			});
		}
	
	});

};
/*
* Trigger number animation if element is inView on page load
*/
jQuery(window).load(function() {

	var selector = jQuery('section.hero_numbers .count');
	
	if(jQuery(window).scrollTop() == 0 && jQuery(selector).inView()){
		jQuery(this).animateNumbers(selector);
	}

});
/*
* Trigger number animation when element is scrolled into viewport
*/
jQuery(window).scroll(function() {

	var selector = jQuery('section.hero_numbers .count');

	if(jQuery(selector).inView()){
		jQuery(this).animateNumbers(selector);
	}

});
</script>