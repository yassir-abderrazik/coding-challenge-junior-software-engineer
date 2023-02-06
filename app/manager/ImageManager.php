<?php

namespace App\Manager;

use Illuminate\Filesystem\FilesystemManager;
use Symfony\Component\HttpFoundation\File\File;

class ImageManager
{

    public function __construct(
        private FilesystemManager $filesystemManager,
    ) {
    }

    public function saveImage(File $image, string $path): string
    {
        $image = $this->filesystemManager->disk('public')->put($path, $image);

        return $image;
    }
}
