<?php

namespace Asymptix\HtmlDomParser;

/**
 * Simple HTML DOM lib DOM node wrapper class.
 *
 * @category Asymptix PHP HTML DOM Parser
 * @author Dmytro Zarezenko <dmytro.zarezenko@gmail.com>
 * @copyright (c) 2015, Dmytro Zarezenko
 *
 * @git https://github.com/dzarezenko/Asymptix-PHP-HTML-DOM-Parser.git
 * @license http://opensource.org/licenses/MIT
 */
class HtmlDomNode extends \simple_html_dom_node {

    /**
     * Find some DOM Element by it's route.
     *
     * @param array $selectors List of selectors where keys are selector strings
     *            and values are indexes (number in DOM order from zero).
     * @param bool $lowercase
     * @return DOMElement
     * @throws Exception When can't get DOM Element by current path.
     */
    public function findRec($selectors = null, $lowercase = false) {
        $obj = $this;
        foreach ($selectors as $selector => $index) {
            if (is_object($obj)) {
                $obj = $obj->find($selector, $index, $lowercase);
            } else {
                throw new Exception("Invalid DOM selectors path.");
            }
        }
        if (!is_object($obj)) {
            throw new Exception("Can't fetch DOM Element by current path.");
        }

        return $obj;
    }

    /**
     * Detects if DOM Element has some class in class attribute list.
     *
     * @param DOMElement $domElement DOM Element.
     * @param string $className Name of the class.
     * @return boolean TRUE or FALSE, depends on class presence in class attribute
     *            list.
     */
    public static function hasClass($domElement, $className) {
        $classAttr = $domElement->class;
        $classNames = explode(" ", $classAttr);

        return in_array($className, $classNames);
    }

}

?>