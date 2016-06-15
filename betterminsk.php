<!DOCTYPE>

<html lang="ru">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Click for Better Minsk!</title>

	<meta property="og:url"           content="http://nezapisal.info/clickforbetterminsk/betterminsk.php" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Click for Better Minsk!" />
	<meta property="og:description"   content="Сделай Минск лучше! Недорогое и практичное веб-приложение для минских городских активистов" />
	<meta property="og:image"         content="http://nezapisal.info/clickforbetterminsk/pallet.jpg" />
	<meta property="fb:admins"         content="100001189848553" />
	<meta property="fb:app_id"         content="1525727797642710" />


	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="mystyles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://vk.com/js/api/share.js?93" charset="windows-1251"></script>

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

		$clickcount = explode("\n", file_get_contents('counter.txt'));
		foreach($clickcount as $line){
		$tmp = explode('||', $line);
		$count[trim($tmp[0])] = trim($tmp[1]);
		}

	?>

	<div class="container" id="btn-click">
			<button type="button" class="btn click-trigger" data-click-id="click-001">Сделай Минск лучше!</button>

			<div class="congrats">
				<p>Минск стал лучше на <span id="counter"><?php echo $count['click-001'];?></span> <span id="person"></span> кнопочки. Спасибо!</p>
			</div>
		<div class="footer">
			<div class="table">
				<div class="share">
					<div class="share-text"><p>Cделал Минск лучше? Не держи в себе, поделись хорошей новостью с друзьями:</p>
					</div>
					<div class="share-buttons">
						<div id="fb" class="fb-share-button" data-href="http://nezapisal.info/clickforbetterminsk/betterminsk.php" data-layout="button_count"></div>
						<div id="vk">
							<script type="text/javascript">document.write(VK.Share.button(false,{type: "round", text: "Сохранить"}));</script>
						</div>
					</div>
				</div>
				<div class="version">
						<p><a href="http://nezapisal.info/clickforbetterminsk/betterworld.php">Международная версия</a></p>
				</div>
			</div>
		</div>
	</div>

<script>

		$(".btn").click(function(){
		$(".btn").addClass("btn-success");
		$(".congrats").show();
		$(".footer").show();
		});

	var count = $("#counter").html();
	var lastTwo = count.slice(-2);
	var last = count.slice(-1);

	if (lastTwo == 11 || lastTwo == 12 || lastTwo == 13 || lastTwo == 14) {
   	$("#person").html("нажатий");
	}

	else if(last == 1) {
	$("#person").html("нажатие");
	}

	else if (last == 2 || last == 3 || last == 4)
	{
   	$("#person").html("нажатия");
	}

	else {
	$("#person").html("нажатий");
	};


	var clicks = document.querySelectorAll('.click-trigger'); // IE8
	for(var i = 0; i < clicks.length; i++){
	clicks[i].onclick = function(){
		var id = this.getAttribute('data-click-id');
		var post = 'id='+id; // post string
		var req = new XMLHttpRequest();
		req.open('POST', 'counter.php', true);
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
