<?php

use Skreib\Flysystem\Adapter\Ftp;
use Skreib\Flysystem\AdapterInterface;

include_once __DIR__ . '/FtpIntegrationTestCase.php';

/**
 * @group integration
 */
class FtpIntegrationTests extends FtpIntegrationTestCase
{
    /**
     * @return AdapterInterface
     */
    protected function setup_adapter()
    {
        return new Ftp([
            'host' => 'localhost',
            'username' => 'bob',
            'password' => 'test',
            'recurseManually' => false,
        ]);
    }
}
