@extends('admin.admin_master')
@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8" style="margin-top: 30px;">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add District</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('district.store') }}" method="POST">
                                @csrf
                                <div class="form-group validate">
                                    <h5>Division Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>District Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="district_name" class="form-control" >
                                        @error('district_name')
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