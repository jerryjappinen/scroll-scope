;(function () {

	var ScrollScoper = function (scope, treatChildren, targetSelector, targetEvents) {
		var self = this;

		// Options
		self.scope = !scope
						? jQuery(window.document.body)
						: scope instanceof jQuery
							? scope
							: jQuery(scope);

		self.targetEvents = targetEvents || 'DOMMouseScroll mousewheel';
		self.targetSelector = targetSelector || '[data-scroll="scoped"]';



		// Cancel an event for good
		// NOTE: on super fast scroll events this sometimes fails
		self.killScrolling = function (event) {
			event.stopPropagation();
			event.preventDefault();
			event.returnValue = false;
			return false;
		};

		// Prevents parent element from scrolling when a child element is scrolled to its boundaries
		self.onElementScroll = function (event) {
			if (!event.letMeThrough) {
				var element = $(this);
				var scrollTop = this.scrollTop;
				var scrollHeight = this.scrollHeight;
				var height = element.outerHeight();
				var delta = event.originalEvent.wheelDelta;
				var goingUp = delta > 0;

				// Scrolling down, but this will take us past the bottom
				if (!goingUp && -delta > scrollHeight - height - scrollTop) {
					element.scrollTop(scrollHeight);
					return self.killScrolling(event);

				// Scrolling up, but this will take us past the top
				} else if (goingUp && delta > scrollTop) {
					element.scrollTop(0);
					return self.killScrolling(event);
				}

				// Mark event for other listeners
				event.letMeThrough = true;
				return true;
			}
		};



		// Unbind
		self.destroy = function () {
			if (self.scope.length) {
				self.off(self.targetEvents, self.targetSelector, self.onElementScroll);
			}
		};

		// Bind to main container upon init
		if (self.scope.length) {
			self.scope.on(self.targetEvents, self.targetSelector, self.onElementScroll);
		}

	};



	// Factory
	ScrollScoper.attach = function (container, options) {
		return new ScrollScoper(container, options);
	};



	// Boilerplate
	if (typeof define === 'function' && typeof define.amd === 'object' && define.amd) {
		define(function() {
			return ScrollScoper;
		});
	} else if (typeof module !== 'undefined' && module.exports) {
		module.exports = ScrollScoper.attach;
		module.exports.ScrollScoper = ScrollScoper;
	} else {
		window.ScrollScoper = ScrollScoper;
	}

}());
