@extends('layouts.main')
@section('title')
    @parent :: Welcome page
@endsection
@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Welcome to News Aggregator</h1>

            </div>
        </div>
    </section>

    {{--<div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



            </div>
        </div>
    </div>--}}

@endsection

