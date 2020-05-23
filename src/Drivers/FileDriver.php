<?php


namespace rainwaves\Press\Drivers;


use Illuminate\Support\Facades\File;
use rainwaves\Press\PressFileParser;

class FileDriver
{
    public function fetchPosts()
    {
        $files = File::files(config('press.php'));
        $posts = array();
        foreach ($files as $file) {
            $posts[] = (new PressFileParser($file->getPathname()))->getData();
        }

        return $posts;
    }
}