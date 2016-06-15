<!DOCTYPE>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<title>Click for a Better World!</title>
    
	<meta property="og:url"           content="http://urbanist.by/betterworld.php" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Click for a Better World!" />
	<meta property="og:description"   content="Change the world right here and now! The easiest and cheapest way to make a difference!" />

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="mystyles.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	

</head>
  
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  	var js, fjs = d.getElementsByTagName(s)[0];
 		if (d.getElementById(id)) return;
 		js = d.createElement(s); js.id = id;
	  	js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5&appId=1525727797642710";
 		 fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<?php 

		$clickcount = explode("\n", file_get_contents('counter-int.txt'));
		foreach($clickcount as $line){
		$tmp = explode('||', $line);
		$count[trim($tmp[0])] = trim($tmp[1]);
		}

	?>	
		
	<div class="container" id="btn-click">
		<p><button type="button" class="btn-eng click-trigger" data-click-id="click-001">Make the world a better place!</button></p>

		<div class="congrats">
			<p>Thank you! The world is <span id="counter"><?php echo $count['click-001'];?></span> clicks better now!</p>
		</div>
		<div class="footer">
			<div class="table">
				<div class="share">
					<div class="share-text">
						<p>
							Now that the world is a better place, it's time to share the good news with your friends:<br>
						</p>
					</div>
					<div class="share-buttons">
						<div id="fb" class="fb-share-button" data-href="http://urbanist.by/betterworld.php" data-layout="button_count"></div>
					</div>
				</div>
				<div class="version">
					<p><a href="http://urbanist.by/betterminsk.php">Local version for Minsk urban activists</a></p>
				</div>
			</div>
		</div>
	</div>

<script>

		$(".btn-eng").click(function(){
		$(".btn-eng").addClass("btn-success-eng");
		$(".congrats").show();
		$(".footer").show();
		});
	
	var clicks = document.querySelectorAll('.click-trigger'); // IE8
	for(var i = 0; i < clicks.length; i++){
	clicks[i].onclick = function(){
		var id = this.getAttribute('data-click-id');
		var post = 'id='+id; // post string
		var req = new XMLHttpRequest();
		req.open('POST', 'counter-int.php', true);
		req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		req.onreadystatechange = function(){
			if (req.readyState != 4 || req.status != 200) return; 
			document.getElementById(id).innerHTML = req.responseText;
			};
		req.send(post);
		}
	}
</script>

</body>
</html>
