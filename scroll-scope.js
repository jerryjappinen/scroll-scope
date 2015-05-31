/*! scroll-scope.js 0.1.0, MIT
 https://github.com/Eiskis/scroll-scope
*/
;(function ($) {

	$.fn.scrollScope = function (targetSelector, targetEvents) {

		// Setup

		// We bind the on handler to this element, but
		// it's not the one that is being scrolled
		var mainContainer = this;

		// Some options
		var events = targetEvents || 'DOMMouseScroll mousewheel scroll touchmove';
		var selector = targetSelector || '[data-scroll="scope"]';



		// Magic

		// Cancel an event for good
		// NOTE: on super fast scroll events this sometimes fails
		self.killScrolling = function (event) {

			// Preventing touchmove disables click events on mobile Safari
			if (event.type !== 'touchmove') {
				event.preventDefault();
			}

			// Kill kill kill
			event.stopPropagation();
			event.returnValue = false;
			return false;
		};

		// Prevents parent element from scrolling when a child element is scrolled to its boundaries
		self.onScroll = function (event) {

			// Event wasn't killed, label it legit listeners on parent levels
			if (event.isLegitScroll) {
				return true;
			}

			// Start handling
			var element = $(this);
			var yPos = this.scrollTop;
			var scrollHeight = this.scrollHeight;
			var apparentHeight = element.outerHeight();

			// Workaround for mobile
			// NOTE: this blocks scrolling if the elemenet has data-scroll attribute, even if it's not scrollable
			if (event.type === 'touchmove' && scrollHeight <= apparentHeight) {
				return self.killScrolling(event);
			}

			// Normalize fetching delta
			var delta = (event.originalEvent.wheelDelta);
			if (typeof delta === 'undefined') {
				delta = event.originalEvent.detail;
			}

			// Intervene only if we know we're actually moving
			if (delta < 0 || delta > 0) {
				var goingUp = delta > 0;

				// Scrolling down, but this will take us past the bottom
				if (!goingUp && -delta > (scrollHeight - apparentHeight - yPos)) {
					element.scrollTop(this.scrollHeight);
					return self.killScrolling(event);

				// Scrolling up, but this will take us past the top
				} else if (goingUp && delta > yPos) {
					element.scrollTop(0);
					return self.killScrolling(event);
				}
			}

			// Nothing intervened, I guess we're good
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
