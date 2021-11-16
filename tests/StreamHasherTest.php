<?php

namespace Skreib\Flysystem\Adapter;

use PHPUnit\Framework\TestCase;
use Skreib\Flysystem\Util\StreamHasher;

class StreamHasherTest extends TestCase
{
    use \PHPUnitHacks;

    public function testHasher()
    {
        $filename = __DIR__ . '/../src/Filesystem.php';
        $this->assertEquals(
            md5_file($filename),
            (new StreamHasher('md5'))->hash(fopen($filename, 'r'))
        );
    }
}
