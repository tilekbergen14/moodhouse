<a href="{{route("show", $show)}}" class="col-6 col-sm-3 col-lg-2 p-1 cu-card">
    <div class="cu-card-header">
        <div class="card-relative">
            <img src="{{ $show->image }}" alt="">
            <div class="card-infos">
                {{-- <div class="info-box info-box-left">
                    EP11
                </div> --}}
                {{-- <div class="info-box info-box-right">
                    {{ $show->version }}
                </div> --}}
            </div>
        </div>
    </div>
    <div class="card-hero">
        <p class="card-title mt-1">{{ $show->name }}</p>
    </div>
</a>
