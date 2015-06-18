
# *scroll-scope.js*

Small jQuery plugin to **keep parent element still when scrolling an element to its boundary**.

Commonly in scroll interaction, user hovers a mouse cursor over a scrollable element and uses trackpad or mouse wheel to scroll the element. When an element reaches its boundary, its parent element continues scrolling. Usually this means that the user will continue moving down the page when attempting to interact with an specific container. This is a common issue with dropdown menus and modal dialogs.

This behavior is most prevalent in desktop browsers. To fix this problem that shouldn't even exist, <em>scroll-scope.js</em> exists.

See project home and demos on [eiskis.net/scroll-scope](http://eiskis.net/scroll-scope).

## Get the plugin

Current version is *0.1.0*.

- [scroll-scope.js](https://raw.githubusercontent.com/Eiskis/scroll-scope/master/scroll-scope.js)
- [scroll-scope.min.js](https://raw.githubusercontent.com/Eiskis/scroll-scope/master/scroll-scope.min.js)

Install with Bower:

```sh
bower install scroll-scope
```

File [issues or pull requests](https://github.com/Eiskis/scroll-scope/issues) to share potential improvements. The plugin is released under MIT. Source is available on [GitHub](https://github.com/Eiskis/scroll-scope). To contribute, clone the repo, make changes in *scroll-scope.js* and build the minified version with `gulp`.



## Usage

Add the `data-scroll-scope` attribute to any scrollable element on the page:

```html
<!-- Scope scrolling of element when it overflows -->
<div class="my-scrollable-element" data-scroll-scope>

<!-- Scope scrolling of element whether or not it overflows -->
<div class="another-scrollable-element" data-scroll-scope="force">
```

Include and initialize:

```html
<!-- jQuery comes first, then the plugin -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scroll-scope.min.js"></script>

<!-- Activate the plugin on your page -->
<script type="text/javascript">
	$(document).scrollScope();
</script>
```

The plugin works declaratively, meaning that it's attached to the document object (or any parent container you choose) instead of individual scrollable containers. This means that any DOM elements that are added or removed after page load do not need to be bound separately. You can even toggle <code>force</code> on and off during runtime if you please.



### Options

You can change which elements and events are targeted by setting them upon initialization. Note that having events listed here does not mean they're blocked automatically, rather the plugin listens to these events and evaluates them when encountered.

Here are the defaults:

```js
$(document).scrollScope({
	elements: '[data-scroll-scope]',
	forcedElements: '[data-scroll-scope="force"]',
	events: 'DOMMouseScroll mousewheel scroll touchstart touchmove'
});
```


### Advanced use

If you need full access to `ScrollScope` object (for example to `getTargetedElements()` or `unbind()` it later), instantiate a raw `ScrollScope` object yourself. You need to bind it to the document yourself in this case:

```js
// Create new instance
var myScrollScopeInstance = new ScrollScope({
	options: 'here'
});

// Bind to document
myScrollScopeInstance.bind(document);

// Use the object for whatever you wish
myScrollScopeInstance.mainContainer.css('background', 'blue');
myScrollScopeInstance.getTargetedElements().css('background', 'red');

// Detach from document if no longer needed
myScrollScope.unbind();
```



## Credits

Plugin by [Jerry Jäppinen](http://eiskis.net/) (under [MIT](https://github.com/Eiskis/scroll-scope/blob/master/LICENSE)).
