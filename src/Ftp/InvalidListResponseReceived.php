<?php

declare(strict_types=1);

namespace Skreib\Flysystem\Ftp;

use RuntimeException;
use Skreib\Flysystem\FilesystemException;

class InvalidListResponseReceived extends RuntimeException implements FilesystemException
{
}
