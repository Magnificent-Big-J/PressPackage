<?php

namespace rainwaves\Press\Drivers;

use Illuminate\Support\Str;
use rainwaves\Press\PressFileParser;

abstract class Driver
{
    protected $posts = array();
    protected $config;

    public function __construct()
    {
        $this->setConfig();
        $this->validatedSource();
    }
    public abstract function fetchPosts();
    protected function setConfig()
    {
        $this->config = config('press.' . config('press.driver'));
    }
    protected function validatedSource()
    {
        return true;
    }
    protected function parse($content, $identifier)
    {
        $this->posts[] = array_merge((new PressFileParser($content))->getData(),
        ['identifier' => Str::title($identifier)]);
    }
}