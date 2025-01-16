<?php

namespace App\Services;

use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Filesystem\Filesystem;

class MyMigrationCreator
{
    protected $files;
    protected $stubPath;
    protected $migrationCreator;


    public function __construct(Filesystem $files, $stubPath)
    {
        $this->files = $files;
        $this->stubPath = $stubPath;
        $this->migrationCreator = new MigrationCreator($files, $this->stubPath);
    }
    /**
     * Get the stub file for the generator.
     *
     * @param  string|null  $table
     * @param  bool  $create
     * @return string
     */
    protected function getStub($table, $create)
    {
         if (is_null($table) && !$create) {
             $stubFile =  realpath($this->stubPath . '/migration.stub');
        } elseif (!is_null($table) && $create) {
           $stubFile =  realpath($this->stubPath . '/migration.create.stub');
        } else {
            $stubFile = realpath($this->stubPath . '/migration.update.stub');
        }
        if (!file_exists($stubFile)) {
            throw new \Exception("Stub file not found: " . $stubFile);
        }

        return file_get_contents($stubFile);
    }
    public function create($name, $path, $table = null, $create = false)
    {
        $stub = $this->getStub($table, $create);
        $this->migrationCreator->create($name, $path, $table, $stub);
    }
}