<?php

namespace Vcian\LaravelDataBringin\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Vcian\LaravelDataBringin\Http\Requests\ImportRequest;
use Vcian\LaravelDataBringin\Http\Requests\StoreImportRequest;
use Vcian\LaravelDataBringin\Services\ImportService;

class ImportController extends Controller
{
    public function __construct(
        private readonly ImportService $importService
    ) {
    }

    public function index(ImportRequest $request): View|RedirectResponse
    {
        if ($request->step > session('import.step') && $request->step != 4) {
            return to_route('data_bringin.index');
        }
        $data = [];
        $table = $request->table ?? session('import.table');
        $data['tables'] = $this->importService->getTables();
        $data['tableColumns'] = $table ? $this->importService->getTableColumns($table) : collect();
        $data['selectedTable'] = $table;
        $data['selectedColumns'] = collect(session('import.columns'));
        $data['fileColumns'] = collect(session('import.fileColumns'));
        $data['fileData'] = collect(session('import.data'));
        $data['result'] = collect(session('import.result'));

        return view('data-bringin::import', $data);
    }

    public function store(StoreImportRequest $request): RedirectResponse
    {
        switch ($request->step) {
            case 1:
                session()->forget('import');
                $path = $request->file('file')->getRealPath();
                session(['import.data' => $this->importService->csvToArray($path), 'import.step' => 2]);
                break;
            case 2:
                $columns = collect($request->columns)->filter();
                if(!$columns->count()) {
                    return redirect()->back();
                }
                session([
                    'import.table' => $request->table,
                    'import.columns' => $columns,
                    'import.step' => 3,
                ]);
                break;
            case 3:
                $fileData = collect(session('import.data'));
                $table = session('import.table');
                $columns = session('import.columns');
                $insertData = [];
                try {
                    foreach ($fileData as $data) {
                        $prepareData = [];
                        foreach ($columns as $key => $column) {
                            $prepareData[$key] = $data[$column];
                        }
                        $insertData[] = $prepareData;
                    }
                    DB::table($table)->insert($insertData);
                } catch (QueryException $ex) {
                    $errorMsg = 'There is an issue on store data in database.';
                } catch (\Exception $ex) {
                    $errorMsg = $ex->getMessage();
                }
                $result = [
                    'count' => count($insertData),
                    'error' => $errorMsg ?? null,
                ];
                session()->forget('import');
                session(['import.result' => $result]);
                break;
        }
        return to_route('data_bringin.index', ['step' => ++$request->step]);
    }

    public function deleteRecord(int $id): RedirectResponse
    {
        try {
            $data = collect(session('import.data'))->reject(function (array $data) use ($id) {
                return $data['Id'] == $id;
            })->values();
            session(['import.data' => $data]);

            return redirect()->back()->withSuccess('Record Deleted Successfully.');
        } catch (\Exception $exception) {
            return redirect()->back()->withError($exception->getMessage());
        }
    }
}
