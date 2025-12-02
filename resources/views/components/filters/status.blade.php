@props(['status'])

<div class="m-3">
    <h5 class="card-title mb-3">Filter By Status</h5>

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="filterStatus[]" value="0"
            {{ in_array('0', $status ?? request('filterStatus', [])) ? 'checked' : '' }}>
        <label class="form-check-label">To Do</label>
    </div>

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="filterStatus[]" value="1"
            {{ in_array('1', $status ?? request('filterStatus', [])) ? 'checked' : '' }}>
        <label class="form-check-label">In Progress</label>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="filterStatus[]" value="2"
            {{ in_array('2', $status ?? request('filterStatus', [])) ? 'checked' : '' }}>
        <label class="form-check-label">Done</label>
    </div>
</div>