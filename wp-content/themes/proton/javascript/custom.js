		jQuery.noConflict();
		jQuery(document).ready(function($) {	
			$('a.scrollTop').click(function(){ // Scroll to Top
				$('html, body').animate({scrollTop:0}, 'slow');
			});
			

			$("#menu .sub-menu a").hover(
				function() {
						$(this).stop().animate({ backgroundColor: "#18bafc"}, 800);
					},
					function() {
						$(this).stop().animate({ backgroundColor: "#353535" }, 200);
					});
					
			$("#latest_content article").hover(
				function() {
						$(this).stop().animate({ backgroundColor: "#f0f0f0"}, 400);
					},
					function() {
						$(this).stop().animate({ backgroundColor: "#ffffff" }, 200);
					});
					
			$("#latest_content article.featured").hover(
				function() {
						$(this).stop().animate({ backgroundColor: "#fedea2"}, 600);
						$(this).find("header").stop().animate({ backgroundColor: "#fedea2"}, 600);
						$(this).find(".featured_desc").stop().animate({ backgroundColor: "#fedea2"}, 600);
					},
					function() {
						$(this).stop().animate({ backgroundColor: "#ffffff" }, 200);
						$(this).find("header").stop().animate({ backgroundColor: "#f2f2f2"}, 200);
						$(this).find(".featured_desc").stop().animate({ backgroundColor: "#f2f2f2"}, 200);						
					});
					
				var currentTallest = 0;
				$("#latest_content article h3").each(function() {
					if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
				});
					$("#latest_content article h3").height(currentTallest);
				
				var currentTallest = 0;
				$("#latest_content article").each(function() {
					if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
				});
					$("#latest_content article").height(currentTallest);

		
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
		
		
		jQuery("ul.menu li:last-child").addClass("last-child");
		jQuery("ul.menu li:first-child").addClass("first-child");