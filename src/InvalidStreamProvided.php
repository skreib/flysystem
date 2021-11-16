<?php

declare(strict_types=1);

namespace Skreib\Flysystem;

use InvalidArgumentException as BaseInvalidArgumentException;

class InvalidStreamProvided extends BaseInvalidArgumentException implements FilesystemException
{
}
