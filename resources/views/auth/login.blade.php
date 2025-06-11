<x-layout title="Login">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('login') }}" method="POST" class="card p-4 shadow-sm">
                    @csrf
                    <h2 class="mb-4 text-center">{{ __('messages.login') }}</h2>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('messages.email') }}</label>
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
                        <label for="password" class="form-label">{{ __('messages.password') }}</label>
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
                    
                    <button type="submit" class="btn btn-primary w-100">{{ __('messages.login') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
