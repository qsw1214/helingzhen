function assessListInit(p){var f={containerID:"tab-wrapper",url:"",tabIndex:0,maxCount:10,cbList:null};var o=$.extend(f,p);var e=document.getElementById(o.containerID);var l=document.querySelector(".is-loading");var m=document.getElementById("tabs");var g="";var k="";var a="onorientationchange" in window;var c=a?"orientationchange":"resize";var j={imgAdjustWidth:function(){var r=document.documentElement.clientWidth;var s=r-20-13*3;var q=s/4;if(q>120){q=120}$(".product-imgs-li").width(q).height(q);$(".product-imgs-li").find("img").each(function(v){var t=$(this);var x;var u;var w=new Image();w.src=$(t).attr("src");w.onload=function(){x=this.width;u=this.height;if(u>x){t.width(q);t.css("marginTop",(q-t.height())/2+"px")}else{t.height(q);t.css("marginLeft",(q-t.width())/2+"px")}}})},addTop:function(r){var q=$("#currentWareId").val();k+='<li class="tab-item J_ping" report-eventid="MProductdetail_CommentAllTab" report-eventlevel="5" report-pageparam="'+q+'">';k+='    <p class="tab-assess-title">\u5168\u90e8\u8bc4\u4ef7</p>';k+='    <p class="tab-assess-num">';k+=r.allCnt||0;k+="    </p>";k+="</li>";k+='<li class="tab-item J_ping" report-eventid="MProductdetail_CommentFavorableTab" report-eventlevel="5" report-pageparam="'+q+'">';k+='    <p class="tab-assess-title">\u597d\u8bc4</p>';k+='    <p class="tab-assess-num">';k+=r.goodCnt||0;k+="    </p>";k+="</li>";k+='<li class="tab-item J_ping" report-eventid="MProductdetail_CommentMediumTab" report-eventlevel="5" report-pageparam="'+q+'">';k+='    <p class="tab-assess-title">\u4e2d\u8bc4</p>';k+='    <p class="tab-assess-num">';k+=r.normalCnt||0;k+="    </p>";k+="</li>";k+='<li class="tab-item J_ping" report-eventid="MProductdetail_CommentPoorTab" report-eventlevel="5" report-pageparam="'+q+'">';k+='    <p class="tab-assess-title">\u5dee\u8bc4</p>';k+='    <p class="tab-assess-num">';k+=r.badCnt||0;k+="    </p>";k+="</li>";k+='<li class="tab-item J_ping" report-eventid="MProductdetail_CommentPictureTab" report-eventlevel="5" report-pageparam="'+q+'">';k+='    <p class="tab-assess-title">\u6709\u56fe</p>';k+='    <p class="tab-assess-num">';k+=r.pictureCnt||0;k+="    </p>";k+="</li>"},switchTab:function(){var v=document.getElementById("tabs");var u=document.querySelectorAll(".tab-item");var s=document.querySelectorAll(".tab-assess-num");var t=document.querySelector(".reply-body");if(v!=null){for(var q=0;q<u.length;q++){u[q].classList.remove("tab-hover");s[q].classList.remove("tab-assess-rednum")}u[o.tabIndex].classList.add("tab-hover");s[o.tabIndex].classList.add("tab-assess-rednum");for(var r=0;r<u.length;r++){(function(w){u[w].onclick=function(){o.tabIndex=w;for(var x=0;x<r;x++){u[x].classList.remove("tab-hover");s[x].classList.remove("tab-assess-rednum")}u[w].classList.add("tab-hover");s[w].classList.add("tab-assess-rednum");t.scrollTop=0;o.url="/newComments/newCommentsDetail.json";i(1)}})(r)}}},tabReturn:function(){var q=document.querySelectorAll(".tab-btn")[0],t=this,s=document.querySelectorAll(".tab-item"),r=document.querySelectorAll(".tab-assess-num");if(q){q.onclick=function(){pingClickWithLevel("MProductdetail_CommentAll","","",$("#currentWareId").val(),"5");o.tabIndex=0;for(var u=0;u<s.length;u++){s[u].classList.remove("tab-hover");r[u].classList.remove("tab-assess-rednum")}s[o.tabIndex].classList.add("tab-hover");r[o.tabIndex].classList.add("tab-assess-rednum");o.url="/newComments/newCommentsDetail.json";i(1)}}},addHtml:function(x){var w=$("#currentWareId").val();var q=$("#sid").val();var u="";if(x&&x.guid){u=x.guid}var t="/newComments/clickUseful.json?sid="+q+"&wareId="+w+"&commentId="+u;var v="javascript:void(0)";if($("#isDisplayReplyBtn").val()=="true"){v="/replyList/"+w+"_"+u+".html?sid="+q}else{if(x.replyCnt>0){v="/replyList/"+w+"_"+u+".html?sid="+q}}g+='<div class="assess-flat">';g+='    <span class="assess-wrapper">';g+='        <div class="assess-top">';g+='            <span class="user-portrait">';g+='                <img src="//';g+=x.userImgURL;g+='" onerror="userDefaultImg();" >';g+="</span>";g+='            <span class="user-name">';g+=x.userNickName;g+="</span>";g+='            <span class="vip-icon ';switch(x.userLevel){case"0":g+="vip-diamond-icon";break;case"1":g+="vip-gold-icon";break;case"2":g+="vip-silver-icon";break;case"3":g+="vip-copper-icon";break;case"4":g+="vip-register-icon";break;case"5":g+="vip-register-icon";break;case"6":g+="vip-register-icon";break;case"-1":g+="vip-register-icon";break}g+='"></span>';g+='            <span class="assess-date">';g+=x.commentDate;g+="</span>";g+="</div>";g+='        <div class="assess-bottom">';g+='            <span class="comment-item-star">';g+='                <span class="real-star comment-stars-width';g+=x.commentScore;g+='"></span>';g+="</span>";g+='            <p class="assess-content">';g+=x.commentData;g+="</p>";if(x.commentType==1){g+='<div class="product-img-module">';g+='     <a class="J_ping" report-eventid="MProductdetail_CommentPictureTab" report-pageparam="'+$("#currentWareId").val()+'" href="/ware/newCommentDetailPicShow.action?commentId='+x.guid+"&wareId="+$("#currentWareId").val()+'">';g+='         <ul class="jd-slider-container">';for(var s=0;s<x.pictureInfoList.length;s++){if(s==4){break}g+='<li class="jd-slider-item product-imgs-li">';g+='<img src="';if(x.pictureInfoList[s].picURL&&$("#httpsConfig")&&"true"==$("#httpsConfig").val()){g+=x.pictureInfoList[s].picURL.replace("http://","//")}else{g+=x.pictureInfoList[s].picURL}g+='"></li>';if(s<3){g+='<li class="product-img-space"></li>'}}g+="</ul>";g+="</a>";g+="</div>"}g+='            <p class="pay-date">\u8d2d\u4e70\u65e5\u671f\uff1a';g+=x.orderDate;g+="            </p>";try{if(x.wareAttribute.length>0){g+='            <p class="product-type">';if(x.wareAttribute[0]){if(x.wareAttribute[0].颜色){g+="\u989c\u8272\uff1a";g+=x.wareAttribute[0].颜色}else{if(x.wareAttribute[0].型号){g+="\u578b\u53f7\uff1a";g+=x.wareAttribute[0].型号}}}if(x.wareAttribute[1]){if(x.wareAttribute[1].颜色){g+=" \u989c\u8272\uff1a";g+=x.wareAttribute[1].颜色}else{if(x.wareAttribute[1].型号){g+=" \u578b\u53f7\uff1a";g+=x.wareAttribute[1].型号}}}g+="            </p>"}}catch(r){}g+="        </div>";g+="    </span>";g+='    <div class="assess-btns-box"><div class="assess-btns" >';g+='        <a class="assess-like-btn" id="'+u+'" onclick="clickUseful(\''+u+"')\">";g+='            <i class="assess-btns-icon btn-like-icon like-grey" id="praiseBtn_'+u+'" ></i>';g+='            <span class="assess-btns-num" id="praiseCnt_'+u+'" data="'+x.praiseCnt+'">(';g+=x.praiseCnt;g+=")</span>";g+='            <i class="like" id="like_'+u+'">+1</i>';g+="</a>";g+='        <a class="assess-reply-btn" onclick="isEnterReplyPage('+x.replyCnt+')" id="'+u+"_"+x.replyCnt+'" href="'+v+'">';if(x.replyCnt>0){g+='            <i class="assess-btns-icon btn-reply-icon"></i>'}else{g+='            <i class="no-assess-btns-icon btn-reply-icon"></i>'}g+='            <span class="assess-btns-num">(';g+=x.replyCnt;g+=")</span>";g+="</a>";g+="</div></div>";g+="</div>"}};var n=function(){if(!itemPingjiaFlag){i(0);b()}};var h=function(q){j.addTop(q);m.innerHTML=k;j.switchTab()};var d=function(u,q){try{var w=$("#currentWareId").val();if(u.length<o.maxCount){l.style.display="none";$(".reply-flat-bottom").show();$("#loadMoreFlag").val("false")}else{$(".reply-flat-bottom").hide();$("#loadMoreFlag").val("true")}if(u.length==0&&q){$("#loadMoreFlag").val("false");$(".reply-flat-bottom").hide();r=document.querySelector(".reply-body");g="";g+='<div class="tab-no-assess">';if(o.tabIndex==4){g+='<div class="errPic"><img src="../../../images/4.4/i/dog.png"/><span class="errPic-content">\u6682\u65e0\u6709\u56fe\u8bc4\u4ef7</span><div class="pro-button-box"><span class="pro-button tab-btn J_ping"  report-eventid="MProductdetail_CommentAll" report-eventlevel="5" report-pageparam="'+w+'">\u67e5\u770b\u5168\u90e8\u8bc4\u4ef7</span></div></div>'}else{if(o.tabIndex!=0){g+='<div class="errPic"><img src="../../../images/4.4/i/dog.png"/><span class="errPic-content">\u6682\u65e0\u8bc4\u4ef7</span><div class="pro-button-box"><span class="pro-button tab-btn J_ping" report-eventid="MProductdetail_CommentAll" report-eventlevel="5" report-pageparam="'+w+'">\u67e5\u770b\u5168\u90e8\u8bc4\u4ef7</span></div></div>'}else{g+='<div class="errPic"><img src="../../../images/4.4/i/dog.png"/><span class="errPic-content">\u6682\u65e0\u8bc4\u4ef7</span><div class="pro-button-box"><span class="pro-button J_ping" report-eventid="MProductdetail_CommentAll" report-eventlevel="5" report-pageparam="'+w+'" onclick="goViewDetail();">\u8fd4\u56de\u5546\u54c1\u9875</span></div></div>'}}g+="</div>";e.innerHTML=g;l.style.display="none";r.classList.add("white-color");r.classList.remove("reply-body-color");j.tabReturn();return}else{var r=document.querySelector(".reply-body");var s=$("#tabs li.tab-hover").find(".tab-assess-rednum").html();var y=parseInt($.trim(s));r.classList.add("reply-body-color");r.classList.remove("white-color");if(!isNaN(y)&&0==y){$("#loadMoreFlag").val("false");r.classList.add("white-color");r.classList.remove("reply-body-color")}var t=(o.maxCount<=u.length)?o.maxCount:u.length;if(q){e.innerHTML=""}g="";for(var v=0;v<t;v++){j.addHtml(u[v])}e.innerHTML+=g;j.imgAdjustWidth()}if($(".tab-no-assess")&&$(".tab-no-assess").length){$(".reply-flat-bottom").hide();$("#replyBody").addClass("white-color");$("#replyBody").removeClass("reply-body-color")}if($(".tab-btn")&&$(".tab-btn").length){j.tabReturn()}}catch(x){}};var b=function(){window.addEventListener(c,function(){clearTimeout(q);var q=setTimeout(function(){var r=document.documentElement.clientHeight-$(".jd-header-new-bar").height()-$(".hold-div-bottom").height()-$(".cart-concern-btm-fixed").height();o.oLoadPage.orientationchangeCb(r);j.imgAdjustWidth()},300)})};var i=function(r){var q="/newComments/newCommentsDetail.json";var u=$("#commontType").val();if(!u){u="0"}switch(o.tabIndex){case 0:u="0";break;case 1:u="3";break;case 2:u="2";break;case 3:u="1";break;case 4:u="4";break;default:u="0";break}$("#commontType").val(u);try{var t=window.sessionStorage;if(t){t.removeItem("tabIndex");t.setItem("tabIndex",o.tabIndex)}}catch(w){}var v={wareId:$("#currentWareId").val(),offset:"1",num:"10",type:u,checkParam:$("#commendetailModel").attr("commendetail-data")};var s=document.documentElement.clientHeight-$(".jd-header-new-bar").height()-$(".hold-div-bottom").height()-$(".cart-concern-btm-fixed").height();o.oLoadPage=new LoadPage();o.oLoadPage.init({containId:"#commentListId",pointHeight:s,reqType:"post",baseUrl:o.url,reqPara:v,reLoad:true,pageNo:"offset",beforeFn:function(){l.style.display="block"},successFn:function(x){var A=this,z=null;clearTimeout(z);l.style.display="none";if(x&&x.wareDetailComment){var y=x.wareDetailComment;if(y.commentInfoList){if(r=="0"&&this.reLoad){h(y)}d(y.commentInfoList,this.reLoad);window.addEventListener(c,function(){j.imgAdjustWidth()},false)}itemPingjiaFlag=true}else{x={wareDetailComment:{allCnt:"0",badCnt:"0",canConsultFlag:"true",code:"0",commentInfoList:[],consultationCount:"0",goodCnt:"0",normalCnt:"0",pictureCnt:"0",showPicCnt:"0"},commentCount:0,totalPage:0};if(r=="0"&&this.reLoad){h(x.wareDetailComment)}d(x.wareDetailComment.commentInfoList,this.reLoad)}},errorFn:function(){data={wareDetailComment:{allCnt:"0",badCnt:"0",canConsultFlag:"true",code:"0",commentInfoList:[],consultationCount:"0",goodCnt:"0",normalCnt:"0",pictureCnt:"0",showPicCnt:"0"},commentCount:0,totalPage:0};if(r=="0"&&this.reLoad){h(data.wareDetailComment)}d(data.wareDetailComment.commentInfoList,this.reLoad)}})};return n()}var pingClick=function(g,d,c,a){try{var f=new MPing.inputs.Click(g);f.event_param=d;f.page_param=a;var b=new MPing();b.send(f)}catch(h){}};var pingClickWithLevel=function(h,d,c,a,g){try{var f=new MPing.inputs.Click(h);f.event_param=d;f.page_param=a;f.event_level=g;var b=new MPing();b.send(f)}catch(i){}};function isEnterReplyPage(a){pingClickWithLevel("MProductdetail_CommentReply","","",$("#currentWareId").val(),"5");if($("#isDisplayReplyBtn").val()=="true"){return true}else{if(a>0){return true}else{$("#pop_none_reply").css("display","block");setTimeout(function(){$("#pop_none_reply").css("display","none")},1000);return false}}}function userDefaultImg(){var a=event.srcElement;a.src="/images/2014/ware/newcomments/user-default-avatar.png";a.onerror=null}function clickUseful(f){try{pingClickWithLevel("MProductdetail_CommentLikebutton","","",$("#currentWareId").val(),"5");var i=document.getElementById(f);var d=document.getElementById("praiseBtn_"+f);var h=document.getElementById("like_"+f);var c=document.querySelector(".useful-window");var e=$("#currentWareId").val();var a=document.getElementById("sid").value;var g=new Date().getTime();jQuery.ajax({url:"/newComments/clickUseful.json?t="+g,type:"post",dataType:"json",data:{wareId:e,commentId:f,sid:a},success:function(j){try{if(j){if(j.clickUseful=="0"){d.classList.add("like-red");h.classList.add("like_ani");var k=document.getElementById("praiseCnt_"+f);var n=k.getAttribute("data");var m=parseInt(n)+1;k.setAttribute("data",""+m);k.innerHTML="("+m+")";c.style.display="none"}else{if(j.clickUseful=="1"){c.style.display="block";clearTimeout(l);var l=setTimeout(function(){c.style.display="none"},1000)}else{c.style.display="none"}}}else{window.location.href="https://passport.m.jd.com/user/login.action?sid="+a+"&returnurl=http://item.m.jd.com/product/"+e+".html"}}catch(o){window.location.href="https://passport.m.jd.com/user/login.action?sid="+a+"&returnurl=http://item.m.jd.com/product/"+e+".html"}},error:function(k,j){window.location.href="https://passport.m.jd.com/user/login.action?sid="+a+"&returnurl=http://item.m.jd.com/product/"+e+".html"}})}catch(b){}}$(function(){var a=0;var c=$("#type").val();if(c){if(c=="4"){a=4}else{if(c=="0"){a=0}}}else{var b=window.sessionStorage;if(b){try{a=parseInt(b.getItem("tabIndex"));if(!a){a=0}}catch(d){a=0}}}});