<?php

namespace App\Console\Commands;

use Illuminate\Database\Migrations\MigrationCreator as mc;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Illuminate\Filesystem\Filesystem;

use Illuminate\Console\Command;
// use Illuminate\Database\ConnectionResolverInterface as Resolver;
// use Illuminate\Database\Migrations\DatabaseMigrationRepository as dmr;



class remig extends Command implements PromptsForMissingInput

{
    // protected $laravel;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remig {name : The name of the migration}
        {--table= : The table to migrate}
        {--create= : The table to be created}
        {--path= : The location where the migration file should be created}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create stub migration';
    
    /**
     * Execute the console command.
     * 
     */
    
    protected $table;
    protected $path;
    protected $name;

    public function __construct(Filesystem $file)
    {
        parent::__construct();
        $this->mc = new mc($file , $customStubPath = "\Illuminate\Database\Migrations\stubs\\newstub\migration.stub" );
    }
    
    protected function getMigrationPath()
    {
        if (! is_null($targetPath = $this->input->getOption('path'))) {
            return ! $this->usingRealPath()
            ? $this->laravel->basePath().'/'.$targetPath
            : $targetPath;
        }
        
        return parent::getMigrationPath();
    }
    protected function writeMigration($name, $table, $create)
    {
        $file = $this->creator->create(
            $name, $this->getMigrationPath(), $table, $create
        );
        
        $this->components->info(sprintf('Migration [%s] created successfully.', $file));
    }
    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'user' => 'Which user ID should receive the mail?',
        ];
    }
    public function handle()
    {
        $name = $this->input->getArgument('name');
        $this->table = $this->input->getOption('table', "def");
        $create = $this->input->getOption('create') ?: false;
        if (! $table && is_string($create)) {
            $table = $create;

            $create = true;
        }
        $this->writeMigration($name, $table, $create);
        // $this->createRepository();
        return 0;
    }
}
