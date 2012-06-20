<?php

    /**
     * Template
     * 
     * An abstract templating class that handles the rendering of a string-body
     * andd keeps track of the tags that act as applicable templates.
     * 
     * @author   Oliver Nassar <onassar@gmail.com>
     * @abstract
     */
    abstract class Template
    {
        /**
         * _tags
         * 
         * Tags which can be rendered by the render method.
         * 
         * @var    Array
         * @access private
         * @static
         */
        private static $_tags = array();

        /**
         * render
         * 
         * Converts a string with custom-markup-tags to one with it's tags
         * progrmatically replaced.
         * 
         * @access public
         * @static
         * @param  String $str
         * @return String
         */
        public static function render($str)
        {
            // loop through the tags and render the string
            foreach (self::$_tags as $tag) {
                $tag = new $tag();
                $str = $tag->render($str);
            }
            return $str;
        }

        /**
         * addTag
         * 
         * Adds a tag to the array of possible tags that can be converted into
         * markup through it's respective class.
         * 
         * @access public
         * @static
         * @param  String $class
         * @return void
         */
        public static function addTag($class)
        {
            // class name
            $class = ($class) . 'Tag';

            // if it's not a valid <TemplateTag> (child) instance
            if (!class_exists($class)) {

                // error out
                $msg = '*' . ($class) . '* class couldn\'t be found. Ensure ' .
                    'you\'ve included it.';
                throw new Exception($msg);
            }

            // add to render-able tags
            array_push(self::$_tags, $class);
        }
    }
