<?php

declare(strict_types=1);

namespace Skreib\Flysystem\PhpseclibV3;

use RuntimeException;
use Skreib\Flysystem\FilesystemException;

class UnableToConnectToSftpHost extends RuntimeException implements FilesystemException
{
    public static function atHostname(string $host): UnableToConnectToSftpHost
    {
        return new UnableToConnectToSftpHost("Unable to connect to host: $host");
    }
}
