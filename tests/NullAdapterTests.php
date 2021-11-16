<?php

use PHPUnit\Framework\TestCase;
use Skreib\Flysystem\Adapter\NullAdapter;
use Skreib\Flysystem\Config;
use Skreib\Flysystem\Filesystem;

class NullAdapterTest extends TestCase
{
    use \PHPUnitHacks;

    /**
     * @return Filesystem
     */
    protected function getFilesystem()
    {
        return new Filesystem(new NullAdapter());
    }

    protected function getAdapter()
    {
        return new NullAdapter();
    }

    public function testWrite()
    {
        $fs = $this->getFilesystem();
        $result = $fs->write('path', 'contents');
        $this->assertTrue($result);
        $this->assertFalse($fs->has('path'));
    }

    /**
     * @expectedException  \Skreib\Flysystem\FileNotFoundException
     */
    public function testRead()
    {
        $fs = $this->getFilesystem();
        $fs->read('something');
    }

    public function testHas()
    {
        $fs = $this->getFilesystem();
        $this->assertFalse($fs->has('something'));
    }

    public function testDelete()
    {
        $adapter = $this->getAdapter();
        $this->assertFalse($adapter->delete('something'));
    }

    public function expectedFailsProvider()
    {
        return [
            ['read'],
            ['update'],
            ['read'],
            ['rename'],
            ['delete'],
            ['listContents', []],
            ['getMetadata'],
            ['getSize'],
            ['getMimetype'],
            ['getTimestamp'],
            ['getVisibility'],
            ['deleteDir'],
        ];
    }

    /**
     * @dataProvider expectedFailsProvider
     */
    public function testExpectedFails($method, $result = false)
    {
        $adapter = new NullAdapter();
        $this->assertEquals($result, $adapter->{$method}('one', 'two', new Config()));
    }

    public function expectedArrayResultProvider()
    {
        return [
            ['write'],
            ['setVisibility'],
        ];
    }

    /**
     * @dataProvider expectedArrayResultProvider
     */
    public function testArrayResult($method)
    {
        $adapter = new NullAdapter();
        $this->assertInternalType('array', $adapter->{$method}('one', tmpfile(), new Config(['visibility' => 'public'])));
    }

    public function testArrayResultForCreateDir()
    {
        $adapter = new NullAdapter();
        $this->assertInternalType('array', $adapter->createDir('one', new Config(['visibility' => 'public'])));
    }
}
