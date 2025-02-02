<?php

declare(strict_types=1);

namespace Skreib\Flysystem;

interface PathNormalizer
{
    public function normalizePath(string $path): string;
}
