///////////////////////////////		
// Set Variables
///////////////////////////////

var gridContainer = jQuery('.thumbs');
var colW;
var gridGutter = 0;
var thumbWidth = 350;
var themeColumns = 3;
var catptionOffset = -20;
var stickyNav = jQuery('#header .bottom .surround');
var stickyNavOffsetTop;
var topOffest = (jQuery('body').hasClass('admin-bar')) ? 28 : 0;
var OS;

///////////////////////////////		
// Mobile Detection
///////////////////////////////

function isMobile(){
    return (
        (navigator.userAgent.match(/Android/i)) ||
		(navigator.userAgent.match(/webOS/i)) ||
		(navigator.userAgent.match(/iPhone/i)) ||
		(navigator.userAgent.match(/iPod/i)) ||
		(navigator.userAgent.match(/iPad/i)) ||
		(navigator.userAgent.match(/BlackBerry/))
    );
}

///////////////////////////////
// Mobile Nav
///////////////////////////////

function setMobileNav(){
	jQuery('#mainNav .sf-menu').tinyNav({
		header: 'MENU',
	    active: 'current-menu-item'
	});	
}

///////////////////////////////
// Project Filtering 
///////////////////////////////

function projectFilterInit() {
	jQuery('#filterNav a').click(function(){
		var selector = jQuery(this).attr('data-filter');		
		jQuery('#projects .thumbs').isotope({
			filter: selector,			
			hiddenStyle : {
		    	opacity: 0,
		    	scale : 1
			}
		});
	
		if ( !jQuery(this).hasClass('selected') ) {
			jQuery(this).parents('#filterNav').find('.selected').removeClass('selected');
			jQuery(this).addClass('selected');
		}
	
		return false;
	});	
}


///////////////////////////////
// Project thumbs 
///////////////////////////////

function projectThumbInit() {	
	setColumns();	
	gridContainer.isotope({		
		resizable: false,
		layoutMode: 'fitRows',
		masonry: {
			columnWidth: colW
		}
	});	
	
	jQuery(".thumbs .small").css("visibility", "visible");		
}

///////////////////////////////
// Isotope Grid Resize
///////////////////////////////

function setColumns()
{	
	var columns;
	var gw = gridContainer.width();
	if(gw<=700){
		columns = 2;			
	}else if(gw<=1700){
			columns = 3;			
	}else{
		columns = 6;		
	}
	colW = Math.floor(gw / columns);		
	jQuery('.thumbs .small').each(function(id){
		jQuery(this).css('width',colW+'px');			
	});	
	jQuery('.thumbs .small').show();
}

function gridResize() {	
	setColumns();
	gridContainer.isotope({		
		resizable: false,
		layoutMode: 'fitRows',
		masonry: {
			columnWidth: colW
		}
	});
}

///////////////////////////////
// Set Home Slideshow Height
///////////////////////////////

function setHomeSlideshowHeight() {
	var windowHeight = jQuery(window).height()-topOffest;	
	jQuery('.home .slideshow').height(windowHeight);
	jQuery('.home .slideshow .slide').height(windowHeight);
	jQuery('.home #header .top').height(windowHeight);	
	jQuery('.home .slideshow .flex-direction-nav').css('top', (windowHeight/2)-15 );
	jQuery('.home .slideshow .flex-control-nav').css('top', windowHeight-40 );
}

///////////////////////////////
// Center Home Slideshow Text
///////////////////////////////

function centerFlexCaption() {
	jQuery('.home .slideshow .details').each(function(id){		
		jQuery(this).css('margin-top','-'+((jQuery(this).actual('height')/2)-catptionOffset)+'px');	
		jQuery(this).show();	
	});	
}

///////////////////////////////
// Sticky Nav
///////////////////////////////

function initStickyNav() {	
	if(!stickyNav.hasClass('stuck')){
		if (jQuery('#stickyNavWrap') != null ) {
			stickyNav.wrap('<div id="stickyNavWrap" />');
		}
		jQuery('#stickyNavWrap').css('height', stickyNav.height() );
		jQuery('#header .bottom').css('height', stickyNav.height() );
		stickyNavOffsetTop = stickyNav.offset().top;		
	}	
}

function setStickyNav() {
	jQuery('#stickyNavWrap').css('height', stickyNav.height() );
	jQuery('#header .bottom').css('height', stickyNav.height() );	
	var scrollTop = jQuery(window).scrollTop(); // our current vertical position from the top
	
	// if we've scrolled more than the navigation, add the 'stuck' class, otherwise remove the class
	if (scrollTop + topOffest > stickyNavOffsetTop) { 
		stickyNav.addClass('stuck');
	} else {
		stickyNav.removeClass('stuck');		
	}
}

///////////////////////////////
// Home Slideshow Parallax
///////////////////////////////

function homeParallax(){
	if(jQuery('body').hasClass('home')){	
		var top = jQuery(this).scrollTop();			
		jQuery('.home .slideshow .details').css('transform', 'translateY(' + (top/-3) + 'px)');	
		jQuery('.home .slideshow .slide').css({'background-position' : 'center ' + (-top/6)+"px"});		
	}	
}


///////////////////////////////
// Initialize
///////////////////////////////	
	
jQuery.noConflict();
jQuery(window).load(function(){		
	setHomeSlideshowHeight();
	centerFlexCaption();
	projectThumbInit();	
	projectFilterInit();
	centerFlexCaption();
	
	if(!isMobile()){
		initStickyNav()	
		setStickyNav();
		homeParallax();	
	}	
	
	jQuery(".videoContainer").fitVids();	
	
	jQuery(window).smartresize(function(){
		gridResize();
		setHomeSlideshowHeight();
		centerFlexCaption();
		if(!isMobile()){
			initStickyNav();
		}		
	});
	
	jQuery(window).scroll(function() {
		if(!isMobile()){		
			setStickyNav();
			homeParallax();	
		}	
	});
	
	//Set Down Arrow Button
	jQuery('#downButton').click(function(){		
		jQuery.scrollTo("#middle", 1000, { offset:-(jQuery('#header .bottom').height()+topOffest), axis:'y' });
	});		
	
	setMobileNav();	
	jQuery('img').attr('title','');	
	
});