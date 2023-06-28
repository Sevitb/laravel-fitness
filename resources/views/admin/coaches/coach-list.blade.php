@extends('adminlte::page')

@section('title', 'Тренеры')

@section('content_header')
    <h1>Тренеры</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Таблица тренеров</h3>
                    </div>

                    <div class="card-body">
                        <a href="{{ url('admin/coach/create') }}" class="btn btn-success mb-3">Создать</a>
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
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    Имя
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Категория
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coaches as $coach)
                                                <tr class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $coach->id }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('admin/coach/edit/' . $coach->id) }}">
                                                            {{ $coach->surname }} {{ $coach->name }}
                                                            {{ $coach->patronymic }}
                                                        </a>
                                                    </td>
                                                    <td>{{ isset($coach->level_id) ? $coach->level_id : '--' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Имя</th>
                                                <th rowspan="1" colspan="1">Категория</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            {{ $coaches->links() }}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@stop
