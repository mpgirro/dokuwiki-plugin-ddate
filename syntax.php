<?php
/**
 * Plugin ddate: Converts Gregorian dates to Discordian dates.
 * 
 * @license    MIT (http://opensource.org/licenses/MIT)
 * @author     Maximilian Irro <max@disposia.org>
 */
 
// must be run within DokuWiki
if(!defined('DOKU_INC')) die();
 
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'syntax.php');
 
/**
 * All DokuWiki plugins to extend the parser/rendering mechanism
 * need to inherit from this class
 */
class syntax_plugin_ddate extends DokuWiki_Syntax_Plugin {
 
    /**
     * return some info
     */
    function getInfo(){
        return array(
            'author' => 'Maximilian Irro',
            'email'  => 'max@disposia.org',
            'date'   => '2013-09-04',
            'name'   => 'ddate Plugin',
            'desc'   => 'Converts Gregorian dates to Discordian dates',
            'url'    => 'http://www.dokuwiki.org/plugin:tutorial',
        );
    }
 
    function getType(){ return 'substition'; }
    function getSort(){ return 158; }
    function connectTo($mode) { $this->Lexer->addEntryPattern('{{ddate}}',$mode,'plugin_ddate'); }
 
 
    /**
     * Handle the match
     */
    function handle($match, $state, $pos, &$handler){
        return array($match, $state, $pos);
    }
 
    /**
     * Create output
     */
    function render($mode, &$renderer, $data) {
		if($mode == 'xhtml'){
			$ddate = shell_exec('ddate');
            $renderer->doc .= $ddate;
            return true;
        }
        return false;
    }
}
?>