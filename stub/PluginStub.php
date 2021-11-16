<?php

namespace Skreib\Flysystem\Stub;

use Skreib\Flysystem\FilesystemInterface;
use Skreib\Flysystem\PluginInterface;

class PluginStub implements PluginInterface
{
    public function setFilesystem(FilesystemInterface $filesystem)
    {
        return $this;
    }

    public function getMethod()
    {
        return 'pluginMethod';
    }

    public function handle()
    {
        return 'handled';
    }
}
