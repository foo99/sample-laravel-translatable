<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TranslationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic1 test example.
     *
     * @return void
     */
    public function testBasic1Test()
    {
        $book = (new \App\Book())->create();
        
        $book->fill([
            "en" => [ "title" => "Harry Potter and the Philosopher's Stone" ],
            "ja" => [ "title" => "ハリー・ポッターと賢者の石" ],
            "ko" => [ "title" => "해리포터와 마법사의 돌" ],
            "zh-CN" => [ "title" => "哈利·波特与魔法石" ],
            "zh-TW" => [ "title" => "哈利·波特與魔法石" ],
        ])->save();

        $actual = $book->translate('en')->title;
        $expected = "Harry Potter and the Philosopher's Stone";
        $this->assertEquals($expected, $actual);

        $actual = $book->translate('ja')->title;
        $expected = "ハリー・ポッターと賢者の石";
        $this->assertEquals($expected, $actual);

        $actual = $book->translate('ko')->title;
        $expected = "해리포터와 마법사의 돌";
        $this->assertEquals($expected, $actual);

        $actual = $book->translate('zh-CN')->title;
        $expected = "哈利·波特与魔法石";
        $this->assertEquals($expected, $actual);

        $actual = $book->translate('zh-TW')->title;
        $expected = "哈利·波特與魔法石";
        $this->assertEquals($expected, $actual);
    }

    /**
     * A basic2 test example.
     *
     * @return void
     */
    public function testBasic2Test()
    {
        $book = (new \App\Book())->create();
        
        $book->fill([
            "en" => [ "title" => "Harry Potter and the Philosopher's Stone" ],
            "ja" => [ "title" => "ハリー・ポッターと賢者の石" ],
            "ko" => [ "title" => "해리포터와 마법사의 돌" ],
            "zh-CN" => [ "title" => "哈利·波特与魔法石" ],
            "zh-TW" => [ "title" => "哈利·波特與魔法石" ],
        ])->save();

        $actual = $book->getTranslationsArray();

        $expected = [
            "en" => [ "title" => "Harry Potter and the Philosopher's Stone" ],
            "ja" => [ "title" => "ハリー・ポッターと賢者の石" ],
            "ko" => [ "title" => "해리포터와 마법사의 돌" ],
            "zh-CN" => [ "title" => "哈利·波特与魔法石" ],
            "zh-TW" => [ "title" => "哈利·波特與魔法石" ],
        ];

        $this->assertEquals($expected, $actual);
    }

    /**
     * A basic3 test example.
     *
     * @return void
     */
    public function testBasic3Test()
    {
        $book = (new \App\Book())->create();
        
        $book->fill([
            "title:en" => "Harry Potter and the Philosopher's Stone",
            "title:ja" => "ハリー・ポッターと賢者の石",
            "title:ko" => "해리포터와 마법사의 돌",
            "title:zh-CN" => "哈利·波特与魔法石",
            "title:zh-TW" => "哈利·波特與魔法石",
        ])->save();

        $actual = $book->getTranslationsArray();

        $expected = [
            "en" => [ "title" => "Harry Potter and the Philosopher's Stone" ],
            "ja" => [ "title" => "ハリー・ポッターと賢者の石" ],
            "ko" => [ "title" => "해리포터와 마법사의 돌" ],
            "zh-CN" => [ "title" => "哈利·波特与魔法石" ],
            "zh-TW" => [ "title" => "哈利·波特與魔法石" ],
        ];

        $this->assertEquals($expected, $actual);
    }
}
