;(function () {

	var scrollScope = function (scope, treatChildren, targetSelector, targetEvents) {
		var self = this;



		// Options
		self.scope = !scope
						? jQuery(window.document.body)
						: scope instanceof jQuery
							? scope
							: jQuery(scope);

		self.targetEvents = targetEvents || 'DOMMouseScroll mousewheel';
		self.targetSelector = targetSelector || '[data-scroll="scope"]';



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
			return self;
		};

		// Bind to main container
		self.bind = function () {
			if (self.scope.length) {
				self.scope.on(self.targetEvents, self.targetSelector, self.onElementScroll);
			}
			return self;
		};

	};



	// Factory
	scrollScope.attach = function (container, options) {
		return (new scrollScope(container, options)).bind();
	};



	// Boilerplate
	if (typeof define === 'function' && typeof define.amd === 'object' && define.amd) {
		define(function() {
			return scrollScope;
		});
	} else if (typeof module !== 'undefined' && module.exports) {
		module.exports = scrollScope.attach;
		module.exports.scrollScope = scrollScope;
	} else {
		window.scrollScope = scrollScope;
	}

}());