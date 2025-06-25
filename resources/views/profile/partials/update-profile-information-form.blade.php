<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="row g-4">
        <div class="col-sm-6 col-lg-4">
            <label class="required fw-medium mb-2">Company Name or Vessel Name</label>
            <input type="text" name="company_name" class="form-control" placeholder="Name" required
                   value="{{ old('company_name', $user->company_name ?? '') }}">
            @error('company_name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="col-sm-6 col-lg-4">
            <label class="required fw-medium mb-2">Company email address or Vessel email address</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email ID" required
                   value="{{ old('email', $user->email ?? '') }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="col-sm-6 col-lg-4">
            <label class="required fw-medium mb-2">Your Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required
                   value="{{ old('name', $user->name ?? '') }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

         <div class="mb-3">
            <label for="profile_photo" class="required fw-medium mb-2">Profile Photo</label>
            <input class="form-control" type="file" name="profile_photo" id="profile_photo" accept="image/*">
            @error('profile_photo') <div class="text-danger">{{ $message }}</div> @enderror
             @if (!empty($user->profile_photo))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile Photo" width="100">
            </div>
            @endif
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary">Update Profile</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success ms-3">Profile updated successfully.</span>
            @endif
        </div>
    </div>
</form>
