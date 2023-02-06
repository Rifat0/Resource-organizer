@extends('layout')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">

                <div class="nk-block">
                    <div class="row g-gs">
                        @foreach ($headerInfo as $data)
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card">
                                <div class="nk-ecwg nk-ecwg6">
                                    <div class="card-inner">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">{{$data->category_name}}</h6>
                                            </div>
                                        </div>
                                        <a class="data" href="{{route('item.list',$data->category_id)}}">
                                            <div class="data-group">
                                                <div class="amount">{{$data->items->count()}}</div>
                                                <div class="nk-ecwg6-ck">
                                                    <canvas class="ecommerce-line-chart-s3" id="todayOrders"></canvas>
                                                </div>
                                            </div>
                                            <div class="info"><span class="change up text-danger">Item available</span></div>
                                        </a>
                                    </div><!-- .card-inner -->
                                </div><!-- .nk-ecwg -->
                            </div><!-- .card -->
                        </div>

                        @endforeach
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection
