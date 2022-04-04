<?php

namespace Drupal\jazz_help_articles;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Custom twig functions.
 */
class CustomTwig extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('d_limit', [$this, 'd_limit']),
        ];
    }

    public function d_limit($x, $limit=3)
    {
        d_limit($x, 2);
    }
}
