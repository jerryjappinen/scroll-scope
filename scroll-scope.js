/*! scroll-scope.js 0.1.0, MIT
 https://github.com/Eiskis/scroll-scope
*/
;(function ($) {

	$.fn.scrollScope = function (input, secondInput) {



		// Main object
		var ScrollScope = function (mainContainer, options) {
			var self = this;

			// We bind the on handler to this element, but
			// it's not the one that is being scrolled
			self.mainContainer = mainContainer;

			// This will be evaluated later
			self.selector = null;

			// Some options
			self.settings = $.extend({
				elements: '[data-scroll-scope]',
				forcedElements: '[data-scroll-scope="force"]',
				events: 'DOMMouseScroll mousewheel scroll touchstart touchmove'

			// Only extend if one of the keys are included
			}, (
				options.elements ||
				options.forcedElements ||
				options.events
					? options
					: {}
				)
			);



			// Magic

			self.getTargetedElements = function () {
				return self.mainContainer.find(self.selector);
			};

			// Get working selector that targets all items
			// FIXME: test this!
			self.getSelector = function (selectors) {
				var legits = [];
				for (var i = 0; i < selectors.length; i++) {
					if (selectors[i] && selectors[i].length) {
						legits.push(selectors[i]);
					}
				}
				return legits.length ? legits.join(', ') : null;
			};

			// Cancel an event for good
			self.killScrolling = function (event, force) {

				// Preventing touchmove disables click events on mobile Safari, so we require user to force
				if (
					force ||
					(
						event.type !== 'touchmove' &&
						event.type !== 'touchstart'
					)
				) {
					event.preventDefault();
					event.stopPropagation();
					event.returnValue = false;
					return false;
				}

			};



			// Prevents parent element from scrolling when a child element is scrolled to its boundaries
			self.onScroll = function (event) {

				// Event has been evaluated on lower level and deemed legit
				if (event.isLegitScroll) {
					return true;
				}

				// Start handling
				var element = $(this);
				var force = (self.settings.forcedElements && element.is(self.settings.forcedElements));
				var scrollHeight = this.scrollHeight;
				var apparentHeight = element.outerHeight();
				var scrollingLeft = scrollHeight - apparentHeight - this.scrollTop;

				// Let targeted elements scroll parent when they're not scrollable at all
				if (scrollHeight <= apparentHeight) {
					if (force) {
						return self.killScrolling(event, force);
					}
					return true;
				}

				// Normalize fetching delta
				var delta = event.originalEvent.wheelDelta;

				// Mobile doesn't let us kill scrolling in some situations, but
				// if we cheat for just 1px the native scoping works with bounce
				if (
					force &&
					typeof delta === 'undefined' &&
					(event.type === 'touchstart')
				) {

					// When we're on top, move down one pixel
					if (this.scrollTop <= 0) {
						element.scrollTop(1);

					// When we're at the bottom, move up one pixel
					} else if (scrollingLeft <= 0) {
						element.scrollTop(scrollHeight - apparentHeight - 1);
					}
				}

				// Firefox doesn't return wheel delta, but we don't need it since Firefox works without our hacks
				// if (typeof delta === 'undefined') {
				// 	delta = event.originalEvent.detail;
				// }

				// Intervene only if we know we're actually moving
				var goingUp = delta > 0;

				// Scrolling down, but this will take us past the bottom
				if (!goingUp && -delta > scrollingLeft) {
					element.scrollTop(this.scrollHeight);
					return self.killScrolling(event, force);

				// Scrolling up, but this will take us past the top
				} else if (goingUp && delta > this.scrollTop) {
					element.scrollTop(0);
					return self.killScrolling(event, force);
				}

				// Nothing intervened, I guess we're good
				event.isLegitScroll = true;
				return true;
			};



			// Remove listener from parent
			self.destroy = function () {
				return self.mainContainer.off(self.settings.events, self.selector, self.onScroll);
			};

			// Bind listener to parent
			self.bind = function () {
				return self.mainContainer.on(self.settings.events, self.selector, self.onScroll);
			};



			// Normalize selectors
			self.settings.elements = self.getSelector([self.settings.elements]);
			self.settings.forcedElements = self.getSelector([self.settings.forcedElements]);
			self.selector = self.getSelector([self.settings.elements, self.settings.forcedElements]);

		};



		// jQuery usage

		// Return the main object or allow jQuery chaining
		var obj = new ScrollScope(this, input);
		if (secondInput) {
			return obj;
		}
		return obj.bind();

	};

}(jQuery));
