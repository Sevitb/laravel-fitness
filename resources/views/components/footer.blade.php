<footer class="footer">
    <div class="container">
        <div class="footer__row-1">
            <div class="footer__contacts">
                <div class="footer__mail-container">
                    <p class="p">
                        Email: <br>
                        <a href="mailto: {{ $contacts['email'] }}">{{ $contacts['email'] }}</a>
                    </p>
                </div>
                <div class="footer__time-container">
                    <p class="p">
                        Время работы: <br>
                        {{ $contacts['working_hours'] }}
                    </p>
                </div>
                <div class="footer__adress-container">
                    <p class="p">
                        Адрес: <br>
                        {{ $contacts['adress'] }}
                    </p>
                </div>
                <div class="footer__phone-container">
                    <p class="p">
                        Телефоны: <br>
                        @foreach ($contacts['tels'] as $tel)
                            <a href="tel: {{ $tel }}">{{ $tel }}</a>
                            @if ($loop->last)
                                @continue
                            @else
                                <br>
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="logo footer__logo">
                <img class="logo__image_size_l" src="{{ asset('images/global/logo-full.svg') }}" alt="">
            </div>
            <div class="nav footer__nav">
                <nav class="nav__container footer__nav-container">
                    <ul class="nav__list_vertical footer__nav-list">
                        <li class="nav__list-item footer__nav-item"><a href="{{ url('/#main') }}"
                                class="footer__nav-link">Главная</a>
                        </li>
                        <li class="nav__list-item footer__nav-item"><a href="{{ url('/#about') }}"
                                class="footer__nav-link">Остудии</a>
                        </li>
                        <li class="nav__list-item footer__nav-item"><a href="{{ url('/#huber') }}"
                                class="footer__nav-link">Huber</a>
                        </li>
                        <li class="nav__list-item footer__nav-item"><a href="{{ url('/coach') }}"
                                class="footer__nav-link">Тренеры</a>
                        </li>
                        <li class="nav__list-item footer__nav-item"><a href="{{ url('/#zones') }}"
                                class="footer__nav-link">Фитнес зоны</a>
                        </li>
                        <li class="nav__list-item footer__nav-item"><a href="{{ url('/#contacts') }}"
                                class="footer__nav-link">Контакты</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="footer__row-2">
            <div class="footer__">
                <p class="p">
                    <a href="{{ asset('storage/Политика_Конфиденциальности_КАМ.pdf') }}" target="_blank">Политика
                        конфиденциальности</a>
                </p>
                <p class="p">
                    © 2021-{{ now()->year }} КАМ. Все права защищены.
                </p>
                <p class="p">
                    ООО «КАМ» ИНН/КПП 3460076406/34600100
                </p>
            </div>
            <div class="footer__social-media">
                <a href="https://vk.com/kamfitness" target="_blank">
                    <img src="{{ asset('images/global/vk.svg') }}" alt="">
                </a>
                <a href="https://t.me/kamfitness" target="_blank">
                    <img src="{{ asset('images/global/telegram.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</footer>
