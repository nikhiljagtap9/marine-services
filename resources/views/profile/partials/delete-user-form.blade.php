<form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action is irreversible.');">
    @csrf
    @method('delete')

    <h5 class="mt-4 text-danger">Delete Account</h5>
    <p class="text-muted">
        Once your account is deleted, all of its resources and data will be permanently removed.
        Please download anything you want to keep before deleting your account.
    </p>

    <div class="row g-4 mt-3">
        <div class="col-md-6 col-lg-4">
            <label for="password" class="form-label">Confirm Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password to confirm" required>
            @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-danger">Delete Account</button>
        </div>
    </div>
</form>
