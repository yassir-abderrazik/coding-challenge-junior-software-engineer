<?php

namespace App\Services;

use App\Manager\ImageManager;
use Symfony\Component\HttpFoundation\File\File;

class ImageService 
{
    public function __construct(
        private ImageManager $imageManager,
    ) {
    }

    public function saveImage(File $image): string
    {
        $path = sprintf('', $image);
        return $this->imageManager->saveImage($image, $path);
    }
}
