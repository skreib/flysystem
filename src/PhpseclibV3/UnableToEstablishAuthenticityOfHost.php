<?php

declare(strict_types=1);

namespace Skreib\Flysystem\PhpseclibV3;

use RuntimeException;
use Skreib\Flysystem\FilesystemException;

class UnableToEstablishAuthenticityOfHost extends RuntimeException implements FilesystemException
{
    public static function becauseTheAuthenticityCantBeEstablished(string $host): UnableToEstablishAuthenticityOfHost
    {
        return new UnableToEstablishAuthenticityOfHost("The authenticity of host $host can't be established.");
    }
}
