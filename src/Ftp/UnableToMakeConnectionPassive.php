<?php

declare(strict_types=1);

namespace Skreib\Flysystem\Ftp;

use RuntimeException;

class UnableToMakeConnectionPassive extends RuntimeException implements FtpConnectionException
{
}
