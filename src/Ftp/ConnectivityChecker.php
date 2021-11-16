<?php

declare(strict_types=1);

namespace Skreib\Flysystem\Ftp;

interface ConnectivityChecker
{
    /**
     * @param resource $connection
     */
    public function isConnected($connection): bool;
}
