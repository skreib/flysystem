<?php

declare(strict_types=1);

namespace Skreib\Flysystem\PhpseclibV3;

use RuntimeException;
use Skreib\Flysystem\FilesystemException;

class UnableToLoadPrivateKey extends RuntimeException implements FilesystemException
{
    public function __construct(string $message = "Unable to load private key.")
    {
        parent::__construct($message);
    }
}
