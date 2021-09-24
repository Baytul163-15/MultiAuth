@extends('frontend.main_master')
@section('content')

{{-- Query Builder --}}
{{-- @php
    $user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp --}}

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-img-top" style="border-radius: 50%; height:100%; width: 100%;" src="{{ (!empty($user->profile_photo_path))?
                        url('upload/user_imgs/'.$user->profile_photo_path):url('upload/no_image.jpg') }}" alt=""><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="#" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Update Your Password</span></h3>
                        
                        <div class="card-body">
                            <form action="{{ route('user.password.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Current Password <span style="color:red">*</span></label>
                                    <input type="password" id="current_password" name="oldpassword" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">New Password <span style="color:red">*</span></label>
                                    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Confirm Password <span style="color:red">*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger btn-block" value="Update Password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

