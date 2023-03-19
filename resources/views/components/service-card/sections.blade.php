@extends('components.service-card.service-card')

@section('image')
    <div class="section-info-block__image-container">
        <div class="section-info-block__background-image">
            <img src="{{ asset($service->image) }}" alt="">
        </div>
    </div>
@endsection

@section('text')
    <div class="section-info-block__text-container">
        <h2 class="h-2 section-info-block__title">{{ $service->title }}</h2>
        <div class="section-info-block__message">
            @isset(json_decode($service->description)->brief_info)
                @foreach (json_decode($service->description)->brief_info as $paragraph)
                    <p class="p section-info-block__text">
                        {{ $paragraph }}
                    </p>
                @endforeach
            @endisset
            @isset(json_decode($service->description)->options)
                <ul class="section-info-block__list">
                    @foreach (json_decode($service->description)->options as $item)
                        <li class="section-info-block__list-item">{{ $item }};</li>
                    @endforeach
                </ul>
            @endisset
        </div>
        <div class="prices">
            <div class="category-card__tabs-btns">
                @foreach (json_decode($service->service_prices) as $service_price)
                    @isset($service_price->coach_level)
                        @if ($loop->first)
                            <input type="radio" name="tab-btn"
                                id="tab-btn-{{ $service->id }}-{{ $service_price->coach_level }}" checked>
                            <label class="category-card__tab-btn-1 h-4"
                                for="tab-btn-{{ $service->id }}-{{ $service_price->coach_level }}">
                                Категория {{ $service_price->coach_level }}
                            </label>
                        @else
                            <input type="radio" name="tab-btn"
                                id="tab-btn-{{ $service->id }}-{{ $service_price->coach_level }}">
                            <label class="category-card__tab-btn-2 h-4"
                                for="tab-btn-{{ $service->id }}-{{ $service_price->coach_level }}">
                                Категория {{ $service_price->coach_level }}
                            </label>
                        @endif
                    @endisset
                @endforeach
            </div>
            <ul class="section-info-block__price-list">
                @foreach (json_decode($service->service_prices) as $service_price)
                    @isset($service_price->value)
                        @if ($loop->first)
                            <li id="content-{{ $service_price->coach_level }}"
                                class="section-info-block__price-list-item category-card__tab-content category-card__price-container active">
                                <span class="category-card__price">
                                    {{ $service_price->value }}₽
                                </span>
                            </li>
                        @else
                            <li id="content-{{ $service_price->coach_level }}"
                                class="section-info-block__price-list-item category-card__tab-content category-card__price-container">
                                <span class="category-card__price">
                                    {{ $service_price->value }}₽
                                </span>
                            </li>
                        @endif
                    @endisset
                @endforeach
                @isset($service->price)
                    <div class="category-card__price-container active">
                        <span class="category-card__price">
                            {{ $service->price }}₽
                        </span>
                    </div>
                @endisset
            </ul>
        </div>
        <button class="btn section-info-block__btn">Записаться</button>
    </div>
@endsection
