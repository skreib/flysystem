<?php

namespace Skreib\Flysystem\Ftp;

use PHPUnit\Framework\TestCase;
use Skreib\Flysystem\AdapterTestUtilities\RetryOnTestException;

/**
 * @group ftp
 */
class RawListFtpConnectivityCheckerTest extends TestCase
{
    use RetryOnTestException;
    /**
     * @test
     */
    public function detecting_if_a_connection_is_connected(): void
    {
        $this->retryOnException(UnableToConnectToFtpHost::class);
        $this->runScenario(function () {
            $options = FtpConnectionOptions::fromArray([
               'host' => 'localhost',
               'port' => 2121,
               'root' => '/home/foo/upload/',
               'username' => 'foo',
               'password' => 'pass',
           ]);

            $provider = new FtpConnectionProvider();
            $connection = $provider->createConnection($options);
            $connectedChecker = new RawListFtpConnectivityChecker();
            $this->assertTrue($connectedChecker->isConnected($connection));
            @ftp_close($connection);
            $this->assertFalse($connectedChecker->isConnected($connection));
        });
    }
}
