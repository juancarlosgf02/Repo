+(function() {
	var container = document.querySelector(".catalog");
	var next = container.querySelector(".next");
	var prev = container.querySelector(".prev");
	var slideTo = container.querySelector(".slide-to");
	var items = container.querySelectorAll(".content li");
	var counter = 0;
	var totalItems = items.length;
	var current = items[0];

	var goTo = function (number) {
		current.classList.remove("current");
		$(current).trigger('zoom.destroy');
		if (counter < 0) {
			counter = totalItems - 1;
		}
		if (number >= totalItems) {
			counter = 0;
		}
		current = items[counter];
		current.classList.add("current");
		slideTo.selectedIndex = counter;
		$(current).zoom();
	};

	next.addEventListener("click", function () {
		counter += 1;
		goTo(counter);
	});
	prev.addEventListener("click", function () {
		counter -= 1;
		goTo(counter);
	});
	slideTo.addEventListener("change", function () {
		var slide = parseInt(this.selectedOptions[0].getAttribute("data-slide-to"));
		counter = slide;
		goTo(counter);
	});

	$(".lazy").lazyload();
	$('.catalog .content').find("li").fullsizable({
		detach_id: 'fs-container',
		clickBehaviour: 'next'
	});
	$(".fullscreen").click(function () {
		$(current).trigger("click");
	})
	setTimeout(function () {
		$(current).zoom();
	}, 1000);
})();