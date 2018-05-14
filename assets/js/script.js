(function ($) {
	$(function(){

		var page = 0;

		$('table').on('click','.changeNew', function(){
			var id = $(this).data('id'); // или attr('data-id')
			var oldNew = $(this).attr('data-new');
			var elem = $(this);
			$.ajax({
				type:'POST',// каким видом передаем
				url: url_path+'/book/changeNew',// куда передаем
				data: { // что именно передаем
					id_book: id,
					new_book: oldNew,
				},
				success: function(data){ // событие, при успешном получении данных
					if(data==1)
					{
						console.log(data);
						elem.toggleClass('text-success' || 'text-danger');
						oldNew = (oldNew==1)?'0':'1';
						elem.attr('data-new', oldNew);
					}
				}
			});

		});

		$(window).scroll(function(e){
			var scroll_Top = $(window).scrollTop();
			var height_window = $(window).height();
			var height_body = $('body').height();

			if(scroll_Top+height_window>=height_body && !$('body').hasClass('load')){
				page++;
				$('body').addClass('load');
				$.ajax({
					type:'POST',
					url: url_path+'/book/nextPage',
					data: 
						{ 
							page: page
						},
					success: function(data)
					{
						$('body').removeClass('load');
			 				 var books = JSON.parse(data);
			 				 var str='';

						for (var i = 1;i<books.length; i++){
							str+='<tr>';
			 				 	str+='<td>'+(page*30+i)+'</td>';
			 				 	str+='<td>'+books[i].name+'</td>';
			 				 	str+='<td>'+books[i].price+'</td>';

			 				 	str+= '<td> <span class="changeNew glyphicon glyphicon-ok'+((books[i].new == 1)?'text-success':'')+'" data-id="'+books[i].id+'" data-new="'+books[i].new+'"></span></td>';

			 				 	
			 				 	str+='<td>'+(books[i].category==null?'':books[i].category)+'</td>';
			 				 	str+='<td>'+books[i].themes+'</td>';
			 				 	str+='<td><a href="'+url_path+'/book/delete?id='+books[i].id+'" class="glyphicon glyphicon-remove text-danger"></a></td>';
			 				 	str+='</tr>';
						}


							
						$('table').append(str);
						
					}
				})
			}
		});

		$('.save-pdf').click( function(){
			$.ajax({
				type:'POST',// каким видом передаем
				url: url_path+'/user/pdfCreate',// куда передаем
				
				success: function(data)
				{
					alert('Save');
				}
			})
		});

		$('#email').on('blur', function(){
			var email = $(this).val();
			$.ajax({
				type:'POST',// каким видом передаем
				url: url_path+'/user/chekEmail',// куда передаем (controller)/method
				data: { // что именно передаем
					new_email: email,
					
				},
				success: function(data)
				{
					
					if(data!=0) alert('SORY!');
					else alert('EEEhh!');
				}
			})
		});
			
	})

})(jQuery)