<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    protected TagParser $parser;

    protected function setUp(): void
    {
        $this->parser = new TagParser();
    }

    /** @test */
    public function it_parser_a_single_tag()
    {
        $result = $this->parser->parse('personal');
        $expected = ['personal'];

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_parser_a_comma_separated_list_of_tags()
    {
        $result = $this->parser->parse('dark souls, persona, xenoblade');
        $expected = ['dark souls', 'persona', 'xenoblade'];
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_parses_a_pipe_separated_list_of_tags()
    {
        $result = $this->parser->parse('dark souls | persona | xenoblade');
        $expected = ['dark souls', 'persona', 'xenoblade'];
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function spaces_are_optional()
    {
        $result = $this->parser->parse('dark souls,persona,xenoblade');
        $expected = ['dark souls', 'persona', 'xenoblade'];
        $this->assertSame($expected, $result);

        $result = $this->parser->parse('dark souls|persona|xenoblade');
        $this->assertSame($expected, $result);
    }
}
