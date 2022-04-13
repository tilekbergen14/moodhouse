<a href="{{ route('show', $content->parent()) }}" class="col-6 col-sm-3 col-lg-2 p-1 cu-card">
    <div class="cu-card-header">
        <div class="card-relative">
            <img src="{{ $content->parent()->image }}" alt="">
            <div class="card-infos">
                <div class="info-box info-box-left">
                    {{ $content->episode }}
                </div>
                <div class="info-box info-box-right">
                    {{ $content->parent()->version }}
                </div>
            </div>
        </div>
    </div>
    <div class="card-hero">
        <p class="card-title mt-1">{{ $content->parent()->name }}</p>
    </div>
</a>
