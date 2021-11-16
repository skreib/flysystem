<?php

namespace Skreib\Flysystem\Adapter;

use PHPUnit\Framework\TestCase;
use Skreib\Flysystem\Config;
use Skreib\Flysystem\Stub\StreamedWritingStub;

class StreamedWritingPolyfillTests extends TestCase
{
    use \PHPUnitHacks;

    public function testWrite()
    {
        $stream = tmpfile();
        fwrite($stream, 'contents');
        $stub = new StreamedWritingStub();
        $response = $stub->writeStream('path.txt', $stream, new Config());
        $this->assertEquals(['path' => 'path.txt', 'contents' => 'contents'], $response);
        fclose($stream);
    }

    public function testUpdate()
    {
        $stream = tmpfile();
        fwrite($stream, 'contents');
        $stub = new StreamedWritingStub();
        $response = $stub->updateStream('path.txt', $stream, new Config());
        $this->assertEquals(['path' => 'path.txt', 'contents' => 'contents'], $response);
        fclose($stream);
    }
}
