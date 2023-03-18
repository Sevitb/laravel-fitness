<div class="section-zones__grid-item zone-card" onclick="window.location = '{{ url('category/' . $category->id) }}'">
    <img src="{{ $category->icon }}" alt="" class="zone-card__svg-icon">
    <h3 class="h-3 zone-card__title">{{ $category->title }}</h3>
</div>
