<div class="section-info-block__row">
    @if ($position == 'odd')
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
            <div class="category-card">
                <div class="category-card__tabs-btns">
                    @foreach (json_decode($service->service_prices) as $service_price)
                        @isset($service_price->coach_level)
                            @if ($loop->first)
                                <p class="p section-info-block__text">
                                    Выберите категорию тренера:
                                </p>
                                <button id="{{ $service->id }}-{{ $service_price->coach_level }}"
                                    class="category-card__tab-btn service__tab-btn h-4 tablinks active"
                                    onclick="openTab(event, this.id)">
                                    Категория {{ $service_price->coach_level }}
                                </button>
                            @else
                                <button id="{{ $service->id }}-{{ $service_price->coach_level }}"
                                    class="category-card__tab-btn service__tab-btn h-4 tablinks"
                                    onclick="openTab(event, this.id)">
                                    Категория {{ $service_price->coach_level }}
                                </button>
                            @endif
                        @endisset
                    @endforeach

                    @foreach (json_decode($service->service_prices) as $service_price)
                        @isset($service_price->value)
                            @if ($loop->first)
                                <div id="c-{{ $service->id }}-{{ $service_price->coach_level }}"
                                    class="category-card__tab-content category-card__price-container tabcontent active">
                                    <span class="category-card__price h-3">
                                        {{ $service_price->value }}₽
                                    </span>
                                </div>
                            @else
                                <div id="c-{{ $service->id }}-{{ $service_price->coach_level }}"
                                    class="category-card__tab-content category-card__price-container tabcontent">
                                    <span class="category-card__price h-3">
                                        {{ $service_price->value }}₽
                                    </span>
                                </div>
                            @endif
                        @endisset
                    @endforeach
                </div>
            </div>
            <div class="prices">
                @isset($service->price)
                    <div class="category-card__price-container active">
                        <span class="category-card__price h-3">
                            {{ $service->price }}₽
                        </span>
                    </div>
                @endisset
            </div>
            <button class="btn section-info-block__btn" data-modal-id="modal-1" data-service-id="{{ $service->id }}"
                data-service-title="{{ $service->title }}">Записаться</button>
        </div>
        <div class="section-info-block__image-container">
            <div class="section-info-block__background-image">
                <img src="{{ asset($service->image) }}" alt="">
            </div>
        </div>
    @else
        <div class="section-info-block__image-container">
            <div class="section-info-block__background-image">
                <img src="{{ asset($service->image) }}" alt="">
            </div>
        </div>
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
            <div class="category-card">
                <div class="category-card__tabs-btns">
                    @foreach (json_decode($service->service_prices) as $service_price)
                        @isset($service_price->coach_level)
                            @if ($loop->first)
                                <p class="p section-info-block__text">
                                    Выберите категорию тренера:
                                </p>
                                <button id="{{ $service->id }}-{{ $service_price->coach_level }}"
                                    class="category-card__tab-btn service__tab-btn h-4 tablinks active"
                                    onclick="openTab(event, this.id)">
                                    Категория {{ $service_price->coach_level }}
                                </button>
                            @else
                                <button id="{{ $service->id }}-{{ $service_price->coach_level }}"
                                    class="category-card__tab-btn service__tab-btn h-4 tablinks"
                                    onclick="openTab(event, this.id)">
                                    Категория {{ $service_price->coach_level }}
                                </button>
                            @endif
                        @endisset
                    @endforeach

                    @foreach (json_decode($service->service_prices) as $service_price)
                        @isset($service_price->value)
                            @if ($loop->first)
                                <div id="c-{{ $service->id }}-{{ $service_price->coach_level }}"
                                    class="category-card__tab-content category-card__price-container tabcontent active">
                                    <span class="category-card__price h-3">
                                        {{ $service_price->value }}₽
                                    </span>
                                </div>
                            @else
                                <div id="c-{{ $service->id }}-{{ $service_price->coach_level }}"
                                    class="category-card__tab-content category-card__price-container tabcontent">
                                    <span class="category-card__price h-3">
                                        {{ $service_price->value }}₽
                                    </span>
                                </div>
                            @endif
                        @endisset
                    @endforeach
                </div>
            </div>
            <div class="prices">
                @isset($service->price)
                    <div class="category-card__price-container">
                        <span class="category-card__price h-3">
                            {{ $service->price }}₽
                        </span>
                    </div>
                @endisset
            </div>
            <button class="btn section-info-block__btn" data-modal-id="modal-1" data-service-id="{{ $service->id }}"
                data-service-title="{{ $service->title }}">Записаться</button>
        </div>
    @endif
</div>
