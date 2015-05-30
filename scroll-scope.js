;(function ($) {

	$.fn.scrollScope = function (targetSelector, targetEvents) {

		// Setup

		// We bind the on handler to this element, but
		// it's not the one that is being scrolled
		var mainContainer = this;

		// Some options
		var events = targetEvents || 'DOMMouseScroll mousewheel';
		var selector = targetSelector || '[data-scroll="scope"]';



		// Magic

		// Cancel an event for good
		// NOTE: on super fast scroll events this sometimes fails
		self.killScrolling = function (event) {
			event.stopPropagation();
			event.preventDefault();
			event.returnValue = false;
			return false;
		};

		// Prevents parent element from scrolling when a child element is scrolled to its boundaries
		self.onScroll = function (event) {

			// Child that is being scrolled hasn't labeled the event as legit
			if (!event.isLegitScroll) {
				var element = $(this);
				var scrollTop = this.scrollTop;
				var delta = event.originalEvent.wheelDelta;
				var goingUp = delta > 0;

				// Scrolling down, but this will take us past the bottom
				if (!goingUp && -delta > this.scrollHeight - element.outerHeight() - scrollTop) {
					element.scrollTop(this.scrollHeight);
					return self.killScrolling(event);

				// Scrolling up, but this will take us past the top
				} else if (goingUp && delta > scrollTop) {
					element.scrollTop(0);
					return self.killScrolling(event);
				}

			}

			// Event wasn't killed, label it legit listeners on parent levels
			event.isLegitScroll = true;
			return true;
		};



		// Actions

		// Remove listener from parent
		var destroy = function () {
			if (self.scope.length) {
				self.off(events, selector, onScroll);
			}
			return self;
		};

		// Bind listener to parent
		var bind = function () {
			return mainContainer.on(events, selector, onScroll);
		};

		return bind();
	};

}(jQuery));
