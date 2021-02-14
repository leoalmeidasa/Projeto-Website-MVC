<?php
require_once __DIR__ . '/../Minify.php';
require_once __DIR__ . '/../JS.php';
require_once __DIR__ . '/../Exception.php';

use MatthiasMullie\Minify;

/**
 * JS minifier test case.
 */
class JSTest extends PHPUnit_Framework_TestCase
{
    private $minifier;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->minifier = new Minify\JS();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->minifier = null;
        parent::tearDown();
    }

    /**
     * Test JS minifier rules, provided by dataProvider
     *
     * @test
     * @dataProvider dataProvider
     */
    public function minify($input, $expected, $debug = false)
    {
        $this->minifier->debug((bool) $debug);

        $this->minifier->add($input);
        $result = $this->minifier->minify();

        $this->assertEquals($expected, $result);
    }

    /**
     * Test cases [input, expected result, options]
     *
     * @return array
     */
    public function dataProvider()
    {
        $tests = array();

        // escaped quotes should not terminate string
        $tests[] = array(
            'alert("Escaped quote which is same as string quotes: \"; should not match")',
            'alert("Escaped quote which is same as string quotes: \"; should not match")',
        );

        // regex delimiters need to be treated as strings
        // (two forward slashes could look like a comment)
        $tests[] = array(
            '/abc\/def\//.test("abc")',
            '/abc\/def\//.test("abc")',
        );

        // mixture of quotes starting in comment/regex, to make sure strings are
        // matched correctly, not inside comment/regex.
        $tests[] = array(
            '/abc"def/.test("abc")',
            '/abc"def/.test("abc")',
        );
        $tests[] = array(
            '/* Bogus " */var test="test";',
            'var test="test"',
        );

        // replace comments
        $tests[] = array(
            '/* This is a JS comment */',
            '',
        );
        // https://github.com/matthiasmullie/minify/issues/10
        $tests[] = array(
            '// first mutation patch
// second mutation patch
// third mutation patch
// fourth mutation patch',
            '',
        );
        // https://github.com/matthiasmullie/minify/issues/10
        $tests[] = array(
            '/////////////////////////
// first mutation patch
// second mutation patch
// third mutation patch
// fourth mutation patch
/////////////////////////',
            '',
        );

        // make sure no ; is added in places it shouldn't
        $tests[] = array(
            'if(true){}else{}',
            'if(true){}else{}',
        );
        $tests[] = array(
            'do{i++}while(i<1)',
            'do{i++}while(i<1)',
        );
        $tests[] = array(
            'if(true)statement;else statement',
            'if(true)statement;else statement',
        );
        $tests[] = array(
            'for (i = 0; (i < 10); i++) statement',
            'for(i=0;(i<10);i++)statement', // @todo: ideally, we could get rid of some () too, here
        );
        $tests[] = array(
            '-1
             +2',
            '-1+2',
        );

        // test where newline should be preserved (for ASI) or semicolon added
        $tests[] = array(
            'alert("this is a test");',
            'alert("this is a test")',
        );

        $tests[] = array(
            'function(){console.log("this is a test");}',
            'function(){console.log("this is a test")}',
        );
        $tests[] = array(
            'alert("this is a test")
alert("this is another test")',
            'alert("this is a test")
alert("this is another test")',
        );
        $tests[] = array(
            'a=b+c
             d=e+f',
            'a=b+c
d=e+f',
        );
        $tests[] = array(
            'a++

             ++b',
            'a++
++b',
        );
        $tests[] = array(
            '!a
             !b',
            '!a
!b',
        );
        $tests[] = array(
            // don't confuse with 'if'
            'digestif
            (true)
            statement',
            'digestif(true)
statement',
        );

        $tests[] = array(
            'if
             (
                 (
                     true
                 )
                 &&
                 (
                     true
                 )
            )
            statement',
            'if((true)&&(true))
statement',
        );

        $tests[] = array(
            'var
             variable
             =
             "value";',
            'var variable="value"',
        );
        $tests[] = array(
            'var variable = {
                 test:
                 {
                 }
             }',
            'var variable={test:{}}',
        );
        $tests[] = array(
            'if
             (
                 true
             )
             {
             }
             else
             {
             }',
            'if(true){}
else{}',
        );
        $tests[] = array(
            'if ( true ) {
             } else {
             }',
            'if(true){}else{}',
        );
        $tests[] = array(
            'do
             {
                 i++
             }
             while
             (
                 i<1
             )',
            'do{i++}
while(i<1)',
        );
        $tests[] = array(
            'if ( true )
                 statement
             else
                 statement',
            'if(true)
statement
else statement',
        );

        // remove whitespace around operators
        $tests[] = array(
            'a = 1 + 2',
            'a=1+2',
        );
        $tests[] = array(
            'object  .  property',
            'object.property',
        );
        $tests[] = array(
            'object
                .property',
            'object.property',
        );
        $tests[] = array(
            'alert ( "this is a test" );',
            'alert("this is a test")',
        );

        // add comment in between whitespace that needs to be stripped
        $tests[] = array(
            'object
                // haha, some comment, just to make things harder!
                .property',
            'object.property',
        );

        $tests[] = array(
            '
                // check if it isn\'t a text-element
                if(currentElement.attr(\'type\') != \'text\')
                {
                    // remove the current one
                    currentElement.remove();
                }

                // already a text element
                else newElement = currentElement;
',
            'if(currentElement.attr(\'type\')!=\'text\'){currentElement.remove()}
else newElement=currentElement',
        );

        $tests[] = array(
            'var jsBackend =
             {
                 debug: false,
                 current: {}
             }',
            'var jsBackend={debug:false,current:{}}'
        );

        $tests[] = array(
            'var utils =
             {
                 debug: false
             }
             utils.array =
             {
             }',
            'var utils={debug:false}
utils.array={}'
        );

        return $tests;
    }
}
