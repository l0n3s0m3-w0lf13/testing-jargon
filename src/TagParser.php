<?php

namespace App;

class TagParser
{
    public function parse($tags)
    {
        //return explode(', ', $tags);
        return preg_split('/ ?[,|!] ?/', $tags); // espacio opcional

        // return array_map(fn($tag) => trim($tag), $tags);
    }
}
