<?php

use Xtompie\Pipe\Pipe;

class PipeTest extends PHPUnit\Framework\TestCase
{
    public function testAddslashes()
    {
        $pipe = Pipe::new("O'Reilly")->addslashes()->get();
        $this->assertEquals("O\'Reilly", $pipe);
    }

    public function testExplode()
    {
        $pipe = Pipe::new('a,b,c')->explode(',')->get();
        $this->assertEquals(['a', 'b', 'c'], $pipe);
    }

    public function testHtmlspecialchars()
    {
        $pipe = Pipe::new('<h1>Title</h1>')->htmlspecialchars()->get();
        $this->assertEquals('&lt;h1&gt;Title&lt;/h1&gt;', $pipe);
    }

    public function testImplode()
    {
        $pipe = Pipe::new(['a', 'b', 'c'])->implode(',')->get();
        $this->assertEquals('a,b,c', $pipe);
    }

    public function testLower()
    {
        $pipe = Pipe::new('HELLO')->lower()->get();
        $this->assertEquals('hello', $pipe);
    }

    public function testMap()
    {
        $pipe = Pipe::new('hello')->map(fn($value) => strtoupper($value))->get();
        $this->assertEquals('HELLO', $pipe);
    }

    public function testMapReturnsNull()
    {
        $pipe = Pipe::new('hello')->map(fn($value) => null);
        $this->assertNull($pipe);
    }

    public function testMd5()
    {
        $pipe = Pipe::new('hello')->md5()->get();
        $this->assertEquals(md5('hello'), $pipe);
    }

    public function testNl2br()
    {
        $pipe = Pipe::new("hello\nworld")->nl2br()->get();
        $this->assertEquals("hello<br />\nworld", $pipe);
    }

    public function testReplace()
    {
        $pipe = Pipe::new('foo bar')->replace('foo', 'baz')->get();
        $this->assertEquals('baz bar', $pipe);
    }

    public function testReverse()
    {
        $pipe = Pipe::new('abc')->reverse()->get();
        $this->assertEquals('cba', $pipe);
    }

    public function testSha1()
    {
        $pipe = Pipe::new('hello')->sha1()->get();
        $this->assertEquals(sha1('hello'), $pipe);
    }

    public function testLength()
    {
        $pipe = Pipe::new('hello')->length();
        $this->assertEquals(5, $pipe->get());
    }

    public function testStrposReturnsNull()
    {
        $pipe = Pipe::new('hello')->strpos('z');
        $this->assertNull($pipe);
    }

    public function testStrposAtFirstPosition()
    {
        $pipe = Pipe::new('hello')->strpos('h');
        $this->assertEquals(0, $pipe->get());
    }

    public function testStripTags()
    {
        $pipe = Pipe::new('<p>Hello</p>')->stripTags()->get();
        $this->assertEquals('Hello', $pipe);
    }

    public function testSubstr()
    {
        $pipe = Pipe::new('hello')->substr(1, 3)->get();
        $this->assertEquals('ell', $pipe);
    }

    public function testTrim()
    {
        $pipe = Pipe::new('  hello  ')->trim()->get();
        $this->assertEquals('hello', $pipe);
    }

    public function testUcfirst()
    {
        $pipe = Pipe::new('hello')->ucfirst()->get();
        $this->assertEquals('Hello', $pipe);
    }

    public function testUcwords()
    {
        $pipe = Pipe::new('hello world')->ucwords()->get();
        $this->assertEquals('Hello World', $pipe);
    }

    public function testUpper()
    {
        $pipe = Pipe::new('hello')->upper()->get();
        $this->assertEquals('HELLO', $pipe);
    }

    public function testSliceArray()
    {
        $pipe = Pipe::new([1, 2, 3, 4, 5])->slice(1, 3)->get();
        $this->assertEquals([2, 3, 4], $pipe);
    }

    public function testSliceReturnsNullIfNotArray()
    {
        $pipe = Pipe::new('hello')->slice(1, 3);
        $this->assertNull($pipe);
    }
}