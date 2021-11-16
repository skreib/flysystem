<?php

declare(strict_types=1);

namespace Skreib\Flysystem\Ftp;

use RuntimeException;

final class UnableToEnableUtf8Mode extends RuntimeException implements FtpConnectionException
{
}
