$(document).ready(function() {
	  document.createElement('header');
      document.createElement('section');
      document.createElement('footer');
      document.createElement('nav');

	//	дефолтные фенси	
		$.extend($.fancybox.defaults, {
			padding : 0,
			maxWidth : 5555555, //'90%'
			maxHeight : 555555,
			fitToView:false,
			padding: 0,
			fixed: false,
			autoResize:false,
			autoCenter: false,
			helpers : {		
				overlay : {	
					css : {
						'background' : 'rgba(0,0,0,0.8)'
					}				
				},
				title : {
				type : 'inside'
				}
			}
		});	
		
	$('.fnc').fancybox({
		maxWidth : '90%',
		maxHeight : '90%',
		fitToView:true
	});	
	
	
	
	// видео 
	$('.youtube-video').prettyEmbed({
        videoID: '', //обязательно
        useFitVids: false,
        previewSize: 'hd',
        playerControls: false,
        playerInfo: false,
        loop:true,
        showRelated:false,
        fancyClick:false
    });

	//валидация для ие
	if($('body').hasClass('forie')) { 
	  $.validator.addClassRules({
			  namereq: {
				required: true,
				minlength: 2
			  },
			   phoneinput: {
				minlength: 18
			  }
		}); 
        $("form").each(function(){
        $(this).validate();
        });
        $.validator.messages.required = "";
        $.validator.messages.email = "";
        $.validator.messages.namereq = "";
        $.validator.messages.phoneinput = "";
        $.validator.messages.minlength = "";
	}
	
	// phonemask	
	if ($('.phoneinput').length > 0) {
		$('.phoneinput').mask('+7-(000)-000-00-00');
	}
	
	// вертикальный слайдер
	$('.vert-sl ul').bxSlider({
		mode: 'vertical',
		minSlides:3,
		maxSlides: 3,
		autoHover:true,
		infiniteLoop:false,
		pager:false,
		auto: false,
		controls:true
	}); 
	
	
	$('.sl-object.visible').each(function(){
		var counter = $(this).find('.slider-counter');
		counter.prepend('<strong class="current-index"></strong>');
		var slider = $(this).find('ul').bxSlider({
			autoHover:true,
			infiniteLoop:false,
			pager:false,
			auto: true,
			mode:'fade',
			controls:true,
			onSliderLoad: function (currentIndex){
				counter.find('.current-index').text(currentIndex + 1 + '/');
			},
			onSlideBefore: function ($slideElement, oldIndex, newIndex){
				counter.find('.current-index').text(newIndex + 1+ '/');
			}
		}); 
		counter.append(slider.getSlideCount());	
		$(this).addClass('done');
	});	
	
	$('.vert-sl a').click(function(){
		var linkData = $(this).attr('data-action');
		$('.sl-object').each(function(){
			if ($(this).attr('data-slider') == linkData){
				$('.sl-object').removeClass('visible');
				$(this).addClass('visible');
				$('.sl-object.visible').each(function(){
					if($(this).hasClass('done')){
					}else{
						var counter = $(this).find('.slider-counter');
						counter.prepend('<strong class="current-index"></strong>');
						var slider = $(this).find('ul').bxSlider({
							autoHover:true,
							infiniteLoop:false,
							pager:false,
							auto: true,
							mode:'fade',
							controls:true,
							onSliderLoad: function (currentIndex){
								counter.find('.current-index').text(currentIndex + 1 + '/');
							},
							onSlideBefore: function ($slideElement, oldIndex, newIndex){
								counter.find('.current-index').text(newIndex + 1+ '/');
							}
						}); 
						counter.append(slider.getSlideCount());
						$(this).addClass('done');
					}
				});	
			}
		});
		$('.vert-sl a').removeClass('active');
		$(this).addClass('active');
	});
	
	//  слайдер услуги
	$('.our-slider ul').bxSlider({
		minSlides:4,
		maxSlides: 4,
		slideWidth: 55555,
		slideMargin: 22,
		autoHover:true,
		infiniteLoop:true,
		pager:true,
		auto: true,
		controls:true,
		hideControlOnEnd:true
	}); 
	
	// слайдер карточка товара
	$('.slider-top ul').bxSlider({
		pagerCustom: '.slider-page',
		infiniteLoop:true,
		auto: true,
		controls:true,
		hideControlOnEnd:true
	});
	
	
	$('.news-item').dotdotdot();
	
	
	$('.mini.sec .right').each(function(){
		var fin = $(this).closest('.vop-row').find('.final');
		if($(this).height() == 76){
			 $(this).dotdotdot();
			 fin.show();
		}
	});
	
	$('.button.vo').click(function(){
		var item = $(this).closest('.vop-row').find('.right');
		if($(this).hasClass('down')){
			item.removeClass('open');
			$(this).removeClass('down');
			item.dotdotdot();
			$(this).html('Развернуть');
		}else{
			item.addClass('open');
			item.trigger("destroy");
			$(this).addClass('down');
			$(this).html('Свернуть');
		}
	});
	
	// right-menu
	if($('.right-menu').length > 0){
		$('.right-menu ul li').each(function(){
			if($(this).find('ul').length > 0){	
				$(this).addClass('hasul');
				$('<div class="arrow"></div>').insertBefore($(this).find('>a'));
			}
		}); 		
	}
	
	// правое меню открытие
	$('.right-menu>ul>li.hasul>a').click(function(){
		var item = $(this).parent('li');
		var ul = item.find('ul');
		if(item.hasClass('opened')){
			item.removeClass('opened');
		}else{
			item.addClass('opened');
		}
		return false;
	});
	
	$('.right-menu>ul>li>ul>li.hasul>a').click(function(){
		var item = $(this).parent('li');
		var ul = item.find('ul');
		if(item.hasClass('opened')){
			item.removeClass('opened');
		}else{
			item.addClass('opened');
		}
		return false;
	});
	
	
	// вакансия
	$('.vac-top').click(function(){
		var item = $(this).closest('.vac-item');
		if(item.hasClass('opened')){
			item.removeClass('opened');
		}else{
			item.addClass('opened');
		}
	});
	
	// свидетельства 
	$('.sv-op').click(function(){
		var item = $(this).closest('.svid').find('.svid-alb');
		if(item.hasClass('opened')){
			item.removeClass('opened');
			$(this).html('Развернуть');
			$(this).removeClass('op');
		}else{
			item.addClass('opened');
			$(this).html('Свернуть');
			$(this).addClass('op');
		}
	});
	
	//select
	$('select').each(function(){	
		$(this).selectize({
			 create: true,
			sortField: {
				field: 'text',
			}
		});
	});  
	
	//валидация для ие
	if($('body').hasClass('forie')) { 
	  $.validator.addClassRules({
			  namereq: {
				required: true,
				minlength: 2
			  },
			   phoneinput: {
				minlength: 18
			  }
		}); 
        $("form").each(function(){
        $(this).validate();
        });
        $.validator.messages.required = "";
        $.validator.messages.email = "";
        $.validator.messages.namereq = "";
        $.validator.messages.phoneinput = "";
        $.validator.messages.minlength = "";
	}
	
	// переключение в карточке товара
	$('.n-char a').click(function(){
		var item = $(this).attr('data-item');
		$('.n-char-body').removeClass('showed');
		$(this).closest('.new-char').find("[data-item='" + item + "']").addClass('showed');
		$(this).closest('.new-char').find('.n-char a').removeClass('active');
		$(this).addClass('active');
		return false;
	});
	
	// сообщение об отправке
		/*
		$.fancybox($('#dones'));
		 setTimeout(function(){
                 $.fancybox.close();
            },1500);
		*/
});