@extends('layout')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Item Header</h2>
                            {{-- <div class="nk-block-des">
                                <p class="lead">Form is most esential part of your project. We styled out nicely so you can build your form so quickly.</p>
                            </div> --}}
                        </div>
                    </div><!-- .nk-block -->
                    
                    <div class="nk-block nk-block-lg">
                        <div class="card">
                            <div class="card-inner">
                                <form action="{{route('category.submit',@$categoryData->category_id)}}" method="POST">
                                    @csrf
                                    <div class="row gy-4">
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                        <em class="ti ti-heart"></em>
                                                    </div>
                                                    <input type="text" name="tittle" value="{{ old('tittle', @$categoryData->category_name) }}" class="form-control form-control-xl form-control-outlined" id="outlined-right-icon">
                                                    <label class="form-label-outlined" for="outlined-right-icon">Tittle</label>
                                                    @if($errors->has('tittle'))
                                                        <div class="error">{{ $errors->first('tittle') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-lg-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                    </div>
                                                    <textarea class="form-control form-control-xl form-control-outlined"></textarea>
                                                    <label class="form-label-outlined" for="outlined-right-icon">Input with icon</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <br />                                    
                                    <div class="row g-4">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                    
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>
@endsection