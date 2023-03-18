<div class="section-info-block__row">
    @if ($position == 'odd')
        <div class="section-info-block__text-container">
            <h2 class="h-2 section-info-block__title">{{ $service->title }}</h2>
            <div class="section-info-block__message">
                @foreach (json_decode($service->description)->brief_info as $paragraph)
                    <p class="p section-info-block__text">
                        {{ $paragraph }}
                    </p>
                @endforeach
                <ul class="section-info-block__list">
                    @foreach (json_decode($service->description)->options as $item)
                        <li class="section-info-block__list-item">{{ $item }};</li>
                    @endforeach
                </ul>
            </div>
            <button class="btn section-info-block__btn">Записаться</button>
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
                @foreach (json_decode($service->description)->brief_info as $paragraph)
                    <p class="p section-info-block__text">
                        {{ $paragraph }}
                    </p>
                @endforeach
                <ul class="section-info-block__list">
                    @foreach (json_decode($service->description)->options as $item)
                        <li class="section-info-block__list-item">{{ $item }};</li>
                    @endforeach
                </ul>
            </div>
            <button class="btn section-info-block__btn">Записаться</button>
        </div>
    @endif
</div>
