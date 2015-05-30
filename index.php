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

			html {
				color: #333;
				font-family: sans-serif;
				line-height: 1.4;
				-webkit-font-smoothing: antialiased;
			}

			.body {
				max-width: 50em;
				margin-left: auto;
				margin-right: auto;
				padding: 2% 6% 8% 6%;
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

			/*Demo container styling*/
			.container {
				padding: 20px;
				display: block;
				border: 1px solid black;
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
			.dummyform ul {
				padding-left: 0;
				margin-top: 0;
				margin-bottom: 0;
				list-style: none;

				position: absolute;
				width: 20em;
				max-width: 100%;
				max-height: 8em;
				overflow: auto;

				background-color: #fff;
				border: 1px solid #ccc;
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
			}

			.hljs,
			code {
				display: inline-block;
				color: #555;
				background-color: #f6f6f6;
				border-radius: 3px;
				padding: 0.1em 0.2em 0.2em 0.4em;
			}

			.hljs,
			pre code {
				display: block;
				padding: 1em;
				overflow: auto;
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



			<h3>Simple demo case</h3>

			<div class="container height-1" data-scroll="scope">
				<div class="container height-2"></div>
			</div>



			<h3>Real-life use case</h3>

			<p>The document will stay still even when you scroll the results container to the end.</p>

			<form class="dummyform">

				<p><input type="search" value="search term"><input type="submit"></p>

				<ul data-scroll="scope">
					<li><a href="#">Search result 1</a></li>
					<li><a href="#">Search result 2</a></li>
					<li><a href="#">Search result 3</a></li>
					<li><a href="#">Search result 4</a></li>
					<li><a href="#">Search result 5</a></li>
					<li><a href="#">Search result 6</a></li>
				</ul>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia aliquam, nemo molestiae consequatur officiis magni eos aliquid incidunt perspiciatis. Laudantium dolorum reprehenderit corporis dignissimos eaque, possimus quam, sequi ab soluta.</p>

			</form>



			<h3>Nested containers</h3>

			<div></div>

			<div class="container height-1" data-scroll="scope">
				<div class="container">
					<div class="container height-3" data-scroll="scope">
						<div class="container height-4"></div>
					</div>
				</div>
			</div>

		</div>

		<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.6/highlight.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="scroll-scope.js"></script>

		<script type="text/javascript">
			hljs.initHighlightingOnLoad();
			$(document).scrollScope();
		</script>

	</body>
</html>