<?php

namespace Pelletiermaxime\LaravelScaffoldAdmin\Commands;

use Illuminate\Console\Command;

class ScaffoldMigration extends Command
{
    protected $signature = '
        scaffold-admin:migration
        {name : Name of the migration}
        {--fields= : Comma-separated list of fields in the format COLUMN_NAME:COLUMN_TYPE. }
    ';

    protected $description = 'Scaffold a migration file.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Migration';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $fields = $this->option('fields');

        $this->callSilent('make:migration:schema', [
            'name' => $name,
            '--schema' => $fields,
            '--model' => false,
        ]);

        $this->info($this->type.' created successfully.');
    }
}
