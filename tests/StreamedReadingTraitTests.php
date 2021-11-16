<?php

namespace Skreib\Flysystem\Adapter;

use PHPUnit\Framework\TestCase;
use Skreib\Flysystem\Stub\StreamedReadingStub;

class StreamedReadingTraitTests extends TestCase
{
    use \PHPUnitHacks;

    public function testStreamRead()
    {
        $stub = new StreamedReadingStub();
        $result = $stub->readStream($input = 'true.ext');
        $this->assertInternalType('resource', $result['stream']);
        $this->assertEquals($input, stream_get_contents($result['stream']));
        fclose($result['stream']);
    }

    public function testStreamReadFail()
    {
        $stub = new StreamedReadingStub();
        $result = $stub->readStream('other.ext');
        $this->assertFalse($result);
    }
}
