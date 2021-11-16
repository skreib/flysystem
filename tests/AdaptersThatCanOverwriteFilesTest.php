<?php

namespace Skreib\Flysystem\Adapter;

use PHPUnit\Framework\TestCase;
use Skreib\Flysystem\Filesystem;
use Skreib\Flysystem\Stub\FileOverwritingAdapterStub;

class AdaptersThatCanOverwriteFilesTest extends TestCase
{
    use \PHPUnitHacks;

    /**
     * @test
     */
    public function overwriting_files_with_put()
    {
        $filesystem = new Filesystem($adapter = new FileOverwritingAdapterStub());
        $filesystem->put('path.txt', 'string contents');

        $this->assertEquals('path.txt', $adapter->writtenPath);
        $this->assertEquals('string contents', $adapter->writtenContents);
    }

    /**
     * @test
     */
    public function overwriting_files_with_putStream()
    {
        $filesystem = new Filesystem($adapter = new FileOverwritingAdapterStub());
        $stream = tmpfile();
        fwrite($stream, 'stream contents');
        $filesystem->putStream('path.txt', $stream);
        fclose($stream);

        $this->assertEquals('path.txt', $adapter->writtenPath);
        $this->assertEquals('stream contents', $adapter->writtenContents);
    }
}
