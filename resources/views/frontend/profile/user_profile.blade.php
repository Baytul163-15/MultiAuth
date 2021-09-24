@extends('frontend.main_master')
@section('content')  
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
                        <h3 class="text-center card-title"><span class="text-danger">Hi...</span><strong>
                            {{ Auth::user()->name }}</strong> Update Your Profile</h3>
                        
                        <div class="card-body">
                            <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">User Name <span style="color:red">*</span></label>
                                    <input type="name" name="name" class="form-control unicase-form-control text-input" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email Address <span style="color:red">*</span></label>
                                    <input type="email" name="email" class="form-control unicase-form-control text-input" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone Number <span style="color:red">*</span></label>
                                    <input type="text" name="phone" class="form-control unicase-form-control text-input" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">User Image <span style="color:red">*</span></label>
                                    <input type="file" name="profile_photo_path" class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger btn-block" value="Update Profile">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
