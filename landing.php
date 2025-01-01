<?php

require_once('config.php');
require_once('settings.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= APP_NAME ?></title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="description" content="Tripwire is an open source wormhole mapping tool, hosted for free to the public, built for use with EVE Online. Using the latest in internet security standards it is the most secure tool in New Eden." />
	<meta property="og:type" content="article"/>
	<meta property="og:url" content="https://tripwire.eve-apps.com/"/>
	<meta property="og:title" content="The greatest wormhole mapper ever."/>
	<meta property="og:image" content="//<?= CDN_DOMAIN ?>/images/landing/thumbnail.jpg" />
	<meta property="og:locale" content="en_US"/>
	<meta property="og:site_name" content=""/>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="//<?= CDN_DOMAIN ?>/css/landing/base.css" />
	<link rel="stylesheet" type="text/css" href="//<?= CDN_DOMAIN ?>/css/landing/dark.css" />
	<link rel="stylesheet" type="text/css" href="//<?= CDN_DOMAIN ?>/css/landing/media.queries.css" />
	<link rel="stylesheet" type="text/css" href="//<?= CDN_DOMAIN ?>/css/landing/tipsy.css" />
	<link rel="stylesheet" type="text/css" href="//<?= CDN_DOMAIN ?>/js/landing/fancybox/jquery.fancybox-1.3.4.css" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do|Quicksand:400,700,300">

	<!-- Favicons -->
	<link rel="shortcut icon" href="//<?= CDN_DOMAIN ?>/images/favicon.png" />
	<!--
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	-->
</head>
<body>
	<!-- Start Wrapper -->
	<div id="page_wrapper">

	<!-- Start Header -->
	<header>
		<div class="container">
			<aside id="partner-panel" style="padding: 0"><img src="images/landing/ccp_PartnerBadge2.png" height="58" alt="CCP Partner"/></aside>
			<aside id="version-panel"><?= APP_NAME ?> <?= VERSION ?></aside>			
			
			<!-- Start Navigation -->
			<nav>
				<ul>
					<li><a href="#home">Home</a></li>
					<li><a href="#login">Login</a></li>
					<li><a href="#register">Register</a></li>
					<!-- <li><a href="#team">Team</a></li> -->
					<li><a href="https://bitbucket.org/daimian/tripwire/issues?status=new&status=open" target="_blank">Issue/Idea Tracker</a></li>
				</ul>
				<span class="arrow"></span>
			</nav>
			<!-- End Navigation -->
		</div>
	</header>
	<!-- End Header -->

	<section class="container">

		<!-- Start App Info -->
		<div id="app_info">
			<!-- Start Logo -->

			<h1 style="font-size: 4.3em;"><img src="//<?= CDN_DOMAIN ?>/images/landing/tripwire-logo.png" alt="Tripwire" style="vertical-align: text-top;" /> Tripwire</h1>
			<!-- End Logo -->
			<span class="tagline">The greatest wormhole mapper ever.</span>
			
			<p>Tripwire is an open source wormhole mapping tool, hosted for free to the public, built for use with <a href="https://www.eveonline.com" target="_blank">EVE Online</a>.</p>

			<div class="buttons">
				<a href="#register#admin" class="large_button corp">
					<span class="icon-corp"></span>
					<em>Register now as</em> Admin
				</a>
				<a href="#register#user" class="large_button proceed">
					<span class="icon-player"></span>
					<em>Register now as</em> User
				</a>
			</div>

		<!--
			<div class="price left_align">
				<p>FREE for a limited time!</p>
			</div>
		-->

<?php if (!isset($_SESSION['userID'])) { ?>
			<h1>Have an account?<br/><a href="#login#reg">Log into Tripwire now!</a></h1>
<?php } else { ?>
			<h1>You're logged in...<br/><a href="?system=">Go to Tripwire now!</a></h1>
<?php } ?>
		</div>
		<!-- End App Info -->

		<!-- Start Pages -->
		<div id="pages">
			<div class="top_shadow"></div>

			<!-- Start Home -->
			<div id="home" class="page">
				<h1>News</h1>
				<div id="news">
					<!-- Self hosters will probably want to put your own news items here -->
					<h2>Tripwire in 2024</h2>
					<p>Detailed information about Tripwire updates will be posted on the Tripwire Discord and in the <a href="https://forums.eveonline.com/t/tripwire-signature-mapping-tool/6024/184">update thread on the Eve Online forums</a>.</p>
					
					<p>Some highlights from 2023 releases: improvements to automapping, wormhole selection dropdown (1.22), FW data, map and options updates (1.23), Thera and Turnur data from Eve Scout (1.24). As well as all of the map changes and new ships that CCP add.</p>
					
					<p>Tripwire is also now an <b>official CCP Partner Programme</b> community app!</p>
					
					<h2>Tripwire in 2023</h2>
					<p>Tripwire continues to receive feature updates (in 1.20, it got one click return, an EVE time indicator and closest way home cues from K space) and maintenance (when CCP change how ESI works, or changes the map).</p>
					
					<p>Please consider helping fund the server maintenance or contributing to development so we can keep this resource going and up to date!</p>
				</div>

			</div>
			<!-- End Home -->

			<!-- Start Login -->
			<div id="login" class="page">
<?php if (isset($_SESSION['userID'])) { ?>
				<h1>You're currently logged in as...</h1>
				<div style="text-align: center;">
					<img src="//image.eveonline.com/Character/<?= $_SESSION['characterID'] ?>_128.jpg" />
					<p><?= $_SESSION['characterName'] ?></p>
					<p style="padding-top: 25px;">
						<a href="?system=" class="large_button proceed" style="text-align: center;">
							<span>Continue</span>
						</a>
						
						<a href="logout.php" class="large_button logout" style="text-align: center;">
							<span>Logout</span>
						</a>
						
					</p>
				</div>
<?php } else { ?>
				<h1>Login</h1>
				<div class="tabs" style="width: 525px;">
					<ul class="nav">
						<li>
							<a href="javascript:;" class="reg">Tripwire</a>
						</li>
						<li>
							<a href="javascript:;" class="sso">EVE SSO</a>
						</li>
					</ul>
					<div id="reg" class="pane">
						<form method="POST">
							<input type="hidden" name="mode" value="login" />
							<!-- fake fields are a workaround for chrome autofill -->
							<input class="hidden" type="text" name="fakeusernameremembered" />
							<input class="hidden" type="password" name="fakepasswordremembered" autocomplete="off" />
							<p>
								This login method requires that you first create a Tripwire account via <a href="#register#user">User Registration</a>.
							</p>
							<br/>
							<p><em>Forgot your login? <a href="#login#sso">Use SSO method instead</a>.</em></p>
							<br/>
							<div class="row">
								<p class="left">
									<label for="login_username" class="infield">Username</label>
									<input type="text" name="username" id="login_username" class="focus" autocomplete="off" />
								</p>
							</div>
							<p id="userError" class="error hidden"></p>
							<p>Username can contain spaces</p>
							<div class="row">
								<p class="left">
									<label for="login_password" class="infield">Password</label>
									<input type="password" name="password" id="login_password" autocomplete="off" />
								</p>
							</div>
							<p id="passError" class="error hidden"></p>
							<p>Password is case sensitive</p>
							<br/>
							<p><input type="checkbox" id="remember" name="remember" /><label for="remember"> Remember me</label></p>
							<div style="padding-top: 25px;">
								<button type="submit" class="button white">Login</button>
								<span style="position: absolute; padding-left: 15px;" class="hidden" id="spinner">
									<!-- Loading animation container -->
									<div class="loading">
									    <!-- We make this div spin -->
									    <div class="spinner">
									        <!-- Mask of the quarter of circle -->
									        <div class="mask">
									            <!-- Inner masked circle -->
									            <div class="maskedCircle"></div>
									        </div>
									    </div>
									</div>
								</span>
							</div>
						</form>
					</div>
					<div id="sso" class="pane">
						<center>
							<p>This login method requires that you first create a Tripwire account via <a href="#register#user">User Registration</a>.</p>
							<br/>
							<?= isset($_REQUEST['error']) && $_REQUEST['error'] == 'login-account' ? '<p class="error">No Tripwire account for that character</p><br/>' : '' ?>
							<?= isset($_REQUEST['error']) && $_REQUEST['error'] == 'login-unknown' ? '<p class="error">Unknown error processing EVE SSO login</p><br/>' : '' ?>
							<a href="login.php?mode=sso&login=sso<?= isset($_GET['system']) ? '&system=' . $_GET['system'] : '' ?>"><img src="//<?= CDN_DOMAIN ?>/images/landing/eve_sso.png"/></a>
						</center>
					</div>
				</div>
<?php } ?>
			</div>
			<!-- End Login -->

			<!-- Start Register -->
			<div id="register" class="page">
				<h1>Register</h1>
				<div class="tabs" style="width: 525px;">
					<ul class="nav">
						<li class="current">
							<a href="javascript:;" class="user">User</a>
						</li>
						<li>
							<a href="javascript:;" class="admin">Admin</a>
						</li>
					</ul>
					<div id="user" class="pane">
						<?php if (isset($_REQUEST['success']) && $_REQUEST['success'] == 'user'): ?>
							<center>
								<h1>Congratulations</h1>
								<h2>Your account was created</h2>
								<em style="color: burlywood;">Your username and password can be set via the Tripwire settings once logged in.</em>
								<h1><a href="#login#sso">Log into Tripwire now via SSO!</a></h1>
							</center>
						<?php else: ?>
							<?= isset($_REQUEST['error']) && $_REQUEST['error'] == 'register-account' ? '<p class="error">Tripwire account already exists for that character - use the login instead.</p><br/>' : '' ?>
							<?= isset($_REQUEST['error']) && $_REQUEST['error'] == 'register-unknown' ? '<p class="error">Unknown error processing EVE SSO login</p><br/>' : '' ?>
							<a href="register.php?mode=user"><img src="//<?= CDN_DOMAIN ?>/images/landing/eve_sso.png"/></a>
						<?php endif ?>
					</div>
					<div id="admin" class="pane">
						<?php if (isset($_REQUEST['success']) && $_REQUEST['success'] == 'admin'): ?>
							<center>
								<h1>Congratulations</h1>
								<h2>You account is now an admin</h2>
								<h1><a href="#login#sso">Log into Tripwire now via SSO!</a></h1>
							</center>
						<?php else: ?>
							<p>
								This simply enables corporate Tripwire administration for your character. You must first complete <a href="#register#user">User Registration</a>.
							</p>
							<br/>
							<p><em style="color: burlywood;">Character must have one of these roles:<br/>CEO, Director, or Tripwire Admin</em></p>
							<br/>
							<?= isset($_REQUEST['error']) && $_REQUEST['error'] == 'registeradmin-account' ? '<p class="error">Tripwire account does not exist for that character - use user registration first.</p><br/>' : '' ?>
							<?= isset($_REQUEST['error']) && $_REQUEST['error'] == 'registeradmin-roles' ? '<p class="error">Character does not meet one of the role requirements: CEO, Director, or Tripwire Admin.</p><br/>' : '' ?>
							<?= isset($_REQUEST['error']) && $_REQUEST['error'] == 'registeradmin-unknown' ? '<p class="error">Unknown error processing EVE SSO login</p><br/>' : '' ?>
							<a href="register.php?mode=admin"><img src="//<?= CDN_DOMAIN ?>/images/landing/eve_sso.png"/></a>
						<?php endif ?>
					</div>
				</div>
			</div>
			<!-- End Register -->

			<!-- Start Team -->
			<!-- <div id="team" class="page">
				<h1>Team</h1>
				<div class="about_us content_box">
					<div class="one_half">
						<h2>About Us</h2>
						<p>We are a small team of IT professionals that have come together to provide us all with a more enjoyable EVE experience. We each have many years of industry experience and an active life but still try to find some time to dedicate to this project. We hope you enjoy!</p>
					</div>
					<div class="one_half column_last">
						<img src="//<?= CDN_DOMAIN ?>/images/landing/about-main.png" alt="" />
					</div>
				</div>

				<div class="team_members">
					<div class="person one_half">
						<img src="//<?= CDN_DOMAIN ?>/images/landing/daimian.jpg" alt="" />
						<h3>Daimian Mercer</h3>
						<span>Designer/Developer</span>
						<ul class="social">
							<li class="google"><a href="https://plus.google.com/u/2/111892856662048727481" target="_blank">Google</a></li>
							<li class="twitter"><a href="https://twitter.com/DaimianMercer" target="_blank">Twitter</a></li>
							<li class="email"><a href="mailto:daimian.mercer@gmail.com" target="_blank">Email</a></li>
						</ul>
					</div>
					<div class="person one_half column_last">
						<img src="//<?= CDN_DOMAIN ?>/images/landing/pcnate.jpg" alt="" />
						<h3>PCNate</h3>
						<span>Server Admin</span>
					</div>
					<div class="person one_half">
						<img src="//<?= CDN_DOMAIN ?>/images/landing/natasha.jpg" alt="" />
						<h3>Natasha Donnan</h3>
						<span>Developer</span>
						<ul class="social">
							<li class="google"><a href="https://plus.google.com/u/0/104017350096540492585" target="_blank">Google</a></li>
							<li class="email"><a href="mailto:natashadonnan.eve@gmail.com" target="_blank">Email</a></li>
						</ul>
					</div>
				</div>
			</div> -->
			<!-- End Team -->

			<div id="ccp_copyright" class="page">
				<p>
					All Eve Related Materials are Property Of CCP Games
					EVE Online and the EVE logo are the registered trademarks of CCP hf. All rights are reserved worldwide. All other trademarks are the property of their respective owners. EVE Online, the EVE logo, EVE and all associated logos and designs are the intellectual property of CCP hf. All artwork, screenshots, characters, vehicles, storylines, world facts or other recognizable features of the intellectual property relating to these trademarks are likewise the intellectual property of CCP hf. CCP is in no way responsible for the content on or functioning of this website, nor can it be liable for any damage arising from the use of this website.
				</p>
			</div>

			<div id="privacy" class="page">
				<p>
					This Privacy Policy governs the manner in which Tripwire collects, uses, maintains and discloses information collected from users (each, a "User") of the <a href="http://tripwire.eve-apps.com">tripwire.eve-apps.com</a> website ("Site"). This privacy policy applies to the Site and all products and services offered by Eon Studios.<br><br>

					<b>Personal identification information</b><br><br>

					We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.<br><br>

					<b>Non-personal identification information</b><br><br>

					We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.<br><br>

					<b>Web browser cookies</b><br><br>

					Our Site may use "cookies" to enhance User experience. User's web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.<br><br>

					<b>How we use collected information</b><br><br>

					Tripwire may collect and use Users personal information for the following purposes:<br>
				</p>
				<br/>
				<ul style="padding-left: 40px;">
					<li><i>- To improve customer service</i><br>
						Information you provide helps us respond to your customer service requests and support needs more efficiently.</li>
					<li><i>- To personalize user experience</i><br>
						We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.</li>
					<li><i>- To improve our Site</i><br>
						We may use feedback you provide to improve our products and services.</li>
					<li><i>- To send periodic emails</i><br>
						We may use the email address to respond to their inquiries, questions, and/or other requests. </li>
				</ul>
				<br/>
				<p>
					<b>How we protect your information</b><br><br>

					We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our Site.<br><br>

					Sensitive and private data exchange between the Site and its Users happens over a SSL secured communication channel and is encrypted and protected with digital signatures.<br><br>

					<b>Sharing your personal information</b><br><br>

					We do not sell, trade, or rent Users personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates and advertisers for the purposes outlined above.<br><br>

					<b>Third party websites</b><br><br>

					Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors and other third parties. We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites which have a link to our Site, is subject to that website's own terms and policies.<br><br>

					<b>Changes to this privacy policy</b><br><br>

					Tripwire has the discretion to update this privacy policy at any time. When we do, we will revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.<br><br>

					<b>Your acceptance of these terms</b><br><br>

					By using this Site, you signify your acceptance of this policy. If you do not agree to this policy, please do not use our Site. Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.<br><br>

					<b>Contacting us</b><br><br>

					If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us at:<br>
					<a href="mailto: daimian.mercer@gmail.com">daimian.mercer@gmail.com</a><br>
					<br>
					This document was last updated on January 27, 2017
				</p>
			</div>
			<div class="bottom_shadow"></div>
		</div>
		<!-- End Pages -->

		<div class="clear"></div>
	</section>

	<!-- Start Footer -->
	<footer class="container">
		<!--<p>Eon Studios &copy; 2014. All Rights Reserved.</p>-->
		<p><a href="#privacy">Privacy Policy</a> | <a href="#ccp_copyright">CCP Copyright</a></p>
		<?php include 'donation_panel.inc'; ?>
	</footer>
	
	<!-- End Footer -->

	</div>
	<!-- End Wrapper -->

	<?php
		$analytics_file = dirname( __FILE__ ) . "/analytics.inc.php";
		if ( file_exists( $analytics_file ) ) include_once( $analytics_file );
	?>

	<!-- Javascripts -->
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/html5shiv.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/jquery.tipsy.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/fancybox/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/jquery.touchSwipe.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/jquery.mobilemenu.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/jquery.infieldlabel.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/jquery.echoslider.js"></script>
	<script type="text/javascript" src="//<?= CDN_DOMAIN ?>/js/landing/landing.js"></script>
</body>
</html>
