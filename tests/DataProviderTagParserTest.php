<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class DataProviderTagParserTest extends TestCase
{
    /**
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        $parser = new TagParser();

        $result = $parser->parse($input);
        $this->assertSame($expected, $result);
    }

    public function tagsProvider()
    {
        return [
            ['personal', ['personal']], // input, expected
            ['dark souls, persona, xenoblade', ['dark souls', 'persona', 'xenoblade']],
            ['dark souls | persona | xenoblade', ['dark souls', 'persona', 'xenoblade']],
            ['dark souls,persona,xenoblade', ['dark souls', 'persona', 'xenoblade']],
            ['dark souls|persona|xenoblade', ['dark souls', 'persona', 'xenoblade']],
            ['dark souls!persona!xenoblade', ['dark souls', 'persona', 'xenoblade']]
        ];
    }
}
