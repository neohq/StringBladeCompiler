<?php

namespace Wpb\String_Blade_Compiler\Tests\Blade;

class BladeLangTest extends AbstractBladeTestCase
{
    public function testStatementThatContainsNonConsecutiveParenthesisAreCompiled()
    {
        $string = "Foo @lang(function_call('foo(blah)')) bar";
        $expected = "Foo <?php echo app('translator')->get(function_call('foo(blah)')); ?> bar";
        $this->assertEquals($expected, $this->compiler->compileString($string));
    }

    public function testLanguageAndChoicesAreCompiled()
    {
        $this->assertEquals('<?php echo app(\'translator\')->get(\'foo\'); ?>', $this->compiler->compileString("@lang('foo')"));
        $this->assertEquals('<?php echo app(\'translator\')->choice(\'foo\', 1); ?>', $this->compiler->compileString("@choice('foo', 1)"));
    }
}
