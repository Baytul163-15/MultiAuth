@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8" style="margin-top: 30px;">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit subcategory</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('subcategory.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                <div class="form-group validate">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected':''}}> 
                                                    {{ $category->category_name_eng }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>SubCategory Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="subcategory_name_en" value="{{ $subcategory->subcategory_name_en }}" class="form-control" >
                                    @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>             
                                <div class="form-group">
                                    <h5>SubCategory Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="subcategory_name_hin" value="{{ $subcategory->subcategory_name_hin }}" class="form-control" >
                                    @error('subcategory_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="text-xs-right">
                                  <input type="submit" value="Add New" class="btn btn-rounded btn-block btn-info mb-5 mb-5">
                                </div>
                            </form>
                        </div>
                    </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->      
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
@endsection