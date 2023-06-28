@extends('adminlte::page')


@section('title', 'Панель управления')

@section('content_header')
    <h1>Панель управления</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
            <a href="{{ url('admin/coaches') }}">
                <x-adminlte-info-box title="Тренеры" text="{{ $coachesCount }}" icon="fas fa-users" icon-theme="primary" />
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <a href="{{ url('admin/categories') }}">
                <x-adminlte-info-box title="Категории" text="{{ $categoriesCount }}" icon="fas fa-tag" icon-theme="green" />
            </a>
        </div>
        <div class="col-md-4 col-sm-6 col-12">
            <a href="{{ url('admin/services') }}">
                <x-adminlte-info-box title="Услуги" text="{{ $servicesCount }}" icon="fas fa-shopping-cart"
                    icon-theme="yellow" />
            </a>
        </div>
    </div>
@stop
