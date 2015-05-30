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
		<link rel="icon" href="{{ paths.theme }}{{ iconurl }}" type="image/png">

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

		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/styles/github-gist.min.css">

		<style type="text/css">

			* {
				-webkit-overflow-scrolling: touch;
			}

			html {
				color: #333;
				font-family: "Helvetica Neue", "Helvetica", "Roboto", "Segoe UI", "Open Sans", "Arial", sans-serif;
				line-height: 1.4;
				-webkit-font-smoothing: antialiased;
			}

			.body {
				max-width: 40em;
				margin-left: auto;
				margin-right: auto;
				padding: 2% 6% 8% 6%;
			}

			h1,
			h2,
			h3 {
				line-height: 1.2;
			}

			h2 {
				margin-top: 6%;
				padding-top: 6%;
				border-top: 1px solid #eee;
			}

			h3 {
				margin-top: 6%;
			}

			a {
				color: #27a9e1;
				text-decoration: none;
			}

			/*Layout*/
			.half {
				float: left;
				clear: none;
				width: 48%;
			}
			.half + .half {
				margin-left: 4%;
			}
			.clear {
				clear: both;
			}
			@media screen and (min-width: 46em) {
				pre,
				.pull {
					margin-left: -2em;
					margin-right: -2em;
				}
				.modal pre {
					margin-left: 0;
					margin-right: 0;
				}
			}
			@media screen and (min-width: 54em) {
				pre,
				.pull {
					margin-left: -6em;
					margin-right: -6em;
				}
				.modal pre {
					margin-left: 0;
					margin-right: 0;
				}
			}

			/*Demo container styling*/
			.container {
				padding: 20px;
				display: block;
				border: 1px solid black;
				font-weight: bold;
			}
			@media screen and (min-width: 480px) {
				.container {
					padding-left: 40px;
					padding-right: 40px;
				}
			}
			@media screen and (min-height: 640px) {
				.container {
					padding-top: 40px;
					padding-bottom: 40px;
				}
			}

			/*Background patterns*/
			.container,
			.container .container .container {
				background-color: #92baac;
				background-image: repeating-linear-gradient(
					45deg,
					transparent,
					transparent 20px,
					#e1ebbd 20px,
					#e1ebbd 40px
				);
			}

			.container .container {
				background-color: #ec173a;
				background-image: repeating-linear-gradient(
					-45deg,
					transparent,
					transparent 40px,
					#eceddc 40px,
					#eceddc 80px
				);
			}

			.container .container .container .container {
				background-color: #17d4ec;
				background-image: repeating-linear-gradient(
					-45deg,
					transparent,
					transparent 40px,
					#dceaed 40px,
					#dceaed 80px
				);
			}

			/*Container heights*/
			.height-1,
			.height-2,
			.height-3,
			.height-4 {
				overflow-y: auto;
			}
			.height-1 {
				height: 200px;
			}

			.height-2 {
				height: 300px;
			}

			.height-3 {
				height: 400px;
			}

			.height-4 {
				height: 800px;
			}

			/*Demo form*/
			.dummyform {
				border: 1px solid #ddd;
				border-radius: 3px;
				padding: 0.5em 1.5em;
			}
			.dummyform-content {
				position: relative;
			}
			.dummyform ul {
				padding-left: 0;
				margin-top: 0;
				margin-bottom: 0;
				list-style: none;

				position: absolute;
				left: 0;
				width: 20em;
				max-width: 100%;
				max-height: 8em;
				overflow: auto;

				background-color: #fff;
				border: 1px solid #ddd;
				border-radius: 3px;
				box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
			}
			.dummyform ul a {
				display: block;
				padding: 0.5em 0.7em 0.4em 0.7em;
				border-bottom: 1px solid #eee;
			}
			.dummyform ul a:focus,
			.dummyform ul a:hover {
				background-color: #f6f6f6;
			}
			.dummyform ul li:last-of-type a {
				border-bottom-width: 0;
			}

			/*Code*/
			pre {
				overflow: auto;
				max-height: 16em;
				border-radius: 3px;
				font-size: inherit;
			}
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
			pre code {
				border-radius: 0;
			}
			@media screen and (min-width: 54em) {
				.hljs,
				pre code {
					padding: 1.5em 2em;
				}
			}

			/*Modal dialog*/
			.modal {
				position: fixed;
				z-index: 10;
				overflow: hidden;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				background-color: rgba(0, 0, 0, 0.5);
			}
			.modal.closed {
				display: none;
			}
			.modal-content {
				position: fixed;
				z-index: 20;
				overflow: auto;
				box-sizing: border-box;
				top: 10%;
				left: 20%;
				width: 60%;
				height: 30em;
				max-height: 80%;
				background-color: #fff;
				border-radius: 3px;
				padding: 1.5em 2em;
			}

		</style>

	</head>

	<body>
		<div class="body">

			<?php
				$Parsedown = new Parsedown();
				echo $Parsedown->text(file_get_contents('README.md'));
			?>



			<h2>Demos</h2>

			<p>Commonly in scroll interaction, the user hovers their mouse cursor over a scrollable element and uses the trackpad or a mouse wheel to scroll the element up or down. When an element reaches its boundary, its parent element continues to be scrolled.</p>

			<p>Usually the parent is the document, meaning that the user will continue moving down the page when attempting to scroll an individual container on the page, which is quite annoying. This is a common issue with dropdown menus and modal dialogs.</p>

			<p>Compare yourself:</p>

			<div class="pull">

				<div class="half">
					<p>No scroll-scope;</p>
				</div>
				<div class="half">
					<p>With <code>data-scroll="scope":</code></p>
				</div>
				<div class="clear"></div>

				<div class="half">

					<div class="container height-1">
						<div class="container height-2">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
						</div>
					</div>

				</div>

				<div class="half">

					<div class="container height-1" data-scroll="scope">
						<div class="container height-2">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>
						</div>
					</div>

				</div>
				<div class="clear"></div>
			</div>



			<h3>Real-life use case: search suggestions</h3>

			<p>The document will stay still even when you scroll the results container to the end.</p>

			<form class="dummyform pull">
				<div class="dummyform-content">

				<p><input type="search" value="search term"><input type="submit"></p>

				<ul data-scroll="scope">
					<li><a href=".">Search result 1</a></li>
					<li><a href=".">Search result 2</a></li>
					<li><a href=".">Search result 3</a></li>
					<li><a href=".">Search result 4</a></li>
					<li><a href=".">Search result 5</a></li>
					<li><a href=".">Search result 6</a></li>
				</ul>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				</div>
			</form>



			<h3>Real-life use case: modal dialog</h3>

			<div class="modal closed" data-action="modal" data-scroll="scope">
				<div class="modal-content" data-scroll="scope">

					<p>Modal dialog implementations tend to scroll the document. In this trivial custom dialog, the code that avoids this problem looks like this:</p>

					<pre><code>&lt;div class="modal" data-scroll="scope"&gt;
	&lt;div class="modal-content" data-scroll="scope"&gt;

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



			<h3>Real-life use case: code block</h3>

			<pre data-scroll="scope"><code>/*A page with lots of code blocks could set a max-height for them*/
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
				<div class="container height-1" data-scroll="scope">
					<div class="container">
						<div class="container height-3" data-scroll="scope">
							<div class="container height-4">
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
		<script type="text/javascript" src="scroll-scope.min.js"></script>

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