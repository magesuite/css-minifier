<?php

namespace MageSuite\CssMinifier\Plugin;

/**
 * Adapter for CSSmin library
 */
class UpdateCSSmin
{
    /**
     * 'pcre.recursion_limit' value for CSSMin minification
     */
    const PCRE_RECURSION_LIMIT = 1000;

    /**
     * @var \MageSuite\CssMinifier\Services\CSSMinifierFactory
     */
    protected $minifierFactory;

    public function __construct(
        \MageSuite\CssMinifier\Services\CSSMinifierFactory $minifierFactory
    )
    {
        $this->minifierFactory = $minifierFactory;
    }

    /**
     * Minify css file content
     *
     * @param string $content
     * @return string
     */
    public function aroundMinify(\Magento\Framework\Code\Minifier\Adapter\Css\CSSmin $subject, callable $proceed, $content)
    {
        $cssMinifier = $this->minifierFactory->create();
        $pcreRecursionLimit = ini_get('pcre.recursion_limit');

        ini_set('pcre.recursion_limit', self::PCRE_RECURSION_LIMIT);
        $cssMinifier->add($content);
        $result = $cssMinifier->minify();
        ini_set('pcre.recursion_limit', $pcreRecursionLimit);

        return $result;
    }
}
