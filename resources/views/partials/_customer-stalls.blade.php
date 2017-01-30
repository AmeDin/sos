<div class="col-md-3 col-xs-6 ccardCustoms">

    <div class="ccard ccardCustoms">
        <div class="cimage text-center">
            <a href="{{ route('customers.stall', $stall->id) }}"><img src="{{asset('images/' . $stall->image->url )}} " height="120" width="180" class="add-top-spacing"></a>
        </div>
        <div class="ccontent text-center">
            <div class="info">
                <h3 class="nil-mp">{{ $stall->name }}</h3></a>
            </div>
        </div>
    </div>
</div>