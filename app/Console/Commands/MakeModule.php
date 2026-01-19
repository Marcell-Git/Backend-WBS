<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeModule extends Command
{
    protected $signature = 'make:module {name}';
    protected $description = 'Create module folder structure';

    public function handle()
    {
        $name = Str::studly($this->argument('name'));
        $basePath = base_path("modules/{$name}");

        if (File::exists($basePath)) {
            $this->error("Module {$name} already exists!");
            return;
        }

        // Folder list
        $folders = [
            'Models',
            'Services',
            'Http/Controllers',
            'Routes',
            'Providers',
        ];

        foreach ($folders as $folder) {
            File::makeDirectory("{$basePath}/{$folder}", 0755, true);
        }

        // Route file
        File::put(
            "{$basePath}/Routes/api.php",
            "<?php\n\nuse Illuminate\\Support\\Facades\\Route;\n"
        );

        // Service Provider
        $provider = <<<PHP
<?php

namespace Modules\\{$name}\\Providers;

use Illuminate\\Support\\ServiceProvider;

class {$name}ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        \$this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }
}
PHP;

        File::put("{$basePath}/Providers/{$name}ServiceProvider.php", $provider);

        $this->info("Module {$name} created successfully!");
    }
}
