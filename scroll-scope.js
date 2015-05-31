/*! scroll-scope.js 0.1.0, MIT
 https://github.com/Eiskis/scroll-scope
*/
;(function ($) {

	$.fn.scrollScope = function (options) {

		// Setup

		// We bind the on handler to this element, but
		// it's not the one that is being scrolled
		var mainContainer = this;

		// Some options
		var settings = $.extend({
			elements: '[data-scroll-scope]',
			forcedElements: '[data-scroll-scope="force"]',
			events: 'DOMMouseScroll mousewheel scroll touchmove'
		}, options);

		var selector = settings.elements + ', ' + settings.forcedElements;



		// Magic

		// Cancel an event for good
		// Preventing touchmove disables click events on mobile Safari, rquiring user to force
		var killScrolling = function (event, force) {
			if (force || event.type !== 'touchmove') {
				event.preventDefault();
				event.stopPropagation();
				event.returnValue = false;
				return false;
			}
		};

		// Prevents parent element from scrolling when a child element is scrolled to its boundaries
		var onScroll = function (event) {

			// Event has been evaluated on lower level and deemed legit
			if (event.isLegitScroll) {
				return true;
			}

			// Start handling
			var element = $(this);
			var force = element.is(settings.forcedElements);
			var yPos = this.scrollTop;
			var scrollHeight = this.scrollHeight;
			var apparentHeight = element.outerHeight();

			// Let targeted elements scroll parent when they're not scrollable at all
			if (scrollHeight <= apparentHeight) {
				if (force) {
					return killScrolling(event, force);
				}
				return true;
			}

			// Normalize fetching delta
			var delta = event.originalEvent.wheelDelta;

			// Firefox doesn't return delta, but we don't need it since Firefox works out of the box
			// if (typeof delta === 'undefined') {
			// 	delta = event.originalEvent.detail;
			// }

			// Intervene only if we know we're actually moving
			var goingUp = delta > 0;

			// Scrolling down, but this will take us past the bottom
			if (!goingUp && -delta > (scrollHeight - apparentHeight - yPos)) {
				element.scrollTop(this.scrollHeight);
				return killScrolling(event, force);

			// Scrolling up, but this will take us past the top
			} else if (goingUp && delta > yPos) {
				element.scrollTop(0);
				return killScrolling(event, force);
			}

			// Nothing intervened, I guess we're good
			event.isLegitScroll = true;
			return true;
		};



		// Actions

		// Remove listener from parent
		var destroy = function () {
			return mainContainer.off(settings.events, selector, onScroll);
		};

		// Bind listener to parent
		var bind = function () {
			return mainContainer.on(settings.events, selector, onScroll);
		};

		return bind();
	};

}(jQuery));
