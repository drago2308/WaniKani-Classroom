// Materal Plugins

/**
 * Created by Kupletsky Sergey on 16.09.14.
 *
 * Hierarchical timing
 * Add specific delay for CSS3-animation to elements.
 */
!function(a){var i=2e3,s=a(".display-animation");s.each(function(){var s=a(this).children();s.each(function(){var s=a(this).offset(),t=.8*s.left+s.top,n=parseFloat(t/i).toFixed(2);a(this).css("-webkit-animation-delay",n+"s").css("-o-animation-delay",n+"s").css("animation-delay",n+"s").addClass("animated")})})}(jQuery);


/**
 * Created by Kupletsky Sergey on 04.09.14.
 *
 * Ripple-effect animation
 * Tested and working in: ?IE9+, Chrome (Mobile + Desktop), ?Safari, ?Opera, ?Firefox.
 * JQuery plugin add .ink span in element with class .ripple-effect
 * Animation work on CSS3 by add/remove class .animate to .ink span
*/

!function(t){t(".ripple-effect").click(function(e){var i=t(this);0==i.find(".ink").length&&i.append("<span class='ink'></span>");var a=i.find(".ink"
