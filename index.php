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

		<title>scroll-scope.js demo</title>
		<!-- <link rel="icon" href="icon.png" type="image/png"> -->

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

			<?php
				$Parsedown = new Parsedown();
				echo $Parsedown->text(file_get_contents('README.md'));
			?>



			<h2>Demos</h2>

			<div class="pull">

				<div class="half">
					<p>No scroll-scope;</p>
				</div>
				<div class="half">
					<p>With <code>data-scroll-scope:</code></p>
				</div>
				<div class="clear"></div>

				<div class="half">

					<div class="container height-1">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
					</div>

				</div>

				<div class="half">

					<div class="container height-1" data-scroll-scope>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
					</div>

				</div>
				<div class="clear"></div>
			</div>



			<h3>Real-life use case: modal dialog</h3>

			<div class="modal closed" data-scroll-scope="force">
				<div class="modal-content" data-scroll-scope="force">

					<p>Modal dialog implementations tend to scroll the document. In this trivial custom dialog, the code that avoids this problem looks like this:</p>

					<pre><code>&lt;div class="modal" data-scroll-scope="force"&gt;
	&lt;div class="modal-content" data-scroll-scope="force"&gt;

		...

	&lt;/div&gt;
&lt;/div&gt;</code></pre>

					<p>Scroll down or <a href="." data-action="modal">close this dialog</a>.</p>

					<h3>Lorem ipsum</h3>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

					<p><a href="." data-action="modal">Close dialog</a></p>

				</div>
			</div>

			<p><a href="." data-action="modal">Show a modal dialog</a></p>



			<h3>Real-life use case: search suggestions</h3>

			<p>The document will stay still even when you scroll the results container to the end.</p>

			<form class="dummyform pull">
				<div class="dummyform-content">

				<p><input type="search" value="search term"><input type="submit"></p>

				<ul data-scroll-scope>
					<li><a href=".">Search result 1</a></li>
					<li><a href=".">Search result 2</a></li>
					<li><a href=".">Search result 3</a></li>
					<li><a href=".">Search result 4</a></li>
					<li><a href=".">Search result 5</a></li>
				</ul>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				</div>
			</form>



			<h3>Real-life use case: code block</h3>

			<pre data-scroll-scope><code>/*A page with lots of code blocks could set a max-height for them*/
pre {
	overflow: auto;
	max-height: 16em;
}

/*Lots of code*/
.hljs,
code {
	display: inline-block;
	color: #555;
	background-color: #f6f6f6;
	border-radius: 3px;
	padding-left: 0.3em;
	padding-right: 0.3em;
}
.hljs,
pre code {
	display: block;
	padding: 1em;
	overflow: auto;
}
@media screen and (min-width: 46em) {
	pre {
		margin-left: -2em;
		margin-right: -2em;
	}
}
@media screen and (min-width: 54em) {
	pre {
		margin-left: -6em;
		margin-right: -6em;
	}
	.hljs,
	pre code {
		padding: 1.5em 2em;
	}
}</code></pre>



			<h3>Nested containers</h3>

			<div class="pull">
				<div class="container height-1" data-scroll-scope>
					<div class="container height-3" data-scroll-scope>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
					</div>
				</div>
			</div>



			<h3>Unpractical number of nested containers</h3>

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

		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="scroll-scope.js"></script>

		<script type="text/javascript">

			// scroll-scope.js init
			$(document).scrollScope();

			// Syntax highlighting
			hljs.initHighlightingOnLoad();

			// Dummy form
			$('.dummyform').on('click', 'a', function (e) {
				e.preventDefault();
			});

			// Modal dialog
			$(document).on('click', '[data-action="modal"]', function (e) {
				e.preventDefault();
				$('.modal').toggleClass('closed');
			});
			$(document).on('click', '.modal-content', function (e) {
				e.stopPropagation();
			});

		</script>

	</body>
</html>