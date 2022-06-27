<?php

namespace Juliengidel\Julis\Test;

use Juliengidel\Julis\Julis;
use PHPUnit\Framework\TestCase;

class JulisTest extends TestCase
{
    private $str;

    /**
     * @before
     */
    public function setTestSample()
    {
       $this->str = new Julis('This is my string');
    }

    public function testShouldBetween()
    {
        $this->assertEquals('is is', $this->str->between(2,6));
    }

    public function testShouldCamelize()
    {
        $this->assertEquals('thisIsMyString', $this->str->camelize());
    }

    public function testShouldCharAt()
    {
        $this->assertEquals('i', $this->str->charAt(2));
    }

    public function testShouldConcat()
    {
        $this->str->concat(new Julis('my'));
        $this->assertEquals('This is my stringmy', $this->str->__toString());
    }

    public function testShouldContains()
    {
        $this->assertEquals(true, $this->str->contains('my'));
        $this->assertEquals(false, $this->str->contains('That'));
    }

    public function testShouldCount()
    {
        $this->assertEquals(17, $this->str->count());
    }

    public function testShouldDelete()
    {
        $this->assertEquals(' is my string', $this->str->delete('This'));
    }

    public function testEndsWith()
    {
        $this->assertEquals(true, $this->str->endsWith('ing'));
        $this->assertEquals(true, $this->str->endsWith(' string'));
        $this->assertEquals(false, $this->str->endsWith('This'));
        $this->assertEquals(false, $this->str->endsWith(''));
    }

    public function testEquals()
    {
        $this->assertEquals(true, $this->str->equals('This is my string'));
        $this->assertEquals(false, $this->str->equals('my string'));
        $this->assertEquals(false, $this->str->equals('this is my string'));
        $this->assertEquals(false, $this->str->equals('This Is My String'));
        $this->assertEquals(false, $this->str->equals('foo'));
    }

    public function testEqualsIgnoreCase()
    {
        $this->assertEquals(true, $this->str->equalsIgnoreCare('This is my string'));
        $this->assertEquals(false, $this->str->equalsIgnoreCare('my string'));
        $this->assertEquals(true, $this->str->equalsIgnoreCare('this is my string'));
        $this->assertEquals(true, $this->str->equalsIgnoreCare('This Is My String'));
        $this->assertEquals(false, $this->str->equalsIgnoreCare('foo'));
    }

    public function testFirstIndexOf()
    {
        $this->assertEquals(0, $this->str->firstIndexOf('This'));
        $this->assertEquals(false, $this->str->firstIndexOf('not'));
        $this->assertEquals(8, $this->str->firstIndexOf('my'));
    }

    public function testIndexesOf()
    {
        $this->assertEquals([2, 5, 14], $this->str->indexesOf('i'));
        $this->assertEquals([2, 5], $this->str->indexesOf('is'));
        $this->assertEquals([], $this->str->indexesOf('Is'));
    }

    public function testLeft()
    {
        $this->assertEquals('This', $this->str->left(4));
    }

    public function testMultiply()
    {
        $this->assertEquals('This is my stringThis is my stringThis is my string', $this->str->multiply(3));
    }

    public function testPad()
    {
        $this->assertEquals('Thisismystring', $this->str->pad());
    }

    public function testPrefix()
    {
        $this->assertEquals('This_This is my string', $this->str->prefix('This_'));
    }

    public function testReplace()
    {
        $this->assertEquals('That is my string', $this->str->replace('This', 'That'));
    }

    public function testReplaceVariables()
    {
        $julis = new Julis('My name is $name');
        $this->assertEquals('My name is Julien', $julis->replaceVariables(['name'=>'Julien']));
    }

    public function testReset()
    {
        $this->str->replace('This', 'That');
        $this->assertEquals('This is my string', $this->str->reset());
    }

    public function testReverse()
    {
        $this->assertEquals('gnirts ym si sihT', $this->str->reverse());
    }

    public function testRight()
    {
        $this->assertEquals('ing', $this->str->reset()->right(3));
        $this->assertEquals('This is my string', $this->str->reset()->right(40));
    }

    public function testStartsWith()
    {
        $this->assertEquals(true, $this->str->startsWith('This'));
        $this->assertEquals(true, $this->str->startsWith('T'));
        $this->assertEquals(false, $this->str->startsWith('his'));
        $this->assertEquals(false, $this->str->startsWith(''));
    }

    public function testStrip()
    {
        $julis = new Julis('<a href=""><p>My sentence</p></a>');
        $this->assertEquals('My sentence', $julis->strip());
        $this->assertEquals('<p>My sentence</p>', $julis->reset()->strip('<p>'));
        $this->assertEquals('<a href=""><p>My sentence</p></a>', $julis->reset()->strip('<p><a>'));
    }

    public function testSuffix()
    {
        $this->assertEquals('This is my string_This', $this->str->suffix('_This'));
    }

    public function testTrim()
    {
        $julis = new Julis(' String to trim ');
        $this->assertEquals('This is my string', $this->str->trim());
        $this->assertEquals('String to trim', $julis->trim());
    }

    public function testUppercase()
    {
        $this->assertEquals('THIS IS MY STRING', $this->str->uppercase());
    }
}