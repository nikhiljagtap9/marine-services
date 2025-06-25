@extends('user.dashboard.main')

@section('content')
<div class="body-content profil_con">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Update Profile Information -->
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="fs-17 fw-semi-bold mb-0">Update Profile Information</h6>
        </div>
        <div class="card-body">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Update Password -->
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="fs-17 fw-semi-bold mb-0">Change Password</h6>
        </div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Delete User Account (optional) -->
    <!-- <div class="card mb-4">
        <div class="card-header">
            <h6 class="fs-17 fw-semi-bold mb-0">Delete Account</h6>
        </div>
        <div class="card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div> -->
</div>
@endsection
