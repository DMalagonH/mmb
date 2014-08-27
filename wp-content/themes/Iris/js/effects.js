jQuery(document).ready(function() {
	jQuery('.squarebanner li:nth-child(even)').addClass('rbanner');
	jQuery('#newtabs> ul').tabs({ fx: {  opacity: 'toggle' } }); 
	jQuery('#menu ul.sfmenu,#submenu ul.sfmenu').superfish({ 
		delay:       200,								// 0.1 second delay on mouseout 
		animation:   {opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	
});