<?php

declare(strict_types=1);

namespace Skreib\Flysystem\PhpseclibV2;

use phpseclib\Net\SFTP;

class SimpleConnectivityChecker implements ConnectivityChecker
{
    public function isConnected(SFTP $connection): bool
    {
        return $connection->isConnected();
    }
}
