<x-layout title="Register">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('register') }}" method="POST" class="card p-4 shadow-sm">
                    @csrf
                    <h2 class="mb-4 text-center">Register</h2>

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            required 
                            value="{{ old('name') }}"
                        >
                        @error('name') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            required 
                            value="{{ old('email') }}"
                        >
                        @error('email') 
                            <div class="invalid-feedback">{{ $message }}</div> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="form-control"
                            required
                        >
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation"
                            class="form-control"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Register</button>

                </form>
            </div>
        </div>
    </div>
</x-layout>
