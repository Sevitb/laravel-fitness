@push('scripts')
    <script src="example.js"></script>
@endpush
<header class="header">
    <div class="container header__container">
        <div class="header__primary-row">
            <div class="logo header__logo">
                <a href="/">
                    <img src="{{ asset('images/global/logo.svg') }}" alt="КАМ" class="logo__image_size_m">
                </a>
            </div>
            <div class="mobile-menu-icon header__mobile-menu-icon">
                <span class="mobile-menu-icon__line"></span>
            </div>
            <div class="header__links">
                <div class="nav header__nav">
                    <nav class="nav__container header__nav-container">
                        <ul class="nav__list_horizontal header__nav-list">
                            <li class="nav__list-item header__nav-item"><a href="{{ url('/#main') }}"
                                    class="header__nav-link">Главная</a></li>
                            <li class="nav__list-item header__nav-item"><a href="#about" class="header__nav-link">О
                                    студии</a></li>
                            <li class="nav__list-item header__nav-item"><a href="{{ url('/#huber') }}"
                                    class="header__nav-link">Huber</a></li>
                            <li class="nav__list-item header__nav-item"><a href="{{ url('coach') }}"
                                    class="header__nav-link">Тренеры</a></li>
                            <li class="nav__list-item header__nav-item"><a href="{{ url('/#zones') }}"
                                    class="header__nav-link">Фитнес
                                    зоны</a>
                            </li>
                            <li class="nav__list-item header__nav-item"><a href="{{ url('/#contacts') }}"
                                    class="header__nav-link">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header__contacts">
                    <span class="_icon-phone"></span>
                    <div class="header__tels">
                        @foreach ($contacts['tels'] as $tel)
                            <a href="tel: {{ $tel }}">{{ $tel }}</a>
                        @endforeach
                    </div>
                </div>
                <!-- <div class="header__personal_aria">
                </div> -->
            </div>
        </div>
    </div>
</header>
