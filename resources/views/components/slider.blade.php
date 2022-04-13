<div class="slider">
    <img src="/images/static/left-arrow.png" alt="arrow" class="arrow" id="left-arrow">
    <img src="/images/static/right-arrow.png" alt="arrow" class="arrow" id="right-arrow">
    @for ($i = 0; $i < 5; $i++)
        <img src="{{ $contents[$i]->image ?? null }}" class="slider-img" id="img{{ $i }}"
            alt="slider{{ $i }}">
    @endfor
</div>
