
$(document).ready(function() {
    $(".Button_menu").click(function(){
        if($(".menu").css("display") == "none")
        $(".menu").animate({height: "show"}, 500);
        else
            $(".menu").animate({height: "hide"}, 500);
            
        
    });
   
    
	//Таймер обратного отсчета
	//Документация: http://keith-wood.name/countdown.html
	//<div class="countdown" date-time="2015-01-07"></div>
	var austDay = new Date($(".countdown").attr("date-time"));
	$(".countdown").countdown({until: austDay, format: 'yowdHMS'});

	//Попап менеджер FancyBox
	//Документация: http://fancybox.net/howto
	//<a class="fancybox"><img src="image.jpg" /></a>
	//<a class="fancybox" data-fancybox-group="group"><img src="image.jpg" /></a>
	$(".fancybox").fancybox();
    $("#add_ew_btn").fancybox({
        titlePosition     : 	'inside',
        transitionIn      : 	'none',
        transitionOut   : 	'none',
        height              : 	'auto',
        width               : 	'auto',
        afterLoad		:	function() {
            CKEDITOR.replace('new_project');
        },
        beforeClose	:	function() {
            CKEDITOR.instances.new_project.destroy();
        }
    });


	//Навигация по Landing Page
	//$(".top_mnu") - это верхняя панель со ссылками.
	//Ссылки вида <a href="#contacts">Контакты</a>
	$(".top_mnu").navigation();

	//Добавляет классы дочерним блокам .block для анимации
	//Документация: http://imakewebthings.com/jquery-waypoints/
	$(".block").waypoint(function(direction) {
		if (direction === "down") {
			$(".class").addClass("active");
		} else if (direction === "up") {
			$(".class").removeClass("deactive");
		};
	}, {offset: 100});

	//Плавный скролл до блока .div по клику на .scroll
	//Документация: https://github.com/flesler/jquery.scrollTo
	$("a.scroll").click(function() {
		$.scrollTo($(".div"), 800, {
			offset: -90
		});
	});

	//Каруселька
	//Документация: http://owlgraphic.com/owlcarousel/
	var owl = $(".carousel");
	owl.owlCarousel({
		items : 4
	});
	owl.on("mousewheel", ".owl-wrapper", function (e) {
		if (e.deltaY > 0) {
			owl.trigger("owl.prev");
		} else {
			owl.trigger("owl.next");
		}
		e.preventDefault();
	});
	$(".next_button").click(function(){
		owl.trigger("owl.next");
	});
	$(".prev_button").click(function(){
		owl.trigger("owl.prev");
	});

	//Кнопка "Наверх"
	//Документация:
	//http://api.jquery.com/scrolltop/
	//http://api.jquery.com/animate/
	$("#top").click(function () {
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	//Аякс отправка форм
	//Документация: http://api.jquery.com/jquery.ajax/
	$("#request_fre_quote_now").submit(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name = $('#name').val();
        var phone = $('#telephone').val();
        var skyp = $('#skype').val();
        var email = $('#email').val();
        var text = $('#Requirements').val();


        var datastring = "name="+name+"&email="+email+"&skype="+skyp+"&telephone="+phone+"&Requirements="+text;
        $.ajax({
			type: "post",
			url: "/",
			data: datastring
		}).done(function(data) {
			alert("Thenks you for request!")
            $('#name1').val("");
            $('#telephone').val("");
             $('#skype').val("");
            $('#email1').val("");
            $('#Requirements').val("");
		});
		return false;
    });
	$('#name').on('keyup',function (){
		var value = $(this).val();
        $.ajax({
            type: "get",
            url: "/quote/searcch",
            data:{
            	'search': value,
				'name' :  'name'
			}
        }).done(function(data) {
        	console.log(data);
        	$('tbody').html(data);

		});

	})
    $('#creat').on('keyup',function (){
        var value = $(this).val();
        $.ajax({
            type: "get",
            url: "/quote/searcch",
            data:{
                'search': value,
                'name' :  'created_at'
            }
        }).done(function(data) {
            console.log(data);
            $('tbody').html(data);

        });

    })
    $('#email').on('keyup',function (){
        var value = $(this).val();
        $.ajax({
            type: "get",
            url: "/quote/searcch",
            data:{
                'search': value,
                'name' :  'email'
            }
        }).done(function(data) {
            $('tbody').html(data);

        });

    })
    $('.li a').click(function () {
        $('.activ').removeClass('activ');
        $(this).addClass('activ');
    })

});