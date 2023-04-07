<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel - Data Bringin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .stepper {
            counter-reset: step;
        }
        .stepper li {
            list-style-type: none;
            width: 33.33%;
            position: relative;
            text-align: center;
            font-weight: 600;
        }
        .stepper li:before {
            content: counter(step);
            counter-increment: step;
            height: 30px;
            width: 30px;
            line-height: 30px;
            border: 2px solid #ddd;
            display: block;
            text-align: center;
            margin: 0 auto 10px auto;
            border-radius: 50%;
            background-color: white;
        }
        .stepper li:after {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #ddd;
            top: 15px;
            left: -50%;
            z-index: -1;
        }
        .stepper li:first-child:after {
            content: none;
        }
        .stepper li.active {
            color: #27ae60;
        }
        .stepper li.active:before {
            border-color: #27ae60;
        }
        .stepper li.active+li:after {
            background-color: #27ae60;
        }
        .progress {
            width: 75%;
        }
        .content {
            width: 80%;
        }
        .btn:focus,
        .dropdown-toggle.show:focus {
            box-shadow: none !important;
        }
        .next-btn{
            border-left: 1px solid #ffffff;
        }
        .notes {
            height: 50px;
            background: rgb(25 135 84 / 30%);
        }
        .notes::before {
            content: "";
            position: absolute;
            border: 3px solid #198754;
            height: 100%;
            left: 0;
        }
        .table-height{
            height:450px;
        }
         .svg-wrapper svg {
            width:25px;
             color:#198754;
         }
         .dark-green{
             color:#27ae60;
         }
        .notes-error {
            height: 50px;
            background: rgb(241 118 130 / 50%);
        }
        .notes-error .svg-wrapper svg {
             color:rgb(255 0 25);
        }
        .notes-error::before {
            content: "";
            position: absolute;
            border: 3px solid rgb(255 0 25);
            height: 100%;
            left: 0;
        }
        footer {
            height: 50px;
            background: #e5e5e5;
        }
        .overflow-scroll {
            overflow-y: scroll !important;
            padding: 80px 0px;
            overflow-x: hidden !important;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="overflow-scroll">
            <div class="py-3 d-flex align-items-center justify-content-center">
                <h2 class="border-bottom pb-2" ><span class="fw-bold">Laravel </span><span class="fw-light">Data Bringin</span></h2>
            </div>
            <ul class="stepper d-flex my-3">
                <li class="active">Upload CSV File</li>
                <li @class(['active' => request()->step >= 2])>Mapping</li>
                <li @class(['active' => request()->step >= 3])>Manage</li>
                <li @class(['active' => request()->step >= 4])>Result</li>
            </ul>
            <div class="progress m-auto">
                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                     role="progressbar" style="width: {{ round((request()->step ?? 1) * 100 / 4, 2) }}%"
                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="content mx-auto my-5">
                @if(request()->step == 1 || !isset(request()->step))
                <!-- First step  -->
                <div class="first-step">
                    <form method="post" action="{{ route('data_bringin.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="step" value="{{ request()->step ?? 1 }}">
                        <div class="mt-5">
                            <label for="formFile" class="form-label">Select File</label>
                            <input class="form-control @error('file') is-invalid @enderror"
                                    type="file"
                                    name="file"
                                    id="file"
                                    accept=".csv" />
                            @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="btn-group mt-3" role="group" aria-label="Basic example" style="float: right;">
                            <button type="submit" class="btn btn-success next-btn">Next</button>
                        </div>
                    </form>
                </div>
                @endif
                <!-- Second step  -->
                @if(request()->step == 2)
                <div class="second-step">
                    <div class="notes w-100 px-4 d-flex align-items-center
                          position-relative">
                        <p class="m-0"><span class="badge bg-success me-2
                             text-uppercase">Note!</span>Please match file column name
                            with the original table column name.
                        </p>
                    </div>
                    <form method="get">
                        <input type="hidden" name="step" value="{{ request()->step }}">
                        <div class="mb-5 mt-5">
                            <label for="table" class="form-label">Select Database Table</label>
                            <select class="form-select" name="table" onchange="this.form.submit()">
                                <option selected disabled>Select Table</option>
                                @foreach($tables as $table)
                                <option @selected($table == $selectedTable)>
                                    {{ $table }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    @if($selectedTable)
                    <form method="post" action="{{ route('data_bringin.store') }}">
                        @csrf
                        <input type="hidden" name="step" value="{{ request()->step }}">
                        <input type="hidden" name="table" value="{{ $selectedTable }}">
                        <table class="table table-responsive table-bordered my-3">
                            <thead>
                            <tr>
                                <th>Database Table Column</th>
                                <th>CSV File Column</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tableColumns as $column)
                            <tr>
                                <td class="w-50 align-middle text-uppercase">{{ $column }}</td>
                                <td class="w-50">
                                    <select class="form-select" name="columns[{{$column}}]">
                                        <option selected disabled>Select Column</option>
                                        @foreach($fileColumns as $val)
                                            <option @selected(isset($selectedColumns[$column]) && $selectedColumns[$column] == $val)>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="btn-group mt-3" role="group" style="float: right;">
                            <a href="{{ route('data_bringin.index', ['step' => --request()->step]) }}" class="btn btn-success">Prev</a>
                            <button type="submit" class="btn btn-success next-btn">Next</button>
                        </div>
                    </form>
                    @endif
                </div>
                @endif
                <!-- Third step  -->
                @if(request()->step == 3)
                <div class="third-step">
                    <div class="table-responsive table-height">
                        <table class="table table-bordered my-3">
                            <thead>
                            <tr class="text-uppercase">
                                <th></th>
                                <th>id</th>
                                @foreach($tableColumns as $column)
                                <th>{{ $column }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fileData as $key => $data)
                            <tr>
                                <td class="text-center">
                                    <a href="{{ route('data_bringin.delete_record', $data['Id']) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="bg-transparent border-0 p-0">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                                <td>{{ ++$key }}</td>
                                @foreach($tableColumns as $column)
                                <td>{{ (isset($selectedColumns[$column]) && isset($data[$selectedColumns[$column]])) ? $data[$selectedColumns[$column]] : '' }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form method="post" action="{{ route('data_bringin.store') }}">
                        @csrf
                        <input type="hidden" name="step" value="{{ request()->step }}">
                        <div class="btn-group mt-3" role="group" style="float: right;">
                            <a href="{{ route('data_bringin.index', ['step' => --request()->step]) }}" class="btn btn-success">Prev</a>
                            <button type="submit" class="btn btn-success next-btn">Save</button>
                        </div>
                    </form>
                </div>
                @endif
                <!-- Fourth step  -->
                @if(request()->step == 4)
                <div class="fourth-step">
                    @if($result && !$result['error'])
                    <div class="notes w-100 px-4 d-flex align-items-center
                          position-relative">
                        <div class="d-flex align-items-center">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <p class="dark-green mx-2 mb-0 mt-">{{ $result['count'] }} Data Imported <span class="fw-bold">Successfully</span>.</p>
                        </div>
                    </div>
                    @endif
                    @if($result && $result['error'])
                    <div class="notes-error w-100 px-4 d-flex align-items-center
                          position-relative">
                        <div class="d-flex align-items-center">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                            </div>
                            <p class="text-danger mx-2 mb-0 mt-">{{ $result['error'] }}</p>
                        </div>
                    </div>
                    @endif
                    <div class="btn-group mt-3" role="group" aria-label="Basic example" style="float: right;">
                        <a href="{{ route('data_bringin.index') }}" class="btn btn-success">Continue</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <footer class="d-flex align-items-center justify-content-between w-100 position-fixed bottom-0 left-0 px-3">
        <p class="m-0">Laravel Data Bringin - version 1.0.0</p>
        <p class="m-0">Created by <a href="https://viitorcloud.com/" class="text-decoration-none" target="_blank">ViitorCloud</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
</body>
</html>
