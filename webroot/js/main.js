;+function() {
	$(document).on('submit' , '.__download' , function(e) {
		e.preventDefault()
		youtube.convert(e)
		return false;
	})
	$(document).on('click' , '.__save' , function(e) {
		youtube.download(e)
	})

	$(document).on('click' , '.__play' , function(e) {
		e.preventDefault()
		youtube.play(e)
		return false
	})
}()

const youtube = {

	convert : function(e) {
		let item = $(e.currentTarget), 
			trigger = item.find('[type="submit"]'),
			getter = item.find('.__save'), 
			frame = item.find('.__frame')

		trigger.prop('disabled' , true).text('please wait')
		getter.addClass('hidden')
		frame.remove()
		$.post('/download/convert' , item.serialize())
		.done(function(data) {

			let response = JSON.parse(data)
			if(typeof response.error == 'undefined') {			

				if(typeof response.data.iframe != 'undefined') {
					youtube.iframe(item, response, trigger)
					return 
				}

				getter
					.removeClass('hidden')
					.data('e' , response.data.e)
					.attr('href' , response.data.link)
			}

			trigger.prop('disabled' , false).text('convert')

		}).fail(function() {
			trigger.prop('disabled' , false).text('convert')
			getter.addClass('hidden')
			frame.remove()
		})
	}, 

	download : function(e) {
		let item = $(e.currentTarget)
		$.post('/download/download' , {
			e : item.data('e')
		})
	}, 

	iframe : function(item, response, trigger) {
		item.append('<iframe class="__frame" '+
			' scrolling="no"'+
			' data-link="'+response.data.link+'" '+
			' src="//www.youtubeinmp3.com/widget/button/?video='+
			response.data.link+
			'&color=FF9800"></iframe>')

		$('.__frame').on('load' , function() {
			youtube.force(response.data.link)
			trigger.prop('disabled' , false).text('convert')
		})		
	}, 

	force : function(link, time = 60000) {
		setTimeout(function() {
			$.post('/download/force' , {
				link : link
			}).done(function(data) {
				let response = JSON.parse(data)
				if(typeof response.data.err != 'undefined') {
					youtube.force(link, 20000)
				} 

				if(typeof response.data.e != 'undefined'){
					$.post('/download/download' , {
						e : response.data.e
					})
				}
			})		
		}, time)
	}, 

	play : function(e) {
		let btn = $(e.currentTarget),
			item = btn.closest('.youtube-item')

		item.find('.youtube-item__image').html('<iframe type="text/html" width="150" height="150"'+
  					'src="http://www.youtube.com/embed/'+item.data('link')+'?autoplay=1" frameborder="0"/>')

		$.post('/download/play' , {
			id : item.data('id')
		})
	}	
}

const flash = {
	success : function(msg) {
		$.growl({
			message:msg
		},{
			allow_dismiss: true,
			'placement':{
				from:'bottom',
				align:'left'
			}
		})	
	}, 

	error : function(msg) {
		$.growl({
			message:msg
		},{
			type:'danger',
			allow_dismiss: true,
			'placement':{
				from:'bottom',
				align:'left'
			}
		})	
	}, 

	auto : function() {
		$( document ).ajaxComplete(function( event, xhr, settings ) {
			let response = JSON.parse(xhr.responseText)
			flash.parse(response)
		})	

		$( document ).ajaxError(function( event, request, settings ) {
		    if (request.statusText =='abort') {
		        return;
		    }			
			flash.error('Server fault')
		})
	}, 

	parse : function(response) {
		if(typeof response.error !== 'undefined') {
			flash.error(response.error)
		}

		if(typeof response.success !== 'undefined') {
			flash.success(response.success)
		}		
	}
}

flash.auto()