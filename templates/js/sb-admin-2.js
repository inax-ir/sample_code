function display_tooltip(type,fieldid){
	var bfieldh = $('.bulb-'+fieldid).height();
	var first_top = (bfieldh/2) + 50;
	var last_top = (bfieldh/2) + 26;
	var fieldw = $('#'+fieldid).width();
	var last_right = fieldw + 37;
	if(type ==1){
		$('.bulb-'+fieldid).stop().animate({
			marginTop:'-'+first_top+'px',
			marginRight:last_right+'px'
			},1).animate({
			marginTop:'-'+last_top+'px',
			opacity:'1'
		},300).stop();
	}
	else{
		var first_top = (bfieldh/2) + 50;
		$('.bulb-'+fieldid).stop().animate({
			marginTop:'-'+first_top+'px',
			marginRight:last_right+'px',
			opacity:'0'
		},300);
	}
}
function validateForm() {
	var inputs = document.getElementsByClassName("field");
	for (var i = 0; i < inputs.length; i++) {
		if(inputs[i].hasAttribute("isrequire") && (inputs[i].value == null || inputs[i].value == "")){
			var fieldid = inputs[i].id;
			display_tooltip(1,fieldid);
			$('.bulb-'+fieldid).addClass("error");
			$('html, body').animate({
				scrollTop: $('.bulb-'+fieldid).offset().top
			}, 300);
			return false;
		}
		if(inputs[i].hasAttribute("maxlength") && (inputs[i].value).length != inputs[i].getAttribute('maxlength')){
			var fieldid = inputs[i].id;
			var t_title = $('.bulb-'+fieldid+' .t_title').text();
			if((inputs[i].value).length > inputs[i].getAttribute('maxlength')){
				var errtxt = t_title+' نمی تواند بیشتر از '+inputs[i].getAttribute('maxlength')+' کاراکتر باشد';
			}
			else{
				var errtxt = t_title+' نمی تواند کمتر از '+inputs[i].getAttribute('maxlength')+' کاراکتر باشد';
			}
			if(inputs[i].name == 'phonenumber' && (inputs[i].value).substr(0, 2) != '09'){
				var errtxt = 'شماره همراه وارد شده صحیح نمی باشد';
			}
			$('.bulb-'+fieldid).addClass("error");
			$('.bulb-'+fieldid+' .t_content').text(errtxt);
			display_tooltip(1,fieldid);
			$('html, body').animate({
				scrollTop: $('.bulb-'+fieldid).offset().top
			}, 300);
			return false;
		}
	}
}

$(document).ready(function(){
    $(".cfield").each(function(){
		var fieldid = $(this).get(0).id;
		var bfieldh = $('.bulb-'+fieldid).height();
		var first_top = (bfieldh/2) + 50;
		var last_top = (bfieldh/2) + 26;
		var fieldw = $('#'+fieldid).width();
		var last_right = fieldw + 37;
		$('.bulb-'+fieldid).animate({
		marginTop:'-'+first_top+'px',
		marginRight:last_right+'px'
		},1);
    });
    $('.cfield').mouseenter(function(){
		var fieldid = $(this).get(0).id;
		if(fieldid == 'shahr'){
			var field_canedit = this.getAttribute('canedit');
			if(field_canedit == '1'){
				display_tooltip(1,fieldid);
			}
		}
		else{
			display_tooltip(1,fieldid);
		}
	});
    $('.cfield').focus(function(){
		var fieldid = $(this).get(0).id;
		if(fieldid == 'shahr'){
			var field_canedit = this.getAttribute('canedit');
			if(field_canedit == '1'){
				display_tooltip(1,fieldid);
				$('.bulb-'+fieldid).removeClass("error");
			}
		}
		else{
			display_tooltip(1,fieldid);
			$('.bulb-'+fieldid).removeClass("error");
		}
	});
    $('.cfield').mouseleave(function(){
		var fieldid = $(this).get(0).id;
		//display_tooltip(2,fieldid);
		if ($("#"+fieldid).is(":focus")) {
			
		}
		else{
			display_tooltip(2,fieldid);
		}
	});
    $('.cfield').blur(function(){
		var fieldid = $(this).get(0).id;
		display_tooltip(2,fieldid);
	}); 
});
$(function() {

   // $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse')
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse')
        }

        height = (this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
			height = $(document).height();
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    })
})
