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
                            {create? : The table to be created}
                            {--path= : The location where the migration file should be created}';

    protected $description = 'Create a stub migration.';

    protected $stubPath;

    protected $mc;

    public function __construct(Filesystem $file)
    {
        parent::__construct();
        $this->stubPath = realpath(__DIR__ . '/../../Database/Migrations/stubs/newstub');

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
        $create = $this->argument('create');


         if ($create && is_string($create)) {
            $this->table = $create;
            $create = true;
        }  elseif (!is_null($create)) {
            $create = (bool) $create;
        }


        $this->writeMigration($this->name, $this->table, $create);
        return 0;
    }

    protected function writeMigration($name, $table, $create)
    {
       dump("Stub file from command: " . $this->stubPath . '/migration.stub');

        $this->mc->create(
            $name,
            $this->getMigrationPath(),
            $table,
            null // используем null
        );
         $this->info("Migration [$name] created successfully.");
    }
}