@extends('layout')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    {{-- <div class="nk-block-head nk-block-head-lg wide-sm">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Item Add</h2>
                        </div>
                    </div> --}}

                    <div class="nk-block nk-block-lg">
                        <div class="card">
                            <div class="card-inner">
                                <form action="{{route('item.submit')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row gy-4">
                                        <span class="preview-title-lg overline-title">Item Infromation</span>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select name="header" class="form-select js-select2" data-ui="xl" id="header">
                                                        <option value="">Select</option>
                                                        @if (isset($categoryData))
                                                        @foreach ($categoryData as $data)
                                                        <option value="{{$data->category_id}}" @if(old('header',@$subCategoryData->category) == $data->category_id) selected @endif>{{$data->category_name}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    <label class="form-label-outlined" for="header">Header</label>
                                                    @if($errors->has('header'))
                                                        <div class="error">{{ $errors->first('header') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select name="sub_header" class="form-select js-select2" data-ui="xl" id="sub-header">
                                                        <option value="">Select</option>
                                                    </select>
                                                    <label class="form-label-outlined" for="sub-header">Sub-Header</label>
                                                    @if($errors->has('sub_header'))
                                                        <div class="error">{{ $errors->first('sub_header') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                        <em class="ti ti-heart"></em>
                                                    </div>
                                                    <input type="text" name="tittle" value="{{ old('tittle') }}" class="form-control form-control-xl form-control-outlined" id="tittle">
                                                    <label class="form-label-outlined" for="tittle">Tittle</label>
                                                    @if($errors->has('tittle'))
                                                        <div class="error">{{ $errors->first('tittle') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                    </div>
                                                    <textarea name="description" class="form-control form-control-xl form-control-outlined" id="description">{{old('description')}}</textarea>
                                                    <label class="form-label-outlined" for="description">Description</label>
                                                    @if($errors->has('description'))
                                                        <div class="error">{{ $errors->first('description') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <span class="preview-title-lg overline-title">Photo</span>
                                        <div class="col-sm-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-file">
                                                        <input name="images[]" type="file" multiple="" class="form-file-input" id="images">
                                                        <label class="form-file-label" for="images">Choose Images</label>
                                                        @if($errors->has('images'))
                                                        <div class="error">{{ $errors->first('images') }}</div>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <hr class="preview-hr"> --}}
                                        <span class="preview-title-lg overline-title">Purchase</span>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                        <em class="ti ti-heart"></em>
                                                    </div>
                                                    <input type="text" name="purchase_by" value="{{ old('purchase_by') }}" class="form-control form-control-xl form-control-outlined" id="purchase_by">
                                                    <label class="form-label-outlined" for="purchase_by">Whome</label>
                                                    @if($errors->has('purchase_by'))
                                                        <div class="error">{{ $errors->first('purchase_by') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                        <em class="ti ti-heart"></em>
                                                    </div>
                                                    <input type="text" name="purchase_from" value="{{ old('purchase_from') }}" class="form-control form-control-xl form-control-outlined" id="purchase_from">
                                                    <label class="form-label-outlined" for="purchase_from">From</label>
                                                    @if($errors->has('purchase_from'))
                                                        <div class="error">{{ $errors->first('purchase_from') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-calendar-alt"></em>
                                                    </div>
                                                    <input type="text" name="purchase_date" value="{{ old('purchase_date') }}" class="form-control form-control-xl form-control-outlined date-picker" id="purchase_date">
                                                    <label class="form-label-outlined" for="purchase_date">Date</label>
                                                    @if($errors->has('purchase_date'))
                                                        <div class="error">{{ $errors->first('purchase_date') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                        <em class="ti ti-heart"></em>
                                                    </div>
                                                    <input type="text" name="price" value="{{ old('price') }}" class="form-control form-control-xl form-control-outlined" id="price">
                                                    <label class="form-label-outlined" for="price">Price</label>
                                                    @if($errors->has('price'))
                                                        <div class="error">{{ $errors->first('price') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                        <em class="ti ti-heart"></em>
                                                    </div>
                                                    <input type="text" name="unit" value="{{ old('unit') }}" class="form-control form-control-xl form-control-outlined" id="unit">
                                                    <label class="form-label-outlined" for="unit">Unit</label>
                                                    @if($errors->has('unit'))
                                                        <div class="error">{{ $errors->first('unit') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <span class="preview-title-lg overline-title">Position</span>
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                    </div>
                                                    <textarea name="current_location" class="form-control form-control-xl form-control-outlined" id="current_location">{{old('current_location')}}</textarea>
                                                    <label class="form-label-outlined" for="current_location">Current Location</label>
                                                    @if($errors->has('current_location'))
                                                        <div class="error">{{ $errors->first('current_location') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
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

@section('script')
<script>
    $(document).ready(function(){
        if($("#header").find(":selected").val()){
            getSubcategory()
        }
    });

    $("#header").change(function(e){
        getSubcategory()
    });

    function getSubcategory(){
        var selected_value = $("#header").find(":selected").val();
        $.ajax({
            url: 'get-sub-category/'+selected_value,
            method: 'get',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                $('#sub-header').empty();
                $.each(response, function (i, item) {
                    $('#sub-header').append($('<option>', {
                        value: item.sub_category_id,
                        text : item.sub_category_name
                    }));
                });
            }
        });
    }
</script>
@endsection
