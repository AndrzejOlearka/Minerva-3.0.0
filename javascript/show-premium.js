	$('span[style="color: blue"]').click(function(){
		$('#premium').show();
	});
	
	$('span[style="color: gold"]').click(function(){
	$('#coins').show();
	});

	$('#premium').ready(function(){
				$('input[name="premium"]').click(function(){
					alert("Zakup udany, przedłużyłeś swoje premium!");
					var premium = $(this).data("premium");
					console.log(premium);
					$.ajax({
						url:"account-premium.php",
						method:"post",
						dataType:"html",
						data:{premium:premium},
						success: function(){
							var zegarr = setInterval(function() {		
							var time = document.querySelector('#premiumEdit');		
						time.textContent = "Twoje premium zostało przedłużone!";
						$('#premium').hide();
								}, 1000);
							var reload = setInterval(function(){
								location.reload(); 
								}, 5000);
							}
						});
					});
				});

		$('#coins').ready(function(){
				$('input[name="coins"]').click(function(){
					alert("Zakup udany, wzbogaciłeś się o nowe monety!");
					var coins = $(this).data("coins");
					console.log(coins);
					$.ajax({
						url:"account-premium.php",
						method:"post",
						dataType:"html",
						data:{coins:coins},
						success: function(){
							var zegarr = setInterval(function() {		
							var time = document.querySelector('#coinsEdit');		
						time.textContent = "Twój skarbiec ma jeszcze więcej monet!";
						$('#coins').hide();
								}, 1000);
							var reload = setInterval(function(){
								location.reload(); 
								}, 5000);
							}
						});
					});
				});