<?php
session_start();
//var_dump((isset($_SESSION['status'])));
//exit();
if (!(isset($_SESSION['status'])) || $_SESSION['status']==0){
	$_SESSION['status']=0;
	header("Location: index.php");
	exit();
}


?>
<html>
<head>
	<title>Useless Links</title>
	<link rel="stylesheet" href="styles.css" type="text/css">
	<script src="jquery.min.js"></script>
</head>

<body>
	<div class ="tbar">
		useless links
	</div>
	<div class="lbar">
		<ul  class="lbarul">
			<li  class="nav"  >
				<a href="index.php" class="boxed">
					Useless Links
				</a></li>
				<li class="nav" >
					<a href="am.html" class="boxed">
						About Me
					</a>
				</li>

			</div>
			<div class="rbar">








				<div style="float:right;">
					<div class="box" style="float:right;width:200px">
						<p class="headu">Signed in as :</p>@<?php echo $_SESSION['username'] . ": " . $_SESSION['name']; ?>
						<br><br><button onclick="window.location='logout.php';">Log Out</button>

					</div>

				</div>
				<div class="linkall" id='linkall' style="display:block;float:left;width:700px;">
				<div class="box" style="width:100%">
						<p class="headu">Share your favourite link:</p>
						<input id="favlink" type="text" style="width:50%;" required>
						<button id='share'>Share</button>
						<script>
							document.getElementById('share').onclick= function(){
								//alert(document.getElementById('favlink').value);
								if(document.getElementById('favlink').value == '' || ((document.getElementById('favlink').value.indexOf('http://') !=0) && (document.getElementById('favlink').value.indexOf('https://') !=0))) alert("Please enter a valid link.");
								else{
									$.ajax({url:"handle.php",type:"post",contentType: 'application/json; charset=utf-8',data: document.getElementById('favlink').value});
								
								document.getElementById('collection').innerHTML="<div class='oneset box'><div class='times'>	Just now</div><div class='linkone'>" + 
								"<p class='headu link'><a class='ref' href='" + document.getElementById('favlink').value + "'>" +
									 document.getElementById('favlink').value + 
								"</a></p><p class='name'>"  +  '<?php echo($_SESSION['username']); ?>' + "<br></p></div></div>" + document.getElementById('collection').innerHTML	;
								document.getElementById('favlink').value='';
							}}
						</script>
					</div>
					<div id='collection'>
					<?php
								include('credentials.php');

				$con=  mysqli_connect($creden['host'],$creden['username'],$creden['passkey'],$creden['link_sharer']);
	
					if(mysqli_connect_errno()){
						die("Connection failed: " . mysqli_connect_errno());
					}
				//echo $con;
					$query="SELECT * FROM links ORDER BY time DESC";

					$result = mysqli_query($con,$query);
				//var_dump($con);

					while ($row = $result->fetch_assoc()) {
						?>
						<div class="oneset box" >
							<div class="times">
								<?php

								$tstamp = DateTime::createFromFormat("Y-m-d H:i:s",$row['time']);

								$tdiff= $tstamp->diff(new DateTime());
								if($tdiff-> y){
									echo($tdiff-> y . " years ago");
								} elseif ($tdiff-> m) {
									echo($tdiff-> m . " months ago");
								} elseif ($tdiff-> d) {
									echo($tdiff-> d . " days ago");
								} elseif ($tdiff-> h) {
									echo($tdiff-> h . " hours ago");
								} elseif ($tdiff-> i) {
									echo($tdiff-> i . " minutes ago");
								} elseif ($tdiff-> s) {
									echo($tdiff-> s . " seconds ago");
								}


								?>
							</div>
							<div class="linkone">
								<p class="headu link"><a class="ref" href = <?php	echo $row["url"] ?>>
									<?php echo $row["url"];?>

								</a></p>
								<p class="name">
									<?php
									echo $row["username"] . "<br>";
									?>
								</p>
							</div>
						</div>
						<?php

					}

					?>
					</div>
				</div>


			</div>
			<div class="bbar">
				<div class="nav">Warning: Don't click on any link on this web page.</div>

			</div>

			
			

		</body>	
		</html>




