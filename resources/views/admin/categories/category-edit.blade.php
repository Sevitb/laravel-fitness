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
                                    fgroup-class="col-md-6" value="{{ $category->title }}" disable-feedback />
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input name="subtitle" label="Подзаголовок" placeholder="Подзаголовок"
                                    fgroup-class="col-md-6" value="{{ $category->subtitle }}" disable-feedback />
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input-file name="canvas_image" label="Картинка категории"
                                    fgroup-class="col-md-6" placeholder="Выберите файл"
                                    value="{{ $category->canvas_image }}" disable-feedback />
                                <x-adminlte-input-file name="icon" label="Иконка категории" fgroup-class="col-md-6"
                                    placeholder="Выберите файл" value="{{ $category->icon }}" disable-feedback />
                            </div>
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <x-adminlte-button class="btn" type="submit" label="Сохранить" theme="success"
                                icon="fas fa-lg fa-save" />
                        </form>
                        <form action="/admin/category/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <x-adminlte-button class="btn mt-2" type="submit"
                                onclick="confirm('Удалить категорию из системы?')" label="Удалить" theme="danger"
                                icon="fas fa-lg fa-delete" />
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
