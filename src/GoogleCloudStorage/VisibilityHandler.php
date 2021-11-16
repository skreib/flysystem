<?php

declare(strict_types=1);

namespace Skreib\Flysystem\GoogleCloudStorage;

use Google\Cloud\Storage\StorageObject;

interface VisibilityHandler
{
    public function setVisibility(StorageObject $object, string $visibility): void;
    public function determineVisibility(StorageObject $object): string;
    public function visibilityToPredefinedAcl(string $visibility): string;
}
