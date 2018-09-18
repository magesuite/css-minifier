<?php

namespace MageSuite\CssMinifier\Services;

use MatthiasMullie\Minify\CSS as CssMinLibrary;

class CSSMinifierFactory
{
    /**
     * @return CssMinLibrary
     */
    public function create()
    {
        return new CssMinLibrary();
    }
}