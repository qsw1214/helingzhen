function Swipe(b,i){var c=function(){};var t=function(C){setTimeout(C||c,0)};var B={addEventListener:!!window.addEventListener,touch:("ontouchstart" in window)||window.DocumentTouch&&document instanceof DocumentTouch,transitions:(function(C){var E=["transitionProperty","WebkitTransition","MozTransition","OTransition","msTransition"];for(var D in E){if(C.style[E[D]]!==undefined){return true}}return false})(document.createElement("swipe"))};if(!b){return}var k=b.children[0];var x,j,r,h;i=i||{};var f=parseInt(i.startSlide,10)||0;var u=i.speed||300;i.continuous=i.continuous!==undefined?i.continuous:true;function o(){x=k.children;h=x.length;if(x.length<2){i.continuous=false}if(B.transitions&&i.continuous&&x.length<3){k.appendChild(x[0].cloneNode(true));k.appendChild(k.children[1].cloneNode(true));x=k.children}j=new Array(x.length);r=b.getBoundingClientRect().width||b.offsetWidth;k.style.width=(x.length*r)+"px";var D=x.length;while(D--){var C=x[D];C.style.width=r+"px";C.setAttribute("data-index",D);if(B.transitions){C.style.left=(D*-r)+"px";q(D,f>D?-r:(f<D?r:0),0)}}if(i.continuous&&B.transitions){q(g(f-1),-r,0);q(g(f+1),r,0)}if(!B.transitions){k.style.left=(f*-r)+"px"}b.style.visibility="visible"}function n(){if(i.continuous){a(f-1)}else{if(f){a(f-1)}}}function p(){if(i.continuous){a(f+1)}else{if(f<x.length-1){a(f+1)}}}function g(C){return(x.length+(C%x.length))%x.length}function a(G,D){if(f==G){return}if(B.transitions){var F=Math.abs(f-G)/(f-G);if(i.continuous){var C=F;F=-j[g(G)]/r;if(F!==C){G=-F*x.length+G}}var E=Math.abs(f-G)-1;while(E--){q(g((G>f?G:f)-E-1),r*F,0)}G=g(G);q(f,r*F,D||u);q(G,0,D||u);if(i.continuous){q(g(G-F),-(r*F),0)}}else{G=g(G);e(f*-r,G*-r,D||u)}f=G;t(i.callback&&i.callback(f,x[f]))}function q(C,E,D){m(C,E,D);j[C]=E}function m(D,G,F){var C=x[D];var E=C&&C.style;if(!E){return}E.webkitTransitionDuration=E.MozTransitionDuration=E.msTransitionDuration=E.OTransitionDuration=E.transitionDuration=F+"ms";E.webkitTransform="translate("+G+"px,0)translateZ(0)";E.msTransform=E.MozTransform=E.OTransform="translateX("+G+"px)"}function e(G,F,C){if(!C){k.style.left=F+"px";return}var E=+new Date;var D=setInterval(function(){var H=+new Date-E;if(H>C){k.style.left=F+"px";if(A){w()}i.transitionEnd&&i.transitionEnd.call(event,f,x[f]);clearInterval(D);return}k.style.left=(((F-G)*(Math.floor((H/C)*100)/100))+G)+"px"},4)}var A=i.auto||0;var v;function w(){v=setTimeout(p,A)}function s(){A=0;clearTimeout(v)}var d={};var y={};var z;var l={handleEvent:function(C){switch(C.type){case"touchstart":this.start(C);break;case"touchmove":this.move(C);break;case"touchend":t(this.end(C));break;case"webkitTransitionEnd":case"msTransitionEnd":case"oTransitionEnd":case"otransitionend":case"transitionend":t(this.transitionEnd(C));break;case"resize":t(o);break}if(i.stopPropagation){C.stopPropagation()}},start:function(C){var D=C.touches[0];d={x:D.pageX,y:D.pageY,time:+new Date};z=undefined;y={};k.addEventListener("touchmove",this,false);k.addEventListener("touchend",this,false)},move:function(C){if(C.touches.length>1||C.scale&&C.scale!==1){return}if(i.disableScroll){C.preventDefault()}var D=C.touches[0];y={x:D.pageX-d.x,y:D.pageY-d.y};if(typeof z=="undefined"){z=!!(z||Math.abs(y.x)<Math.abs(y.y))}if(!z){C.preventDefault();s();if(i.continuous){m(g(f-1),y.x+j[g(f-1)],0);m(f,y.x+j[f],0);m(g(f+1),y.x+j[g(f+1)],0)}else{y.x=y.x/((!f&&y.x>0||f==x.length-1&&y.x<0)?(Math.abs(y.x)/r+1):1);m(f-1,y.x+j[f-1],0);m(f,y.x+j[f],0);m(f+1,y.x+j[f+1],0)}}},end:function(E){var G=+new Date-d.time;var C=Number(G)<250&&Math.abs(y.x)>20||Math.abs(y.x)>r/2;var D=!f&&y.x>0||f==x.length-1&&y.x<0;if(i.continuous){D=false}var F=y.x<0;if(!z){if(C&&!D){if(F){if(i.continuous){q(g(f-1),-r,0);q(g(f+2),r,0)}else{q(f-1,-r,0)}q(f,j[f]-r,u);q(g(f+1),j[g(f+1)]-r,u);f=g(f+1)}else{if(i.continuous){q(g(f+1),r,0);q(g(f-2),-r,0)}else{q(f+1,r,0)}q(f,j[f]+r,u);q(g(f-1),j[g(f-1)]+r,u);f=g(f-1)}i.callback&&i.callback(f,x[f])}else{if(i.continuous){q(g(f-1),-r,u);q(f,0,u);q(g(f+1),r,u)}else{q(f-1,-r,u);q(f,0,u);q(f+1,r,u)}}}k.removeEventListener("touchmove",l,false);k.removeEventListener("touchend",l,false)},transitionEnd:function(C){if(parseInt(C.target.getAttribute("data-index"),10)==f){if(A){w()}i.transitionEnd&&i.transitionEnd.call(C,f,x[f])}}};o();if(A){w()}if(B.addEventListener){if(B.touch){k.addEventListener("touchstart",l,false)}if(B.transitions){k.addEventListener("webkitTransitionEnd",l,false);k.addEventListener("msTransitionEnd",l,false);k.addEventListener("oTransitionEnd",l,false);k.addEventListener("otransitionend",l,false);k.addEventListener("transitionend",l,false)}window.addEventListener("resize",l,false)}else{window.onresize=function(){o()}}return{setup:function(){o()},slide:function(D,C){s();a(D,C)},prev:function(){s();n()},next:function(){s();p()},stop:function(){s()},getPos:function(){return f},getNumSlides:function(){return h},kill:function(){s();k.style.width="";k.style.left="";var D=x.length;while(D--){var C=x[D];C.style.width="";C.style.left="";if(B.transitions){m(D,0,0)}}if(B.addEventListener){k.removeEventListener("touchstart",l,false);k.removeEventListener("webkitTransitionEnd",l,false);k.removeEventListener("msTransitionEnd",l,false);k.removeEventListener("oTransitionEnd",l,false);k.removeEventListener("otransitionend",l,false);k.removeEventListener("transitionend",l,false);window.removeEventListener("resize",l,false)}else{window.onresize=null}}}}if(window.jQuery||window.Zepto){(function(a){a.fn.Swipe=function(b){return this.each(function(){a(this).data("Swipe",new Swipe(a(this)[0],b))})}})(window.jQuery||window.Zepto)};