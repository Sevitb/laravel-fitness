@extends('adminlte::page')

@section('title', 'Редактировать данные тренера')

@section('content_header')
    <h1>Редактировать данные тренера</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/coach/save" method="post" enctype="multipart/form-data">
                            @csrf {{ csrf_field() }}
                            <div class="row">
                                <x-adminlte-input name="surname" label="Фамилия" placeholder="Фамилия"
                                    fgroup-class="col-md-6" value="{{ $coach->surname }}" disable-feedback />
                                <x-adminlte-input name="name" label="Имя" placeholder="Имя" fgroup-class="col-md-6"
                                    value="{{ $coach->name }}" disable-feedback />
                                <x-adminlte-input name="patronymic" label="Отчество" placeholder="Отчество"
                                    value="{{ $coach->patronymic }}" fgroup-class="col-md-6" disable-feedback />
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input name="description[slogan]" label="Девиз" placeholder="Девиз"
                                    value="{{ json_decode($coach->description)->slogan }}" fgroup-class="col-md-6"
                                    disable-feedback />
                                <x-adminlte-textarea name="description[brief_info]" label="Краткая информация"
                                    placeholder="Краткая информация" fgroup-class="col-md-6">
                                    {{ json_decode($coach->description)->brief_info }}
                                </x-adminlte-textarea>
                            </div>
                            <div>
                                <h5 class="mb-3">Опции</h5>
                                <div class="options-fields">
                                    <div class="row g-5">
                                        @if (isset(json_decode($coach->description)->options))
                                            @foreach (json_decode($coach->description)->options as $key => $option)
                                                <div class="options-field col-md-6 row">
                                                    <x-adminlte-input name="description[options][{{ $key }}]"
                                                        placeholder="Опция" fgroup-class="col-8 col-sm-10"
                                                        value="{{ $option }}" />
                                                    <button type="button" class="btn btn-danger delete col-4 col-sm-2"
                                                        style="height: max-content">-</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="options-field col-md-6 row">
                                                <x-adminlte-input name="description[options][]" placeholder="Опция"
                                                    fgroup-class="col-8 col-sm-10" />
                                                <button type="button" class="btn btn-danger delete col-4 col-sm-2"
                                                    style="height: max-content">-</button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" class="btn btn-primary add">Добавить</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input-file name="portrait" label="Портрет" placeholder="Выберите файл"
                                    value="{{ $coach->portrait }}" disable-feedback />
                            </div>
                            <input type="hidden" name="id" value="{{ $coach->id }}">
                            <x-adminlte-button class="btn" type="submit" label="Сохранить" theme="success"
                                icon="fas fa-lg fa-save" />
                        </form>
                        <form action="/admin/coach/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $coach->id }}">
                            <x-adminlte-button class="btn mt-2" type="submit"
                                onclick="confirm('Удалить тренера из системы?')" label="Удалить" theme="danger"
                                icon="fas fa-lg fa-delete" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $('.options-fields').addel({
            classes: {
                target: 'options-field',
                add: 'add',
                delete: 'delete',
            }
        }).on('addel:add', function(event) {
            event.target.find('input').attr('name', 'description[options][]');
        })
    </script>
@stop
