@extends('layout')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Headers</h2>
                        </div>
                    </div><!-- nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        @if ($message = Session::get('success'))
                        <div class="example-alert">
                            <div class="alert alert-fill alert-success alert-dismissible alert-icon">
                                <em class="icon ni ni-cross-circle"></em> <strong>{{ $message }}</strong>! <button class="close" data-bs-dismiss="alert"></button>
                            </div>
                        </div>
                        @endif
                        <div class="card card-preview">
                            <table class="table table-tranx">
                                <thead>
                                    <tr class="tb-tnx-head">
                                        <th class="tb-tnx-id"><span class="">#</span></th>
                                        <th class="tb-tnx-info">
                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                <span>Title</span>
                                            </span>
                                            <span class="tb-tnx-date d-md-inline-block d-none">
                                                <span class="d-md-none">Date</span>
                                                <span class="d-none d-md-block">
                                                    <span>Created</span>
                                                    <span>Updated</span>
                                                </span>
                                            </span>
                                        </th>
                                        <th class="tb-tnx-amount is-alt">
                                            <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                        </th>
                                        <th class="tb-tnx-action">
                                            <span>&nbsp;</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($allCategory))

                                    @foreach ($allCategory as $key => $categoryData)
                                    <tr class="tb-tnx-item">
                                        <td class="tb-tnx-id">
                                            <span class="tb-lead">{{$categoryData->category_id}}</span>
                                        </td>
                                        <td class="tb-tnx-info">
                                            <div class="tb-tnx-desc">
                                                <span class="title">{{$categoryData->category_name}}</span>
                                            </div>
                                            <div class="tb-tnx-date">
                                                <span class="date">{{ \Carbon\Carbon::parse($categoryData->created_at)->toFormattedDateString()}}</span>
                                                <span class="date">{{ \Carbon\Carbon::parse($categoryData->updated_at)->toFormattedDateString()}}</span>
                                            </div>
                                        </td>
                                        <td class="tb-tnx-amount is-alt">
                                            <div class="tb-tnx-status">
                                                <span class="badge badge-dot @if($categoryData->status == 'inactive') bg-danger @else bg-success @endif">{{$categoryData->status}}</span>
                                            </div>
                                        </td>
                                        <td class="tb-tnx-action">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="{{route('category.edit',$categoryData->category_id)}}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                        <li><a href="{{route('category.change.status',$categoryData->category_id)}}"><em class="icon ni ni-repeat"></em><span>Change Status</span></a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="{{route('category.delete',$categoryData->category_id)}}"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div><!-- .card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection