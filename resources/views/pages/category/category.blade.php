@extends('index')

@push('links')
    @include('pages.' . $viewName . '.head.links')
@endpush

@push('scripts')
    @include('pages.' . $viewName . '.head.scripts')
@endpush

@section('content')
    <main class="main">
        @include('components.modal')
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
            <div class="container section-info-block__container">
                @foreach ($services as $service)
                    @if ($loop->iteration % 2 == 0)
                        @include('components.service-card', ['service' => $service, 'position' => 'even'])
                    @else
                        @include('components.service-card', ['service' => $service, 'position' => 'odd'])
                    @endif
                @endforeach
            </div>
        </section>
    </main>
@endsection
