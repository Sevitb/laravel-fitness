<div class="season-ticket-card">
    @isset($seasonTicket->title)
        <h2 class="season-ticket-card__title h-2">{{ $seasonTicket->title }}</h2>
    @endisset
    <h3 class="season-ticket-card__title h-3">Абонемент на {{ $seasonTicket->duration }} занятий</h3>
    <div class="season-ticket-card__prices">
        @if ($seasonTicket->pivot->price_type == 1)
            @isset($seasonTicket->pivot->season_ticket_price)
                <div class="category-card__price-container" style="margin: 1em auto;">
                    <span class="category-card__price h-3">
                        {{ $seasonTicket->pivot->season_ticket_price }}₽
                    </span>
                </div>
            @endisset
        @elseif($seasonTicket->pivot->price_type == 2)
            <div class="season-ticket-card__prices-btns">
                @foreach (json_decode($seasonTicket->pivot->season_ticket_coach_levels_prices) as $key => $season_ticket_price)
                    @if ($loop->first)
                        <p class="p">
                            Выберите категорию тренера:
                        </p>
                        <button id="{{ $seasonTicket->id }}-{{ $key }}"
                            class="category-card__tab-btn season-ticket__tab-btn h-4 tablinks active"
                            onclick="openTab(event, this.id)">
                            Категория {{ $key }}
                        </button>
                    @else
                        <button id="{{ $seasonTicket->id }}-{{ $key }}"
                            class="category-card__tab-btn season-ticket__tab-btn h-4 tablinks"
                            onclick="openTab(event, this.id)">
                            Категория {{ $key }}
                        </button>
                    @endif
                @endforeach
            </div>
            @foreach (json_decode($seasonTicket->pivot->season_ticket_coach_levels_prices) as $key => $season_ticket_price)
                @if ($loop->first)
                    <div id="c-{{ $seasonTicket->id }}-{{ $key }}"
                        class="category-card__tab-content category-card__price-container season-ticket-card__price tabcontent active">
                        <span class="category-card__price h-3">
                            {{ $season_ticket_price }}₽
                        </span>
                    </div>
                @else
                    <div id="c-{{ $seasonTicket->id }}-{{ $key }}"
                        class="category-card__tab-content category-card__price-container season-ticket-card__price tabcontent">
                        <span class="category-card__price h-3">
                            {{ $season_ticket_price }}₽
                        </span>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    <button class="btn season-ticket-card__btn" data-modal-id="modal-1" data-season-ticket-id="{{ $seasonTicket->id }}"
        data-service-title="Абонемент {{ $seasonTicket->title }}. Занятий: {{ $seasonTicket->duration }}">Записаться</button>
</div>
