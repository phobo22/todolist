@props(['page', 'categories', 'status', 'searchTitle'])

<form method="GET" action="{{ route($page) }}" class="card shadow-sm p-3 mb-4">
    <div class="d-flex flex-row">
        <x-filters.category :categories="$categories" />
        <x-filters.status :status="$status" />
    </div>
    <input name="searchTitle" value="{{ $searchTitle }}" class="form-control me-2 mb-3" type="input" placeholder="Search for title">
    <button class="btn btn-primary w-100">Apply Filter</button>
</form>
