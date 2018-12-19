$(document).ready(function(){
				$('input[name="zadanie"]').click(function(){
					alert("Zadanie zostało rozpoczęte!");
					var zadanie = $(this).data("zadanie");
					console.log(zadanie);
					$.ajax({
						url:"../controllers/expeditions.php",
						method:"post",
						dataType:"html",
						data:{zadanie:zadanie},
						success: function(data){
							console.log(data),
							$('.buttonStart').val("Obecnie trwa inna ekspedycja")
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
								$('#tekst').addClass('success col-12 col-sm-8 col-md-6 offset-sm-2 offset-md-3');
								ekspedycja = ['z poszukiwaniem bursztynów', 'z poszukiwaniem agatów', 'z poszukiwaniem malachitów', 'z poszukiwaniem turkusów', 'z poszukiwaniem ametystów', 'z poszukiwaniem topazów', 'z poszukiwaniem szmaragdów', 'z poszukiwaniem rubinów', 'z poszukiwaniem szafirów', 'z poszukiwaniem diamentów','z poszukiwaniem srebra', 'z poszukiwaniem złota'];
								for(var i = 0; i<12; i++)
								{
									var e = ekspedycja[i];
									if (zadanie-1 == i){break;}
								}
								tekst.textContent = "W tej chwili wykonujesz ekspedycję "+e;
								var expedition = document.querySelector('#expedition');
								$form = $("<form method='post' action='../controllers/expeditions.php'></form>");
								$form.append('<input type="submit" name="stopExpedition" value="Przerwij ekspedycje!">');
								$form.addClass('row col-6 offset-3');
								$('#tekst').append($form);
								expedition.textContent = "Szukamy minerałów by być jeszcze bogatszym!";
								var time = document.querySelector('#time');		
								if(diff<1)
								{
									expedition.textContent = "Twoja ekspedycja została zakończona!"	
									$('.button').show();
									var reload = setInterval(function() {
										location.reload(); 
									}, 2000);
								}
								else
								{
									if(diff<60000)
									{	
										var czasKoniec = "Pozostało "+Math.round(diff/1000)+" sekund do zakonczenia ekspedycji";					
										time.textContent = czasKoniec;		
									}
									else if(diff>3600000)
									{
										var hours = Math.floor(diff / 3600000);
										var minutes = Math.floor(diff / 60000 % 60);
										var seconds = ((diff % 60000) / 1000).toFixed(0);
										var czasKoniec = "Pozostało "+hours+" godzin, "+minutes+" minut oraz "+seconds+" sekund do zakończenia ekspedycji.";					
										time.textContent = czasKoniec;											
									}	
									else if(diff>60000)
									{
										var minutes = Math.floor(diff / 60000);
										var seconds = ((diff % 60000) / 1000).toFixed(0);
										var czasKoniec = "Pozostało "+minutes+" minut oraz "+seconds+" sekund do zakończenia ekspedycji.";					
										time.textContent = czasKoniec;											
									}	

								}									
							}, 1000);
						}
					});
				});
			});
