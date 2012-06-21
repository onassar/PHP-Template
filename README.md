PHP-Template
============

PHP-Template is, you guessed it, a templating library that allows you to pass a
string through a rendering engine, and have custom-tags converted through 
programtic means.

### Quick Example
``` php
<?php

    // includes
    require_once APP . '/vendors/PHP-Template/Template.class.php';
    require_once APP . '/vendors/PHP-Template/TemplateTag.class.php';
    require_once APP . '/vendors/PHP-Template/HelloWorldTag.class.php';

    // mark the HelloWorld tag (accessed as <hw />) to be rendered/converted
    Template::addTag('HelloWorld');

    // render text
    $str = '<hw />';
    echo Template::render($str);

```

This example is pretty basic. It loads the `Template` abstract class,
`TemplateTag` abstract class (which cannot be accessed statically; rather acts
as a parent for others), and the `HelloWorldTag` instantiable class.

It then marks that the `HelloWorld` tag is an applicable tag for the templating
engine.

Finally, it defines a string (which in most cases, ought to be your
application's buffer before it is flushed to the user) which contains a tag.
That string is passed through the rendered, and the string 'Hello World!' is
put it's place.

### Creating Tags
The power from this library comes most readily from creating your own tags. As
can be seen by browsing the
[HelloWorldTag.class.php](https://github.com/onassar/PHP-Template/blob/master/HelloWorldTag.class.php)
file, the process for defining your own `TemplateTag` child class is pretty
straightforward.

You begin by defining the `$_patterns` array, supplying keys and regular
expressions. Beyond that, there is really only the `replacement` method.

This method accepts three parameters:

 * `$type`
 The key of the pattern that was matched
 * `$matches` An array of matched backreferences from the string, against the
 pattern
 * `$tag` The matching tag, in full.

I'll try and get a more robust tag example up soon.

### Purpose
The plugin architecture for my MVC framework
[TurtlePHP](https://github.com/onassar/TurtlePHP) is such that you can capture
the buffer before it's sent to the user quite easily.

In working with the [Twilio](https://www.twilio.com/) API, I realized I could
make an abstracted TurtlePHP plugin that I could re-use, but thought it would be
much easier if I could add in custom tags.

For example:
```html
<a href="#">some random markup</a>
<twilio-connect app-id="jkdfhgrnd23rf" />
Some more markup
```

I could then create a `TwilioConnect` tag that would use the
[TurtlePHP-TemplatePlugin](https://github.com/onassar/TurtlePHP-TemplatePlugin)
to automatically insert the approriate code. The code generally looks something
like this:

```html
<style type="text/css">
	#twilio-connect-button {
		background: url(https://www.twilio.com/packages/connect-apps/images/connect-button.png);
		width: 130px; height: 34px; display: block;	margin: 0 auto;
	}
	#twilio-connect-button:hover { background-position: 0 34px; }
</style>
<a href="https://www.twilio.com/authorize/CN0229f4df9b25a726608d68ea78048d5f" id="twilio-connect-button"></a>
```

This is the code the Twilio generates and requires you to use when
authenticating users via their Twilio account.

The `HelloWorldTag` class is meant to serve as a really *basic* example. I'll
put up a more robust sample tag when I can that shows the matching of attributes
in a sample tag.
