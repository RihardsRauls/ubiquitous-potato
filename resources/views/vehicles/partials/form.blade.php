<div class="mb-3">
    <label for="make" class="form-label">Make</label>
    <input type="text" name="make" id="make" class="form-control" value="{{ old('make', $vehicle->make ?? '') }}" required minlength="2" maxlength="255">
</div>

<div class="mb-3">
    <label for="model" class="form-label">Model</label>
    <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $vehicle->model ?? '') }}" required minlength="1" maxlength="255">
</div>

<div class="mb-3">
    <label for="year" class="form-label">Year</label>
    <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $vehicle->year ?? '') }}" required min="1900" max="{{ date('Y') }}">
</div>

<div class="mb-3">
    <label for="mileage" class="form-label">Mileage</label>
    <input type="number" name="mileage" id="mileage" class="form-control" value="{{ old('mileage', $vehicle->mileage ?? '') }}" required min="0">
</div>

<div class="mb-3">
    <label for="maintenance_history" class="form-label">Maintenance History</label>
    <textarea name="maintenance_history" id="maintenance_history" class="form-control" rows="3" maxlength="500">{{ old('maintenance_history', $vehicle->maintenance_history ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="inspection_records" class="form-label">Inspection Records</label>
    <textarea name="inspection_records" id="inspection_records" class="form-control" rows="3" maxlength="500">{{ old('inspection_records', $vehicle->inspection_records ?? '') }}</textarea>
</div>
