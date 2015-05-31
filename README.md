
# scroll-scope.js 0.1.0

Small JS plugin to keep parent elements still when scrolling an element past their boundaries. Simple fix to a problem that shouldn't exist.

Commonly in scroll interaction, user hovers a mouse cursor over a scrollable element and uses trackpad or mouse wheel to scroll the element. When an element reaches its boundary, its parent element continues scrolling.

Usually this means that the user will continue moving down the page when attempting to interact with an specific container on the page. This is a common issue with dropdown menus and modal dialogs.



## Get the plugin

Download [scroll-scope.min.js](https://raw.githubusercontent.com/Eiskis/scroll-scope/master/scroll-scope.min.js) for production or [scroll-scope.js](https://raw.githubusercontent.com/Eiskis/scroll-scope/master/scroll-scope.js) for development. Check out the [source on GitHub](https://github.com/Eiskis/scroll-scope), demos at [eiskis.net/scroll-scope](http://eiskis.net/scroll-scope).

Install with Bower:

```sh
bower install scroll-scope
```



## Usage

Add the `data-scroll="scope"` attribute to any scrollable element on the page.

```html
<div class="my-scrollable-element" data-scroll="scope">
```

Include and initialize plugin:

```html
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scroll-scope.min.js"></script>
<script type="text/javascript">
	$(document).scrollScope();
</script>
```

The plugin attaches itself to the document object (or any parent container you choose), so you don't need to bind it for any new scrollable elements you might load via AJAX or otherwise insert into the DOM after initialization.



### Options

By default, `data-scroll="scope"` elements are targeted, but you can choose this upon initialization:

```js
$(document).scrollScope('.results, .some-scrollable-element');
```

By default, the plugin catches the events <code>DOMMouseScroll mousewheel</code>, but you can choose this upon initialization:

```js
$(document).scrollScope(null, 'DOMMouseScroll mousewheel my:event');
```



## Credits

Plugin by [Jerry Jäppinen](http://eiskis.net/) (under [MIT](https://github.com/Eiskis/scroll-scope/blob/master/LICENSE)).
