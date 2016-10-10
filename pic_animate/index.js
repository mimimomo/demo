// JavaScript Document
window.onload = function(){
	var container = document.getElementById("container");
	var list = document.getElementById("list");
	var buttons = document.getElementById("buttons").getElementsByTagName("span");
	var prev = document.getElementById("prev");
	var next = document.getElementById("next");
	var index = 0;
	var timer;
	
	//动画函数
	function animate(offset){
		var newLeft = parseInt(list.style.left) + offset;
		var dis = offset/10;
		
		//图片逐渐变换
		function go(){
			if(newLeft <= 0 && newLeft >= -2400){
				if ( (dis > 0 && parseInt(list.style.left) < newLeft) || (dis < 0 && parseInt(list.style.left) > newLeft)){
				clearTimeout(timer);
				 list.style.left = parseInt(list.style.left) + dis + 'px';
                 timer = setTimeout(go, 50);
				}
			}
			else{
				if(newLeft > 0)
					{
						list.style.left = -2400 +"px";
					}
					if(newLeft < -2400)
					{
						list.style.left = 0+"px";
					}
			}
			
		}
	
	go();
	}

	//按钮动画
	function showButtons(){
		for(var i = 0;i<buttons.length;i++){
			if(buttons[i].className == 'on')
			{
				buttons[i].className = '';
			}
				
		}
		buttons[index].className = "on";
	}
	
	//点击向前或向后箭头切换图片
	prev.onclick = function(){
		if(index == 0){
			index = 4;
			
		}
		else{
			index --;
	
		}
		
		showButtons();
		animate(600);
	
	}
	
	next.onclick = function(){
		if(index == 4){
			index = 0;
		}
		else{
			index ++;
			
		}
		
		showButtons();
		animate(-600);
	}

	//点击按钮切换到目标图片上
	for(var i=0;i<buttons.length;i++)
	{
		buttons[i].onclick = function(){
			var myIndex = parseInt(this.getAttribute("index"));
			var offset = -600 * (myIndex - index) ;
			animate(offset);
			index = myIndex;
			showButtons();
		}
	}

} 











