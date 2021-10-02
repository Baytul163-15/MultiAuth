@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8" style="margin-top: 30px;">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sub-Subcategory</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('subsubcategory.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $subsubcategories->id }}">
                                <div class="form-group validate">
                                    <h5>Sub Sun-Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $subsubcategories->category_id ? 'selected':'' }}>
                                                    {{ $category->category_name_eng }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group validate">
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubCategory</option>  
                                            @foreach ($subcategories as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $subsubcategories->subcategory_id ? 'selected':'' }}>
                                                    {{ $subcat->subcategory_name_en }}
                                                </option>
                                            @endforeach                                         
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Sub Sub-Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="subsubcategory_name_en" value="{{ $subsubcategories->subsubcategory_name_en }}" class="form-control" >
                                    @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>             
                                <div class="form-group">
                                    <h5>Sub Sub-Category Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="subsubcategory_name_hin" value="{{ $subsubcategories->subsubcategory_name_hin }}" class="form-control" >
                                    @error('subcategory_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="text-xs-right">
                                  <input type="submit" value="Update" class="btn btn-rounded btn-block btn-info mb-5 mb-5">
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

