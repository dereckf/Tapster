<html>
	<head>
		<title>Tapster</title>
		<style>
		#container {
			width: 1000px;
			margin: 0 auto;
		}
		.floatLeft {
			float: left;
		}
		
		.floatRight {
			float: right;
		}
		.floatCenter {
			float: center;
		}
		body {
			background-color: #d3d3d3;
			font-family: "Ubuntu", sans-serif;
			color: purple;
		}
		
		h1, h2, h3, h4 {
			margin: 0;
		}
		h2 {
			color: #003399;
		}
		h3, h4{
			color: #0208ed;
			font-weight: 200;
		}
		.divider {
			clear: both;
			width: 100%;
			height: 5px;
			background-color: gray;
			margin-bottom: 25px;
			margin-top: 25px;
		</style>
	</head>
	<body>
		<div id="container">
			<div class="floatCenter">
				<h1>Tapster</h1>
				<h2>Beer Library and Search</h2>
			</div>
			<br></br>
			<div id="php_and_json">
				<?php 
				$terms = htmlspecialchars($_GET['beer']);
				echo 'You searched: '.$terms;
				echo '<p>Results: </p>';
				$url = "http://api.openbeerdatabase.com/v1/beers.json?query=".$terms;
				$json = file_get_contents($url);
				$data = json_decode($json, TRUE);
				foreach($data['beers'] as $item) {
					print $item['name'];
					print ' - ';
					print $item['description'];
					print '<br></br>';
				}
				?>
			<br></br>
			</div>
			<div class="floatRight">
				<h2><a href="beer.html">Return Home</a></h2>
				<br></br>
			</div>
			<div class="divider">
				<footer>
				
					&copy; 2014 Tapster
				</footer>
			</div>
		</div>
	</body>
</html>
