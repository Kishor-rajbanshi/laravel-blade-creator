<?php

namespace Kishor\BladeCreator\Console;

use Illuminate\Console\Command;
use File;

class BladeCreatorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:blade {blade}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create blade from cli';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $blade = $this->argument('blade');

        $path = $this->bladePath($blade);

        $this->createDir($path);

        if (File::exists($path))
        {
            $this->error("Blade {$path} already exists!");
            return;
        }

        File::put($path, $path);

        $this->info("Blade {$path} created.");
    }

     /**
     * Get the blade full path.
     *
     * @param string $blade
     *
     * @return string
     */
    public function bladePath($blade)
    {
        $blade = str_replace('.', '/', $blade) . '.blade.php';

        $path = "resources/views/{$blade}";

        return $path;
    }

    /**
     * Create blade directory if not exists.
     *
     * @param $path
     */
    public function createDir($path)
    {
        $dir = dirname($path);

        if (!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }
    }
}
