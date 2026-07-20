<?php

error_reporting(E_ALL);
set_error_handler(static function ($severity, $message, $file, $line) {
    throw new ErrorException($message, 0, $severity, $file, $line);
});

define('DOKU_LEXER_ENTER', 1);
define('DOKU_LEXER_MATCHED', 2);
define('DOKU_LEXER_UNMATCHED', 3);
define('DOKU_LEXER_EXIT', 4);

class DokuWiki_Syntax_Plugin
{
    public function getPluginName()
    {
        return 'extab4';
    }
}

class Doku_Handler
{
    public $call;

    public function plugin($match, $state, $pos, $plugin)
    {
        $this->call = array($match, $state, $pos, $plugin);
    }
}

require dirname(__DIR__).'/syntax.php';

function assertSameValue($expected, $actual, $message)
{
    if ($expected !== $actual) {
        throw new RuntimeException(
            $message."\nExpected: ".var_export($expected, true).
            "\nActual: ".var_export($actual, true)
        );
    }
}

$plugin = new syntax_plugin_extab4();
$appendClass = new ReflectionMethod($plugin, 'appendClass');
$appendClass->setAccessible(true);

assertSameValue(
    ' style="width: 100%" class="exttable"',
    $appendClass->invoke($plugin, 'exttable', ' style="width: 100%"'),
    'A missing class attribute should be appended.'
);
assertSameValue(
    ' class="design exttable"',
    $appendClass->invoke($plugin, 'exttable', ' class="design"'),
    'The required class should be added to an existing class attribute.'
);
assertSameValue(
    " class='design exttable'",
    $appendClass->invoke($plugin, 'exttable', " class='design exttable'"),
    'An existing required class should not be duplicated.'
);

$handler = new Doku_Handler();
$close = new ReflectionMethod($plugin, 'close');
$close->setAccessible(true);
$close->invoke($plugin, 'td', 42, '|}', $handler);

assertSameValue(
    array(array(DOKU_LEXER_EXIT, 'td', ''), 'addPluginCall', 42, 'extab4'),
    $handler->call,
    'Closing a tag should emit an empty attribute string without warnings.'
);

echo "Compatibility tests passed.\n";
