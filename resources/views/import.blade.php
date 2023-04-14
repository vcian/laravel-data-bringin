<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel - Data Bringin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <style>
        .wizard {
            margin: 20px auto;
            background: #fff;
        }

        .wizard .wizard-inner {
            position: relative;
        }

        body {
            background: lightgray;
        }
        .wizard .nav-tabs {
            position: relative;
            margin: 30px auto;
            margin-bottom: 0;
            border: none;
        }

        .nav {
            margin-bottom: 0;
            padding-left: 0;
            list-style: none;
        }

        .wizard .nav-tabs li.active {
            pointer-events: inherit;
        }

        .wizard .nav-tabs li {
            width: 25%;
            overflow: hidden;
            pointer-events: none;
        }

        .nav-tabs > li {
            float: left;
            margin-bottom: -1px;
        }

        .nav > li {
            position: relative;
            display: block;
        }

        .wizard .nav-tabs li a {
            background-color: #7ac043;
            border: none;
            border-left: 1px solid #669f38;
            padding: 15px 15px 20px;
            color: #898989;
            position: relative;
            border-radius: 0;
            margin: 0;
            height: 93px;
        }

        .nav > li > a {
            position: relative;
            display: block;
            padding: 10px 15px;
        }

        .nav-tabs > li > a {
            margin-right: 2px;
            line-height: 1.42857;
            border: 1px solid transparent;
            border-radius: 4px 4px 0 0;
        }

        .nav > li > a {
            position: relative;
            display: block;
            padding: 10px 15px;
        }

        .nav-tabs > li > a {
            margin-right: 2px;
            line-height: 1.42857;
            border: 1px solid transparent;
            border-radius: 4px 4px 0 0;
        }

        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
            color: #555;
            background-color: #fff;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
            cursor: default;
        }

        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
            border: 0px;
        }

        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover,
        .nav-tabs > li.active > a:focus {
            color: #555;
            background-color: #fff;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
            cursor: default;
        }

        .wizard .nav-tabs li:first-child a {
            border-left: none;
        }

        .wizard .nav-tabs li.active a {
            background-color: #236194;
            color: #555555;
            cursor: default;
            border: none;
        }

        .wizard .nav-tabs li a .number {
            background-color: #ffffff;
            font-size: 24px;
            border: 2px solid #5aa023;
            float: left;
            height: 50px;
            line-height: 44px;
            margin: 0;
            padding: 0;
            width: 50px;
            border-radius: 50%;
            text-align: center;
            color: #7ac044;
        }

        .wizard .nav-tabs li.active a .number {
            border-color: #10477a;
            color: #236194;
        }

        .wizard .nav-tabs li a .number .fa {
            line-height: 44px;
        }

        .wizard .nav-tabs li a .desc {
            display: block;
            color: #fff;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            padding: 0 0 0 60px;
            text-align: left;
            position: relative;
            z-index: 1;
        }

        .wizard .nav-tabs li a .desc .name {
            display: block;
            line-height: 15px;
            margin: 0 0 3px;
            text-transform: uppercase;
        }

        .wizard .nav-tabs li a .desc .short-des {
            display: block;
            font-size: 15px;
            font-weight: 300;
            line-height: 16px;
            text-transform: capitalize;
            padding-right: 25px;
            max-height: 46px;
            overflow: hidden;
        }

        .wizard .nav-tabs li.active a .count-step {
            color: #1d537f;
        }

        .wizard .nav-tabs li a .count-step {
            bottom: 24px;
            color: #69a436;
            font-size: 58px;
            font-weight: bold;
            line-height: 0;
            position: absolute;
            right: 10px;
        }

        .wizard .nav-tabs li:first-child a {
            border-left: none;
        }

        .wizard .nav-tabs li.active:after {
            content: " ";
            position: absolute;
            left: 50%;
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #fff;
            transform: translate(-50%, 0);
        }

        .wizard .nav-tabs li.disabled {
            pointer-events: inherit;
        }

        .wizard .nav-tabs li.disabled a {
            background-color: #efefef;
            border-left-color: #efefef;
        }

        .wizard .nav-tabs li a {
            background-color: #7ac043;
            border: none;
            border-left: 1px solid #669f38;
            padding: 15px 15px 20px;
            color: #898989;
            position: relative;
            border-radius: 0;
            margin: 0;
            height: 93px;
            text-decoration: none;
        }

        .nav > li.disabled > a {
            color: #777;
        }

        .wizard .nav-tabs li.disabled a .number {
            border-color: #bdbdbd;
            color: #898989;
        }

        .wizard .nav-tabs li a .number .fa {
            line-height: 44px;
        }

        .wizard .nav-tabs li.disabled a .desc {
            color: #898989;
        }

        .wizard .nav-tabs li.disabled a .count-step {
            color: #e7e7e7;
        }

        .wizard .progress {
            background-color: #f5f5f5;
            height: 20px;
            margin-top: 20px;
        }

        .wizard .progress-bar-success {
            background-color: #7ac044;
            background-image: -webkit-linear-gradient(45deg, #cfedbb 25%, transparent 25%, transparent 50%, #cfedbb 50%, #cfedbb 75%, transparent 75%, transparent);
            background-image: -o-linear-gradient(45deg, #cfedbb 25%, transparent 25%, transparent 50%, #cfedbb 50%, #cfedbb 75%, transparent 75%, transparent);
            background-image: linear-gradient(45deg, #cfedbb 25%, transparent 25%, transparent 50%, #cfedbb 50%, #cfedbb 75%, transparent 75%, transparent);
        }

        .wizard .progress-bar {
            background-size: 40px 40px;
            float: left;
            width: 0;
            height: 100%;
            font-size: 12px;
            line-height: 20px;
            color: #fff;
            text-align: center;
            background-color: #7ac044;
            -webkit-box-shadow: inset 0 -1px 0 rgb(0 0 0 / 15%);
            box-shadow: inset 0 -1px 0 rgb(0 0 0 / 15%);
            -webkit-transition: width 0.6s ease;
            -o-transition: width 0.6s ease;
            transition: width 0.6s ease;
        }

        .import-box-list {
        }

        .import-contact-list .import-box-list .import-contact-item {
            display: block;
            background-color: #ffffff;
            position: relative;
            height: 100%;
            padding: 0px 15px 15px;
        }

        .import-contact-list .import-box-list:nth-child(4) .import-contact-item:before {
            background-color: #eb212d;
        }

        .import-contact-list .import-box-list .import-contact-item:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 35%;
            top: 0px;
            left: 0px;
            background-color: #00a9b3;
            z-index: 1;
        }

        .import-contact-list .import-box-list .import-contact-item .import-contact-heading {
            display: table;
            width: 100%;
            padding: 10px 0;
            position: relative;
            height: 60px;
            z-index: 2;
        }

        .import-contact-list .import-box-list .import-contact-item .import-contact-heading h2 {
            margin: 0;
            font-size: 20px;
            line-height: 20px;
            color: #ffffff;
            font-weight: 700;
            text-transform: uppercase;
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .import-contact-list .import-box-list .import-contact-item .import-info-box {
            padding: 15px;
            background: #fff no-repeat;
            background-position: center bottom 15px;
            position: relative;
            height: calc(100% - 60px);
            box-shadow: -0.5px 1.5px 2.598px 3px rgb(0 0 1 / 13%);
            z-index: 3;
        }

        .import-contact-list .import-box-list .import-contact-item .import-info-box .upload-csv {
            margin-left: 0;
            margin-right: 0;
            margin-bottom: 20px;
        }

        .form-horizontal .form-group:before,
        .form-horizontal .form-group:after {
            content: " ";
            display: table;
        }

        .import-contact-list .import-box-list .import-contact-item .import-info-box .upload-csv label {
            font-size: 16px;
            font-weight: 600;
            padding: 5px 0px 0px;
            text-align: left;
            color: #797979;
        }

        .import-contact-list .import-box-list .import-contact-item .import-contact-heading {
            display: table;
            width: 100%;
            padding: 10px 0;
            position: relative;
            height: 60px;
            z-index: 2;
        }

        .import-contact-list .import-box-list .import-contact-item {
            max-width: 30%;
            margin: auto;
        }

        .tab-content .tab-pane {
            background-color: #efefef;
            padding: 30px;
        }

        .tab-content .note.wizard-cus-note {
            background-color: #c0edf1;
            border-color: #4cb9c5;
            color: #259da7;
            font-size: 18px;
        }

        h2,
        h3 {
            color: #434955;
            font-weight: 600;

        }

        .fw-bold {
            color: #dc3545;
        }

        .title-border {
            border-bottom: 1px solid #dc3545 !important;
        }

        .tab-content .note {
            margin: 0 0 15px;
            padding: 8px 30px 8px 15px;
            border-left: 5px solid #eee;
            border-radius: 0 4px 4px 0;
        }

        .tab-content .note.wizard-cus-note .label {
            background-color: #4cb9c5;
            display: initial;
            padding: 1px 5px;
            color: #ffffff;
            font-size: 14px;
        }

        .bold {
            font-weight: 400 !important;
            color: #007e8b;
            font-size: 14px;
        }

        .form-horizontal .mapping-step {
            display: flex;
            margin-left: 0;
            margin-right: 0;
        }

        .mCustomScrollbar {
            -ms-touch-action: pinch-zoom;
            touch-action: pinch-zoom;
        }

        .mCustomScrollBox {
            position: relative;
            overflow: hidden;
            height: 100%;
            max-width: 100%;
            outline: none;
            direction: ltr;
        }

        .mCSB_container {
            overflow: hidden;
            width: auto;
            height: auto;
        }

        .tab-content .imported_data {
            border-collapse: collapse;
            width: 100%;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: separate;
            border-spacing: 0;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
        }

        .tab-content .imported_data {
            border-collapse: collapse;
            width: 100%;
        }

        .tab-content .imported_data th {
            background-color: #4cb9c5;
            border: 1px solid #eee;
            font-size: 13px;
            font-weight: 600;
            text-align: left;
            padding: 5px 10px 5px 10px;
            vertical-align: middle;
        }

        .form-horizontal .mapping-step .mapping-viewtable .maping-table thead tr th {
            background: #ffffff;
            color: #333;
            border: 1px solid #eee !important;
            font-weight: 600;
        }

        .form-horizontal .mapping-step .mapping-viewtable .maping-table thead tr th {
            background: #ffffff;
            color: #333;
            border: 1px solid #eee !important;
            font-weight: 600;
        }

        .table > thead > tr > th {
            background: #4cb9c5;
            color: #ffffff;
            text-transform: uppercase;
        }

        table.dataTable thead td,
        table.dataTable thead th {
            border-bottom: 2px solid #e7ecf1;
            outline: 0 !important;
        }

        .table thead tr th {
            font-size: 14px;
            font-weight: 600;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td {
            border-bottom-width: 2px;
        }

        .table-bordered > thead > tr > th,
        .table-bordered > thead > tr > td {
            border: 1px solid #e7ecf1;
        }

        .table > thead > tr > th {
            vertical-align: bottom;
            border-bottom: 2px solid #e7ecf1;
        }

        .table > thead > tr > th,
        .table > thead > tr > td {
            padding: 8px;
            line-height: 1.42857;
            vertical-align: top;
            border-top: 1px solid #e7ecf1;
        }

        .table > thead:first-child > tr:first-child > th,
        .table > thead:first-child > tr:first-child > td {
            border-top: 0;
        }

        .mCSB_horizontal.mCSB_inside > .mCSB_container {
            margin-right: 0;
            margin-bottom: 30px;
        }

        .mapping-viewtable .mCSB_horizontal .mCSB_container {
            margin-bottom: 15px;
        }

        section select {
            align-items: center;
            width: 100%;
            max-width: 100%;
            padding: 0;
        }

        .tab-content .imported_data select {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            text-transform: capitalize;
            line-height: 1.42857;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            outline: none;
            border-radius: 0px;
            -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
            -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            -o-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            font-family: "Open Sans", sans-serif;
        }

        .select-dropdown {
            position: relative;
        }

        .form-actions {
            border-top: solid 1px #ccc;
            padding: 0px 0 15px;
        }

        .list-inline {
            padding-left: 0;
            list-style: none;
            margin-left: -5px;
        }

        .list-inline .btn-default {
            background: #236194;
            text-transform: uppercase;
            color: #fff;
            border: 0px;
            padding: 10px 25px;
            font-size: 87.5%;
            margin-right: 5px;
            margin-top: 7px;
            cursor: pointer;
        }

        .tab-content .btn {
            border-radius: 0;
        }

        .list-inline > li {
            display: inline-block;
            padding-left: 5px;
            padding-right: 5px;
        }

        .list-inline > li {
            display: inline-block;
            padding-left: 5px;
            padding-right: 5px;
        }

        .form-actions .list-inline {
            margin-bottom: 0px;
            padding-top: 8px;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #286090;
            border-color: #204d74;
        }

        .tab-content .btn {
            border-radius: 0;
        }

        .tab-content .btn-primary {
            background: #4cb9c5;
            text-transform: uppercase;
            color: #fff;
            border: 0px;
            padding: 10px 25px;
            font-size: 87.5%;
            margin-right: 5px;
            margin-top: 7px;
            cursor: pointer;
            outline: none;
            position: relative;
            z-index: 2;
        }

        .tab-content .btn {
            border-radius: 0;
        }

        .tab-content .imported_data {
            border-collapse: collapse;
            width: 100%;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            border-collapse: separate;
            border-spacing: 0;
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
        }

        .header {
            background: #ffffff;
            padding: 0px;
            box-shadow: 0px 0px 4px rgb(0 0 0 / 30%);
        }

        .table > thead:first-child > tr:first-child > th,
        .table > thead:first-child > tr:first-child > td {
            border-top: 0;
        }

        #sample_2_wrapper table.import-table th:nth-child(1),
        #sample_2_wrapper table.import-table td:nth-child(1) {
            max-width: 60px !important;
            min-width: 40px !important;
            width: 60px !important;
            text-align: center;
            vertical-align: middle;
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid #111;
        }

        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .dataTables_wrapper.no-footer div.dataTables_scrollHead table,
        .dataTables_wrapper.no-footer div.dataTables_scrollBody table {
            border-bottom: none;
        }

        .wizard .dataTables_scrollBody {
            min-height: 50px;
        }

        table.dataTable.display tbody th,
        table.dataTable.display tbody td {
            border-top: 1px solid #ddd;
        }

        .tab-content .imported_data td input {
            border: solid 1px #f0eeee;
            padding: 5px 10px;
            line-height: 14px;
            width: 100%;
            height: 30px;
            outline: none;
        }

        .tab-content .imported_data td .sr-no {
            margin-right: 10px;
            display: inline-block;
            text-align: right;
            white-space: nowrap;
        }

        .tab-content .imported_data td input {
            border: solid 1px #f0eeee;
            padding: 5px 10px;
            line-height: 14px;
            width: 100%;
            height: 30px;
            outline: none;
        }

        .wizard ::-webkit-scrollbar {
            -webkit-appearance: none;
            width: 7px;
            height: 7px;
        }

        .wizard ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: rgba(0, 0, 0, 0.5);
            -webkit-box-shadow: 0 0 1px rgb(255 255 255 / 50%);
        }

        .containerRadio input,
        .containerCheckbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            left: 0;
        }
        div.DTS div.dataTables_scrollBody {
            background: repeating-linear-gradient(45deg, #edeeff, #edeeff 10px, #fff 10px, #fff 20px);
        }

        .dataTables_wrapper.no-footer .dataTables_scrollBody {
            border-bottom: 1px solid #111;
        }

        .dataTables_wrapper.no-footer .dataTables_scrollBody {
            border-bottom: 1px solid #eee !important;
            background: #ffffff;
        }

        .tab-content .note.note-success {
            background-color: #c0edf1;
            border-color: #4cb9c5;
            color: #000;
            font-weight: 400;
        }

        .tab-content .note.note-danger {
            background-color: #f9afb5;
            border-color: #dc3545;
            color: #ed6b75;
            font-weight: 400;
        }

        .tab-content .note.note-success p {
            font-size: 14px;
            font-weight: 400;
            color: #259da7;
        }

        .tab-content .note p {
            margin: 0;
        }

        .table_header {
            margin-bottom: 20px;
            background: #fff;
            padding: 30px;
        }

        .table_header select {
            max-width: 47%;
        }

        .header_row th {
            padding: 20px 10px !important;
        }

        .table-bordered > :not(caption) > * {
            border-width: inherit;
        }

        footer {
            padding: 10px;
            background: #efefef;
            z-index: 999;
        }

        .select.is-invalid {
            border-color: #dc3545 !important;
        }

        @media only screen and (min-width: 1600px) {
            .container {
                max-width: 1600px;
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container position-relative">
    <div class="pt-5 d-flex align-items-center justify-content-center">
        <h2 class="pb-2 title-border"><span class="fw-bold">Laravel </span><span class="fw-light">Data Bringin</span>
        </h2>
    </div>
    <div class="wizard cus-form-wizard">
        <div class="wizard-inner">
            <div class="connecting-line"></div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" @class(['active' => (request()->step ?? 1) == 1])>
                    <a data-toggle="tab" aria-controls="step1" role="tab">
                        <span class="number"><i class="fa fa-upload"></i></span>
                        <span class="desc">
                            <span class="name">Upload CSV</span>
                            <span class="short-des">Import your CSV file and follow the steps</span>
                        </span>
                        <span class="count-step">1</span>
                    </a>
                </li>
                <li role="presentation" @class(['active' => request()->step == 2, 'disabled' => request()->step < 2])>
                    <a data-toggle="tab" aria-controls="step2" role="tab">
                        <span class="number"><i class="fa fa-object-group"></i></span>
                        <span class="desc">
                            <span class="name">Mapping</span>
                            <span class="short-des">Map the CSV columns with selected table column</span>
                        </span>
                        <span class="count-step">2</span>
                    </a>
                </li>
                <li role="presentation"
                    @class(['active' => request()->step == 3, 'disabled' => request()->step < 3]) class="disabled">
                    <a data-toggle="tab" aria-controls="step3" role="tab">
                        <span class="number"><i class="fa fa-gear"></i></span>
                        <span class="desc">
                            <span class="name">Manage</span>
                            <span class="short-des">After uploading you can review data and manage data</span>
                        </span>
                        <span class="count-step">3</span>
                    </a>
                </li>
                <li role="presentation" @class(['disabled' => request()->step < 4]) class="disabled">
                    <a data-toggle="tab" aria-controls="summarydata" role="tab">
                        <span class="number"><i class="fa fa-file-excel-o"></i></span>
                        <span class="desc">
                            <span class="name">Result</span>
                            <span class="short-des">See the imported data result with success or error</span>
                        </span>
                        <span class="count-step">4</span>
                    </a>
                </li>
            </ul>
        </div>
        <div id="bar" class="progress progress-striped" role="progressbar">
            <div class="progress-bar progress-bar-success"
                 style="width: {{ round((request()->step ?? 1) * 100 / 4, 2) }}%"></div>
        </div>
        <div class="form-horizontal">
            <div class="tab-content">
                <div
                    @class(['active' => (request()->step ?? 1) == 1, 'tab-pane', 'first-step']) role="tabpanel"
                    id="step1">
                    <form method="post" action="{{ route('data_bringin.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="step" value="{{ request()->step ?? 1 }}">
                        <div class="row">
                            <div class="import-contact-list">
                                <div class="import-box-list col-lg-12 col-sm-6">
                                    <div class="import-contact-item">
                                        <div class="import-contact-heading">
                                            <h2>Import CSV File</h2>
                                        </div>
                                        <div class="import-info-box upload-section">
                                            <div class="form-group upload-csv">
                                                <label>Upload CSV File</label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="input-group">
                                                        <input class="form-control @error('file') is-invalid @enderror"
                                                               type="file"
                                                               name="file"
                                                               id="file"
                                                               accept=".csv"/>
                                                        @error('file')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group upload-csv import-csv-box">
                                                <div class="download-save-continue">
                                                    <div class="save-and-continue">
                                                        <button type="submit"
                                                                class="btn btn-primary next-step continue-step1">Next
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="info-content"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if(request()->step == 2)
                    <div @class(['active' => request()->step == 2, 'tab-pane']) role="tabpanel" id="step2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="note wizard-cus-note">
                                    <span class="label label-danger">NOTE!</span>
                                    <span class="bold">Please match column with the original form value.</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="errorMsg" style="color: red; display: none;"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="get">
                                    <div class="form-group">
                                        <input type="hidden" name="step" value="{{ request()->step }}">
                                        <div class="select-dropdown tab-content imported_data table_header">
                                            <label>Select Database Table</label>
                                            <select class="select @error('table') is-invalid @enderror" name="table" onchange="this.form.submit()">
                                                <option selected disabled>Select Table</option>
                                                @foreach($tables as $table)
                                                    <option @selected($table == $selectedTable)>
                                                        {{ $table }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('table')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form method="post" action="{{ route('data_bringin.store') }}">
                            @csrf
                            <input type="hidden" name="step" value="{{ request()->step }}">
                            <input type="hidden" name="table" value="{{ $selectedTable }}">
                            <div class="form-group mapping-step">
                                <div class="col-md-12 col-sm-12">
                                    @if($selectedTable)
                                        <div id="sample_1_wrapper">
                                            <div class="mapping-viewtable mCustomScrollbar _mCS_1">
                                                <div id="mCSB_1"
                                                     class="mCustomScrollBox mCS-light-3 mCSB_horizontal mCSB_inside"
                                                     style="max-height: none;" tabindex="0">
                                                    <div id="mCSB_1_container" class="mCSB_container"
                                                         style="position: relative; top: 0px; left: 0px; width: 771px; min-width: 100%; overflow-x: inherit;"
                                                         dir="ltr">
                                                        <table
                                                            class="table imported_data maping-table table table-striped table-bordered table-hover manage-taskTbl dataTable"
                                                            role="grid" aria-describedby="sample_1_info">
                                                            <thead>
                                                            <tr class="header_row">
                                                                <th>Database Table Column</th>
                                                                <th>CSV File Column</th>
                                                            </tr>
                                                            @foreach($tableColumns as $column)
                                                            <tr>
                                                                <th>
                                                                    {{ $column['name'] }}
                                                                    @if($column['required'])
                                                                        <span class="text-danger">*</span>
                                                                    @endif
                                                                </th>
                                                                <th>
                                                                    <div class="select-dropdown">
                                                                        <select class="firstname-class"
                                                                                name="columns[{{$column['name']}}]">
                                                                            <option selected value=''>Select
                                                                                Column
                                                                            </option>
                                                                            @foreach($fileColumns as $val)
                                                                                <option @selected(isset($selectedColumns[$column['name']]) && $selectedColumns[$column['name']] == $val && $selectedTable == session('import.table'))>{{ $val }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            @endforeach
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{ route('data_bringin.index', ['step' => --request()->step]) }}"
                                                   class="btn btn-default prev-step">Previous</a>
                                            </li>
                                            <li>
                                                <button type="submit"
                                                        class="btn btn-primary next-step continue-step2">Continue
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                @if(request()->step == 3)
                    <div @class(['active' => request()->step == 3, 'tab-pane']) role="tabpanel" id="step3">
                        <form method="post" action="{{ route('data_bringin.store') }}">
                            @csrf
                            <input type="hidden" name="step" value="{{ request()->step }}">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div id="sample_2_wrapper">
                                        <div class="main-table import-table-scroll">
                                            <div id="sample_1_wrapper" class="dataTables_wrapper no-footer DTS">
                                                <div class="dataTables_scrollBody">
                                                    <div class="dataTables_scrollHead">
                                                        <div class="dataTables_scrollHeadInner">
                                                            <table
                                                                class="table import-table table-hover table-bordered imported_data dataTable no-footer display nowrap"
                                                                role="grid"
                                                                aria-describedby="sample_1_info"
                                                            >
                                                                <thead class="header">
                                                                <tr role="row">
                                                                    <th></th>
                                                                    <th>Id</th>
                                                                    @foreach($tableColumns as $column)
                                                                        @if(isset($selectedColumns[$column['name']]))
                                                                            <th>{{ $column['name'] }}</th>
                                                                        @endif
                                                                    @endforeach
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($fileData as $key => $data)
                                                                    <tr role="row" class="odd" id="record1">
                                                                        <td class="text-center">
                                                                            <a href="{{ route('data_bringin.delete_record', $data['Id']) }}"
                                                                               onclick="return confirm('Are you sure you want to delete this record?')"
                                                                               class="bg-transparent border-0 p-0">
                                                                                <i class="fa fa-trash text-danger"></i>
                                                                            </a>
                                                                        </td>
                                                                        <td>{{ ++$key }}</td>
                                                                        @foreach($tableColumns as $column)
                                                                            @if(isset($selectedColumns[$column['name']]))
                                                                                <td>{{ $data[$selectedColumns[$column['name']]] ?? '' }}</td>
                                                                            @endif
                                                                        @endforeach
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-actions">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="{{ route('data_bringin.index', ['step' => --request()->step]) }}"
                                                   class="btn btn-default prev-step">Previous</a>
                                            </li>
                                            <li>
                                                <button type="submit"
                                                        class="btn btn-primary btn-info-full next-step continue-step3">
                                                    Save
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                @if(request()->step == 4)
                    <div @class(['active' => request()->step == 4,'tab-pane']) role="tabpanel" id="summarydata">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div id="sample_3_wrapper">
                                    @if($result && !$result['error'])
                                        <div class="note note-success">
                                            <p><b> Total {{ $result['count'] }} data has been imported! </b> &nbsp;<i
                                                    class="fa fa-check-circle greeg-color"></i></p>
                                        </div>
                                    @endif
                                    @if($result && $result['error'])
                                        <div class="note note-danger">
                                            <div class="d-flex align-items-center">
                                                <p class="text-danger"><b>{{ $result['error'] }}</b></p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="{{ route('data_bringin.index') }}"
                                               class="btn btn-primary next-step continue-step4">Finish</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<footer class="d-flex align-items-center justify-content-between w-100 position-fixed bottom-0 left-0 px-3">
    <p class="m-0">Laravel Data Bringin - version {{ \Composer\InstalledVersions::getVersion('vcian/laravel-data-bringin') }}</p>
    <p class="m-0">Created by <a href="https://viitorcloud.com/" class="text-decoration-none" target="_blank">ViitorCloud</a>
    </p>
</footer>
</body>
</html>
