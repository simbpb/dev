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

        $this->controller($name, $table);
        $this->model($name, $table);
        $this->repository($name, $table);
        $this->transformer($name, $table);
        $this->view($name, $table);
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
        $temps = $this->getBasePaths($table, $this->camelToKebab($name));
        $modelTemplate = str_replace(
            [
                '{{modelName}}',
                '{{tableName}}',
                '{{modelNameKebabLowerCase}}',
                '{{modelColumns}}',
                '{{requestColumns}}',
                '{{modelBasePath}}',
                '{{uploadCreateFunction}}',
                '{{uploadUpdateFunction}}'
            ],
            [
                $name,
                $table,
                $this->camelToKebab($name),
                $this->getModelColumns($table),
                $this->getRequestColumns($table),
                $temps['temp1'],
                $temps['temp2'],
                $temps['temp3']
            ],
            $this->getStub('Repository')
        );

        if (!file_exists($path = app_path("/Models/Detail/{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(app_path("/Models/Detail/{$name}/{$name}Repository.php"), $modelTemplate);
    }

    protected function getBasePaths($table, $kebabLowerCase)
    {
        $template1 = '';
        $template2 = '';
        $template3 = '';
        $columns = $this->getColumns($table);
        $no = 1;
        foreach ($columns as $key => $column) {
            if ($this->isFile($column)) {
                $newColumn = str_replace("_", "-", $column);
                $template1 .= "protected \$basePath".$no." = '/files/details/".$kebabLowerCase."/".$newColumn."';\n";

                $template2 .= "\n\t\tif (\$request->hasFile('".$column."')) {\n\t\t\t\$image = \$request->file('".$column."');\n\t\t\t\$filename = str_slug(\$request->".$column.").'.'.\$image->getClientOriginalExtension();\n\t\t\t\$destinationPath = public_path(\$this->basePath".$no.");\n\t\t\t\$image->move(\$destinationPath, \$filename);\n\t\t\t\$model->".$column." = \$this->basePath".$no.".'/'.\$filename;\n\t\t}\n";

                $template3 .= "\n\t\tif (\$request->hasFile('".$column."')) {\n\t\t\t\$image = \$request->file('".$column."');\n\t\t\tif (File::exists(public_path(\$model->".$column."))) {\n\t\t\t\tFile::delete(public_path(\$model->".$column."));\n\t\t\t}\n\t\t\t\$filename = str_slug(\$request->".$column.").'.'.\$image->getClientOriginalExtension();\n\t\t\t\$destinationPath = public_path(\$this->basePath".$no.");\n\t\t\t\$image->move(\$destinationPath, \$filename);\n\t\t\t\$model->".$column." = \$this->basePath".$no.".'/'.\$filename;\n\t\t}\n";
                $no++;
            }
            
        }

        return [
            'temp1' => $template1,
            'temp2' => $template2,
            'temp3' => $template3,
        ];
    }

    protected function getRequestColumns($table)
    {
        $template = "";
        $columns = $this->getColumns($table);
        foreach ($columns as $key => $column) {
            if (!$this->isFile($column)) {
                end($columns);
                if ($key === key($columns)) {
                    $template .= "\$model->".$column." = \$request->input('".$column."');";
                } else {
                    $template .= "\$model->".$column." = \$request->input('".$column."');\n";
                }
            }
        }

        return $template;
    }

    protected function getModelColumns($table)
    {
        $template = "";
        $columns = $this->getColumns($table);
        foreach ($columns as $key => $column) {
            end($columns);
            if ($key === key($columns)) {
                $template .= "'".$table.".".$column."'";
            } else {
                $template .= "'".$table.".".$column."',\n\t\t\t\t\t\t";
            }
        }

        return $template;
    }

    protected function getTransformColumns($table)
    {
        $template = "";
        $columns = $this->getColumns($table);
        foreach ($columns as $key => $column) {
            $template .= "'".$column."' => \$model->".$column.",\n";
        }

        return $template;
    }

    protected function transformer($name, $table)
    {
        $modelTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelTransform}}'
            ],
            [
                $name,
                $this->getTransformColumns($table)
            ],
            $this->getStub('Transformer')
        );

        if (!file_exists($path = app_path("/Models/Detail/{$name}"))) {
            mkdir($path, 0777, true);
        }

        file_put_contents(app_path("/Models/Detail/{$name}/{$name}Transformer.php"), $modelTemplate);
    }

    protected function getTableColumns($table)
    {
        $template = "";
        $columns = $this->getColumns($table);
        foreach ($columns as $key => $column) {

            if (!$this->isFile($column)) {
                $exp = ucwords(str_replace("_", " ", $column));
                end($columns);
                if ($key === key($columns)) {
                    $template .= "{ \"title\": \"".$exp."\", \"data\": \"".$column."\" },";
                } else {
                    $template .= "{ \"title\": \"".$exp."\", \"data\": \"".$column."\" },\n";
                }
            }
        }

        return $template;
    }

    protected function getFormColumns($table)
    {
        $template = "";
        $columns = $this->getColumns($table);
        $next = ceil(count($columns)/2);
        foreach ($columns as $key => $column) {
            $exp = ucwords(str_replace("_", " ", $column));

            if ($this->isFile($column)) {
                $template .= "
                        <div class=\"form-group\">
                            <label class=\"control-label col-lg-3\">".$exp."</label>
                            <div class=\"col-lg-9\"> 
                                {!! Form::file('".$column."',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty(\$model['".$column."']))
                        <div class=\"form-group\">
                            <label class=\"control-label col-lg-3\">Attach File</label>
                            <div class=\"col-lg-9\">
                                {!! (\$model['".$column."']) ? \$model['".$column."'] : null !!}
                            </div>
                        </div>
                        @endif \n";
                if ($next == $key) {
                    $template .= "
                            </div>
                                <div class=\"col-lg-6\">\n";
                }
            } else {
                $template .= "
                        <div class=\"form-group\">
                            <label class=\"control-label col-lg-3\">".$exp."</label>
                            <div class=\"col-lg-9\"> 
                                {!! Form::text('".$column."',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> \n";
                if ($next == $key) {
                    $template .= "
                            </div>
                                <div class=\"col-lg-6\">\n";
                }
            }
        }

        return $template;
    }

    protected function getViewColumns($table)
    {
        $template = "";
        $columns = $this->getColumns($table);
        $next = ceil(count($columns)/2);
        foreach ($columns as $key => $column) {
            $exp = ucwords(str_replace("_", " ", $column));

            if ($this->isFile($column)) {
                $template .= "
                            <div class=\"form-group\">
                                <label>".$exp."</label>
                                <div class=\"form-group\">
                                    <a class=\"btn btn-primary\" href=\"{!! \$model['".$column."'] !!}\">
                                    <i class=\"icon-file-download2\"></i>
                                    Download File</a>
                                </div>
                            </div>\n";
                if ($next == $key) {
                    $template .= "
                            </div>
                                <div class=\"col-lg-6\">\n";
                }
            } else {
                $template .= "
                            <div class=\"form-group\">
                                <label>".$exp."</label>
                                <div class=\"form-group\"><b>{!! \$model['".$column."'] !!}</b></div>
                            </div>\n";
                if ($next == $key) {
                    $template .= "
                            </div>
                                <div class=\"col-lg-6\">\n";
                }
            }
        }

        return $template;
    }

    protected function view($name, $table)
    {
        $indexTemplate = str_replace(
            [
                '{{modelNameLabel}}',
                '{{modelTable}}'
            ],
            [
                ucwords($this->camelToKebab($name, " ")),
                $this->getTableColumns($table)
            ],
            $this->getStub('index.blade')
        );

        $formTemplate = str_replace(
            [
                '{{modelNameLabel}}',
                '{{modelForm}}'
            ],
            [
                ucwords($this->camelToKebab($name, " ")),
                $this->getFormColumns($table)
            ],
            $this->getStub('form.blade')
        );

        $viewTemplate = str_replace(
            [
                '{{modelNameLabel}}',
                '{{modelView}}'
            ],
            [
                ucwords($this->camelToKebab($name, " ")),
                $this->getViewColumns($table)
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

    protected function getValidateColumns($table)
    {
        $template = "";
        $columns = $this->getColumns($table);
        foreach ($columns as $key => $column) {
            if ($this->isFile($column)) {
                $template .= "
                        if (\$scope == 'create') {
                            \$rule['".$column."'] = 'required';
                        }\n";
            } else {
                $template .= "\$rule['".$column."'] = 'required';\n";
            }
        }

        return $template;
    }

    protected function controller($name, $table)
    {
        $controllerTemplate = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
                '{{modelNameKebabLowerCase}}',
                '{{modelValidate}}'
            ],
            [
                $name,
                strtolower(str_plural($name)),
                strtolower($name),
                $this->camelToKebab($name),
                $this->getValidateColumns($table)
            ],
            $this->getStub('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/Detail/{$name}Controller.php"), $controllerTemplate);
    }

    protected function camelToKebab($string, $us = "-") 
    {
        return strtolower(preg_replace(
            '/(?<=\d)(?=[A-Za-z])|(?<=[A-Za-z])(?=\d)|(?<=[a-z])(?=[A-Z])/', $us, $string));
    }

    protected function getColumns($table) 
    {
        $data = [];
        $columns = \DB::select("SHOW COLUMNS FROM ".$table);
        
        foreach ($columns as $column) {
            if ($this->deniedColumn($column->Field)) {
                $data[] = $column->Field;
            }
        }

        return $data;
    }

    protected function deniedColumn($field)
    {
        $fields = [
                'id',
                'detail_kdprog_id',
                'kd_struktur',
                'thn_periode_keg',
                'nama_propinsi',
                'nama_kabupatenkota',
                'created_by',
                'updated_by',
                'created_at',
                'updated_at',
                'is_actived'
            ];
        if (in_array($field, $fields)) {
            return false;
        }
        return true;
    }

    protected function isFile($column)
    {
        $exps = explode("_", $column);
        foreach ($exps as $exp) {
            if ($exp == 'file' || $exp == 'upload' || $exp == 'dokumentasi') {
                return true;
            }
        }

        return false;
    }
}
