@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
  <section class="content">

   <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
      <h4 class="box-title">Admin Profile Edit</h4>
      <h6 class="box-subtitle">Bootstrap Form Validation check the</h6>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
      <div class="col">
        <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
          <div class="col-12">
            <div class="form-group">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>User Name Change <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="name" class="form-control" value="{{ $adminEdit->name }}" required="" > </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>Email Address Change <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="email" name="email" class="form-control" value="{{ $adminEdit->email }}" required="" > </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>Profile Picture Change <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="file" name="profile_photo_path" id="image" class="form-control" required=""> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <img id="showImage" src="{{ (!empty($adminEdit->profile_photo_path))?
                    url('upload/admin_img/'.$adminEdit->profile_photo_path):url('upload/no_image.jpg') }}" style="width:70px; height:70px; border-radius: 50%;">
                  </div>
              </div>
          <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info mb-5 mb-5" name="" value="Update">
          </div>
        </form>

      </div>
      <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
      });
    });
</script>
@endsection
