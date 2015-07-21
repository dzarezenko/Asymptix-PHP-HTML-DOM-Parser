<?php

namespace Asymptix\HtmlDomParser;

/**
 * Simple HTML DOM lib wrapper class.
 *
 * @category Asymptix PHP HTML DOM Parser
 * @author Dmytro Zarezenko <dmytro.zarezenko@gmail.com>
 * @copyright (c) 2015, Dmytro Zarezenko
 *
 * @git https://github.com/dzarezenko/Asymptix-PHP-HTML-DOM-Parser.git
 * @license http://opensource.org/licenses/MIT
 */
class HtmlDomParser extends HtmlDom {

    /**
     * Inits HtmlDomParser with HTML string content.
     *
     * @param string $str HTML content.
     */
    public function loadString($str) {
        $this->load($str);
    }

    /**
     * Inits HtmlDomParser with HTML content by URL.
     *
     * @param string $url URL of the page.
     * @param boolean $curl Use CURL to load content or file_get_contents($url)
     *           method.
     *
     * @throws Exception If content loading error occurred.
     */
    public function loadUrl($url, $curl = false) {
        if ($curl) {
            $content = self::loadContent($url);
            if (empty($content)) {
                throw new Exception("Can't get content from " . $url);
            }
            $this->loadString($content);
        } else {
            $this->load_file($url);
        }
    }

    /**
     * Loads HTML content using CURL.
     *
     * @param string $url URL of the page.
     *
     * @return string HTML content (on success).
     * @throws Exception If content loading error occurred.
     */
    private static function loadContent($url) {
        //TODO: implement URL content load functionality with CURL and proxy

        $ch = curl_init($url);
        $options = array(
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);

        curl_close($ch);

        if ($content === false) {
            throw new Exception("Can't get content from " . $url);
        }
        return $content;
    }

}

?>