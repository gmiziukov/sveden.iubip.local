<?php

namespace App\Services;

use Illuminate\Filesystem\Filesystem;

class MyMigrationCreator
{
    protected $files;
    protected $stubPath;
    protected $migrationCreator;


    protected $stubTypes = [
        'main' => 'migration.stub',
        'docs' => 'migration.docs.stub',
        'tables' => 'migration.tables.stub',
        'texts' => 'migration.texts.stub',

    ];


    public function __construct(Filesystem $files, $stubPath)
    {
        $this->files = $files;
        $this->stubPath = $stubPath;
        $this->migrationCreator = new CustomMigrationCreator($files, $stubPath);
    }

    /**
     * Get the stub file for the generator.
     *
     * @param string $type  
     * @param string|null $table
     * @return string
     */
      protected function getStub(string $type, $table = null)
    {

        if (!isset($this->stubTypes[$type])) {
            throw new \Exception("Invalid stub type: " . $type);
        }

        $stubFile = realpath($this->stubPath . '/' . $this->stubTypes[$type]);
        if (!file_exists($stubFile)) {
            throw new \Exception("Stub file not found: " . $stubFile);
        }
        return file_get_contents($stubFile);
    }

    public function create($name, $path, $table = null, $type = 'default')
    {
        $stub = $this->getStub($type, $table);
        $this->migrationCreator->create($name, $path, $table, $stub);
    }
}