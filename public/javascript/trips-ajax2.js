
$(document).ready(function(){
			$('#czas').load("../controllers/trips.php", function(){
				var czas = $(this).data("czas");
				console.log("czas");		
				$.ajax({
					url:"../controllers/trips.php",
					method:"post",
					dataType:"html",
					data:{czas:czas},
					success: function(data)
					{
						console.log(data);
						$('.button').val("Wyruszyłeś już na wyprawę!")
						.attr("disabled", "disabled")
						.css({
						"backgroundColor": "#DB9370",
						"cursor": "not-allowed"});							
						var zegarr = setInterval(function() {		
						var date1 = new Date().getTime();
						var date2 = data;
						var diff = date2 - date1;
						console.log(diff);
						
						var tekst = document.querySelector('#tekst');
						$('#tekst').addClass('success col-6 offset-3');
						ekspedycja = ['z poszukiwaniem jadeitów', 'z poszukiwaniem kryształów', 'z poszukiwaniem painitów', 'z poszukiwaniem fluorytów', 'z poszukiwaniem morganitów', 'z poszukiwaniem akwamarynów', 'z poszukiwaniem opali', 'z poszukiwaniem pereł', 'z poszukiwaniem cymofanów'];
						for(var i = 0; i<12; i++)
						{
							var e = ekspedycja[i];
							if (czas-1 == i){break;}
						}
						tekst.textContent = "W tej chwili wykonujesz wyprawę "+e;
						var time = document.querySelector('#trip');
						$form = $("<form method='post' action='../controllers/trips.php'></form>");
						$form.append('<input type="submit" name="stopTrip" value="Przerwij wyprawę!">');
						$form.addClass('row col-6 offset-3');
						$('#tekst').append($form);
						
						var time = document.querySelector('#czas');		
						if(diff<1)
						{
							time.textContent = "Twoja wyprawa została zakończona!"	
							var reload = setInterval(function() {
								location.reload(); 
							}, 2000);
						}
						else
						{
							if(diff<60000)
							{	
								var czasKoniec = "Pozostało "+Math.round(diff/1000)+" sekund do zakonczenia wyprawy";					
								time.textContent = czasKoniec;		
							}
							else if(diff>3600000)
							{
								var hours = Math.floor(diff / 3600000);
								var minutes = Math.floor(diff / 60000 % 60);
								var seconds = ((diff % 60000) / 1000).toFixed(0);
								var czasKoniec = "Pozostało "+hours+" godzin, "+minutes+" minut oraz "+seconds+" sekund do zakonczenia wyprawy";					
								time.textContent = czasKoniec;											
							}	
							else if(diff>60000)
							{
								var minutes = Math.floor(diff / 60000);
								var seconds = ((diff % 60000) / 1000).toFixed(0);
								var czasKoniec = "Pozostało "+minutes+" minut oraz "+seconds+" sekund do zakonczenia wyprawy";					
								time.textContent = czasKoniec;											
							}	
						}							
					}, 1000);
				}
			});			
		});
	});
