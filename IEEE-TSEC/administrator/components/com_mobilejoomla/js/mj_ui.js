/* Mobile Joomla! 1.2.12 | mobilejoomla.com/license.html */
window.addEvent('domready',function(){
	function version_compare(v1, v2){
		var vm = {'dev': -4, 'alpha': -3, 'beta': -2, 'rc': -1},
			vprep = function(v){return ('' + v).toLowerCase().replace(/([^.\d]+)/g, '.$1.').replace(/\s+/g, '').replace(/\.{2,}/g, '.').split('.');},
			vnum = function(v){return !v ? 0 : (isNaN(v) ? vm[v] || -5 : parseInt(v, 10));};
		v1 = vprep(v1);
		v2 = vprep(v2);
		var i = 0,
			x = Math.max(v1.length, v2.length);
		for(; i < x; i++){
			if(v1[i]==v2[i]) continue;
			v1[i] = vnum(v1[i]);
			v2[i] = vnum(v2[i]);
			return (v1[i] < v2[i]) ? 1 : -1;
		}
		return 0;
	}

	function hidetabs(){
		$$('#submenu li a').each(function(a){
			$$(a.getProperty('href')).setStyle('display','none');
		});
	}
	function initTabs(){
		$$('#submenu li a').addEvent('click',function(e){
			$$('#submenu li a.active').removeClass('active');
			$$('#submenu li.active').removeClass('active');
			var a=$(this);
			a.blur();
			a.addClass('active').getParent().addClass('active');
			hidetabs();
			$$(a.getProperty('href')).setStyle('display','');
			e.returnValue=false;
			e.preventDefault();
		});
		var maxheight=0;
		$$('#submenu li a').each(function(a){
			var h=$$(a.getProperty('href'))[0].getCoordinates().height;
			if(h>maxheight) maxheight=h;
		});
		$('adminForm').setStyle('height',maxheight);
		hidetabs();
		var a=$$('#submenu li a')[0];
		a.addClass('active').getParent().addClass('active');
		$$(a.getProperty('href')).setStyle('display','');
	}

	function initSlider(){
		var slider=new Slider("mjconfig_jpegquality_slider","mjconfig_jpegquality_knob",{steps:100});
		var quality=$("mjconfig_jpegquality");
		slider.set(+quality.value);
		slider.addEvent('onChange',function(val){quality.value=val});
		quality.addEvent('change',function(){slider.set(+quality.value)});
	}

	function loadNotification(){
		if(typeof Request == "function"){
			new Request.HTML({url: 'http://ads.mobilejoomla.com/msg.html?v=1.2.12', method: 'get', update: 'mjmsgarea'}).send();
		} else if(typeof Ajax == "function"){
			new Ajax('http://ads.mobilejoomla.com/msg.html?v=1.2.12', {method: 'get', evalScripts: true, update: $('mjmsgarea')}).request();
		}
	}

	function checkUpdate(){
		if(typeof Request == "function"){
			new Request.HTML( {
				url: 'http://www.mobilejoomla.com/getver.php?v=' + escape('1.2.12'),
				method: 'get',
				update: 'mjlatestver',
				onSuccess : function(tree, elements, response){
					if(version_compare('1.2.12', response)>0){
						$('mjlatestverurl').setStyle('display', 'block');
					}
				}
			}).send();
		} else if(typeof Ajax == "function"){
			new Ajax( 'http://www.mobilejoomla.com/getver.php?v=' + escape('1.2.12'), {
				method: 'get',
				update: $('mjlatestver'),
				onComplete: function(response){
					if(version_compare('1.2.12', response)>0){
						$('mjlatestverurl').setStyle('display', 'block');
					}
				}
			}).request();
		}
	}

	try{
		initTabs();
	}catch(e){}
	try{
		initSlider();
	}catch(e){}
	try{
		loadNotification();
	}catch(e){}
	try{
		checkUpdate();
	}catch(e){}
});
