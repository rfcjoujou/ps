$(function(){



	$('.change_information').on('click', function() {
		alert('Entrou');
		var conta = $('.information input').each();

		alert(conta);
	});

	$('.submit_edit').on('click', function(e) {
		

	
	});

	$('.addtocartfrom button').on('click', function(e) {
		e.preventDefault();

		var qt = parseInt($('.addtocart_qt').val()); 

		

		var action = $(this).attr('data-action');
		
		
		if(action == 'decrease') {
			
			if(qt-1 >= 50) {
				
				qt = qt - 1;
				
			}
		} 
		else if(action == 'increase') {
			
			qt = qt + 1;
			
		}

		
		$('.addtocart_qt').val(qt);
		$('input[name=qt_product').val(qt);

	});

	$('.photo_item').on('click', function() {
		var url = $(this).find('img').attr('src');


		$('.mainphoto').find('img').attr('src', url);
	});


	/*$('.setas_next').on('click', function() {
		var url_principle = $('.mainphoto').find('img').attr('src');
		var url_secundary = $('.photo_item').find('img').attr('src');

		


		var each  = $('.photo_item img').each(function(index, element) {

			
		});


		var imgs = each.find('img');

		//console.log(url_principle);
		var arrayElementos = imgs;
		console.log(arrayElementos);
		
			

		for(var q=0;q<=10;q++) {
			
			console.log($arrayElementos[q][qt]
			if(url_principle == arrayElementos[q][qt]) {
				

				console.log('entrou');
			}
		}

	}); */

	$('.filterarea').find('input').on('change', function() {
		$('.filterarea form').submit();

		
	});

	$('.filter_item a').on('click', function(e) {
		e.preventDefault();
		var value_Id = $(this).val('id');
		
		$('.filter_item').find("input[id=value_Id]").attr('checked', true);

		

		

	});
	/* Plugin de mascara ativado no projeto (mask plugin[o nome])*/

	$('input[name=cnpj]').mask('00.000.000-0000/00');
});