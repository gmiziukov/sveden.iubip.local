<?php

namespace App\Console\Commands;

use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Console\Command;
use App\Services\MyMigrationCreator;


class remig extends Command implements PromptsForMissingInput
{
    protected $signature = 'app:remig {name : The name of the migration}
                            {table? : The table to migrate}
                            {type? : Тип миграции (create, update, add_column, etc.)}
                            {--path= : The location where the migration file should be created}';

    protected $description = 'Create a stub migration.';

    protected $stubPath;

    protected $mc;

    public function __construct(Filesystem $file)
    {
        parent::__construct();
        $this->stubPath = __DIR__ . '\stubs';
          $this->mc = new MyMigrationCreator($file, $this->stubPath);
    }

    protected function getMigrationPath()
    {
        $targetPath = $this->option('path');

        if (is_null($targetPath)) {
            $targetPath = $this->laravel->databasePath('migrations');
        }

        return $targetPath;
    }

    public function handle()
    {
         dump($this->stubPath);
        $this->name = $this->argument('name');
        $this->table = $this->argument('table');
        $this->type = $this->argument('type') ?? 'default';

        $this->writeMigration($this->name, $this->table, $this->type);
        return 0;
    }

    protected function writeMigration($name, $table, $type)
    {
         dump("Stub file from command: " . $this->stubPath . '/' . $type);
         $this->mc->create(
            $name,
            $this->getMigrationPath(),
            $table,
            $type
        );
         $this->info("Migration [$name] created successfully.");
    }
}