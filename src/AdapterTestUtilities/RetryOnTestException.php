<?php

declare(strict_types=1);

namespace Skreib\Flysystem\AdapterTestUtilities;

use Throwable;

use const PHP_EOL;
use const STDOUT;

/**
 * @codeCoverageIgnore
 */
trait RetryOnTestException
{
    /**
     * @var string
     */
    protected $exceptionTypeToRetryOn;

    /**
     * @var int
     */
    protected $timeoutForExceptionRetry = 3;

    protected function retryOnException(string $className, int $timout = 2): void
    {
        $this->exceptionTypeToRetryOn = $className;
        $this->timeoutForExceptionRetry = $timout;
    }

    protected function retryScenarioOnException(string $className, callable $scenario, int $timeout = 1): void
    {
        $this->retryOnException($className, $timeout);
        $this->runScenario($scenario);
    }

    protected function dontRetryOnException(): void
    {
        $this->exceptionTypeToRetryOn = null;
    }

    protected function runScenario(callable $scenario): void
    {
        if ($this->exceptionTypeToRetryOn === null) {
            $scenario();

            return;
        }

        $firstTryAt = \time();
        $lastTryAt = $firstTryAt + 60;

        while (time() <= $lastTryAt) {
            try {
                $scenario();

                return;
            } catch (Throwable $exception) {
                if (get_class($exception) !== $this->exceptionTypeToRetryOn) {
                    throw $exception;
                }
                fwrite(STDOUT, 'Retrying ...' . PHP_EOL);
                sleep($this->timeoutForExceptionRetry);
            }
        }

        $this->exceptionTypeToRetryOn = null;

        if (isset($exception) && $exception instanceof Throwable) {
            throw $exception;
        }
    }
}
