@extends('index')

@push('links')
    @include('pages.' . $viewName . '.head.links')
@endpush

@push('scripts')
    @include('pages.' . $viewName . '.head.scripts')
@endpush

@section('content')
    <main class="main">
        <section class="section-main" id="main">
            <div class="container section-main__container">
                <h1 class="h-1 section-main__title">Коррекция <br>
                    Адаптивность <br>
                    Многофункциональность <br>
                </h1>
                <div class="section-main__grid-container">
                    <div class="section-main__text-body section-main__grid-item">
                        <h2 class="h-2 section-main__subtite">{{ $pageData['main']['subtitle'] }}</h2>
                        <p class="p-g section-main__message">
                            {{ $pageData['main']['text'] }}
                        </p>
                        <button class="btn section-main__btn" data-modal-id="modal-1">Записаться на занятие</button>
                    </div>
                    <div
                        class="section-main__grid-item section-main__background-image section-main__background-image_row_1">
                        <img src="{{ asset('images/home/global/gym.jpg') }}" alt="KAMfitness">
                    </div>
                    <div
                        class="section-main__grid-item section-main__background-image section-main__background-image_row_2">
                        <img src="{{ asset('images/home/global/gym.jpg') }}" alt="KAMfitness">
                    </div>
                </div>
                <div class="section-main__sales">
                    <span class="_icon-fire"></span>
                    <p class="h-4">
                        Бесплатная 20-ти минутная тренировка на
                        huber!
                    </p>
                </div>
                <!-- <div class="section-main__next-section"></div> -->
                <div class="section-main__main-image">
                    <a href="{{ url('coach/' . $coach->id) }}">
                        <img src="{{ asset($coach->portrait) }}" alt="">
                    </a>
                </div>
            </div>
        </section>

        <section class="section-about" id="about">
            <div class="section-about__background-image">
                <img src="{{ asset('images/home/about/about.jpg') }}" alt="">
            </div>
            <div class="container">
                <div class="section-about__text-container">
                    <h2 class="h-2 section-about__title">{{ $pageData['about']['title'] }}</h2>
                    @foreach ($pageData['about']['text'] as $paragraph)
                        <p class="p">
                            {{ $paragraph }}
                        </p>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-video">
            <video class="section-video__video-container" controls="controls"
                poster="{{ asset('images/home/video/video-poster.jpg') }}">
                <source src="{{ asset('video/home/video_for_kam.mp4') }}">
            </video>
        </section>

        <section class="section-gallery" id="gallery">
            <div class="swiper section-gallery__swiper">
                <div class="container section-gallery__container">
                    <div class="section-gallery__header">
                        <h2 class="h-2 section-gallery__title">{{ $pageData['gallery']['title'] }}</h2>
                        <h3 class="h-3 section-gallery__subtitle">Зал №1</h3>
                    </div>
                </div>
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper section-gallery__swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($pageData['gallery']['images'] as $imageGroup)
                        @foreach ($imageGroup['src'] as $imagePath)
                            <div class="swiper-slide section-gallery__swiper-slide" title="{{ $imageGroup['title'] }}">
                                <img src="{{ asset($imagePath) }}" alt="">
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination section-gallery__swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev section-gallery__swiper-button-prev"></div>
                <div class="swiper-button-next section-gallery__swiper-button-next"></div>

                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar section-gallery__swiper-scrollbar"></div>
            </div>
        </section>

        <section class="section-huber" id="huber">
            <div class="container">
                <div class="section-huber__row">
                    <div class="section-huber__text-container">
                        <h2 class="h-0 section-huber__title">Huber</h2>
                        @foreach ($pageData['huber']['text'] as $paragraph)
                            <p class="p section-huber__text">
                                {!! $paragraph !!}
                            </p>
                        @endforeach
                        <button class="btn section-huber__btn" data-modal-id="modal-1">Записаться на
                            занятие</button>
                    </div>
                    <div class="section-huber__image-container">
                        <img src="{{ asset('images/home/advantages/huber.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-advantages" id="advantages">
            <div class="container">
                <div class="section-advantages__grid-container">
                    <div class="section-advantages__grid-item section-advantages__header">
                        <h2 class="h-2">Мы знаем, что вам понравится</h2>
                    </div>
                    <div class="section-advantages__grid-item section-advantages__support">
                        <div class="section-advantages__image section-advantages__support-image">
                            <img src="{{ asset('images/home/advantages/support.png') }}" alt="">
                        </div>
                        <div class="section-advantages__text-container section-advantages__support-text-container">
                            <h3 class="h-3 section-advantages__title section-advantages__support-title">Поддержка
                            </h3>
                            <p class="p section-advantages__text section-advantages__support-text">Что нужно, чтобы всегда
                                сохранять спокойствие максимальную концентрацию на тренировках? Чувство уверенности, и
                                ощущение поддержки со стороны опытного наставника.</p>
                        </div>
                    </div>
                    <div class="section-advantages__grid-item section-advantages__equipment">
                        <h3 class="h-3 section-advantages__title section-advantages__equipment-title">Новейшее
                            оборудование</h3>
                        <p class="p section-advantages__text section-advantages__equipment-text">Что необходимо, чтобы раз
                            за разом равномерно прорабатывать все группы мышц? План и надежные тренажеры! Вам не нужно
                            думать где взять спортивный инвентарь, ведь мы уже собрали все что нужно в нашей студии!</p>
                        <div class="section-advantages__image section-advantages__equipment-image">
                            <img src="{{ asset('images/home/advantages/huber.png') }}" alt="">
                        </div>
                    </div>
                    <div class="section-advantages__grid-item section-advantages__approach">
                        <div class="section-advantages__text-container section-advantages__approach-text-container">
                            <h3 class="h-3 section-advantages__title section-advantages__approach-title">
                                Проффессиональный
                                подход</h3>
                            <p class="p section-advantages__text section-advantages__approach-text">Как добиться результата
                                быстрее и при этом потратить меньше времени? Найти грамотного и чуткого наставника, который
                                будет внимательно следить за техникой выполнения упражнений! </p>
                        </div>
                        <div class="section-advantages__image section-advantages__approach-image">
                            <img src="{{ asset('images/home/advantages/approach.png') }}" alt="">
                        </div>
                    </div>
                    <div class="section-advantages__grid-item section-advantages__gym">
                        <h3 class="h-3 section-advantages__title section-advantages__gym-title">Зал только для вас
                        </h3>
                        <p class="p section-advantages__text section-advantages__gym-text">Где найти просторное, светлое и
                            хорошо вентилируемое помещение для занятия спортом? В нашей студии! Мы постарались сделать все,
                            чтобы вам было максимально комфортно. В вашем распоряжении раздевалки с личными шкафчиками,
                            душевые кабинки, массажный кабинет два больших зала и все необходимые удобства.
                        </p>
                        <div class="section-advantages__image section-advantages__gym-image"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="section-reviews" id="rewiews">
                                                                                                                                                                                        <div class="container">
                                                                                                                                                                                            <h2 class="h-2 section-reviews__title">Ваше мнение о нас</h2>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="swiper section-reviews__swiper">
                                                                                                                                                                                            <.!-- Additional required wrapper --.>
                                                                                                                                                                                            <div class="swiper-wrapper section-reviews__swiper-wrapper">
                                                                                                                                                                                                <!.-- Slides --.>
                                                                                                                                                                                                <div class="swiper-slide section-reviews__swiper-slide">
                                                                                                                                                                                                    <div class="reviewer-card section-reviews__reviewer-card">
                                                                                                                                                                                                        <div class="reviewer-card__text-container">

                                                                                                                                                                                                            <div class="reviewer-card__icon"><img src="media/svg/quotes.svg" alt=""></div>
                                                                                                                                                                                                            <p class="p reviewer-card__text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                                                                                                                                                                elit. Adipiscing in volutpat donec ultrices. Montes, condimentum augue non
                                                                                                                                                                                                                viverra mauris gravida nisl, leo pharetra. In sit urna, dignissim proin aliquet.
                                                                                                                                                                                                                Montes, condimentum augue non viverra mauris gravida nisl, leo pharetra. In sit
                                                                                                                                                                                                                urna, dignissim proin aliquet. </p>
                                                                                                                                                                                                            <div class="reviewer-card__footer">
                                                                                                                                                                                                                <p class="p reviewer-card__name">Иван И. Иванов</p>
                                                                                                                                                                                                                <a class="p reviewer-card__link">Перейти к отзыву</a>
                                                                                                                                                                                                            </div>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="reviewer-card__image">
                                                                                                                                                                                                            <img src="media/images/background/gym.JPG" alt="">
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="swiper-slide section-reviews__swiper-slide">
                                                                                                                                                                                                    <div class="reviewer-card section-reviews__reviewer-card">
                                                                                                                                                                                                        <div class="reviewer-card__text-container">

                                                                                                                                                                                                            <div class="reviewer-card__icon"><img src="media/svg/quotes.svg" alt=""></div>
                                                                                                                                                                                                            <p class="p reviewer-card__text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                                                                                                                                                                elit. Adipiscing in volutpat donec ultrices. Montes, condimentum augue non
                                                                                                                                                                                                                viverra mauris gravida nisl, leo pharetra. In sit urna, dignissim proin aliquet.
                                                                                                                                                                                                                Montes, condimentum augue non viverra mauris gravida nisl, leo pharetra. In sit
                                                                                                                                                                                                                urna, dignissim proin aliquet. </p>
                                                                                                                                                                                                            <div class="reviewer-card__footer">
                                                                                                                                                                                                                <p class="p reviewer-card__name">Иван И. Иванов</p>
                                                                                                                                                                                                                <a class="p reviewer-card__link">Перейти к отзыву</a>
                                                                                                                                                                                                            </div>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="swiper-slide section-reviews__swiper-slide">
                                                                                                                                                                                                    <div class="reviewer-card section-reviews__reviewer-card">
                                                                                                                                                                                                        <div class="reviewer-card__text-container">

                                                                                                                                                                                                            <div class="reviewer-card__icon"><img src="media/svg/quotes.svg" alt=""></div>
                                                                                                                                                                                                            <p class="p reviewer-card__text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                                                                                                                                                                                elit. Adipiscing in volutpat donec ultrices. Montes, condimentum augue non
                                                                                                                                                                                                                viverra mauris gravida nisl, leo pharetra. In sit urna, dignissim proin aliquet.
                                                                                                                                                                                                                Montes, condimentum augue non viverra mauris gravida nisl, leo pharetra. In sit
                                                                                                                                                                                                                urna, dignissim proin aliquet. </p>
                                                                                                                                                                                                            <div class="reviewer-card__footer">
                                                                                                                                                                                                                <p class="p reviewer-card__name">Иван И. Иванов</p>
                                                                                                                                                                                                                <a class="p reviewer-card__link">Перейти к отзыву</a>
                                                                                                                                                                                                            </div>

                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="reviewer-card__image">
                                                                                                                                                                                                            <img src="media/images/background/gym.JPG" alt="">
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <!.-- If we need pagination --.>
                                                                                                                                                                                            <div class="swiper-pagination section-reviews__swiper-pagination"></div>

                                                                                                                                                                                            <!.-- If we need navigation buttons --.>
                                                                                                                                                                                            <div class="section-reviews__swiper-navigation-buttons">
                                                                                                                                                                                                <div class="swiper-button-prev section-reviews__swiper-button-prev"></div>
                                                                                                                                                                                                <div class="swiper-button-next section-reviews__swiper-button-next"></div>
                                                                                                                                                                                            </div>

                                                                                                                                                                                            <!.-- If we need scrollbar --.>
                                                                                                                                                                                            <div class="swiper-scrollbar section-reviews__swiper-scrollbar"></div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <!.-- <button class="btn section-reviews__btn">Оставить отзыв</button> --.>
                                                                                                                                                                                    </section> -->

        <!-- <section class="section-news" id="news">
                                                                                                                                                                                        <div class="container">
                                                                                                                                                                                            <h2 class="h-2 section-news__title">События</h2>
                                                                                                                                                                                        </div>
                                                                                                                                                                                        <div class="swiper section-news__swiper">
                                                                                                                                                                                            <.!-- Additional required wrapper --.>
                                                                                                                                                                                            <div class="swiper-wrapper section-news__swiper-wrapper">
                                                                                                                                                                                                <.!-- Slides --.>
                                                                                                                                                                                                <div class="swiper-slide section-news__swiper-slide">
                                                                                                                                                                                                    <div class="news-card section-news__news-card">
                                                                                                                                                                                                        <div class="news-card__image">
                                                                                                                                                                                                            <img src="media/images/background/gym.JPG" alt="">
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="news-card__label">
                                                                                                                                                                                                            <h3 class="h-3 news-card__title">Заголовок новости</h3>
                                                                                                                                                                                                            <p class="p news-card__text">Текст новости Lorem ipsum dolor sit amet consectetur
                                                                                                                                                                                                                adipisicing elit. Fuga enim quibusdam reiciendis minima voluptatem perspiciatis
                                                                                                                                                                                                                quos
                                                                                                                                                                                                                praesentium debitis ipsa voluptatibus ea beatae consequatur, recusandae,
                                                                                                                                                                                                                eligendi
                                                                                                                                                                                                                natus eius consequuntur, saepe sit!
                                                                                                                                                                                                                quibusdam reiciendis minima voluptatem perspiciatis quos praesentium debitis
                                                                                                                                                                                                                ipsa
                                                                                                                                                                                                                voluptatibus ea beatae consequatur, recusandae, eligendi natus eius
                                                                                                                                                                                                                consequuntur,
                                                                                                                                                                                                                saepe sit!
                                                                                                                                                                                                                quibusdam reiciendis minima voluptatem perspiciatis quos praesentium debitis
                                                                                                                                                                                                                ipsa
                                                                                                                                                                                                                voluptatibus ea beatae consequatur, recusandae, eligendi natus eius
                                                                                                                                                                                                                consequuntur,
                                                                                                                                                                                                                saepe sit!
                                                                                                                                                                                                            </p>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="swiper-slide section-news__swiper-slide">
                                                                                                                                                                                                    <div class="news-card section-news__news-card">
                                                                                                                                                                                                        <div class="news-card__image">
                                                                                                                                                                                                            <img src="media/images/background/gym.JPG" alt="">
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="news-card__label">
                                                                                                                                                                                                            <h3 class="h-3 news-card__title">Заголовок новости</h3>
                                                                                                                                                                                                            <p class="p news-card__text">Текст новости Lorem ipsum dolor sit amet consectetur
                                                                                                                                                                                                                adipisicing elit. Fuga enim quibusdam reiciendis minima voluptatem perspiciatis
                                                                                                                                                                                                                quos
                                                                                                                                                                                                                praesentium debitis ipsa voluptatibus ea beatae consequatur, recusandae,
                                                                                                                                                                                                                eligendi
                                                                                                                                                                                                                natus eius consequuntur, saepe sit!
                                                                                                                                                                                                                quibusdam reiciendis minima voluptatem perspiciatis quos praesentium debitis
                                                                                                                                                                                                                ipsa
                                                                                                                                                                                                                voluptatibus ea beatae consequatur, recusandae, eligendi natus eius
                                                                                                                                                                                                                consequuntur,
                                                                                                                                                                                                                saepe sit!
                                                                                                                                                                                                                quibusdam reiciendis minima voluptatem perspiciatis quos praesentium debitis
                                                                                                                                                                                                                ipsa
                                                                                                                                                                                                                voluptatibus ea beatae consequatur, recusandae, eligendi natus eius
                                                                                                                                                                                                                consequuntur,
                                                                                                                                                                                                                saepe sit!
                                                                                                                                                                                                            </p>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="swiper-slide section-news__swiper-slide">
                                                                                                                                                                                                    <div class="news-card section-news__news-card">
                                                                                                                                                                                                        <div class="news-card__image">
                                                                                                                                                                                                            <img src="media/images/background/gym.JPG" alt="">
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="news-card__label">
                                                                                                                                                                                                            <h3 class="h-3 news-card__title">Заголовок новости</h3>
                                                                                                                                                                                                            <p class="p news-card__text">Текст новости Lorem ipsum dolor sit amet consectetur
                                                                                                                                                                                                                adipisicing elit. Fuga enim quibusdam reiciendis minima voluptatem perspiciatis
                                                                                                                                                                                                                quos
                                                                                                                                                                                                                praesentium debitis ipsa voluptatibus ea beatae consequatur, recusandae,
                                                                                                                                                                                                                eligendi
                                                                                                                                                                                                                natus eius consequuntur, saepe sit!
                                                                                                                                                                                                                quibusdam reiciendis minima voluptatem perspiciatis quos praesentium debitis
                                                                                                                                                                                                                ipsa
                                                                                                                                                                                                                voluptatibus ea beatae consequatur, recusandae, eligendi natus eius
                                                                                                                                                                                                                consequuntur,
                                                                                                                                                                                                                saepe sit!
                                                                                                                                                                                                                quibusdam reiciendis minima voluptatem perspiciatis quos praesentium debitis
                                                                                                                                                                                                                ipsa
                                                                                                                                                                                                                voluptatibus ea beatae consequatur, recusandae, eligendi natus eius
                                                                                                                                                                                                                consequuntur,
                                                                                                                                                                                                                saepe sit!
                                                                                                                                                                                                            </p>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                                <div class="swiper-slide section-news__swiper-slide">
                                                                                                                                                                                                    <div class="news-card section-news__news-card">
                                                                                                                                                                                                        <div class="news-card__image">
                                                                                                                                                                                                            <img src="media/images/background/gym.JPG" alt="">
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                        <div class="news-card__label">
                                                                                                                                                                                                            <h3 class="h-3 news-card__title">Заголовок новости</h3>
                                                                                                                                                                                                            <p class="p news-card__text">Текст новости Lorem ipsum dolor sit amet consectetur
                                                                                                                                                                                                                adipisicing elit. Fuga enim quibusdam reiciendis minima voluptatem perspiciatis
                                                                                                                                                                                                                quos
                                                                                                                                                                                                                praesentium debitis ipsa voluptatibus ea beatae consequatur, recusandae,
                                                                                                                                                                                                                eligendi
                                                                                                                                                                                                                natus eius consequuntur, saepe sit!
                                                                                                                                                                                                                quibusdam reiciendis minima voluptatem perspiciatis quos praesentium debitis
                                                                                                                                                                                                                ipsa
                                                                                                                                                                                                                voluptatibus ea beatae consequatur, recusandae, eligendi natus eius
                                                                                                                                                                                                                consequuntur,
                                                                                                                                                                                                                saepe sit!
                                                                                                                                                                                                                quibusdam reiciendis minima voluptatem perspiciatis quos praesentium debitis
                                                                                                                                                                                                                ipsa
                                                                                                                                                                                                                voluptatibus ea beatae consequatur, recusandae, eligendi natus eius
                                                                                                                                                                                                                consequuntur,
                                                                                                                                                                                                                saepe sit!
                                                                                                                                                                                                            </p>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                            <!.-- If we need pagination --.>
                                                                                                                                                                                            <div class="swiper-pagination section-news__swiper-pagination"></div>

                                                                                                                                                                                            <!.-- If we need navigation buttons --.>
                                                                                                                                                                                            <div class="swiper-button-prev section-news__swiper-button-prev"></div>
                                                                                                                                                                                            <div class="swiper-button-next section-news__swiper-button-next"></div>

                                                                                                                                                                                            <!.-- If we need scrollbar --.>
                                                                                                                                                                                            <div class="section-news__swiper-scrollbar"></div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </section> -->

        <section class="section-zones" id="zones">
            <div class="container">
                <div class="section-zones__header">
                    <h2 class="h-2 section-zones__title">Фитнес зоны</h2>
                    <h3 class="h-3">Выберите то, что вам подходит</h3>
                </div>
                <div class="section-zones__grid-container">
                    @foreach ($categories as $category)
                        @include('components.category-small-card', $category)
                    @endforeach
                </div>
                <div class="section-zones__offer">
                    <h3 class="h-3 section-zones__offer-title">Персональное предложение</h3>
                    <p class="p-g section-zones__offer-subtitle">
                        Заполните форму и мы подберем персональное предложение с учетом ваших предпочтений.
                    </p>
                    <button class="btn">Заполнить форму</button>
                </div>
            </div>
        </section>

        <section class="section-contact-info" id="contacts">
            <div class="section-contact-info__grid-container">
                <div class="section-contact-info__grid-item section-contact-info__grid-item-title">
                    <h2 class="h-2">Как с нами <br> связаться?</h2>
                </div>
                <div class="section-contact-info__grid-item section-contact-info__grid-item-contacts">
                    <div class="section-contact-info__item section-contact-info__adress-container">
                        <span class="_icon-map-point"></span>
                        <div class="section-contact-info__adress-info">
                            <h3 class="h-3 section-contact-info__subtitle">Наш адрес</h3>
                            <h4 class="h-4 section-contact-info__text">
                                {{ $contacts['adress'] }}
                            </h4>
                        </div>
                    </div>
                    <div class="section-contact-info__item section-contact-info__mail-container">
                        <span class="_icon-mail"></span>
                        <div class="section-contact-info__mail-info">
                            <h3 class="h-3 section-contact-info__subtitle">Напишите нам</h3>
                            <h4 class="h-4 section-contact-info__text">
                                <a href="mailto: {{ $contacts['email'] }}">
                                    {{ $contacts['email'] }}
                                </a>
                            </h4>
                        </div>
                    </div>
                    <div class="section-contact-info__item section-contact-info__phone-container">
                        <span class="_icon-phone"></span>
                        <div class="section-contact-info__phone-info">
                            <h3 class="h-3 section-contact-info__subtitle">Позвоните нам</h3>
                            <h4 class="h-4 section-contact-info__text">
                                @foreach ($contacts['tels'] as $tel)
                                    <a href="tel: {{ $tel }}">{{ $tel }}</a>
                                    @if ($loop->last)
                                        @continue
                                    @else
                                        <br>
                                    @endif
                                @endforeach
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="section-contact-info__grid-item section-contact-info__grid-item-map">
                    <div class="section-contact-info__map" id="map"></div>
                </div>
            </div>
        </section>

        <section class="section-contact-form">
            <div class="container">
                <div class="section-contact-form__form-container contact-form-container">
                    <div class="contact-form-container__header">
                        <h3 class="h-3 contact-form-container__title">Оставьте заявку</h3>
                        <h4 class="h-4 contact-form-container__subtitle">И мы сами свяжемся с вами</h4>
                    </div>
                    <form action="#" data-form-type="small" class="form contact-form-container__form"
                        id="small-contact-form">
                        @csrf {{ csrf_field() }}
                        <div class="form__input-group contact-form-container__input-group">
                            <x-forms.input type="tel" name="tel" placeholder="+7"
                                class="contact-form-container__input"></x-forms.input>
                        </div>
                        <div class="form__input-group contact-form-container__input-group">
                            <x-forms.input type="text" name="name" placeholder="ФИО"
                                class="contact-form-container__input"></x-forms.input>
                        </div>
                        <input type="submit" class="btn form__input-btn contact-form-container__input-btn"
                            value="Отправить">
                        {{-- <x-forms.input type="submit" class="btn form__input-btn contact-form-container__input-btn"
                            value="Отправить"></x-forms.input> --}}
                    </form>
                    <div class="contact-form-container__agreement">
                        <p class="p">Нажимая на кнопку вы даёте согласие на обработку @include('components.personal-data-link')</p>
                    </div>
                </div>
            </div>
            <div class="section-contact-form__background-image">
                <img src="{{ asset('images/home/global/gym.jpg') }}" alt="">
            </div>
        </section>

        <x-modal />

    </main>
@endsection
