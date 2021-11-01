@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-10">
                <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">District List</h3>
                    <div class="col-md-12">
                        <div class='row'>
                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('district.add') }}">
                                        <input type="submit" style="float:right" value="Add Division" 
                                        class="btn btn-rounded btn-info mb-5 mb-5"></a>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Division Id</th>
                                <th>Division Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districts as $item)                   
                            <tr>
                                <td>{{ $item->division->division_name }} </td>
                                <td>{{ $item->district_name }} </td>
                                <td width="40%">
                                    <a href="{{ route('district.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('district.delete',$item->id) }}" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->          
            </div>
            <!-- /.col -->
            <div class="col-md-1"></div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->	  
    </div>
@endsection