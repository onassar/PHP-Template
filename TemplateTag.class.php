<?php

    /**
     * TemplateTag
     * 
     * The parent, abstract, class of a templateable tag. It presents a <render>
     * method 
     * 
     * @author Oliver Nassar <onassar@gmail.com>
     */
    abstract class TemplateTag
    {
        /**
         * __construct
         * 
         * @access public
         * @return void
         */
        public function __construct($pattern)
        {
        }

        /**
         * render
         * 
         * Renders a <TemplateTag> instance by matching a the passed in strings
         * value to the possible regular expressions that the tag should be
         * applied to.
         * 
         * @access public
         * @final
         * @param  String $str String that should have custom-template-tags
         *         appropriately replaced
         * @return String
         */
        final public function render($str)
        {
            // loop through each respective pattern
            foreach ($this->_patterns as $name => $pattern) {

                // callback reference
                $callback = array($this, 'replacement');

                /**
                 * Define replacement callback function, giving scope/access to
                 * the <callback> and <name> variables within it.
                 */
                $replacement = function($matches) use ($callback, $name) {
                    $tag = array_shift($matches);
                    return call_user_func_array($callback, array(
                        $name,
                        $matches,
                        $tag
                    ));
                };

                // render the string through the replacement method
                $str = preg_replace_callback(
                    $pattern,
                    $replacement,
                    $str
                );
            }

            // return passed-in string with any-applicable tags rendered
            return $str;
        }
    }
