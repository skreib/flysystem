<?php

declare(strict_types=1);

namespace Skreib\Flysystem\Ftp;

interface ConnectionProvider
{
    /**
     * @return resource
     */
    public function createConnection(FtpConnectionOptions $options);
}
