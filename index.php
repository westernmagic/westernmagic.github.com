<?php
	require( 'yaml/lib/sfYaml.php' ) ;
	$data = sfYaml::load( 'data.yml' ) ;
	$data[ 'fullname' ] = $data[ 'firstname' ] . ' ' . $data[ 'surname' ] ;
?>
<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]>
	<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en" >
<![endif]-->
<!--[if IE 7]>
	<html class="no-js lt-ie9 lt-ie8" lang="en" >
<![endif]-->
<!--[if IE 8]>
	<html class="no-js lt-ie9" lang="en" >
<![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
	<html class="no-js" lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		
		<!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/b/378 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<title>
			<?php echo $data[ 'fullname' ] ; ?>
		</title>
		<meta name="description" content="<?php echo $data[ 'fullname' ] ; ?>'s Personal Homepage" />
		<meta name="author" content="<?php echo $data[ 'fullname' ] ; ?>" />
		<meta http-equiv="imagetoolbar" content="false" />
		<meta property="og:title" content="<?php echo $data[ 'fullname' ] ; ?>" />
		<meta property="og:description" content="<?php echo $data[ 'fullname' ] ; ?>'s Personal Homepage" />
		
		<!-- Mobile viewport optimized: h5bp.com/viewport -->
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
		
		<link rel="stylesheet" href="css/normalize.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/finalize.css" />
		
		<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
		<?php if( isset( $data[ 'networks' ][ 'rss' ] ) ) : ?>
			<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $data[ 'networks' ][ 'rss' ][ 'url' ] ; ?>" />
		<?php endif ; ?>
		
		<link rel="dns-prefetch" href="http://www.w3.org/" />
		<link rel="dns-prefetch" href="http://mirrors.creativecommons.org/" />
		
		<!-- All JavaScript at the bottom, except this Modernizr build incl. Respond.js Respond is a polyfill for min/max-width media queries. Modernizr enables HTML5 elements & feature detects; for optimal performance, create your own custom Modernizr build: www.modernizr.com/download/ -->
		<script src="js/libs/modernizr-2.0.6.min.js" ></script>
	</head>
		
	<body>
		<header>
			<div class="greenbox" >
				<div class="title" >
					<?php echo $data[ 'firstname' ] ; ?>
					<?php echo $data[ 'surname' ] ; ?>
				</div>
				<?php if( isset( $data[ 'subtitle' ] ) ) : ?>
					<div class="subtitle" >
						<?php
							$subtitle = array() ;
							foreach( $data[ 'subtitle' ] as $val ) {
								if( is_array( $val ) ) {
									if( current( $val ) != '' )
										$subtitle[] = '<a href="' . current( $val ) . '" >' . key( $val ) . '</a>' ;
									else
										$subtitle[] = key( $val ) ;
								} else
									$subtitle[] = $val ;
							}
							echo implode( ' ' , $subtitle ) ;
							unset( $subtitle ) ;
						?>
					</div>
				<?php endif ; ?>
			</div>
		</header>
		<div id="main" role="main" class="main" >
			<?php if( isset( $data[ 'networks' ] ) ) : ?>
				<div class="sidebar" >
					<ul>
						<?php foreach( $data[ 'networks' ] as $network ) : ?>
							<li>
								<a href="<?php echo $network[ 'url' ] ; ?>" >
									<img src="img/<?php echo $network[ 'name' ] ; ?>-48x48.png" alt="<?php echo $network[ 'alt' ] ; ?>" />
								</a>
							</li>
						<?php endforeach ; ?>
					</ul>
				</div>
			<?php endif ; ?>
			<div class="vertical sidevertical" >
				I LIKE
			</div>
			<div class="list" >
				<ul>
				<?php foreach( $data[ 'links' ] as $category ) : ?>
					<li>
						<div class="vertical" >
							<?php echo key( $category ) ?>
						</div>
						<dl>
							<?php foreach( current( $category ) as $link ) : ?>
								<dt>
									<?php
										if( isset( $link[ 'url' ] ) )
											echo '<a href="' . $link[ 'url' ] . '" >' ;
										echo $link[ 'name' ] ;
										if( isset( $link[ 'url' ] ) )
											echo '</a>' ;
									?>
								</dt>
								<dd>
									<?php echo $link[ 'description' ] ; ?>
								</dd>
							<?php endforeach ; ?>
						</dl>
					</li>
				<?php endforeach ; ?>
				</ul>
			</div> <!-- end list -->
		</div> <!-- end main -->
		<footer>
			<div style="position: absolute ; left: 37px ;" >
				<a href="http://www.w3.org/html/logo/" >
					<img src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-semantics.png" width="165" height="64" alt="HTML5 Powered with CSS3 / Styling, and Semantics" title="HTML5 Powered with CSS3 / Styling, and Semantics" >
				</a>
			</div>
			<div style="position: absolute; left: 15% ; width: 70% ;" >
				<table style="margin-left: auto ; margin-right: auto ;" >
					<tbody>
						<tr>
							<td class="right" >
								<a href="<?php echo 'http://' . $_SERVER[ 'SERVER_NAME' ] ; ?>" >Website</a> by <a href="mailto:mswoj61@gmail.com" ><?php echo $data[ 'fullname' ] ; ?></a>
							</td>
							<td>
							</td>
							<td class="left" >
								<a href="http://paulrobertlloyd.com/2009/06/social_media_icons" >Social Media Icons</a> by <a href="http://paulrobertlloyd.com/" >Paul Robert Lloyd</a>
							</td>
						</tr>
						<tr>
							<td class="right" >
								<a href="http://html5boilerplate.com" >HTML5 Boilerplate</a> by <a href="http://paulirish.com" >Paul Irish</a> et al
							</td>
							<td>
							</td>
							<td class="left" >
								<a href="http://nero120.deviantart.com/gallery/#/d898bw" >Steam Icon</a> by <a href="http://nero120.deviantart.com/" >Nero120</a>
							</td>
						</tr>
						<tr>
							<td class="right" >
								<a href="http://creativecommons.org/about/downloads" >HTML5 Logo</a> by <a href="http://www.w3.org/" ><abbr title="World Wide Web Consortium" >W3C</abbr></a>
							</td>
							<td>
							</td>
							<td class="left" >
								<a href="http://creativecommons.org/about/downloads" >Creative Commons icons</a> by <a href="http://creativecommons.org/" >Creative Commons</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div style="position: absolute; right: 37px ;" >
				<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/" >
					<img src="http://mirrors.creativecommons.org/presskit/icons/cc.large.png" width="64" height="64" alt="Creative Commons" />
					<img src="http://mirrors.creativecommons.org/presskit/icons/by.large.png" width="64" height="64" alt="BY - Attribution" />
					<img src="http://mirrors.creativecommons.org/presskit/icons/nc-eu.large.png" width="64" height="64" alt="NC - Non-comercial" />
					<img src="http://mirrors.creativecommons.org/presskit/icons/sa.large.png" width="64" height="64" alt="SA - Share-Alike" />
				</a>
			</div>
		</footer>
		
		<!-- JavaScript at the bottom for fast page loading -->
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" ></script>
		<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js" ><\/script>')</script>
		
		<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID. mathiasbynens.be/notes/async-analytics-snippet -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		
		<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6. chromium.org/developers/how-tos/chrome-frame-getting-started -->
		<!--[if lt IE 7 ]>
			<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js" ></script>
			<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
	</body>
</html>
