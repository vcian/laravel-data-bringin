<?php

namespace Vcian\LaravelDataBringin\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

/**
 * Import Service
 */
class ImportService
{
    /**
     * @return Collection
     */
    public function getTables(): Collection
    {
        $tables = collect();
        $db = "Tables_in_".env('DB_DATABASE');
        foreach (Schema::getAllTables() as $table) {
            $tables->push($table->{$db});
        }
        return $tables;
    }

    /**
     * @param string $table
     * @return Collection
     */
    public function getTableColumns(string $table): Collection
    {
        return collect(Schema::getColumnListing($table))->reject(function (string $value) {
            return in_array($value, ['id', 'deleted_at']);
        });
    }

    /**
     * @param string $fileName
     * @return array
     */
    public function csvToArray(string $fileName): array
    {
        // open csv file
        if (!($fp = fopen($fileName, 'r'))) {
            return [];
        }

        //read csv headers
        $key = fgetcsv($fp,"1024",",");
        session(['import.fileColumns' => $key]);
        array_unshift($key, 'Id');

        // parse csv rows into array
        $data = [];
        $i = 1;
        while ($row = fgetcsv($fp,"1024",",")) {
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
