		//完美运动框架
		function getStyle(obj,name){
				if(window.getComputedStyle){
					return getComputedStyle(obj,null)[name];
				}else{
					return obj.currentStyle[name];
				}
				
			}
			function startMove(obj,json,fn) {
				clearInterval(obj.timer);
				obj.timer = setInterval(function() {
					var bStop=true;//默认为true
					for(var attr in json){
						var iCur = 0;
					if(attr=="opacity"){
						var iCur=parseInt(parseFloat(getStyle(obj,attr))*100);
					}else{
						var iCur = parseInt(getStyle(obj, attr));
					}
					
					var iSpeed = (json[attr]-iCur)/8;
					iSpeed = iSpeed>0? Math.ceil(iSpeed) : Math.floor(iSpeed);
						if(iCur!=json[attr]) {
						bStop=false;
						} 
						if(attr=="opacity"){
							obj.style.filter="alpha(opacity:"+(iCur+iSpeed)+")";
							obj.style.opacity=(iCur+iSpeed)/100;
						}else{
							obj.style[attr] = iCur + iSpeed + "px";
							}
						
						}
					if(bStop){
						clearInterval(obj.timer);
						if(fn){
							fn();
						}
					}
					
				}, 30)
			}