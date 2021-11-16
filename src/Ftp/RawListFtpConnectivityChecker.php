<?php

declare(strict_types=1);

namespace Skreib\Flysystem\Ftp;

class RawListFtpConnectivityChecker implements ConnectivityChecker
{
    /**
     * @inheritDoc
     */
    public function isConnected($connection): bool
    {
        return $connection !== false && @ftp_rawlist($connection, './') !== false;
    }
}
