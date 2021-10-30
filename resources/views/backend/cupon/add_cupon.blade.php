@extends('admin.admin_master')
@section('admin')

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8" style="margin-top: 30px;">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Cupon</h3>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{ route('cupons.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h5>Cupon Name <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="cupon_name" class="form-control" >
                                        @error('cupon_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>             
                                <div class="form-group">
                                    <h5>Cupon Discount(%) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="cupon_discount" class="form-control" >
                                        @error('cupon_discount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Cupon Validity Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="date" name="cupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    @error('cupon_validity')
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