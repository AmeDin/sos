@extends('layouts.ame-master')

@section('content')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default bg-grey-white">
                <div class="panel-heading text-center">
                    <h2>Promotions</h2>
                </div>
                {{-------buttons------}}
                <div class="panel-body">
                    <a href="javascript:history.back()" class="btnown outline">Back</a>
                </div>
                <div class="panel-body">
                    @include('partials._message')
                    @if($promotions->count() > 0)
                        @foreach($promotions as $indexKey => $promo)

                        <blockquote class="quote-box">
                            <div class=" quote-date pull-right">

                                @if (($todaydate<= $promo->start_date) || ($todaydate>$promo->start_date))
                                    Promotion Started,
                                    Ending At: {{ $promo->end_date }}
                                @else
                                    Promotion Starting At: {{ $promo->start_date }},
                                    Ending At: {{ $promo->end_date }}
                                @endif

                            </div>
                            <div class="quotation-mark">
                                <a href="#" class="quotation-markheader">
                                    <span class="glyphicon glyphicon-cutlery" ></span>
                                    {{ $promo->name }}
                                </a>

                            </div>

                            <div class="row">
                                <div class="col-sm-2">
                                <img src="{{asset('images/' . $promo->image->url )}} " class="quote-img img-circle pull-left col-sm-3">
                                </div>
                                <div class="col-sm-9 quote-text">
                                    {{ $promo->description }}

                                </div><div class="quote-footer pull-right">
                                    <span class="badge quote-badge quote-footer">$ {{ $promo->price }}</span>

                                </div>


                            </div>
                        </blockquote>

                        @endforeach

                        @else
                            <h1>No Promotions Today!</h1>
                        @endif
                </div>


                </div>

            </div>

    </div>
        </div>


@endsection