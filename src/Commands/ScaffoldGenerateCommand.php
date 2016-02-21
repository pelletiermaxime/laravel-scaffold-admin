<?php

namespace Pelletiermaxime\LaravelScaffoldAdmin\Commands;

class ScaffoldGenerateCommand extends ScaffoldCommandBase
{
    protected $signature = '
        scaffold-admin:generate
        {name : Name of the model}
        {--fields= : Comma-separated list of fields in the format COLUMN_NAME:COLUMN_TYPE. }
    ';

    protected $description = 'Scaffold an admin CRUD';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ScaffoldController $scaffoldController)
    {
        $name = $this->argument('name');
        $lowerName = strtolower($name);
        $pluralName = str_plural($name);
        $lowerPluralName = str_plural($lowerName);

        $this->call('scaffold-admin:controller', [
            'name' => $name,
        ]);

        $this->call('scaffold-admin:migration', [
            'name' => "create_{$lowerPluralName}_table",
            '--fields' => $this->option('fields'),
        ]);

        $this->call('scaffold-admin:model', [
            'name' => $name,
        ]);

        $this->call('scaffold-admin:view', [
            'name' => $lowerName,
        ]);

    }
}
