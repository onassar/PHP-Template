PHP-Template
============

PHP-Template is, you guessed it, a templating library that allows you to pass a
string through a rendering engine, and have custom-tags converted through 
programtic means.

### Quick Example

    // includes
    require_once APP . '/vendors/PHP-Template/Template.class.php';
    require_once APP . '/vendors/PHP-Template/TemplateTag.class.php';
    require_once APP . '/vendors/PHP-Template/HelloWorldTag.class.php';

    // mark the HelloWorld tag (accessed as <hw />) to be rendered/converted
    Template::addTag('HelloWorld');

    // render text
    $str = '<hw />';
    echo Template::render($str);

This example is pretty basic. It loads the `Template` abstract class,
`TemplateTag` abstract class (which cannot be accessed statically; rather acts
as a parent for others), and the `HelloWorldTag` instantiable class.

It then marks that the `HelloWorld` tag is an applicable tag for the templating
engine.

Finally, it defines a string (which in most cases, ought to be your
application's buffer before it is flushed to the user) which contains a tag.
That string is passed through the rendered, and the string 'Hello World!' is
put it's place.

