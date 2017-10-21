/*from tccdn minify at 2016-2-7 8:58:50,file：/touch/public/calendar/0.0.2/calendar.js,file：/touch/public/page/0.0.1/page.js,file：/touch/public/dialog/0.0.1/dialog.js,file：/touch/public/share/0.0.1/share.js,file：/touch/public/iscroll-lite.js?v=201512241933*/
!function(){function r(b){return b.setHours(0),b.setMinutes(0),b.setSeconds(0),b.setMilliseconds(0),b}function s(b){return"string"==typeof b&&""!==b}function t(a){if(this.today=r(new Date),$.extend(this,a),u.call(this),w.call(this),this.tips||(this.tips=["请选择起始时间","请选择结束时间"]),!this.wrapper){var d=(this.name||"calendar")+"Page",f=this.title||"选择日期";this.wrapper=$("#"+d),this.wrapper.length?(D&&$(".page-header h2",this.wrapper).html(f),$(".calendar",this.wrapper).remove()):($("body").append('<div id="'+d+'" class="page">'+(D?'<div class="page-header"><a class="page-back" href="javascript:void(0);"></a><h2>'+f+"</h2></div>":"")+"</div>"),this.wrapper=$("#"+d))}x.call(this),C.call(this)}function u(){v(this,["startDate","endDate"]),this.currentDate?v(this.currentDate,[0,1]):this.currentDate=[]}function v(a,b){for(var h,i=0,j=b.length;j>i;i++){h=b[i],s(a[h])?a[h]=Date.ParseString(a[h]):a[h] instanceof Date?r(a[h]):a[h]=void 0}}function w(){if(this.startDate||(this.startDate=this.today),!this.endDate){var b=new Date(this.today);b.setMonth(b.getMonth()+6),b.setDate(b.getDate()-1),this.endDate=b}}function x(){var f,g,h='<div class="calendar">';if(this.ajaxObj?(E=0,F=[],G=0,f=y):f=function(b){h+=z.call(this,b)},this.reverseOrder){g=new Date(this.endDate),g.setDate(1);var i=new Date(this.startDate);for(i.setDate(1);g.getTime()>=i;){f.call(this,new Date(g),E++),g.setMonth(g.getMonth()-1)}}else{for(g=new Date(this.startDate),g.setDate(1);g.getTime()<=this.endDate;){f.call(this,new Date(g),E++),g.setMonth(g.getMonth()+1)}}if("range"===this.mode){h+='<div class="calendar-tips fixed">'+this.tips[0]+"</div>";var j=this;setTimeout(function(){$(".calendar-tips",j.wrapper).animate({"margin-left":"-100px"},300,"ease-in-out")},300)}h+="</div>",this.wrapper.append(h)}function y(f,g){var h=$.extend({},this.ajaxObj),i=this,j=f.getMonth()+1;h.url=h.url.replace("{year}",f.getFullYear()).replace("{month}",(10>j?"0":"")+j),i.ajaxObj.beforeSend&&(h.beforeSend=function(a,d){i.ajaxObj.beforeSend(a,d,f)}),h.success=function(a){i.ajaxObj.success&&(a=i.ajaxObj.success(a)),F[g]=z.call(i,f,a),G++,G===E&&$(".calendar",i.elem).html(F.join(""))},$.ajax(h)}function z(g,h){for(var i=g.getMonth(),j=new Date(g),k='<div class="calendar-wrapper" data-year="'+g.getFullYear()+'" data-month="'+(g.getMonth()+1)+'"><h3>'+g.getFullYear()+"年"+(g.getMonth()+1)+'月</h3><table><tr><th class="sunday">日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th class="saturday">六</th></tr><tr>';0!==j.getDay();){j.setDate(j.getDate()-1),k+='<td class="disabled"></td>'}var l=this.startDate;for("rangeTo"===this.mode&&this.currentDate[0]&&this.currentDate[0].getTime()>this.startDate.getTime()&&(l=this.currentDate[0]);g.getMonth()===i;){k+=A.call(this,g,l,h),g.setDate(g.getDate()+1),0===g.getDay()&&g.getMonth()===i&&(k+="</tr><tr>")}for(;0!==g.getDay();){k+='<td class="disabled"></td>',g.setDate(g.getDate()+1)}return k+="</tr></table></div>"}function A(k,l,m){var n=[];0===k.getDay()?n.push("sunday"):6===k.getDay()&&n.push("saturday"),(k.getTime()<l.getTime()||k.getTime()>this.endDate.getTime())&&n.push("disabled");var o,p,q=B(k);if(q?(o=q,p="festival"):k.getTime()===this.today.getTime()&&(o="今天",p="today"),p&&n.push(p),this.currentDate){var I=this.currentDate[0],J=this.currentDate[1];I&&(k.getTime()===I.getTime()?n.push("from-day"):k.getTime()>I.getTime()&&J&&k.getTime()<J.getTime()&&n.push("range-day")),J&&J.getTime()===k.getTime()&&n.push("to-day")}var K;return K=this.buildContent?this.buildContent(k,o,n,m):o?o:k.getDate(),"<td"+(n.length?' class="'+n.join(" ")+'"':"")+' data-day="'+k.getDate()+'"><div>'+K+"</div></td>"}function B(f){var g=f.getFullYear(),h=f.getMonth()+1,i=f.getDate(),j=H[g+"-"+h+"-"+i];return j?j:(1===h&&1===i?j="元旦":2===h&&14===i?j="情人":5===h&&1===i?j="五一":6===h&&1===i?j="儿童":10===h&&1===i?j="国庆":12===h&&25===i&&(j="圣诞"),j)}function C(){var e=this;if("range"===e.mode){var f,g=!0,h=[];$(".calendar",e.wrapper).delegate("td","click",function(){var a=$(this);if(!a.hasClass("disabled")){var b=a.parents(".calendar-wrapper");if(f=[b.attr("data-year"),b.attr("data-month"),a.attr("data-day")],g){for(var c,d=["from-day","range-day","to-day"],j=0;c=d[j++];){$("."+c,e.wrapper).removeClass(c)}a.addClass("from-day"),$(".calendar-tips",e.wrapper).css({"margin-left":"50%"}).html(e.tips[1]).animate({"margin-left":"-100px"},300,"ease-in-out"),h=[f],g=!1}else{h.push(f),e.fn(h),g=!0}}})}else{$(".calendar",e.wrapper).delegate("td","click",function(){var a=$(this);if(!a.hasClass("disabled")&&"function"==typeof e.fn){var d=a.parents(".calendar-wrapper");e.fn([d.attr("data-year"),d.attr("data-month"),a.attr("data-day")],a)}})}}var D=-1===navigator.userAgent.toLowerCase().indexOf("tctravel");Date.ParseString=function(f){var g=/(\d{4})-(\d{1,2})-(\d{1,2})(?:\s+(\d{1,2}):(\d{1,2}):(\d{1,2}))?/i,h=g.exec(f),i=0,j=null;return i=Date.parse(h&&h.length?h.length>5&&h[6]?f.replace(g,"$2/$3/$1 $4:$5:$6"):f.replace(g,"$2/$3/$1"):f),isNaN(i)||(j=new Date(i)),j},$.calendar=function(b){return new t(b)};var E,F,G,H={"2014-1-30":"除夕","2014-1-31":"春节","2014-2-14":"元宵","2014-4-5":"清明","2014-6-2":"端午","2014-8-2":"七夕","2014-9-8":"中秋","2014-10-2":"重阳","2015-2-18":"除夕","2015-2-19":"春节","2015-3-5":"元宵","2015-4-5":"清明","2015-6-20":"端午","2015-8-20":"七夕","2015-9-27":"中秋","2015-10-21":"重阳","2016-2-7":"除夕","2016-2-8":"春节","2016-2-22":"元宵","2016-4-4":"清明","2016-6-9":"端午","2016-8-9":"七夕","2016-9-15":"中秋","2016-10-19":"重阳","2017-1-27":"除夕","2017-1-28":"春节","2017-2-11":"元宵","2017-4-4":"清明","2017-5-30":"端午","2017-8-28":"七夕","2017-10-4":"中秋","2017-10-28":"重阳","2018-2-15":"除夕","2018-2-16":"春节","2018-3-2":"元宵","2018-4-5":"清明","2018-6-18":"端午","2018-8-17":"七夕","2018-9-24":"中秋","2018-10-17":"重阳","2019-2-4":"除夕","2019-2-5":"春节","2019-2-19":"元宵","2019-4-5":"清明","2019-6-7":"端午","2019-8-7":"七夕","2019-9-13":"中秋","2019-10-7":"重阳","2020-1-24":"除夕","2020-1-25":"春节","2020-2-8":"元宵","2020-4-4":"清明","2020-6-25":"端午","2020-8-25":"七夕","2020-10-1":"中秋","2020-10-25":"重阳"}}();var page={init:function(d,e,f){"boolean"==typeof d&&(f=d,d=void 0),"string"==typeof d&&(f=e,e=d,d=void 0),"string"!=typeof e&&(e="main"),!f&&location.hash&&(location.hash=""),$(window).on("hashchange",function(){page.refresh()}),this.pages=[e],this.fn=d||function(b){return $(document.getElementById(b+"Page"))},f&&this.refresh()},open:function(b){location.hash=b},close:function(){history.back()},refresh:function(){this.toggle();var b=this;setTimeout(function(){var a=b.fns[location.hash?location.hash.substring(1):b.pages[0]];if(a){for(var e=0,f=a.length;f>e;e++){a[e]()}}},220)},fns:{},add:function(c,d){"function"==typeof d&&(this.fns[c]?this.fns[c].push(d):this.fns[c]=[d])},remove:function(d,e){if(this.fns[d]){for(var f=this.fns[d].length-1;f>=0;f++){if(this.fns[d][f]===e){this.fns[d].splice(f,1);break}}}},toggle:function(){var e,f,g=location.hash.substring(1),h=this.pages;if(!g){if(1===h.length){return}g=h[0]}if(h[h.length-1]!==g){if(h[h.length-2]===g){if(f=this.fn(g),0===f.length){return}f.css({display:"block"}),e=this.fn(h.pop()).removeClass("current"),setTimeout(function(){e.css({display:"none"}),$(window).scrollTop(f.data("scrollTop"))},200)}else{if(f=this.fn(g),0===f.length){return}e=this.fn(h[h.length-1]).data("scrollTop",$(window).scrollTop()),f.css({display:"block"}),setTimeout(function(){f.addClass("current")},20),$(window).scrollTop(0),setTimeout(function(){e.css({display:"none"})},220),h.push(g)}}}};!function(){function e(){var a=f.attr("hl-cls");clearTimeout(g),f.removeClass(a).removeAttr("hl-cls"),f=null,h.off("touchend touchmove touchcancel",e)}var f,g,h=$(document);$.fn.highlight=function(a,b){return this.each(function(){var c=$(this);c.css({"-webkit-tap-highlight-color":"rgba(255,255,255,0)"}).off("touchstart.hl"),a&&c.on("touchstart.hl",function(d){var j;f=b?(j=$(d.target).closest(b,this))&&j.length&&j:c,f&&(f.attr("hl-cls",a),g=setTimeout(function(){f.addClass(a)},100),h.on("touchend touchmove touchcancel",e))})})}}(),function(){function e(b){this._options=this._options||{},$.extend(this._options,h),$.extend(this._options,b),this.init()}function f(i){var j,k,l,m=this,n=m._options;switch(i.type){case n.RotateChangeEvent:n._isOpen&&this.refresh();break;case"touchmove":n.scrollMove&&i.preventDefault();break;case"click":if(n._mask&&($.contains(n._mask[0],i.target)||n._mask[0]===i.target)){return"function"==typeof n.maskClick&&n.maskClick()}k=n._wrap.get(0),(j=$(i.target).closest(".close",k))&&j.length?m.close():(j=$(i.target).closest(".ui-dialog-btns .ui-btn",k))&&j.length&&(l=n.buttons[j.attr("data-key")],l&&l.apply(m,arguments))}}var g={close:'<a class="close" title="关闭"></a>',mask:'<div class="ui-mask"></div>',title:'<div class="ui-dialog-title"></div>',wrap:'<div class="ui-dialog"><div class="ui-dialog-content"></div>BTNSTRING</div> '},h={autoOpen:!1,className:"",buttons:null,closeBtn:!1,mask:!0,width:300,height:"auto",title:void 0,content:null,scrollMove:!0,container:null,maskClick:null,beforeOpen:null,afterOpen:null,beforeClose:null,afterClose:null,style:null,closeTime:2000,className:""};e.prototype.getWrap=function(){return this._options._wrap},e.prototype.init=function(){var b,c=this,k=c._options,l=0,m={};k.eventHand=$.proxy(f,c),k._container=$(k.container||document.body),(k._cIsBody=k._container.is("body"))||k._container.addClass("ui-dialog-container`"),m.btns=b=[],k.buttons&&$.each(k.buttons,function(a){b.push({index:++l,text:a,key:a})}),k._mask=k.mask?$(g.mask).appendTo(k._container):null;var n="";if(b[0]){n='<div class="ui-dialog-btns">';for(var l=0,o=b.length;o>l;l++){var p=b[l];n+='<a class="ui-btn ui-btn-'+l+'" data-key="'+p.key+'">'+p.text+"</a>"}n+="</div>"}k._wrap=$(g.wrap.replace("BTNSTRING",n)).appendTo(k._container),k._content=$(".ui-dialog-content",k._wrap),k._title=$(g.title),k._close=k.closeBtn&&$(g.close).appendTo(k._title).highlight("close-hover").on("click",function(){c.close()}),c.title(k.title),c.content(k.content),b.length&&$(".ui-dialog-btns .ui-btn",k._wrap).highlight("ui-state-hover"),k._wrap.css({width:k.width,height:k.height}).addClass(k.className),k.RotateChangeEvent="onorientationchange" in window?"orientationchange":"resize",$(window).on(k.RotateChangeEvent,k.eventHand),k._wrap.on("click",k.eventHand),k._mask&&k._mask.on("click",k.eventHand),k.autoOpen&&c.open()},e.prototype.calculate=function(){var i,j,k=this,l=k._options,m=document.body,n={},o=l._cIsBody,p=Math.round;return l.mask&&(n.mask=o?{width:"100%",height:Math.max(m.scrollHeight,m.clientHeight)}:{width:"100%",height:"100%"}),i=l._wrap.offset(),j=$(window),n.wrap={left:"50%",marginLeft:-p(l._wrap.width()/2)+"px",top:o?p(j.height()/2)+window.pageYOffset:"50%",marginTop:-p(l._wrap.height()/2)+"px"},n},e.prototype.refresh=function(){var i,j,k=this,l=k._options;return j=function(){i=k.calculate(),i.mask&&l._mask.css(i.mask),l._wrap.css(i.wrap)},$.os&&$.os.ios&&document.activeElement&&/input|textarea|select/i.test(document.activeElement.tagName)?(document.body.scrollLeft=0,setTimeout(j,200)):setTimeout(j,200),k},e.prototype.open=function(i){var j,k=this._options,l=this;if(!k._isOpen){if(i&&l.content(i),k._isOpen=!0,"tip"==k.style){k.mask&&k._mask.addClass("ui-dialog-tran-03"),k._wrap.addClass("ui-dialog-black");var m=l.getWrap();setTimeout(function(){k.mask&&k._mask.animate({opacity:0},1000,"ease-out",function(){k._mask.css({opacity:""})}),m.animate({opacity:0},1000,"ease-out",function(){m.css({opacity:"1"}),l.close()})},k.closeTime)}if("function"==typeof k.beforeOpen&&(j=k.beforeOpen()),j){return this}k._wrap.css({display:"block"}),k._mask&&k._mask.css({display:"block"}),this.refresh(),$(document).on("touchmove",k.eventHand),"function"==typeof k.afterOpen&&k.afterOpen()}},e.prototype.close=function(c){var d=this._options;return"tip"==d.style&&d.mask&&d._mask.removeClass("ui-dialog-tran-03"),"function"==typeof d.beforeClose&&d.beforeClose(),d._isOpen=!1,d._wrap.css({display:"none"}),c?this:(d._mask&&d._mask.css({display:"none"}),$(document).off("touchmove",d.eventHand),"function"==typeof d.afterClose&&d.afterClose(this),this)},e.prototype.title=function(d){var i=this._options,j=void 0!==d;return j&&(d=(i.title=d)?"<h3>"+d+"</h3>":d,i._title.html(d)[d?"prependTo":"remove"](i._wrap),i._close&&i._close.prependTo(i.title?i._title:i._wrap)),j?this:i.title},e.prototype.content=function(d){var i=this._options,j=void 0!==d;return j&&i._content.empty().append(i.content=d),j?this:i.content},e.prototype.destroy=function(){var b=this._options;return $(window).off(b.RotateChangeEvent,b.eventHand),$(document).off("touchmove",b.eventHand),b._wrap.off("click",b.eventHand).remove(),b._mask&&b._mask.off("click",b.eventHand).remove(),b._close&&b._close.highlight(),this},$.dialog=function(a){return new e(a)}}(),function(){function e(d,i){var j={autoOpen:!0,closeBtn:!1,style:"tip",mask:i,closeTime:1000,content:d};return $.dialog(j)}function f(a,c){c?"object"==typeof h?h.open(a):h=e(a,!0):"object"==typeof g?g.open(a):g=e(a,!1)}var g,h;$.tip=f}();!function(){function i(b){this._options=this._options||{},$.extend(this._options,p),$.extend(this._options,b),this.init()}function j(c){for(var g,h=this,q=c.target,c=encodeURIComponent,r=h._options;"li"!=q.tagName.toLowerCase();){q=q.parentNode}switch(g=q.getAttribute("share-type")){case"sina":k("http://v.t.sina.com.cn/share/share.php?url="+c(r.url)+"&title="+c(r.title)+"&pic="+c(r.pic),h);break;case"tencent":k("http://share.v.t.qq.com/index.php?c=share&a=index&url="+c(r.url)+"&title="+r.title+"&pic="+c(r.pic),h);break;case"qqzone":k("http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url="+c(r.url)+"&title="+r.title+"&pic="+c(r.pic)+"&summary="+r.desc,h);break;case"renren":k("http://widget.renren.com/dialog/share?resourceUrl="+c(r.resourceUrl?r.resourceUrl:r.url)+"&srcUrl="+c(r.url)+"&description="+r.desc+"&title="+r.title+"&pic="+(r.pic?r.pic:""),h);break;case"douban":k("http://www.douban.com/share/service?url="+c(r.url)+"&title="+r.title+"&text="+r.desc+"&comment=&pic="+(r.pic?r.pic:""),h)}}function k(g,h,q){function r(){window.open([s,t].join(""))||(document.location.href=[s,t].join(""))}var s=g,t=q?q:"";/Firefox/.test(navigator.userAgent)?setTimeout(r,0):r(),h.close()}function l(f){var g,h,q=this,r=q._options;switch(f.type){case"orientationchange":this.refresh();break;case"touchmove":r.scrollMove&&f.preventDefault();break;case"click":h=r._wrap.get(0),(g=$(f.target).closest(".share-cancel",h))&&g.length&&q.close()}}function m(b){$(b).on("touchstart",function(){$(this).css("background-color"," #ddd")}),$(b).on("touchend touchmove touchcancel",function(){$(this).css("background-color"," #fff")})}function n(c){var d=c._options;d._isOpen&&c.close(function(){c.open(2)})}function o(b){b._mask.animate({opacity:0.8},300),b._wrap.animate({bottom:0},300,function(){b._isOpen=!0})}var p={mask:!0,width:"100%",height:"auto",scrollMove:!0,url:document.location.href,resourceUrl:!1,sms:null,title:document.title,desc:"",pic:null,maskClickClose:!1,collectFn:function(){}};i.prototype.init=function(){var b=this,d=b._options,e=$.proxy(j,b),f=$.proxy(l,b);d._container=$(document.body),d._cIsBody=!0,d._mask=d.mask?$('<div class="ui-share-bg"></div>').appendTo(d._container):null,d._isOpen=!1;var q=navigator.userAgent.toLowerCase(),r=q.indexOf("ipad")>-1||q.indexOf("iphone")>-1,s='<div class="ui-share">                        <div class="ui-share-c">                            <div class="share-open-con">                            <ul>                                <li class="share-collect">收藏</li>                                <li class="share-share">分享</li>                            </ul>                            <a class="share-cancel" title="取消" >取消</a>                            </div>                            <div class="share-content">                            <h3>分享到</h3>                                <ul class="clearfix">                                    <li class="share-sina" share-type="sina"><a>新浪微博</a></li>                                    <li class="share-qqzone" share-type="qqzone"><a>QQ空间</a></li>                                    <li class="share-tencent-blog" share-type="tencent"><a>腾讯微博</a></li>                                    <li class="share-renren" share-type="renren" ><a>人人网</a></li>                                    <li class="share-douban" share-type="douban" ><a>豆瓣</a></li><li class="share-sms"><a href="sms:'+(r?";":"?")+"body="+(d.sms?d.sms:d.title)+d.url+'">短信</a></li></ul>                                <a class="share-cancel" title="取消" >取消</a>                            </div>                        </div>                      </div>';d._wrap=$(s).appendTo(d._container),d._wrap.css({width:d.width,height:d.height}),$(".share-cancel",d._wrap).on("click",function(){b.close()}),$(".share-share",d._wrap).on("click",function(){n(b)}),m($("li,.share-cancel",d._wrap)),$(".share-content li",d._wrap).on("click",function(c){e(c)}),$(".share-collect",d._wrap).on("click",function(){b.close(),d.collectFn&&d.collectFn()}),d._mask.on("click",function(){d.maskClickClose&&b.close()}),d._wrap.on("click",f)},i.prototype.calculate=function(){var f=this,g=f._options,h=($(window),document.body),q={},r=g._cIsBody;Math.round;return g.mask&&(q.mask=r?{width:"100%",height:Math.max(h.scrollHeight,h.clientHeight)-1}:{width:"100%",height:"100%"}),q},i.prototype.refresh=function(){var e,f,g=this,h=g._options;return h._isOpenRefresh||(f=function(){e=g.calculate(),e.mask&&h._mask.css(e.mask)},$.os&&$.os.ios&&document.activeElement&&/input|textarea|select/i.test(document.activeElement.tagName)?(document.body.scrollLeft=0,setTimeout(f,200)):f()),g},i.prototype.open=function(d){var g=this._options,q=this,r=$.proxy(l,q),s=$(".share-open-con",g._wrap),t=$(".share-content",g._wrap);if(d&&2==d){s.css({display:"none"}),t.css({display:"block"})}else{if(s.css({display:"block"}),t.css({display:"none"}),g._isOpen){return}}g._wrap.css("display","block"),g._mask&&g._mask.css("display","block"),g._isOpenRefresh=!1,q.refresh(),o(g),$(window).on("orientationchange touchmove click",r)},i.prototype.close=function(c){var d=this._options;return d._isOpen===!1?this:(d._mask.animate({opacity:0},200),d._wrap.animate({bottom:-260},200,function(){d._wrap.css("display","none"),d._mask&&d._mask.css("display","none"),d._isOpen=!1,d._isOpenRefresh=!1,c&&c()}),$(window).off("orientationchange touchmove click",this.eventHandler),this)},i.prototype.destroy=function(){var c=this._options,d=this.eventHandler;$(window).off("orientationchange",d),$(document).off("touchmove",d),c._wrap.off("click",d).remove(),c._mask&&c._mask.off("click",d).remove()},$.Share=function(a){return new i(a)}}();
/* iScroll v5.1.2 ~ (c) 2008-2014 Matteo Spinelli ~ http://cubiq.org/license */
(function(f,a,c){var d=f.requestAnimationFrame||f.webkitRequestAnimationFrame||f.mozRequestAnimationFrame||f.oRequestAnimationFrame||f.msRequestAnimationFrame||function(g){f.setTimeout(g,1000/60)};var e=(function(){var l={};var g=a.createElement("div").style;var j=(function(){var p=["t","webkitT","MozT","msT","OT"],o,m=0,n=p.length;for(;m<n;m++){o=p[m]+"ransform";if(o in g){return p[m].substr(0,p[m].length-1)}}return false})();function h(m){if(j===false){return false}if(j===""){return m}return j+m.charAt(0).toUpperCase()+m.substr(1)}l.getTime=Date.now||function k(){return new Date().getTime()};l.extend=function(o,n){for(var m in n){o[m]=n[m]}};l.addEvent=function(n,p,o,m){n.addEventListener(p,o,!!m)};l.removeEvent=function(n,p,o,m){n.removeEventListener(p,o,!!m)};l.prefixPointerEvent=function(m){return f.MSPointerEvent?"MSPointer"+m.charAt(9).toUpperCase()+m.substr(10):m};l.momentum=function(m,t,u,r,v,n){var p=m-t,s=c.abs(p)/u,o,q;n=n===undefined?0.0006:n;o=m+(s*s)/(2*n)*(p<0?-1:1);q=s/n;if(o<r){o=v?r-(v/2.5*(s/8)):r;p=c.abs(o-m);q=p/s}else{if(o>0){o=v?v/2.5*(s/8):0;p=c.abs(m)+o;q=p/s}}return{destination:c.round(o),duration:q}};var i=h("transform");l.extend(l,{hasTransform:i!==false,hasPerspective:h("perspective") in g,hasTouch:"ontouchstart" in f,hasPointer:f.PointerEvent||f.MSPointerEvent,hasTransition:h("transition") in g});l.isBadAndroid=/Android /.test(f.navigator.appVersion)&&!(/Chrome\/\d/.test(f.navigator.appVersion));l.extend(l.style={},{transform:i,transitionTimingFunction:h("transitionTimingFunction"),transitionDuration:h("transitionDuration"),transitionDelay:h("transitionDelay"),transformOrigin:h("transformOrigin")});l.hasClass=function(n,m){var o=new RegExp("(^|\\s)"+m+"(\\s|$)");return o.test(n.className)};l.addClass=function(n,m){if(l.hasClass(n,m)){return}var o=n.className.split(" ");o.push(m);n.className=o.join(" ")};l.removeClass=function(n,m){if(!l.hasClass(n,m)){return}var o=new RegExp("(^|\\s)"+m+"(\\s|$)","g");n.className=n.className.replace(o," ")};l.offset=function(m){var n=-m.offsetLeft,o=-m.offsetTop;while(m=m.offsetParent){n-=m.offsetLeft;o-=m.offsetTop}return{left:n,top:o}};l.preventDefaultException=function(m,n){for(var o in n){if(n[o].test(m[o])){return true}}return false};l.extend(l.eventType={},{touchstart:1,touchmove:1,touchend:1,mousedown:2,mousemove:2,mouseup:2,pointerdown:3,pointermove:3,pointerup:3,MSPointerDown:3,MSPointerMove:3,MSPointerUp:3});l.extend(l.ease={},{quadratic:{style:"cubic-bezier(0.25, 0.46, 0.45, 0.94)",fn:function(m){return m*(2-m)}},circular:{style:"cubic-bezier(0.1, 0.57, 0.1, 1)",fn:function(m){return c.sqrt(1-(--m*m))}},back:{style:"cubic-bezier(0.175, 0.885, 0.32, 1.275)",fn:function(n){var m=4;return(n=n-1)*n*((m+1)*n+m)+1}},bounce:{style:"",fn:function(m){if((m/=1)<(1/2.75)){return 7.5625*m*m}else{if(m<(2/2.75)){return 7.5625*(m-=(1.5/2.75))*m+0.75}else{if(m<(2.5/2.75)){return 7.5625*(m-=(2.25/2.75))*m+0.9375}else{return 7.5625*(m-=(2.625/2.75))*m+0.984375}}}}},elastic:{style:"",fn:function(o){var n=0.22,m=0.4;if(o===0){return 0}if(o==1){return 1}return(m*c.pow(2,-10*o)*c.sin((o-n/4)*(2*c.PI)/n)+1)}}});l.tap=function(m,o){var n=a.createEvent("Event");n.initEvent(o,true,true);n.pageX=m.pageX;n.pageY=m.pageY;m.target.dispatchEvent(n)};l.click=function(m){var o=m.target,n;if(!(/(SELECT|INPUT|TEXTAREA)/i).test(o.tagName)){n=a.createEvent("MouseEvents");n.initMouseEvent("click",true,true,m.view,1,o.screenX,o.screenY,o.clientX,o.clientY,m.ctrlKey,m.altKey,m.shiftKey,m.metaKey,0,null);n._constructed=true;o.dispatchEvent(n)}};return l})();function b(g,j){this.wrapper=typeof g=="string"?a.querySelector(g):g;this.scroller=this.wrapper.children[0];this.scrollerStyle=this.scroller.style;this.options={startX:0,startY:0,scrollY:true,directionLockThreshold:5,momentum:true,bounce:true,bounceTime:600,bounceEasing:"",preventDefault:true,preventDefaultException:{tagName:/^(INPUT|TEXTAREA|BUTTON|SELECT)$/},HWCompositing:true,useTransition:true,useTransform:true};for(var h in j){this.options[h]=j[h]}this.translateZ=this.options.HWCompositing&&e.hasPerspective?" translateZ(0)":"";this.options.useTransition=e.hasTransition&&this.options.useTransition;this.options.useTransform=e.hasTransform&&this.options.useTransform;this.options.eventPassthrough=this.options.eventPassthrough===true?"vertical":this.options.eventPassthrough;this.options.preventDefault=!this.options.eventPassthrough&&this.options.preventDefault;this.options.scrollY=this.options.eventPassthrough=="vertical"?false:this.options.scrollY;this.options.scrollX=this.options.eventPassthrough=="horizontal"?false:this.options.scrollX;this.options.freeScroll=this.options.freeScroll&&!this.options.eventPassthrough;this.options.directionLockThreshold=this.options.eventPassthrough?0:this.options.directionLockThreshold;this.options.bounceEasing=typeof this.options.bounceEasing=="string"?e.ease[this.options.bounceEasing]||e.ease.circular:this.options.bounceEasing;this.options.resizePolling=this.options.resizePolling===undefined?60:this.options.resizePolling;if(this.options.tap===true){this.options.tap="tap"}this.x=0;this.y=0;this.directionX=0;this.directionY=0;this._events={};this._init();this.refresh();this.scrollTo(this.options.startX,this.options.startY);this.enable()}b.prototype={version:"5.1.2",_init:function(){this._initEvents()},destroy:function(){this._initEvents(true);this._execEvent("destroy")},_transitionEnd:function(g){if(g.target!=this.scroller||!this.isInTransition){return}this._transitionTime();if(!this.resetPosition(this.options.bounceTime)){this.isInTransition=false;this._execEvent("scrollEnd")}},_start:function(g){if(e.eventType[g.type]!=1){if(g.button!==0){return}}if(!this.enabled||(this.initiated&&e.eventType[g.type]!==this.initiated)){return}if(this.options.preventDefault&&!e.isBadAndroid&&!e.preventDefaultException(g.target,this.options.preventDefaultException)){g.preventDefault()}var h=g.touches?g.touches[0]:g,i;this.initiated=e.eventType[g.type];this.moved=false;this.distX=0;this.distY=0;this.directionX=0;this.directionY=0;this.directionLocked=0;this._transitionTime();this.startTime=e.getTime();if(this.options.useTransition&&this.isInTransition){this.isInTransition=false;i=this.getComputedPosition();this._translate(c.round(i.x),c.round(i.y));this._execEvent("scrollEnd")}else{if(!this.options.useTransition&&this.isAnimating){this.isAnimating=false;this._execEvent("scrollEnd")}}this.startX=this.x;this.startY=this.y;this.absStartX=this.x;this.absStartY=this.y;this.pointX=h.pageX;this.pointY=h.pageY;this._execEvent("beforeScrollStart")},_move:function(k){if(!this.enabled||e.eventType[k.type]!==this.initiated){return}if(this.options.preventDefault){k.preventDefault()}var n=k.touches?k.touches[0]:k,i=n.pageX-this.pointX,j=n.pageY-this.pointY,o=e.getTime(),l,m,g,h;this.pointX=n.pageX;this.pointY=n.pageY;this.distX+=i;this.distY+=j;g=c.abs(this.distX);h=c.abs(this.distY);if(o-this.endTime>300&&(g<10&&h<10)){return}if(!this.directionLocked&&!this.options.freeScroll){if(g>h+this.options.directionLockThreshold){this.directionLocked="h"}else{if(h>=g+this.options.directionLockThreshold){this.directionLocked="v"}else{this.directionLocked="n"}}}if(this.directionLocked=="h"){if(this.options.eventPassthrough=="vertical"){k.preventDefault()}else{if(this.options.eventPassthrough=="horizontal"){this.initiated=false;return}}j=0}else{if(this.directionLocked=="v"){if(this.options.eventPassthrough=="horizontal"){k.preventDefault()}else{if(this.options.eventPassthrough=="vertical"){this.initiated=false;return}}i=0}}i=this.hasHorizontalScroll?i:0;j=this.hasVerticalScroll?j:0;l=this.x+i;m=this.y+j;if(l>0||l<this.maxScrollX){l=this.options.bounce?this.x+i/3:l>0?0:this.maxScrollX}if(m>0||m<this.maxScrollY){m=this.options.bounce?this.y+j/3:m>0?0:this.maxScrollY}this.directionX=i>0?-1:i<0?1:0;this.directionY=j>0?-1:j<0?1:0;if(!this.moved){this._execEvent("scrollStart")}this.moved=true;this._translate(l,m);if(o-this.startTime>300){this.startTime=o;this.startX=this.x;this.startY=this.y}},_end:function(j){if(!this.enabled||e.eventType[j.type]!==this.initiated){return}if(this.options.preventDefault&&!e.preventDefaultException(j.target,this.options.preventDefaultException)){j.preventDefault()}var p=j.changedTouches?j.changedTouches[0]:j,l,m,i=e.getTime()-this.startTime,n=c.round(this.x),o=c.round(this.y),g=c.abs(n-this.startX),h=c.abs(o-this.startY),q=0,k="";this.isInTransition=0;this.initiated=0;this.endTime=e.getTime();if(this.resetPosition(this.options.bounceTime)){return}this.scrollTo(n,o);if(!this.moved){if(this.options.tap){e.tap(j,this.options.tap)}if(this.options.click){e.click(j)}this._execEvent("scrollCancel");return}if(this._events.flick&&i<200&&g<100&&h<100){this._execEvent("flick");return}if(this.options.momentum&&i<300){l=this.hasHorizontalScroll?e.momentum(this.x,this.startX,i,this.maxScrollX,this.options.bounce?this.wrapperWidth:0,this.options.deceleration):{destination:n,duration:0};m=this.hasVerticalScroll?e.momentum(this.y,this.startY,i,this.maxScrollY,this.options.bounce?this.wrapperHeight:0,this.options.deceleration):{destination:o,duration:0};n=l.destination;o=m.destination;q=c.max(l.duration,m.duration);this.isInTransition=1}if(n!=this.x||o!=this.y){if(n>0||n<this.maxScrollX||o>0||o<this.maxScrollY){k=e.ease.quadratic}this.scrollTo(n,o,q,k);return}this._execEvent("scrollEnd")},_resize:function(){var g=this;clearTimeout(this.resizeTimeout);this.resizeTimeout=setTimeout(function(){g.refresh()},this.options.resizePolling)},resetPosition:function(g){var h=this.x,i=this.y;g=g||0;if(!this.hasHorizontalScroll||this.x>0){h=0}else{if(this.x<this.maxScrollX){h=this.maxScrollX}}if(!this.hasVerticalScroll||this.y>0){i=0}else{if(this.y<this.maxScrollY){i=this.maxScrollY}}if(h==this.x&&i==this.y){return false}this.scrollTo(h,i,g,this.options.bounceEasing);return true},disable:function(){this.enabled=false},enable:function(){this.enabled=true},refresh:function(){var g=this.wrapper.offsetHeight;this.wrapperWidth=this.wrapper.clientWidth;this.wrapperHeight=this.wrapper.clientHeight;this.scrollerWidth=this.scroller.offsetWidth;this.scrollerHeight=this.scroller.offsetHeight;this.maxScrollX=this.wrapperWidth-this.scrollerWidth;this.maxScrollY=this.wrapperHeight-this.scrollerHeight;this.hasHorizontalScroll=this.options.scrollX&&this.maxScrollX<0;this.hasVerticalScroll=this.options.scrollY&&this.maxScrollY<0;if(!this.hasHorizontalScroll){this.maxScrollX=0;this.scrollerWidth=this.wrapperWidth}if(!this.hasVerticalScroll){this.maxScrollY=0;this.scrollerHeight=this.wrapperHeight}this.endTime=0;this.directionX=0;this.directionY=0;this.wrapperOffset=e.offset(this.wrapper);this._execEvent("refresh");this.resetPosition()},on:function(h,g){if(!this._events[h]){this._events[h]=[]}this._events[h].push(g)},off:function(i,g){if(!this._events[i]){return}var h=this._events[i].indexOf(g);if(h>-1){this._events[i].splice(h,1)}},_execEvent:function(j){if(!this._events[j]){return}var g=0,h=this._events[j].length;if(!h){return}for(;g<h;g++){this._events[j][g].apply(this,[].slice.call(arguments,1))}},scrollBy:function(i,j,h,g){i=this.x+i;j=this.y+j;h=h||0;this.scrollTo(i,j,h,g)},scrollTo:function(i,j,h,g){g=g||e.ease.circular;this.isInTransition=this.options.useTransition&&h>0;if(!h||(this.options.useTransition&&g.style)){this._transitionTimingFunction(g.style);this._transitionTime(h);this._translate(i,j)}else{this._animate(i,j,h,g.fn)}},scrollToElement:function(h,l,i,j,g){h=h.nodeType?h:this.scroller.querySelector(h);if(!h){return}var k=e.offset(h);k.left-=this.wrapperOffset.left;k.top-=this.wrapperOffset.top;if(i===true){i=c.round(h.offsetWidth/2-this.wrapper.offsetWidth/2)}if(j===true){j=c.round(h.offsetHeight/2-this.wrapper.offsetHeight/2)}k.left-=i||0;k.top-=j||0;k.left=k.left>0?0:k.left<this.maxScrollX?this.maxScrollX:k.left;k.top=k.top>0?0:k.top<this.maxScrollY?this.maxScrollY:k.top;l=l===undefined||l===null||l==="auto"?c.max(c.abs(this.x-k.left),c.abs(this.y-k.top)):l;this.scrollTo(k.left,k.top,l,g)},_transitionTime:function(g){g=g||0;this.scrollerStyle[e.style.transitionDuration]=g+"ms";if(!g&&e.isBadAndroid){this.scrollerStyle[e.style.transitionDuration]="0.001s"}},_transitionTimingFunction:function(g){this.scrollerStyle[e.style.transitionTimingFunction]=g},_translate:function(g,h){if(this.options.useTransform){this.scrollerStyle[e.style.transform]="translate("+g+"px,"+h+"px)"+this.translateZ}else{g=c.round(g);h=c.round(h);this.scrollerStyle.left=g+"px";this.scrollerStyle.top=h+"px"}this.x=g;this.y=h},_initEvents:function(h){var g=h?e.removeEvent:e.addEvent,i=this.options.bindToWrapper?this.wrapper:f;g(f,"orientationchange",this);g(f,"resize",this);if(this.options.click){g(this.wrapper,"click",this,true)}if(!this.options.disableMouse){g(this.wrapper,"mousedown",this);g(i,"mousemove",this);g(i,"mousecancel",this);g(i,"mouseup",this)}if(e.hasPointer&&!this.options.disablePointer){g(this.wrapper,e.prefixPointerEvent("pointerdown"),this);g(i,e.prefixPointerEvent("pointermove"),this);g(i,e.prefixPointerEvent("pointercancel"),this);g(i,e.prefixPointerEvent("pointerup"),this)}if(e.hasTouch&&!this.options.disableTouch){g(this.wrapper,"touchstart",this);g(i,"touchmove",this);g(i,"touchcancel",this);g(i,"touchend",this)}g(this.scroller,"transitionend",this);g(this.scroller,"webkitTransitionEnd",this);g(this.scroller,"oTransitionEnd",this);g(this.scroller,"MSTransitionEnd",this)},getComputedPosition:function(){var g=f.getComputedStyle(this.scroller,null),h,i;if(this.options.useTransform){g=g[e.style.transform].split(")")[0].split(", ");h=+(g[12]||g[4]);i=+(g[13]||g[5])}else{h=+g.left.replace(/[^-\d.]/g,"");i=+g.top.replace(/[^-\d.]/g,"")}return{x:h,y:i}},_animate:function(h,i,j,k){var p=this,m=this.x,n=this.y,l=e.getTime(),g=l+j;function o(){var t=e.getTime(),r,s,q;if(t>=g){p.isAnimating=false;p._translate(h,i);if(!p.resetPosition(p.options.bounceTime)){p._execEvent("scrollEnd")}return}t=(t-l)/j;q=k(t);r=(h-m)*q+m;s=(i-n)*q+n;p._translate(r,s);if(p.isAnimating){d(o)}}this.isAnimating=true;o()},handleEvent:function(g){switch(g.type){case"touchstart":case"pointerdown":case"MSPointerDown":case"mousedown":this._start(g);break;case"touchmove":case"pointermove":case"MSPointerMove":case"mousemove":this._move(g);break;case"touchend":case"pointerup":case"MSPointerUp":case"mouseup":case"touchcancel":case"pointercancel":case"MSPointerCancel":case"mousecancel":this._end(g);break;case"orientationchange":case"resize":this._resize();break;case"transitionend":case"webkitTransitionEnd":case"oTransitionEnd":case"MSTransitionEnd":this._transitionEnd(g);break;case"wheel":case"DOMMouseScroll":case"mousewheel":this._wheel(g);break;case"keydown":this._key(g);break;case"click":if(!g._constructed){g.preventDefault();g.stopPropagation()}break}}};b.utils=e;if(typeof module!="undefined"&&module.exports){module.exports=b}else{f.IScroll=b}})(window,document,Math);