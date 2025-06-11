<div class="mb-3">
    <label for="make" class="form-label">{{ __('messages.make') }}</label>
    <input
        type="text"
        name="make"
        id="make"
        class="form-control @error('make') is-invalid @enderror"
        value="{{ old('make', $vehicle->make ?? '') }}"
        required
        minlength="2"
        maxlength="255"
    >
    @error('make')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="model" class="form-label">{{ __('messages.model') }}</label>
    <input
        type="text"
        name="model"
        id="model"
        class="form-control @error('model') is-invalid @enderror"
        value="{{ old('model', $vehicle->model ?? '') }}"
        required
        minlength="1"
        maxlength="255"
    >
    @error('model')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="year" class="form-label">{{ __('messages.year') }}</label>
    <input
        type="number"
        name="year"
        id="year"
        class="form-control @error('year') is-invalid @enderror"
        value="{{ old('year', $vehicle->year ?? '') }}"
        required
        min="1900"
        max="{{ date('Y') }}"
    >
    @error('year')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="mileage" class="form-label">{{ __('messages.mileage') }}</label>
    <input
        type="number"
        name="mileage"
        id="mileage"
        class="form-control @error('mileage') is-invalid @enderror"
        value="{{ old('mileage', $vehicle->mileage ?? '') }}"
        required
        min="0"
    >
    @error('mileage')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="maintenance_history" class="form-label">{{ __('messages.maintenance') }}</label>
    <textarea
        name="maintenance_history"
        id="maintenance_history"
        class="form-control @error('maintenance_history') is-invalid @enderror"
        rows="3"
        maxlength="500"
    >{{ old('maintenance_history', $vehicle->maintenance_history ?? '') }}</textarea>
    @error('maintenance_history')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="inspection_records" class="form-label">{{ __('messages.inspection') }}</label>
    <textarea
        name="inspection_records"
        id="inspection_records"
        class="form-control @error('inspection_records') is-invalid @enderror"
        rows="3"
        maxlength="500"
    >{{ old('inspection_records', $vehicle->inspection_records ?? '') }}</textarea>
    @error('inspection_records')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
