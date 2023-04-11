<?php

namespace Vcian\LaravelDataBringin\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Import Service
 */
class ImportService
{
    public function getTables(): Collection
    {
        return collect(Schema::getAllTables())->pluck('Tables_in_'.env('DB_DATABASE'));
    }

    public function getTableColumns(string $table): Collection
    {
        if (! Schema::hasTable($table)) {
            return collect();
        }

        return collect(DB::select("describe {$table}"))->map(function ($column) {
            return [
                'name' => $column->Field,
                'required' => $column->Null === 'NO',
            ];
        })->reject(function ($column) {
            return in_array($column['name'], ['id', 'deleted_at']);
        });
    }

    public function csvToArray(string $fileName): array
    {
        // open csv file
        if (! ($fp = fopen($fileName, 'r'))) {
            return [];
        }

        //read csv headers
        $key = fgetcsv($fp, '1024', ',');
        session(['import.fileColumns' => $key]);
        array_unshift($key, 'Id');

        // parse csv rows into array
        $data = [];
        $i = 1;
        while ($row = fgetcsv($fp, '1024', ',')) {
            array_unshift($row, $i);
            $data[] = array_combine($key, $row);
            $i++;
        }

        // release file handle
        fclose($fp);

        // return data
        return $data;
    }
}
