	
				$('input[name="banning"]').on('click', function(){
					alert("Zbanowałeś gracza!");
					var banning = $(this).data("banning");
					console.log(banning);
					$.ajax({
						url:"../controllers/admin.php",
						method:"post",
						dataType:"html",
						data:{banning:banning},
						success: function(){
							var session = document.querySelector('#banning');
							$info = $("<div class='row success col-6 offset-3'></div>");
							$info.append('Zbanowano gracza '+ banning);
							$('#banning').append($info);
							$('input[data-banning="'+banning+'"]').attr("name", 'unbanning');
							$('input[data-banning="'+banning+'"]').val('odbanuj');
							$('input[data-banning="'+banning+'"]').attr('data-unbanning', ''+banning+'');
							$('input[data-banning="'+banning+'"]').removeAttr("data-banning");
							}
						});
					});
				

				$('input[name="unbanning"]').on('click', function(){
					alert("Odbanowałeś gracza!");
					var unbanning = $(this).data("unbanning");
					console.log(unbanning);
					$.ajax({
						url:"../controllers/admin.php",
						method:"post",
						dataType:"html",
						data:{unbanning:unbanning},
						success: function(){
							var session = document.querySelector('#banning');
							$info = $("<div class='row success col-6 offset-3'></div>");
							$info.append('Odbanowano gracza '+ unbanning);
							$('#banning').append($info);
							$('input[data-unbanning="'+unbanning+'"]').attr("name", 'banning');
							$('input[data-unbanning="'+unbanning+'"]').val('zbanuj');
							$('input[data-unbanning="'+unbanning+'"]').attr('data-banning', ''+unbanning+'');
							$('input[data-unbanning="'+unbanning+'"]').removeAttr("data-unbanning");
							}
						});
					});
					
				$('input[name="changing"]').click(function(){
					var changing = $(this).data("changing");
					console.log(changing);
					$.ajax({
						url:"../controllers/admin.php",
						method:"post",
						dataType:"html",
						data:{changing:changing},
						success: function(){
							var session = document.querySelector('#changing');
							$info = $("<div class='row success col-6 offset-3'></div>");
							$info.append('Nakazano zmienić nick graczowi '+ changing);
							$('#banning').append($info);
							}
						});
					});
