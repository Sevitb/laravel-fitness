<div class="season-ticket-card">
    <h3 class="season-ticket-card__title h-3">Абонемент на {{ $seasonTicket->duration }} занятий</h3>
    <div class="season-ticket-card__prices">
        <div class="season-ticket-card__prices-btns">
            @foreach (json_decode($seasonTicket->season_ticket_prices) as $season_ticket_price)
                @isset($season_ticket_price->coach_level)
                    @if ($loop->first)
                        <p class="p">
                            Выберите категорию тренера:
                        </p>
                        <button id="{{ $seasonTicket->id }}-{{ $season_ticket_price->coach_level }}"
                            class="category-card__tab-btn season-ticket__tab-btn h-4 tablinks active"
                            onclick="openTab(event, this.id)">
                            Категория {{ $season_ticket_price->coach_level }}
                        </button>
                    @else
                        <button id="{{ $seasonTicket->id }}-{{ $season_ticket_price->coach_level }}"
                            class="category-card__tab-btn season-ticket__tab-btn h-4 tablinks"
                            onclick="openTab(event, this.id)">
                            Категория {{ $season_ticket_price->coach_level }}
                        </button>
                    @endif
                @endisset
            @endforeach
        </div>
        @foreach (json_decode($seasonTicket->season_ticket_prices) as $season_ticket_price)
            @isset($season_ticket_price->value)
                @if ($loop->first)
                    <div id="c-{{ $seasonTicket->id }}-{{ $season_ticket_price->coach_level }}"
                        class="category-card__tab-content category-card__price-container season-ticket-card__price tabcontent active">
                        <span class="category-card__price h-3">
                            {{ $season_ticket_price->value }}₽
                        </span>
                    </div>
                @else
                    <div id="c-{{ $seasonTicket->id }}-{{ $season_ticket_price->coach_level }}"
                        class="category-card__tab-content category-card__price-container season-ticket-card__price tabcontent">
                        <span class="category-card__price h-3">
                            {{ $season_ticket_price->value }}₽
                        </span>
                    </div>
                @endif
            @endisset
        @endforeach
    </div>
    <button class="btn season-ticket-card__btn" data-modal-id="modal-1" data-season-ticket-id="{{ $seasonTicket->id }}"
        data-service-title="Абонемент {{ $seasonTicket->title }}. Занятий: {{ $seasonTicket->duration }}">Записаться</button>
</div>
