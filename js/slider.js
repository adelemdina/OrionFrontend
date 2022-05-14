function getRadios(nodeList) {
	var nodes = [];

	for (var i = 0; i < nodeList.length; ++i) {
		if (nodeList[i].nodeType === Node.ELEMENT_NODE) {
			if (nodeList[i].getAttribute("type") === "radio") {
				nodes.push(nodeList[i]);
			}
		}
	}

	return nodes;
}

var slider = (function(){
	var frame = document.getElementById("sliderFrame");

	var radios = getRadios(frame.childNodes);
	var nextBtn = document.getElementById("next");
	var prevBtn = document.getElementById("prev");

	var count = 0;
	var interval = null;

	function rotate(num) {
		num = num ? num : 1;

		if (count + num < 0) {
			count = radios.length;
		} else if (count + num > radios.length - 1) {
			count = 0;
		} else {
			count += num;
		}

		radios[count].checked = true;
	}

	function advance() {
		rotate(1);
		setSliderInterval();
	}

	function reverse() {
		rotate(-1);
		setSliderInterval();
	}

	function init() {
		for (var i = 0; i < radios.length ; ++i) {
			radios[i].addEventListener("click", radioClick, false);
		}

		nextBtn.addEventListener("click", advance, false);
		prevBtn.addEventListener("click", reverse, false);

		setSliderInterval();
	}

	function radioClick(e) {
		setSliderInterval();
		count = radios.indexOf(e.target);
	}

	function setSliderInterval() {	
		interval = interval ? refreshInterval() : window.setInterval(rotate, 6000);
	}

	function refreshInterval() {
		clearInterval(interval);
		return window.setInterval(rotate, 6000);
	}

	return {
		advance : advance,
		init : init
	};
	
})();

slider.init();