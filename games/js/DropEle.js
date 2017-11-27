function DropIt(obj)
		{
			obj.onmousedown=function()
			{
				event=event||window.event;
				var disX=event.clientX-obj.offsetLeft;   //获取到在box内的位置
				var disY=event.clientY-obj.offsetTop;   
				// 把this换成document防止鼠标移动过快
				document.onmousemove=function()
				{
					obj.style.left=event.clientX-disX+"px";
					obj.style.top=event.clientY-disY+"px";
				}
				document.onmouseup=function()
				{
					document.onmousemove=document.onmouseup=null;
					
				}
				return false;   //防止拖动影响
			}
			
		}