@extends('index')

@push('links')
    @include('pages.' . $viewName . '.head.links')
@endpush

@push('scripts')
    @include('pages.' . $viewName . '.head.scripts')
@endpush

@section('content')
    <main class="main">
        <section class="section-main-zone">
            <div class="section-main-zone__container container">
                <div class="section-main-zone__column">
                    <h1 class="h-0 section-main-zone__title">{{ $category->title }}</h1>
                    <div class="section-main-zone__text-container">
                        <h3 class="h-3">
                            {{ $category->subtitle }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="section-main-zone__background-image">
                <img src="{{ asset($category->canvas_image) }}" alt="">
            </div>
        </section>

        <section class="section-info-block">
            <div class="container">
                @foreach ($services as $key => $service)
                    @if ($loop->iteration % 2 == 0)
                        @include('components.service-card.service-card', [
                            'service' => $service,
                            'position' => 'even',
                        ])
                    @else
                        @include('components.service-card.service-card', [
                            'service' => $service,
                            'position' => 'odd',
                        ])
                    @endif
                @endforeach
            </div>
        </section>

        @if ($seasonTickets !== [])
            <section class="section-season-tickets">
                <div class="container">
                    <div class="section-season-tickets__row">
                        @foreach ($seasonTickets as $sesonTicket)
                            @include('components.season-ticket-card.season-ticket-card', [
                                'seasonTicket' => $sesonTicket,
                            ])
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <x-modal />

    </main>
@endsection
