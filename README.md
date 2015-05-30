
# *scroll-scope.js*

Small JS plugin to keep parent elements still when scrolling an element past their boundaries. Simple fix to a problem that shouldn't exist. See demos at []();



## Usage

Add the `data-scroll="scope"` attribute to any scrollable element on the page.

```html
<div class="my-scrollable-element" data-scroll="scope">
```

Include and initialize plugin:

```html
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="scroll-scope.js"></script>
<script type="text/javascript">
	$(document).scrollScope();
</script>
```

The plugin attaches itself on the document (or any parent container you choose), so you don't need to bind it for any new scrollable elements you might load via AJAX or otherwise insert into the DOM after initialization.



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
