<?php

    /**
     * HelloWorldTag
     * 
     * Serves to exemplify a `Tag` class. Does nothing but replace the tag
     * <hw /> with the string 'Hello World!'.
     * 
     * @author  Oliver Nassar <onassar@gmail.com>
     * @extends TemplateTag
     */
    class HelloWorldTag extends TemplateTag
    {
        /**
         * __patterns
         * 
         * The patterns, which when matched, are passed to the <replacement>
         * method for, you guessed it, replacement.
         * 
         * @var    Array
         * @access protected
         */
        protected $_patterns = array(
            'standard' => '#<hw />#Ui'
        );

        /**
         * __construct
         * 
         * @access public
         * @return void
         */
        public function __construct()
        {
        }

        /**
         * replacement
         * 
         * Replaces the custom 'booted' tag with the array of json encoded
         * static content paths.
         * 
         * @access Public
         * @final
         * @param  String $type which pattern is being matched (eg. 'standard')
         * @param  Array $matches Array of arguments that were matched in the
         *         pattern
         * @param  String $tag the tag itself that was matched (can be useful
         *         in performing sub-expressions on a found pattern)
         * @return String
         */
        final public function replacement($type, array $matches, $tag)
        {
            return 'Hello World!';
        }
    }
