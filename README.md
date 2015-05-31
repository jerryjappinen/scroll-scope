
# *scroll-scope.js*

Small jQuery plugin to <strong>keep parent element still when scrolling an element to its boundary</strong>.

Commonly in scroll interaction, user hovers a mouse cursor over a scrollable element and uses trackpad or mouse wheel to scroll the element. When an element reaches its boundary, its parent element continues scrolling. Usually this means that the user will continue moving down the page when attempting to interact with an specific container. This is a common issue with dropdown menus and modal dialogs.

This behavior varies a little from browser to browser but it doesn't work well on any of them. <em>scroll-scope.js</em> is a simple fix to this problem that shouldn't exist.



## Get the plugin

Direct download:

- Production: [scroll-scope.min.js](https://raw.githubusercontent.com/Eiskis/scroll-scope/master/scroll-scope.min.js)
- Development: [scroll-scope.js](https://raw.githubusercontent.com/Eiskis/scroll-scope/master/scroll-scope.js)

Install with Bower:

```sh
bower install scroll-scope
```

Check out the [source on GitHub](https://github.com/Eiskis/scroll-scope), demos at [eiskis.net/scroll-scope](http://eiskis.net/scroll-scope). Current version is 0.1.0.



## Usage

Add the `data-scroll-scope` attribute to any scrollable element on the page:

```html
<!-- Scope scrolling of an element when they overflow -->
<div class="my-scrollable-element" data-scroll-scope>

<!-- Scope scrolling of an element whether or not it overflows -->
<div class="another-scrollable-element" data-scroll-scope="force">
```

Include and initialize:

```html
// jQuery comes first, then the plugin
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scroll-scope.min.js"></script>

// Activate the plugin on your page
<script type="text/javascript">
	$(document).scrollScope();
</script>
```

The plugin attaches itself to the document object (or any parent container you choose), so you don't need to bind it for any new scrollable elements you might load via AJAX or otherwise insert into the DOM after initialization.



### Options

You can change which elements and events are targeted by setting them upon initialization. Here are the defaults:

```js
$(document).scrollScope({
	elements: '[data-scroll-scope]',
	forcedElements: '[data-scroll-scope="force"]',
	events: 'DOMMouseScroll mousewheel scroll touchmove'
});
```



## Credits

Plugin by [Jerry Jäppinen](http://eiskis.net/) (under [MIT](https://github.com/Eiskis/scroll-scope/blob/master/LICENSE)).
