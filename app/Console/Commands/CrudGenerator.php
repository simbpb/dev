<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generator 
                {name : Class (singular) for example} 
                {table : Table Name for example}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create CRUD operations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $table = $this->argument('table');

        $this->controller($name);
        $this->model($name, $table);
        $this->repository($name, $table);
        $this->transformer($name);
        $this->view($name);
    }

    protected function getStub($type)
    {
        return file_get_contents(resource_path("stubs/$type.stub"));
    }

    protected function model($name, $table)
    {
        $modelTemplate = str_replace(
            [
                '{{modelName}}',
                '{{tableName}}'
            ],
            [
                $name,
                $table
            ],
            $this->getStub('Model')
        );

        if (!file_exists($path = app_path("/Models/Detail/{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(app_path("/Models/Detail/{$name}/{$name}.php"), $modelTemplate);
    }

    protected function repository($name, $table)
    {
        $modelTemplate = str_replace(
            [
                '{{modelName}}',
                '{{tableName}}',
                '{{modelNameKebabLowerCase}}'
            ],
            [
                $name,
                $table,
                $this->camelToKebab($name)
            ],
            $this->getStub('Repository')
        );

        if (!file_exists($path = app_path("/Models/Detail/{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(app_path("/Models/Detail/{$name}/{$name}Repository.php"), $modelTemplate);
    }

    protected function transformer($name)
    {
        $modelTemplate = str_replace(
            ['{{modelName}}'],
            [$name],
            $this->getStub('Transformer')
        );

        if (!file_exists($path = app_path("/Models/Detail/{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(app_path("/Models/Detail/{$name}/{$name}Transformer.php"), $modelTemplate);
    }

    protected function view($name)
    {
        $indexTemplate = str_replace(
            [
                '{{modelNameLabel}}'
            ],
            [
                $this->camelToKebab($name, " ")
            ],
            $this->getStub('index.blade')
        );

        $formTemplate = str_replace(
            [
                '{{modelNameLabel}}'
            ],
            [
                $this->camelToKebab($name, " ")
            ],
            $this->getStub('form.blade')
        );

        $viewTemplate = str_replace(
            [
                '{{modelNameLabel}}'
            ],
            [
                $this->camelToKebab($name, " ")
            ],
            $this->getStub('view.blade')
        );

        $folder = $this->camelToKebab($name);
        if (!file_exists($path = resource_path("/views/details/{$folder}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(resource_path("/views/details/{$folder}/index.blade.php"), $indexTemplate);
        file_put_contents(resource_path("/views/details/{$folder}/form.blade.php"), $formTemplate);
        file_put_contents(resource_path("/views/details/{$folder}/view.blade.php"), $viewTemplate);
    }

    protected function controller($name)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
                '{{modelNameKebabLowerCase}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name),
                $this->camelToKebab($name)
            ],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/Detail/{$name}Controller.php"), $controllerTemplate);
    }

    protected function camelToKebab($string, $us = "-") {
        return strtolower(preg_replace(
            '/(?<=\d)(?=[A-Za-z])|(?<=[A-Za-z])(?=\d)|(?<=[a-z])(?=[A-Z])/', $us, $string));
    }
}
