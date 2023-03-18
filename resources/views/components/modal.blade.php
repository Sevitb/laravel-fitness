@push('scripts')
    <script src="{{ asset('js/components/modal/openModal.js') }}"></script>
@endpush

<dialog class="contact-form" id="modal-1">
    <div class="contact-form__success-screen" data-form-id="contact-form">
        <img src="{{ asset('images/components/modal/modal-1/success.svg') }}" alt="success">
        <h3 class="h-3">
            <strong>Спасибо за заявку! </strong> <br> Наш менеджер свяжется с вами.
        </h3>
    </div>
    <div class="contact-form__fail-screen" data-form-id="contact-form">
        <img src="{{ asset('images/components/modal/modal-1/fail.svg') }}" alt="fail">
        <h3 class="h-3">
            <strong>Извените, что-то пошло не так! </strong> <br> Пожалуйста, попробуйте позже.
        </h3>
    </div>
    <button class="contact-form__close-btn"><img src="{{ asset('images/components/modal/global/close.svg') }}"
            alt=""></button>
    <div class="contact-form__image-container">
        <img src="{{ asset('images/components/modal/modal-1/phone.svg') }}" alt="">
    </div>
    <div class="contact-form__form-container">
        <div class="contact-form__header">
            <h1 class="h-1 contact-form__title">Давайте познакомимся поближе!</h1>
            <h4 class="h-4 contact-form__subtitle">Введите Ваше имя и номер телефона, a мы позвоним для уточнения желаемого времени.
            </h4>
        </div>
        <form class="form" id="contact-form" data-form-type="modal">
            @csrf {{ csrf_field() }}
            <div class="form__input-group contact-form__input-group">
                <input class="form__input contact-form__input" type="tel" id="tel" name="tel"
                    placeholder="+7">
            </div>
            <div class="form__input-group contact-form__input-group">
                <input class="form__input contact-form__input" type="text" id="name" name="name"
                    placeholder="ФИО">
            </div>
            <div class="form__input-group contact-form__input-group">
                <input class="form__input contact-form__input" type="email" id="email" name="email"
                    placeholder="Email">
            </div>
            @isset($coach)
                <input type="hidden" name="coach" value="{{$coach->name . ' ' . $coach->surname}}">
            @endisset
            {{-- <div class="contact-form__checkboxes-container">
                <div class="form__input-group contact-form__input-group">
                    <label for="radio-now">Перезвонить сейчас</label>
                    <input type="radio" name="time" value="now" id="radio-now" checked>
                </div>
                <div class="form__input-group contact-form__input-group">
                    <label for="radio-later">Указать время</label>
                    <input type="radio" name="time" value="later" id="radio-later">
                </div>
            </div>
            <div class="form__input-group">
                <input class="form__input-time form__input-time_blocked" name="timeInput" id="timeInput" type="time"
                    disabled>
            </div> --}}
            <input type="submit" value="Отправить" class="btn form__input-btn contact-form__input-btn">
        </form>
        <div class="contact-form__footer">
            <p class="p">
                Нажимая на кнопку вы даёте согласие на обработку @include('components.personal-data-link')
            </p>
        </div>
    </div>
</dialog>
