@props(['categories'])

<div class="m-3">
    <h5 class="card-title mb-3">Filter By Category</h5>

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="filterCategory[]" value="cat1"
            {{ in_array('cat1', $categories ?? request('filterCategory', [])) ? 'checked' : '' }}>
        <label class="form-check-label">Category 1</label>
    </div>

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="filterCategory[]" value="cat2"
            {{ in_array('cat2', $categories ?? request('filterCategory', [])) ? 'checked' : '' }}>
        <label class="form-check-label">Category 2</label>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="filterCategory[]" value="cat3"
            {{ in_array('cat3', $categories ?? request('filterCategory', [])) ? 'checked' : '' }}>
        <label class="form-check-label">Category 3</label>
    </div>
</div>