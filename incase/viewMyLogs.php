<?php
	require_once("session.php");
	require_once("common.php");
	$sess->authPage(2);	
	require_once("ApiClass.php");
	
	$trip_query = Api::getMyTrips($_SESSION["uid"]);
	
	$trips = array();
	while($r = mysql_fetch_assoc($trip_query)) {
		$trips[] = $r;
	}
		
	require_once("header.php");
?>
	
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img src="img/view1.jpg" alt="First slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>Example headline.</h1>
							<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
							<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img src="img/view2.jpg" alt="Second slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>Another example headline.</h1>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
							<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
						</div>
					</div>
				</div>
				<div class="item">
					<img src="img/view3.jpg" alt="Third slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>One more for good measure.</h1>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
							<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		
		<div class="container">
			<div class="page-header">
				<h1>My Trips</h1>
			</div>
			<div class="row trips"></div>
		</div>
		
		<?php echo "<script>
				var trips=".json_encode($trips)."
			</script>";
		?>
		
		<script id="trip-template" type="text-template">		
			<div class="thumbnail">
				<img src="<%= image %>">
				<div class="caption">
					<h3><%= tname %></h3>
					<p class="text-muted"><span class="glyphicon glyphicon-calendar"></span> <%= numdays %> days</p>
					<p><%=tdes %></p>
					<p><a href="viewTrip.php?id=<%= tid %>" class="btn btn-primary">View Trip &raquo;</a></p>
				</div>
			</div>	
		</script>
		
		<script src="js/index.js"></script>
	</body>
</html>
