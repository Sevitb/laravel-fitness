<figure class="coach-card">
    <div class="coach-card__image">
        <img src="{{ asset($portrait) }}" alt="">
    </div>
    <figcaption class="coach-card__text">
        <h3 class="h-3 coach-card__title">
            <a href="{{ url('coach/' . $id) }}">
                {{ $name }}
            </a>
        </h3>
        <p class="p">
            {{ $briefInfo }}
        </p>
    </figcaption>
</figure>
