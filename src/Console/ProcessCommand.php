<?php

namespace rainwaves\Press\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use rainwaves\Press\Facades\Press;
use rainwaves\Press\Post;
use rainwaves\Press\Repositories\PostRepository;


class ProcessCommand extends Command
{
    protected $signature = 'press:process';
    protected $description = 'Updates blog posts';
    public function handle(PostRepository $postRepository)
    {
        if (Press::configNotPublished()) {
            return $this->warn('Please publish the config file by running ' .
                '\'php artisan vendor:publish --tag=press-config\'');
        }

        try {
            $posts = Press::driver()->fetchPosts();
            $this->info('Number of Posts: '. count($posts));
            foreach ($posts as $post) {
                $postRepository->save($post);
                $this->info($post['title']);
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}