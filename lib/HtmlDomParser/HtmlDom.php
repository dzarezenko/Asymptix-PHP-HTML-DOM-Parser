<?php

namespace Asymptix\HtmlDomParser;

/**
 * Wrapper for fast and easy process HTML content wih Simple HTML DOM lib.
 *
 * @category Asymptix PHP HTML DOM Parser
 * @author Dmytro Zarezenko <dmytro.zarezenko@gmail.com>
 * @copyright (c) 2015, Dmytro Zarezenko
 *
 * @git https://github.com/dzarezenko/Asymptix-PHP-HTML-DOM-Parser.git
 * @license http://opensource.org/licenses/MIT
 */
class HtmlDom extends \simple_html_dom {

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
        return $this->root->findRec($selectors, $lowercase);
    }

}

?>