<?php


namespace rainwaves\Press\Tests\Feature;

use rainwaves\Press\MarkDownParser;
use rainwaves\Press\Tests\TestCase;

class MarkDownTest extends TestCase
{
    /** @test **/
    public function simple_mark_down_is_parsed()
    {
        $this->assertEquals('<h1>Heading</h1>',
            MarkDownParser::parse('# Heading'));

    }
}