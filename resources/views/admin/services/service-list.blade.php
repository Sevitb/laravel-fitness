@extends('adminlte::page')

@section('title', 'Услуги')

@section('content_header')
    <h1>Услуги</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Таблица услуг</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('admin/service/create') }}" class="btn btn-success mb-3">Создать</a>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                        aria-describedby="example2_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">
                                                    ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1" aria-label="Название">
                                                    Название
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1" aria-label="Категории">
                                                    Категории
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $service->id }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('admin/service/edit/' . $service->id) }}">
                                                            {{ $service->title }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @foreach (json_decode($service->category_titles) as $category_title)
                                                            <a
                                                                href="{{ url('admin/category/edit/' . $category_title->category_id) }}">
                                                                {{ $category_title->value }}
                                                            </a>
                                                            @if (!$loop->last)
                                                                <span>|</span>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Название</th>
                                                <th rowspan="1" colspan="1">Категории</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            {{ $services->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
