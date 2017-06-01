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
	
	$(document).on('submit' , '.__search' , function(e) {
		e.preventDefault()
		youtube.search(e)
		return false
	})

	$(document).on('click' , '.btn-page' , function(e) {
		youtube.search(e, $(this).data('page'))
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

		item.find('.youtube-item__image').html('<iframe type="text/html" width="266" height="150"'+
  					'src="http://www.youtube.com/embed/'+item.data('link')+'?autoplay=1" frameborder="0"/>')

		if(btn.hasClass('__not-register')) {
			return
		}

		$.post('/download/play' , {
			id : item.data('id')
		})
	}, 

	search : function(e, page = null) {
		let form = $('.__search')
			list = $('.__results'), 
			item = !1, 
			html = !1 

		list.html('<div class="m-t-15 m-b-15 text-center">loading...</div>')

		$.post('/search/find' , {
			query : form.find('[name="query"]').val(), 
			page : page
		}).done(function(data) {

			list.html('')
			let response = JSON.parse(data)

			if(!Object.keys(response.data.items).length) {
				flash.error('nothing was found')
				return 
			}

			for(let k in response.data.items) {
				item = response.data.items[k]
				html = $('.template').html()
				html = html.replace('{{id}}' , item.id)
				html = html.replace('{{id}}' , item.id)
				html = html.replace('{{id}}' , item.id)
				html = html.replace('{{thumb}}' , item.thumb) 
				html = html.replace('{{title}}' , item.title)
				html = html.replace('{{time}}' , item.time)
				list.append(html)
			}

			let paginate = '<div class="m-t-15 text-center">'
			if(response.data.prev) {
				paginate += $('.template-2').html().replace('{{page}}' , response.data.prev)
			}
			if(response.data.next) {
				paginate += $('.template-3').html().replace('{{page}}' , response.data.next)
			}			
			paginate += '</div>'

			list.append(paginate)
		}).fail(function() {
			list.html('<div class="m-t-15 m-b-15 text-center">error</div>')
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