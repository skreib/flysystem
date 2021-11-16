<?php

namespace Skreib\Flysystem\Stub;

use Skreib\Flysystem\Adapter\Polyfill\StreamedReadingTrait;

class StreamedReadingStub
{
    use StreamedReadingTrait;

    public function read($path)
    {
        if ($path === 'true.ext') {
            return ['contents' => $path];
        }

        return false;
    }
}
