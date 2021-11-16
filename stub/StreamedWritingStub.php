<?php

namespace Skreib\Flysystem\Stub;

use Skreib\Flysystem\Adapter\Polyfill\StreamedWritingTrait;
use Skreib\Flysystem\Config;

class StreamedWritingStub
{
    use StreamedWritingTrait;

    public function write($path, $contents, Config $config)
    {
        return compact('path', 'contents');
    }

    public function update($path, $contents, Config $config)
    {
        return compact('path', 'contents');
    }
}
