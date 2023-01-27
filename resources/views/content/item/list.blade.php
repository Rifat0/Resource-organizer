@extends('layout')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Item Gallery</h3>
                            <div class="nk-block-des text-soft">
                                <p>Here is total <span class="text-base">{{$items->count()}}</span> Item.</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered By</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>Open</span></a></li>
                                                        <li><a href="#"><span>Closed</span></a></li>
                                                        <li><a href="#"><span>Onhold</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                            <a href="{{route('item.add')}}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Item</span></a>
                                        </li>
                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                            <a href="#" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        @if(isset($items))
                        @foreach ($items as $key => $item)
                        <div class="col-sm-6 col-lg-4 col-xxl-3">
                            <div class="gallery card">
                                <a class="gallery-image popup-image" href="{{asset('item_images').'/'.json_decode($item->photos)[0]}}">
                                    <img class="w-100 rounded-top" src="{{asset('item_images').'/'.json_decode($item->photos)[0]}}" alt="">
                                </a>
                                <a href="{{route('item.details',$item->item_id)}}">
                                    <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="lead-text">{{$item->title}}</span>
                                                <span class="sub-text">{{@$item->last_location->location_name}}</span>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="sub-text">{{@$item->last_use->created_at}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
@endsection
