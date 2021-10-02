@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8" style="margin-top: 30px;">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('category.update',$category->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <div class="form-group">
                                    <h5>Category Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="category_name_eng" value="{{ $category->category_name_eng }}" class="form-control" >
                                    @error('category_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>             
                                <div class="form-group">
                                    <h5>Brand Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="category_name_hin" value="{{ $category->category_name_hin }}"  class="form-control" >
                                    @error('category_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="category_icon" value="{{ $category->category_icon }}" class="form-control" >
                                    @error('category_icon')
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