<?php
session_start();
if (!(isset($_SESSION['status']))){
	$_SESSION['status']=0;
}
if($_SESSION['status']==1){
	header("Location: home.php");
	exit();
}

?>

<html>
	<head>
		<title>Useless Links</title>
		<link rel="stylesheet" href="styles.css" type="text/css">
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
			<div class="box" >
				<p class="headu">Sign In</p>
				<form action="login.php" method="POST">
					Username : <input type="text" placeholder="Username" name="username"><br>
					Password : <input type="password" required placeholder="Password" name="password"><br>
					<input type="submit" value="Sign In" name="submit">
				</form>
				
			</div>

			<div class="box" >
				<p class="headu">Create a new account</p>
				<form action="signup.php" method="POST">
					Full Name : <input type="text" placeholder="Full Name" name="name"><br>
					Username : <input type="text" placeholder="Username" name="username"><br>
					Password : <input type="password" placeholder="Password" name="password"><br>

					<input type="submit" value="Sign Up" name="submit">
					

				</form>
			</div>
			</div>
			<div class="linkall" style="display:block;float:left;width:700px;">
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
					<div class="oneset box">
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
			<div class="bbar">
			<div class="nav">Warning: Don't click on any link on this web page.</div>

			</div>

			
			
		
	</body>	
</html>
