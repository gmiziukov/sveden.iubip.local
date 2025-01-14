<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Database\ConnectionResolverInterface as Resolver;
use Illuminate\Database\Migrations\DatabaseMigrationRepository as dmr;



class remig extends Command 
{
    // protected $laravel;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remig {var}';
    
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
    public function __construct(Resolver $resolver, dmr $dmr)
    {
        $this->dmr = $dmr;
        $this->resolver = $resolver;
    }

    public function createRepository()
    {
        $schema = $dmr->getConnection()->getSchemaBuilder();

        $schema->create($this->table, function ($table) {
            // The migrations table is responsible for keeping track of which of the
            // migrations have actually run for the application. We'll create the
            // table to hold the migration file's path as well as the batch ID.
            $table->increments('id');
            $table->string('migration');
            $table->string('tables');
            $table->string('name'); // ===================================================== add name
            $table->integer('batch');
        });
    }

    public function handle()
    {
        $this->table = $this->argument('var');
        $this->createRepository();
        return 0;
    }
}
