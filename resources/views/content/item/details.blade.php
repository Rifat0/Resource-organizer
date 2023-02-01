@extends('layout')

@section('content')
<div class="nk-content ">
    <div class="container">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card">
                        <div class="card-inner">
                            <div class="row pb-5">
                                <div class="col-lg-6">
                                    <div class="product-gallery me-xl-1 me-xxl-5">
                                        <div class="slider-init" id="sliderFor" data-slick='{"arrows": false, "fade": true, "asNavFor":"#sliderNav", "slidesToShow": 1, "slidesToScroll": 1}'>
                                            @foreach (json_decode($itemData->photos) as $photo)
                                            <div class="slider-item rounded">
                                                <img src="{{asset('item_images').'/'.$photo}}" class="rounded w-100" alt="">
                                            </div>
                                            @endforeach

                                        </div>
                                        <div class="slider-init slider-nav" id="sliderNav" data-slick='{"arrows": false, "slidesToShow": 5, "slidesToScroll": 1, "asNavFor":"#sliderFor", "centerMode":true, "focusOnSelect": true,
                "responsive":[ {"breakpoint": 1539,"settings":{"slidesToShow": 4}}, {"breakpoint": 768,"settings":{"slidesToShow": 3}}, {"breakpoint": 420,"settings":{"slidesToShow": 2}} ]
            }'>
                                            @foreach (json_decode($itemData->photos) as $photo)
                                            <div class="slider-item">
                                                <div class="thumb">
                                                    <img src="{{asset('item_images').'/'.$photo}}" class="rounded" alt="">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div><!-- .slider-nav -->
                                    </div><!-- .product-gallery -->
                                </div><!-- .col -->
                                <div class="col-lg-6">
                                    <div class="product-info mt-5 me-xxl-5">
                                        <h2 class="product-title">{{$itemData->title}}</h2>
                                        <div class="product-excrept text-soft">
                                            <p class="lead">{{$itemData->description}}</p>
                                        </div>
                                        <div class="product-meta">
                                            <ul class="d-flex g-3 gx-5">
                                                <li>
                                                    <div class="fs-14px text-muted">Header</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->header->category_name}}</div>
                                                </li>
                                                <li>
                                                    <div class="fs-14px text-muted">Sub Header</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->subHeader->sub_category_name}}</div>
                                                </li>
                                            </ul>
                                            <ul class="d-flex g-3 gx-5">
                                                <li>
                                                    <div class="fs-14px text-muted">Purchase By</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->purchase_by}}</div>
                                                </li>
                                                <li>
                                                    <div class="fs-14px text-muted">From</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->purchase_from}}</div>
                                                </li>
                                                <li>
                                                    <div class="fs-14px text-muted">Date</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->purchase_date}}</div>
                                                </li>
                                            </ul>
                                            <ul class="d-flex g-3 gx-5">
                                                <li>
                                                    <div class="fs-14px text-muted">Purchase Price</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->price}}</div>
                                                </li>
                                                <li>
                                                    <div class="fs-14px text-muted">Unit</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->unit}}</div>
                                                </li>
                                            </ul>
                                            <ul class="d-flex g-3 gx-5">
                                                <li>
                                                    <div class="fs-14px text-muted">Added</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->created_at}}</div>
                                                </li>
                                                <li>
                                                    <div class="fs-14px text-muted">Status</div>
                                                    <div class="fs-16px fw-bold text-secondary">{{$itemData->status}}</div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product-meta">
                                            <h6 class="fs-14px text-muted">Current Location</h6>
                                            <div class="product-excrept text-soft">
                                                <p class="fs-16px fw-bold text-secondary">{{$itemData->last_location->location_name}}</p>
                                            </div>
                                        </div>
                                        {{-- <div class="product-meta">
                                            <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                                                <li class="w-140px">
                                                    <div class="form-control-wrap number-spinner-wrap">
                                                        <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                                        <input type="number" class="form-control number-spinner" value="0">
                                                        <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                                    </div>
                                                </li>
                                                <li>
                                                    <button class="btn btn-primary">Add to Cart</button>
                                                </li>
                                                <li class="ms-n1">
                                                    <button class="btn btn-icon btn-trigger text-primary"><em class="icon ni ni-heart"></em></button>
                                                </li>
                                            </ul>
                                        </div> --}}
                                    </div><!-- .product-info -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                            <hr class="hr border-light">
                            <div class="row g-gs flex-lg-row-reverse pt-5">
                                <div class="col-lg-12">
                                    <div class="product-details entry me-xxl-3">
                                        <h3>Uses History</h3>
                                        <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Update</th>
                                                <th scope="col">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($itemData->uses as $uses)
                                                <tr>
                                                    <th scope="row">{{$uses->item_use_id}}</th>
                                                    <td>{{$uses->created_at}}</td>
                                                    <td>{{$uses->updated_at}}</td>
                                                    <td>@mdo</td>
                                                  </tr>
                                                @endforeach
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div><!-- .row -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
