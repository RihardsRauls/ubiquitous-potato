<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <h5 class="card-title">{{ $listing->title }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ $listing->company_name }}</h6>
        <p class="card-text">{{ $listing->description }}</p>
        <ul class="list-unstyled mb-3">
            <li><strong>Salary:</strong> {{number_format($listing->salary, 2)}}</li>
            <li><strong>Category:</strong> {{ $listing->jobCategory->category }}</li>
            <li><strong>Type:</strong> {{ $listing->employmentType->type }}</li>
            <li><strong>Posted by:</strong> {{ $listing->user->name }}</li>
            <li><strong>Date:</strong> {{ $listing->created_at?->format('d/m/Y') }}</li>
        </ul>
        <a href="{{ route('listing.show', $listing->id) }}" class="btn btn-primary">View Details</a>
    </div>
</div>
