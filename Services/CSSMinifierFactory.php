<?php

namespace MageSuite\CssMinifier\Services;

class CSSMinifierFactory
{
    /**
     * @return \MatthiasMullie\Minify\CSS
     */
    public function create()
    {
        return new \MatthiasMullie\Minify\CSS();
    }
}