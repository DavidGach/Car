<?php
include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="theme-color" content="#fff">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Car Repair Service</title>
	<link rel="icon" href="media/images/icon.png" type="image/png">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	<link rel="stylesheet" href="media/css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>

	<header>
		<div class="dots"><canvas></canvas></div>
		<nav>
			<div class="logo">
				<a href="javascript:void(0)">Auto</a>
			</div>
			<div class="toggle">
				<a href="javascript:void(0)" class="open">&#9776;</a>
				<a href="javascript:void(0)" class="close">&#10006;</a>
			</div>
			<div class="menu">
				<ul>
					<li><a id="home-link" href="javascript:void(0)">Home</a></li>
					<li><a id="services-link" href="javascript:void(0)">Services</a></li>
					<li><a id="contact-link" href="javascript:void(0)">Contact</a></li>
				</ul>
			</div>
		</nav>


		<div id="arrow-left" class="arrow">&larr;</div>



		<div id="slider">

<?php

$sql = "SELECT id, url FROM images";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            ?>

			<div class="slide" style='background-image: url("media/images/slider/<?php echo $row["url"]; ?>");'>
				<div class="slide-content">
					<span class="date">27.11.</span>
					<span class="title">Vintage Auto Exhibition</span>
				</div>
			</div>

      <?php
    }
    } else {
    echo "0 results";
    }
    ?>


		</div>




		<div id="arrow-right" class="arrow">&rarr;</div>
	</header>

	<main>
		<section id="services">
			<h1>The Corner Garage For Collector Cars</h1>

<?php
$sql = "SELECT * FROM services";
    $result = $db->query($sql);
$arr = array();
$arrimg = array();

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
					array_push($arr,$row["keyword"]) ;
          array_push($arrimg,$row["url"]) ;
        }
        } else {
        echo "0 results";
        }

 ?>
			<div class="cards-container">
				<div class="card modify">
					<img src="media/images/<?php echo $arrimg[0]; ?>">
					<h3><?php echo $arr[0]; ?></h3>
				</div>
				<div class="card buy">
					<img src="media/images/<?php echo $arrimg[1]; ?>">
					<h3><?php echo $arr[1]; ?></h3>
				</div>
				<div class="card repair">
					<img src="media/images/<?php echo $arrimg[2]; ?>">
					<h3><?php echo $arr[2]; ?></h3>
				</div>
			</div>
			<div class="animation">
				<div class="mountains"></div>
				<div class="trees"></div>
				<div class="car">
					<img src="media/images/car.png">
				</div>
			</div>


		</section>

		<section id="contact">
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2978.252066426173!2d44.78528711923659!3d41.715079319647685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x404472d4fa5b02d7%3A0xced15c2c7992ceb5!2sGeoLab!5e0!3m2!1sru!2sge!4v1526898477826" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="inner">

				<div class="social">
					<h2>Contact Information</h2>
					<h3>click to view</h3>
					<ul class="s">
						<?php
						 		$arr = array();
						    $sql="SELECT * FROM social";
						    $result = $db->query($sql);
						    if ($result->num_rows > 0) {
						        // output data of each row
						        while($row = $result->fetch_assoc()) {
						          $arr[$row["id"]-1]=$row["url"];
						        }
						        }else {
										 $arr[2]="plus.google.com";
 					           $arr[0]="facebook.com";
 					           $arr[1]="twitter.com";
						        }
							?>
						<li class="gplus"><a href="https://<?php echo $arr[2]; ?>"><i class="fab fa-google-plus-g"></i></a></li>
						<li class="facebook"><a href="https://<?php echo $arr[0]; ?>"><i class="fab fa-facebook-f"></i></a></li>
						<li class="twitter"><a href="https://<?php echo $arr[1]; ?>"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="form">
					<h2>Get in touch</h2>
					<form method="post" action="form.php">
						<div class="left">
							<input required id="name" type="text" name="name" placeholder="Name">
							<p class="name"></p>
							<input required id="email" type="email" name="email" placeholder="Email">
							<p class="email"></p>
							<input required id="subject" type="text" name="subject" placeholder="Subject">
							<p class="subject"></p>
							<textarea name="text" required placeholder="Text"></textarea>

							<p class="text"></p>
						</div>
						<div class="right">
							<div class="rbtn">
								<label class="rbtn-holder">
									<input id="male" type="radio" name="gender" value="male">Male
									<span class="checkmark"></span>

								</label>
								<label class="rbtn-holder">
									<input id="female" type="radio" name="gender" value="female" >Female
									<span class="checkmark"></span>

								</label>
							</div>
							<p class="gender"></p>
							<div class="chbx">
								<h4>Sign up for newsletter</h4>
								<ul>
									<li>
										<label class="chbx-holder">
											<input type="checkbox" name="arr[]" value="images">
											<span class="checkmark"></span>
											Receive images
										</label>
									</li>
									<li>
										<label class="chbx-holder">
											<input type="checkbox" name="arr[]" value="promotions">
											<span class="checkmark"></span>
											Receive promotions
										</label>
									</li>
									<li>
										<label class="chbx-holder">
											<input type="checkbox" name="arr[]" value="updates">
											<span class="checkmark"></span>
											Receive updates
										</label>
									</li>
									<li>
										<label class="chbx-holder">
											<input type="checkbox" name="arr[]" value="joboffers">
											<span class="checkmark"></span>
											Receive job offers
										</label>
									</li>
								</ul>
							</div>
							<input type="submit" name="send" value="Send">
						</div>
					</form>
				</div>
			</div>
		</section>
	</main>

	<footer>
		<div class="f">
			<h3 class="copyright">&copy; copyright 2018</h3>
			<h3 class="author">created with <i class="fa fa-heart" aria-hidden="true"></i></h3>
		</div>
	</footer>

	<script src="media/js/main.js"></script>
	<script src="media/js/slider.js"></script>
	<script src="media/js/dots.js"></script>
</body>
</html>
