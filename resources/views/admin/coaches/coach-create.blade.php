@extends('adminlte::page')

@section('title', 'Добавить тренера')

@section('content_header')
    <h1>Добавить тренера</h1>
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
                                    fgroup-class="col-md-6" disable-feedback />
                                <x-adminlte-input name="name" label="Имя" placeholder="Имя" fgroup-class="col-md-6"
                                    disable-feedback />
                                <x-adminlte-input name="patronymic" label="Отчество" placeholder="Отчество"
                                    fgroup-class="col-md-6" disable-feedback />
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input name="description[slogan]" label="Девиз" placeholder="Девиз"
                                    fgroup-class="col-md-6" disable-feedback />
                                <x-adminlte-textarea name="description[brief_info]" label="Краткая информация"
                                    placeholder="Краткая информация" fgroup-class="col-md-6">

                                </x-adminlte-textarea>
                            </div>
                            <div>
                                <h5 class="mb-3">Опции</h5>
                                <div class="options-fields">
                                    <div class="row g-5">
                                        <div class="options-field col-md-6 row">
                                            <x-adminlte-input name="description[options][]" placeholder="Опция"
                                                fgroup-class="col-8 col-sm-10" />
                                            <button type="button" class="btn btn-danger delete col-4 col-sm-2"
                                                style="height: max-content">-</button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary add">Добавить</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input-file name="portrait" label="Портрет" placeholder="Выберите файл"
                                    disable-feedback />
                            </div>
                            <x-adminlte-button class="btn" type="submit" label="Сохранить" theme="success"
                                icon="fas fa-lg fa-save" />
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
