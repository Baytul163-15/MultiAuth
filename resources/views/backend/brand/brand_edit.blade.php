@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8" style="margin-top: 30px;">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brand</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('brand.update',$brands->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $brands->id }}">
                                <input type="hidden" name="old_image" value="{{ $brands->brand_images }}">
                                <div class="form-group">
                                    <h5>Brand Name English <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="brand_name_eng" value="{{ $brands->brand_name_eng }}" class="form-control" >
                                    @error('brand_name_eng')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>             
                                <div class="form-group">
                                    <h5>Brand Name Hindi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="brand_name_hin" value="{{ $brands->brand_name_hin }}" class="form-control" >
                                    @error('brand_name_hin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="file" name="brand_images" class="form-control" >
                                    @error('brand_images')
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