<?php

namespace App\Services;

use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class CustomMigrationCreator extends MigrationCreator
{

    public function __construct(Filesystem $files, $stubPath)
    {
        parent::__construct($files, $stubPath);
    }

    /**
     * Create a new migration at the given path.
     *
     * @param  string  $name
     * @param  string  $path
     * @param  string|null  $table
     * @param  string|null  $stub
     * @return string
     */
    public function create($name, $path, $table = null, $stub = null)
    {
        $this->ensureMigrationDoesntAlreadyExist($name, $path);


        $path = $this->getPath($name, $path);

        $this->files->put($path, $this->populateStub($name, $stub, $table));

        $this->firePostCreateHooks($name, $path);
    }
    /**
     * Populate the place-holders in the migration stub.
     *
     * @param  string  $name
     * @param  string  $stub
     * @param  string|null  $table
     * @return string
     */
    protected function populateStub($name, $stub, $table = null)
    {
        $stub = str_replace(
            ['DummyClass', '{{ class }}', '{{class}}'],
            $this->getClassName($name),
            $stub
        );

        if (! is_null($table)) {
            $stub = str_replace(
                ['DummyTable', '{{ table }}', '{{table}}'],
                $table,
                $stub
            );
        }


        return $stub;
    }
}