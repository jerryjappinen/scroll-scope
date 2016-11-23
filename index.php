<?php
error_reporting(0);
ini_set('display_errors', '0');
ini_set('error_log', 'errors.log');
mb_internal_encoding('UTF-8');
date_default_timezone_set('UTC');
require_once 'Parsedown.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>scroll-scope.js</title>
        <meta property="og:title" content="scroll-scope.js">
        <meta property="og:url" content="http://eiskis.net/scroll-scope">
        <meta property="og:description" name="description" content="Small jQuery plugin to keep parent element still when scrolling an element to its boundary.">

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@Eiskis">
		<meta name="twitter:title" content="scroll-scope.js">
		<meta name="twitter:description" content="Small jQuery plugin to keep parent element still when scrolling an element to its boundary.">
		<meta name="twitter:image" content="http://eiskis.net/scroll-scope/splash.png">
		<meta name="twitter:twitter:creator" content="@Eiskis">

		<link rel="icon" href="icon.png" type="image/png">
		<meta property="og:image" content="http://eiskis.net/scroll-scope/splash.png">

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="msapplication-tap-highlight" content="no">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<style type="text/css">
			@-ms-viewport { width: device-width; }
			@-o-viewport { width: device-width; }
			@viewport { width: device-width; }
			body {
				-webkit-tap-highlight-color: transparent;
				-webkit-text-size-adjust: none;
				-moz-text-size-adjust: none;
				-ms-text-size-adjust: none;
			}
		</style>

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/obsidian.min.css">
		<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="index.css">

	</head>

	<body>
		<div class="body">
			<div class="zigzag"></div>
			<div class="body-content">

				<div class="readme">

					<?php
					// Epic hacks
					$buttonsBefore = '## Get the plugin';
					$buttons = '<div class="share-buttons">
<a href="https://twitter.com/share" class="twitter-share-button" data-url="https://github.com/Eiskis/scroll-scope" data-via="Eiskis">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script><script src="https://apis.google.com/js/platform.js" async defer></script><div class="g-plusone" data-size="medium" data-href="https://github.com/Eiskis/scroll-scope"></div>
</div>';
					$Parsedown = new Parsedown();
					echo $Parsedown->text(str_replace($buttonsBefore, $buttons."\n".$buttonsBefore, file_get_contents('README.md')));
					?>

				</div>



				<h2>Demos</h2>

				<div class="pull">

					<div class="half center">
						<p>Default behavior</p>
					</div>
					<div class="half center">
						<p><code>data-scroll-scope</code></p>
					</div>
					<div class="clear"></div>

					<div class="half">

						<div class="container height-1">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis.</p>
						</div>

					</div>

					<div class="half">

						<div class="container height-1" data-scroll-scope>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis.</p>
						</div>

					</div>
					<div class="clear"></div>
				</div>

				<p>When scrolling the container on the right, scrolling should stop when you get to the end and your document should stay still. For some browsers, this is also the default behavior.</p>

				<p>Also keep in mind that especially mobile browsers allow the user to keep scrolling the parent if the child is at its respective boundary when initiating the scroll. If you want to block scrolling even in these cases, use <code>force</code> (see modal dialog example below).</p>



				<h3>Real-life use case: dropdown</h3>

				<p>The document will stay still even when you scroll the results container to the end.</p>

				<form class="dummyform pull">
					<div class="dummyform-content">

					<p><input type="search" value="something something"><input type="submit"></p>

					<ul data-scroll-scope>
						<li><a href=".">Search result 1</a></li>
						<li><a href=".">Search result 2</a></li>
						<li><a href=".">Search result 3</a></li>
						<li><a href=".">Search result 4</a></li>
						<li><a href=".">Search result 5</a></li>
					</ul>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

					<div class="extra">

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

					</div>

					</div>
				</form>



				<h3>Real-life use case: code block</h3>

				<p></p>

				<pre><code>/*A page with lots of code blocks could set a max-height for them*/
pre {
	overflow: auto;
	max-height: 16em;
}

/*Lots of code*/
code {
	display: inline-block;
	color: #555;
	background-color: #f6f6f6;
	border-radius: 3px;
	padding-left: 0.3em;
	padding-right: 0.3em;
}
pre code {
	display: block;
	padding: 1em;
	overflow: auto;
}</code></pre>



				<h3>Real-life use case: modal dialog</h3>

				<div class="modal closed" data-scroll-scope="force">
					<div class="modal-content" data-scroll-scope="force">

						<p>Scroll down or <a href="." data-action="toggle-modal">close this dialog</a>.</p>

						<h3>Lorem ipsum</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

						<div class="extra">

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

						</div>

						<p><a href="." data-action="toggle-modal">Close dialog</a></p>

					</div>
					<div class="modal-overlay" data-action="toggle-modal"></div>
				</div>

				<p>Modal dialog implementations tend to scroll the document. Even <a href="http://getbootstrap.com/javascript/#modals" target="_blank">Bootstrap's modal dialog overlay</a> lets the scroll event through on mobile Safari!</p>

				<p><a href="." data-action="toggle-modal" class="button block">Open the demo dialog</a></p>

				<p>In this quite trivial custom dialog implementation, we scope the scrolling in both the overall container and the content area so the document maintains its position. We also want to use <code>force</code> to disable parent scrolling even when the areas do not overflow.</p>

				<p><strong>Note!</strong> When scroll events are blocked with <code>force</code>, <strong>mobile Safari also blocks click events for that element</strong>. To close the modal on overlay click, we must attach the click event handler to an element that does <strong>not</strong> use <code>data-scroll-scope</code>.</p>

				<p>The source looks like this:</p>

				<pre><code class="language-html">&lt;div class="modal" <strong>data-scroll-scope="force"&gt;</strong>
	&lt;div class="modal-content" <strong>data-scroll-scope="force"&gt;</strong>
		...
	&lt;/div&gt;
	&lt;div class="modal-overlay" <strong>data-action="toggle-modal"&gt;</strong>&lt;/div&gt;
&lt;/div&gt;</code></pre>

<pre><code class="language-js">// Quick custom toggle
$(document).on('click', '[data-action="toggle-modal"]', function (event) {
	event.preventDefault();
	$('.modal').toggleClass('closed');
});</code></pre>

			<pre><code class="language-css">.modal {
	position: fixed;
	z-index: 100;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0;
	overflow: hidden;
}
	.modal.closed {
		display: none;
	}
.modal-overlay {
	position: fixed;
	z-index: 1;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	background-color: rgba(0, 0, 0, 0.5);
}
.modal-content {
	position: fixed;
	z-index: 2;
	overflow: auto;
	top: 5%;
	left: 5%;
	width: 90%;
	height: 30em;
	max-height: 90%;
	background-color: #fff;
}</code></pre>



				<h3>Nested containers</h3>

				<div class="pull">
					<div class="container height-1" data-scroll-scope>
						<div class="container height-2" data-scroll-scope>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
						</div>
					</div>
				</div>



				<h3>Impractical number of nested containers</h3>

				<div class="pull">
					<div class="container height-1" data-scroll-scope>
						<div class="container height-2" data-scroll-scope>
							<div class="container height-3" data-scroll-scope>
								<div class="container height-4" data-scroll-scope>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
								</div>
							</div>
						</div>
					</div>
				</div>



				<div class="footer center">

					<h2>That's it</h2>

					<p>Thanks for checking this out!</p>

					<ul><li><a href="http://jerryjappinen.com/"><span class="extra">More at </span>jerryjappinen.com</a></li><li><a href="http://eiskis.net/"><img src="http://jerryjappinen.com/files/jerry.jpg" alt="Jerry Jäppinen" title="Jerry Jäppinen"></a></li><li><a href="http://twitter.com/Eiskis">@eiskis<span class="extra"> on Twitter</span></a></li></ul>

					<!-- <p><a href="https://twitter.com/share?url=http%3A%2F%2Feiskis.net%2Fscroll-scope&amp;related=Eiskis&amp;via=Eiskis&amp;text=Simple%20scroll%20scoping%20fix" target="_blank" class="button share">Share on Twitter</a></p> -->

					<?php echo $buttons; ?>

				</div>



			</div>
			<div class="zigzag reverse"></div>
		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="scroll-scope.js"></script>

		<script type="text/javascript">



			// scroll-scope.js init
			$(document).scrollScope({
				elements: '[data-scroll-scope], pre code'
			}, true);

			// Could also do this
			// var myScrollScopeObject = new ScrollScope({
			// 	elements: '[data-scroll-scope], pre code'
			// });
			// myScrollScopeObject.bind(document);



			// Syntax highlighting
			hljs.initHighlightingOnLoad();

			// Dummy form
			$('.dummyform').on('click', 'a', function (e) {
				e.preventDefault();
			});
			$('.dummyform').on('submit', function (e) {
				e.preventDefault();
			});

			// Modal dialog
			$(document).on('click', '[data-action="toggle-modal"]', function (event) {
				event.preventDefault();
				$('.modal').toggleClass('closed');
			});

		</script>

	</body>
</html>