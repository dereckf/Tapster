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
			<div class="floatRight">
				<img src="beerpics/tapsterLogo.png" alt="Tapster Logo"/>
			</div>
			<div class="floatCenter">
				<h1><a href="tapster.html" style="TEXT-DECORATION: NONE">Tapster</a></h1>
				<h2>Beer Library and Search</h2>
			</div>
			<br></br>
			<div id="php_and_json">
				<?php 
				$rawterms = htmlspecialchars($_GET['beer']);

				if (strlen( $rawterms) < 2) {
					echo "<br></br>";
					echo 'You searched: '.$rawterms;
                    echo '<br></br>';
					echo "Your Search term was too short, please enter a search with 2 or more characters";
				}
				else {
					$terms = preg_replace('/\s+/', '%20', $rawterms);
					echo 'You searched: '.$rawterms;
					echo '<p>Results: </p>';
					$url = "http://api.openbeerdatabase.com/v1/beers.json?query=".$terms;
					$json = file_get_contents($url);
					$data = json_decode($json, TRUE);
					foreach($data['beers'] as $item) {
						echo '<a href="beer.php?v=' . $item['name'] . '" name="v">' . $item['name'] . '</a>';
						echo '<br></br>';
					}
				}
				?>
			<br></br>
			</div>
			<div class="divider">
				<footer>
				    <br></br>
					&copy; 2015 Tapster
				</footer>
			</div>
		</div>
	</body>
</html>
