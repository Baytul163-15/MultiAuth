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
                    <h3 class="box-title">Slider List</h3>
                    <div class="col-md-12">
                        <div class='row'>
                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('slider.add') }}">
                                        <input type="submit" style="float:right" value="Add Slider" class="btn btn-rounded btn-info mb-5 mb-5"></a>  
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
                                <th>Slider Image</th>
                                <th>Slider Title</th>
                                <th>Slider Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $item)                   
                            <tr>
                                <td>
                                    <img src="{{ asset($item->slider_img) }}" style="width:70px; height:40px;">
                                </td>
                                <td>
                                    @if ($item->title == NULL)
                                        <span class="badge badge-pill badge-danger">No Data</span>
                                    @else
                                        {{ $item->title }}
                                    @endif
                                </td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @if($item->status == 1)
                                        <span class="badge badge-pill badge-success">Active</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                    @if($item->status == 1)
                                        <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
                                    @else
                                        <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i></a>
                                    @endif
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