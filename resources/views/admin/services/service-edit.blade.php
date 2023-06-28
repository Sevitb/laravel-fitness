@extends('adminlte::page')

@section('plugins.bootstrap-select', true)

@section('title', 'Услуга')

@section('content_header')
    <h1>Редактировать данные услуги</h1>
@stop

@php
    $categoriesList = [];
    foreach ($allCategories as $category) {
        $categoriesList[$category->id] = $category->title;
    }
@endphp

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/service/save" method="post" enctype="multipart/form-data">
                            @csrf {{ csrf_field() }}
                            <div class="row">
                                <x-adminlte-input name="title" label="Название" placeholder="Название"
                                    fgroup-class="col-md-6" value="{{ $service->title }}" disable-feedback />
                            </div>
                            <hr>
                            <div>
                                <h5 class="mb-3">Краткая информация</h5>
                                <div class="brief_info-fields">
                                    <div class="row">
                                        @foreach (json_decode($service->description)->brief_info as $key => $infoParagraph)
                                            <div class="brief_info-field col-md-6 row">
                                                <x-adminlte-textarea name="description[brief_info][{{ $key }}]"
                                                    placeholder="Краткая информация" fgroup-class="col-8 col-sm-10">
                                                    {{ $infoParagraph }}
                                                </x-adminlte-textarea>
                                                <button type="button" class="btn btn-danger delete col-4 col-sm-2"
                                                    style="height: max-content">-</button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-primary add">Добавить</button>
                                </div>
                                <hr>
                                <h5 class="mb-3">Опции</h5>
                                <div class="options-fields">
                                    <div class="row g-5">
                                        @if (isset(json_decode($service->description)->options))
                                            @foreach (json_decode($service->description)->options as $key => $option)
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
                            <div class="prices-fields">
                                <h5 class="mb-3">Категории</h5>
                                @if (count($attachedCategories))
                                    @foreach ($attachedCategories as $attachedCategory)
                                        @php
                                            $pricesBlockClass = $attachedCategory->pivot->price_type == 0 ? 'd-none' : '';
                                        @endphp
                                        <fieldset class="prices-field mb-3">
                                            <div class="row">
                                                <x-adminlte-select name="category[{{ $attachedCategory->id }}][id]" required
                                                    data-input-category-id onchange="changeCategory(this)">
                                                    <x-adminlte-options :options="$categoriesList" :selected="$attachedCategory->id"
                                                        placeholder="Категория" />
                                                </x-adminlte-select>
                                            </div>
                                            <div class="row">
                                                <x-adminlte-select name="category[{{ $attachedCategory->id }}][price_type]"
                                                    data-input-with-id="priceType" data-input-settings required
                                                    onchange="changePriceType(this)">
                                                    <x-adminlte-options :options="[
                                                        '0' => 'Без цены',
                                                        '1' => 'Показывать цену за категорию услуги',
                                                        '2' => 'Показывать цену за категорию тренера',
                                                    ]" placeholder="Цена за..."
                                                        :selected="$attachedCategory->pivot->price_type" />
                                                </x-adminlte-select>
                                            </div>
                                            <div class="prices row {{ $pricesBlockClass }}">
                                                <div class="col-6">
                                                    <x-adminlte-input
                                                        name="category[{{ $attachedCategory->id }}][service_price]"
                                                        data-input-with-id="price" data-coach-level="null"
                                                        placeholder="Цена" label="Цена за категорию"
                                                        value="{{ $attachedCategory->pivot->service_price }}"
                                                        disable-feedback />
                                                </div>
                                                @php
                                                    $prices = (array) json_decode($attachedCategory->pivot->service_coach_levels_prices);
                                                @endphp

                                                <div class="col-6">
                                                    @for ($i = 1; $i <= 3; $i++)
                                                        @if (array_key_exists($i, $prices))
                                                            <x-adminlte-input
                                                                name="category[{{ $attachedCategory->id }}][service_coach_levels_prices][{{ $i }}]"
                                                                data-input-with-id="prices"
                                                                data-coach-level="{{ $i }}"
                                                                label="Цена за {{ $i }} категорию тренера"
                                                                placeholder="Цена" value="{{ $prices[$i] }}"
                                                                disable-feedback />
                                                        @else
                                                            <x-adminlte-input
                                                                name="category[{{ $attachedCategory->id }}][service_coach_levels_prices][{{ $i }}]"
                                                                data-input-with-id="prices"
                                                                data-coach-level="{{ $i }}"
                                                                label="Цена за {{ $i }} категорию тренера"
                                                                placeholder="Цена" disable-feedback />
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="label-group">
                                                    <label for="detachCategory">Отвязать категорию</label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="checkbox" id="detachCategory"
                                                        data-input-with-id="deleteCheckbox"
                                                        name="category[{{ $attachedCategory->id }}][delete]">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-danger delete col-12"
                                                style="height: max-content">-</button>
                                            <hr>
                                        </fieldset>
                                    @endforeach
                                @else
                                    <fieldset class="prices-field mb-3">
                                        <div class="row">
                                            <x-adminlte-select name="category[0][id]" required data-input-category-id
                                                onchange="changeCategory(this)">
                                                <x-adminlte-options :options="$categoriesList" placeholder="Категория" />
                                            </x-adminlte-select>
                                        </div>
                                        <div class="row">
                                            <x-adminlte-select name="category[0][price_type]" data-input-with-id="priceType"
                                                data-input-settings required onchange="changePriceType(this)">
                                                <x-adminlte-options :options="[
                                                    '0' => 'Без цены',
                                                    '1' => 'Показывать цену за категорию услуги',
                                                    '2' => 'Показывать цену за категорию тренера',
                                                ]" placeholder="Цена за..."
                                                    :selected="0" />
                                            </x-adminlte-select>
                                        </div>
                                        <div class="prices row d-none">
                                            <div class="col-6">
                                                <x-adminlte-input name="category[0][service_price]"
                                                    data-input-with-id="price" data-coach-level="null" placeholder="Цена"
                                                    label="Цена за категорию" disable-feedback />
                                            </div>

                                            <div class="col-6">
                                                @for ($i = 1; $i <= 3; $i++)
                                                    <x-adminlte-input
                                                        name="category[0][service_coach_levels_prices][{{ $i }}]"
                                                        data-input-with-id="prices"
                                                        data-coach-level="{{ $i }}"
                                                        label="Цена за {{ $i }} категорию тренера"
                                                        placeholder="Цена" disable-feedback />
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="label-group">
                                                <label for="detachCategory">Отвязать категорию</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="checkbox" id="detachCategory"
                                                    data-input-with-id="deleteCheckbox" name="category[0][delete]">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger delete col-12"
                                            style="height: max-content">-</button>
                                        <hr>
                                    </fieldset>
                                @endif
                                <button type="button" class="btn btn-primary add">Добавить</button>
                            </div>
                            <hr>
                            <div class="row">
                                <x-adminlte-input-file name="image" label="Картинка" placeholder="Выберите файл"
                                    disable-feedback />
                            </div>
                            <hr>
                            <input type="hidden" name="id" value="{{ $service->id }}">
                            <x-adminlte-button class="btn" type="submit" label="Сохранить" theme="success"
                                icon="fas fa-lg fa-save" />
                        </form>
                        <form action="/admin/service/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $service->id }}">
                            <x-adminlte-button class="btn mt-2" type="submit"
                                onclick="confirm('Удалить услугу из системы?')" label="Удалить" theme="danger"
                                icon="fas fa-lg fa-delete" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $('.prices-fields').addel({
            classes: {
                target: 'prices-field',
                add: 'add',
                delete: 'delete',
            }
        });
    </script>
    <script>
        $('.brief_info-fields').addel({
            classes: {
                target: 'brief_info-field',
                add: 'add',
                delete: 'delete',
            }
        }).on('addel:add', function(event) {
            event.target.find('textarea').attr('name', 'description[brief_info][]');
        })
    </script>
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
    <script>
        function changePriceType(element) {
            let fieldset = element.closest('fieldset');
            let categoryIdInput = $(fieldset).find('[data-input-category-id]');
            let pricesBlock = $(fieldset).find('.prices');

            if ($(element).val() == 0) {
                pricesBlock.addClass('d-none');
            } else {
                pricesBlock.removeClass('d-none');
            }
        }

        function changeCategory(element) {
            let fieldset = element.closest('fieldset');
            let coachLevelPricesInputs = $(fieldset).find('[data-input-with-id="prices"]');
            let categoryPriceInput = $(fieldset).find('[data-input-with-id="price"]');
            let priceTypeInput = $(fieldset).find('[data-input-with-id="priceType"]');
            let deleteCheckbox = $(fieldset).find('[data-input-with-id="deleteCheckbox"]');

            if ($(`[name='category[${$(element).val()}][id]']`).length) {
                $(element).val('').change();
                $(element).find('option:selected').prop("selected", false);
                return alert('Для этой категории уже существуют ценники!');
            }

            element.name = `category[${$(element).val()}][id]`;
            $(deleteCheckbox).attr('name', `category[${$(element).val()}][delete]`);
            $(priceTypeInput).attr('name', `category[${$(element).val()}][price_type]`);
            $(categoryPriceInput).attr('name', `category[${$(element).val()}][service_price]`);

            $(coachLevelPricesInputs).each((index, priceInput) => {
                priceInput.name = priceInput.name.replace(/^category\[\d*\]\[service_coach_levels_prices\]\[\d*\]$/,
                    `category[${$(element).val()}][service_coach_levels_prices][${priceInput.dataset.coachLevel ? priceInput.dataset.coachLevel : ""}]`
                );
            });
        }
    </script>
@stop
