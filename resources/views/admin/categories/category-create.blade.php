@extends('adminlte::page')

@section('title', 'Категория')

@section('content_header')
    <h1>Редактировать данные категории</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/category/save" method="post" enctype="multipart/form-data">
                            @csrf {{ csrf_field() }}
                            <div class="row">
                                <x-adminlte-input name="title" label="Название" placeholder="Название"
                                    fgroup-class="col-md-6" disable-feedback />
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input name="subtitle" label="Подзаголовок" placeholder="Подзаголовок"
                                    fgroup-class="col-md-6" disable-feedback />
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input-file name="canvas_image" label="Картинка категории"
                                    fgroup-class="col-md-6" placeholder="Выберите файл" disable-feedback />
                                <x-adminlte-input-file name="icon" label="Иконка категории" fgroup-class="col-md-6"
                                    placeholder="Выберите файл" disable-feedback />
                            </div>
                            <x-adminlte-button class="btn" type="submit" label="Сохранить" theme="success"
                                icon="fas fa-lg fa-save" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@stop
