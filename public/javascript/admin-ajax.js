	
				$('input[name="banning"]').on('click', function(){
					var banning = $(this).data("banning");
					alert("Zbanowałeś gracza "+banning+" na okres 7 dni!");
					console.log(banning);
					$.ajax({
						url:"../controllers/admin.php",
						method:"post",
						dataType:"html",
						data:{banning:banning},
						success: function(){
							var session = document.querySelector('#banning');
							$info = $("<div class='row text-center error col-6 offset-3'></div>");
							$info.append('Zbanowano gracza '+ banning + ' na okres 7 dni!');
							$('#banning').append($info);
							$('input[data-changing="'+banning+'"]').css({"display" : "none"});
							$('input[data-banning="'+banning+'"]').css({"display" : "none"});
							$('input[data-unbanning="'+banning+'"]').css({"display" : "block"});
							}
						});
					});
				

				$('input[name="unbanning"]').on('click', function(){	
					var unbanning = $(this).data("unbanning");
					alert("Odbanowałeś gracza "+unbanning+"!");
					console.log(unbanning);
					$.ajax({
						url:"../controllers/admin.php",
						method:"post",
						dataType:"html",
						data:{unbanning:unbanning},
						success: function(){
							var session = document.querySelector('#banning');
							$info = $("<div class='row text-center success col-6 offset-3'></div>");
							$info.append('Odbanowano gracza '+ unbanning);
							$('#banning').append($info);
							$('input[data-changing="'+unbanning+'"]').css({"display" : "block"});
							$('input[data-banning="'+unbanning+'"]').css({"display" : "block"});
							$('input[data-unbanning="'+unbanning+'"]').css({"display" : "none"});
							}
						});
					});
					
				$('input[name="changing"]').click(function(){
					var changing = $(this).data("changing");
					alert("Nakazałeś zmienić nick graczowi "+changing+" i zbanowałeś na okres 30 dni lub do zmiany nicku!");
					console.log(changing);
					$.ajax({
						url:"../controllers/admin.php",
						method:"post",
						dataType:"html",
						data:{changing:changing},
						success: function(){
							var session = document.querySelector('#changing');
							$info = $("<div class='row text-center error col-6 offset-3'></div>");
							$info.append('Nakazano zmienić nick graczowi '+ changing + ' na okres 30 dni! lub do zmiany nicku');
							$('#banning').append($info);
							$('input[data-changing="'+changing+'"]').css({"display" : "none"});
							$('input[data-banning="'+changing+'"]').css({"display" : "none"});
							$('input[data-unbanning="'+changing+'"]').css({"display" : "block"});
							}
						});
					});
