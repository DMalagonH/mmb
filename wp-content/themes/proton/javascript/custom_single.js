		jQuery.noConflict();
		jQuery(document).ready(function($) {
			$("ul.menu li:last-child").addClass("last-child");
			$("ul.menu li:first-child").addClass("first-child");
			$('.form_text').focus(function () { // Clear default text in comment input field
				if ($(this).val() == $(this).attr("title")) {
					$(this).val("");
				}
			}).blur(function () {
				if ($(this).val() == "") {
					$(this).val($(this).attr("title"));
				}
			});
	
			$("#menu .sub-menu a").hover(
				function() {
						$(this).stop().animate({ backgroundColor: "#18bafc"}, 800);
					},
					function() {
						$(this).stop().animate({ backgroundColor: "#353535" }, 200);
					});
					
			// Sidebar fix height
			if ( $('.post_container').height() >  $('#sidebar_right').height() ) {
			$('#sidebar_right').height($('.post_container').height() - 200);
			}
			if ( $('.post_container').height() >  $('#sidebar_left').height() ) {
			$('#sidebar_left').height($('.post_container').height() - 200);
			}
			$('.sidebar-widget:first').css('margin-top',-195)
			
			$(".share_post").hover(function() { // Share Post
				$(this).find(".share").slideToggle("fast");
			},
			function() {
				$(this).find(".share").slideToggle("fast");
			});

			$("a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'}); // Lightbox

			$(".post_thumbnail a").hover(
			function() {
					$(this).find("img").stop().animate({opacity:0.5},400);
				},
				function() {
					$(this).find("img").stop().animate({opacity:1},400);
				});

			$(".sidebar-widget li").hover(function() {
                $(this).stop().animate({ backgroundColor: "#ffcca2"}, 500);
                },function() {
                $(this).stop().animate({ backgroundColor: "#ffffff" }, 200);
                });
				
			$("a.buttonshortcode").hover(
			function() {
					   if($.browser.msie){
					   }else{
						  $(this).stop().animate({opacity:0.8},300);
					   }
				},
				function() {
					   if($.browser.msie){
					   }else{
						  $(this).stop().animate({opacity:1},200);
					   }
				});

		
			$('a.scrollTop').click(function(){ // Scroll to Top
				$('html, body').animate({scrollTop:0}, 'slow');
			});
			
			
			$("a.toggle").click(function() {
				$(this).next(".toggle_content").slideToggle("slow");
				$(this).toggleClass("toggle_active");
			},
			function() {
				$(this).next(".toggle_content").slideToggle("fast");
			});
			
			// Portfolio header fix height
			var currentTallest = 0;
			$(".portfolio h2").each(function() {
					if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
			});
			$(".portfolio h2").height(currentTallest);

		});
		/*********************
		//* jQuery Multi Level CSS Menu #2- By Dynamic Drive: http://www.dynamicdrive.com/
		//* Last update: Nov 7th, 08': Limit # of queued animations to minmize animation stuttering
		//* Menu avaiable at DD CSS Library: http://www.dynamicdrive.com/style/
		*********************/
		var jqueryslidemenu={

		animateduration: {over: 100, out: 100},

		buildmenu:function(menuid){
			jQuery(document).ready(function($){
				var $mainmenu=$("#"+menuid+">ul")
				var $headers=$mainmenu.find("ul").parent()
				$headers.each(function(i){
					var $curobj=$(this)
					var $subul=$(this).find('ul:eq(0)')
					this._dimensions={w:this.offsetWidth, h:this.offsetHeight, subulw:$subul.outerWidth(), subulh:$subul.outerHeight()}
					this.istopheader=$curobj.parents("ul").length==1? true : false
					$subul.css({top:this.istopheader? this._dimensions.h+"px" : 0})
					
					var $targetul=$(this).children("ul:eq(0)")
					this._offsets={left:$(this).offset().left, top:$(this).offset().top}
					var menuleft=this.istopheader? 0 : this._dimensions.w
					menuleft=(this._offsets.left+menuleft+this._dimensions.subulw>$(window).width())? (this.istopheader? -this._dimensions.subulw+this._dimensions.w : -this._dimensions.w) : menuleft
					if ($targetul.queue().length<=1) //if 1 or less queued animations
						if(menuleft==0){
							$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).removeClass("menuright")
						}
						if(menuleft!=0 && this.istopheader){
							$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).addClass("menuright")
						}else{
							$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).removeClass("menuright")
						}
						
					$curobj.hover(
						function(e){
							var $targetul=$(this).children("ul:eq(0)")
							this._offsets={left:$(this).offset().left, top:$(this).offset().top}
							var menuleft=this.istopheader? 0 : this._dimensions.w
							menuleft=(this._offsets.left+menuleft+this._dimensions.subulw>$(window).width())? (this.istopheader? -this._dimensions.subulw+this._dimensions.w : -this._dimensions.w) : menuleft
							if ($targetul.queue().length<=1) //if 1 or less queued animations
								if(menuleft==0){
									$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).removeClass("menuright").slideDown(jqueryslidemenu.animateduration.over)
								}
								if(menuleft!=0 && this.istopheader){
									$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).addClass("menuright").slideDown(jqueryslidemenu.animateduration.over)
								}else{
									$targetul.css({left:menuleft+"px", width:this._dimensions.subulw+'px'}).removeClass("menuright").slideDown(jqueryslidemenu.animateduration.over)
								}
						},
						function(e){
							var $targetul=$(this).children("ul:eq(0)")
							$targetul.slideUp(jqueryslidemenu.animateduration.out)
						}
					) //end hover
					$curobj.click(function(){
						$(this).children("ul:eq(0)").hide()
					})
				}) //end $headers.each()
				$mainmenu.find("ul").css({display:'none', visibility:'visible'})
			}) //end document.ready
		}
		}
		//build menu with ID="mainmenu" on page:
		jqueryslidemenu.buildmenu("menu")