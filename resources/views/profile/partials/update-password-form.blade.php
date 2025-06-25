<form action="{{ route('password.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-sm-4">
            <label class="required fw-medium mb-2">Current Password</label>
            <input type="password" name="current_password" class="form-control" required>
            @error('current_password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="col-sm-4">
            <label class="required fw-medium mb-2">New Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="col-sm-4">
            <label class="required fw-medium mb-2">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
            @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-warning mt-3">Update Password</button>

    @if (session('status') === 'password-updated')
        <span class="text-success ms-3">Password updated successfully.</span>
    @endif
</form>
