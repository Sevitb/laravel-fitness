@extends('adminlte::page')

@section('title', 'Редактирование главной страницы')

@section('content_header')
    <h1>Главная страница</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/page/save" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <h2 class="mb-4">Секция главного экрана</h2>
                                <div class="row">
                                    <x-adminlte-input name="page[main][subtitle]" label="Подзаголовок"
                                        placeholder="Подзаголовок" fgroup-class="col-md-6"
                                        value="{{ $pageData['main']['subtitle'] }}" disable-feedback />
                                </div>
                                <div class="row">
                                    <x-adminlte-textarea name="page[main][text]" label="Текст на главном экране"
                                        placeholder="Введите текст..." fgroup-class="col-md-6">
                                        {{ $pageData['main']['text'] }}
                                    </x-adminlte-textarea>
                                </div>
                            </div>

                            <hr>

                            <div>
                                <h2 class="mb-4">Секция «{{ $pageData['about']['title'] }}»</h2>
                                <div class="row">
                                    <x-adminlte-input name="page[about][title]" label="Заголовок" placeholder="Заголовок"
                                        fgroup-class="col-md-6" value="{{ $pageData['about']['title'] }}"
                                        disable-feedback />
                                </div>
                                <h5 class="mb-3">Абзацы</h5>
                                <div class="row">
                                    @foreach ($pageData['about']['text'] as $aboutParagraphKey => $aboutParagraph)
                                        <x-adminlte-textarea name="page[about][text][{{ $aboutParagraphKey }}]"
                                            placeholder="Введите текст..." fgroup-class="col-md-6">
                                            {{ $aboutParagraph }}
                                        </x-adminlte-textarea>
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h2 class="mb-4">Секция «{{ $pageData['gallery']['title'] }}»</h2>
                                <div>
                                    <x-adminlte-input name="page[gallery][title]" label="Заголовок" placeholder="Заголовок"
                                        fgroup-class="col-md-6" value="{{ $pageData['gallery']['title'] }}"
                                        disable-feedback />
                                    @foreach ($pageData['gallery']['images'] as $galleryImagesGroupKey => $imagesGroup)
                                        <x-adminlte-input name="page[gallery][images][{{ $galleryImagesGroupKey }}][title]"
                                            label="Название группы" placeholder="Название группы" fgroup-class="col-md-6"
                                            value="{{ $imagesGroup['title'] }}" disable-feedback />
                                        <div class="file-loading">
                                            <input id="gallery-group-{{ $galleryImagesGroupKey }}"
                                                data-gallery-group="{{ $galleryImagesGroupKey }}" name="images[]"
                                                type="file" multiple="true">
                                        </div>
                                        @if (!$loop->last)
                                            <hr>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h2 class="mb-4">Секция «Huber»</h2>
                                <div class="row">
                                    @foreach ($pageData['huber']['text'] as $huberParagraphKey => $huberParagraph)
                                        <x-adminlte-textarea name="page[huber][text][{{ $huberParagraphKey }}]"
                                            placeholder="Введите текст..." fgroup-class="col-md-6">
                                            {{ $huberParagraph }}
                                        </x-adminlte-textarea>
                                    @endforeach
                                </div>
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

@section('plugins.BsFileInputMaster', true)

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js"
        type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            @foreach ($pageData['gallery']['images'] as $galleryImagesGroupKey => $imagesGroup)
                $("[id='gallery-group-{{ $galleryImagesGroupKey }}']").fileinput({
                    initialPreview: [
                        @foreach ($imagesGroup['src'] as $src)
                            '{{ asset($src) }}'
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    ],
                    initialPreviewConfig: [
                        @foreach ($imagesGroup['src'] as $srcKey => $src)
                            {
                                key: {{ $srcKey }},
                                extra: {
                                    id: {{ $srcKey }},
                                    gallery_group: {{ $galleryImagesGroupKey }},
                                }
                            }
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    ],
                    ajaxDeleteSettings: {
                        headers: {
                            'X-CSRF-token': '{{ csrf_token() }}'
                        }
                    },
                    ajaxSettings: {
                        headers: {
                            'X-CSRF-token': '{{ csrf_token() }}'
                        }
                    },
                    uploadExtraData: {
                        gallery_group: {{ $galleryImagesGroupKey }},
                    },
                    uploadUrl: 'page/image/upload',
                    deleteUrl: 'page/image/delete',
                    initialPreviewAsData: true,
                    language: 'ru',
                    showDrag: true,
                    allowedFileTypes: ["image"],
                    showUpload: true,
                    overwriteInitial: false,
                    maxFileSize: 3072,
                });
            @endforeach
        });
    </script>
    <script>
        $('.options-fields').addel({
            classes: {
                target: 'options-field',
                add: 'add',
                delete: 'delete',
            }
        }).on('addel:add', function(event) {
            console.log(event.target.find('input').attr('name', 'description[options][]'));
        })
    </script>
@stop


@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
@stop
