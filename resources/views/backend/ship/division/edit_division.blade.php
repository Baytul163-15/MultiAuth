@extends('admin.admin_master')
@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8" style="margin-top: 30px;">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Cupon</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('division.update',$divisions->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h5>Division Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="division_name" value="{{ $divisions->division_name }}" class="form-control" >
                                        @error('division_name')
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