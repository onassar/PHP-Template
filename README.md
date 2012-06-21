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
