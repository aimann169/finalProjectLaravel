@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Borrow'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Edit Borrow</h6>
                    </div>
                    <div class="card-body p-3">
                        <form role="form" method="POST" action="{{ route('borrow.update', ['borrow' => $data->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">user_id <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="user_id">
                                            <option selected>Open this select menu</option>
                                            @foreach ($users as $user)
                                                <option @if ($data->user_id == $user->id) selected @endif
                                                    value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">equipment_id <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" name="equipment_id">
                                            <option selected>Open this select menu</option>
                                            @foreach ($equipments as $equipment)
                                                <option @if ($data->equipment_id == $equipment->id) selected @endif
                                                    value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">borrow_date <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control flatpickr" placeholder="Please select date"
                                            name="borrow_date" type="text" value="{{ $data->borrow_date }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">return_date <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control flatpickr" placeholder="Please select date"
                                            name="return_date" type="text" value="{{ $data->return_date }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity" class="form-control-label">Quantity <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="quantity" name="quantity" required>
                                            <option selected disabled>Choose quantity</option>
                                            <!-- Options will be populated dynamically -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-2">
                                <button type="button" onclick="history.back()"
                                    class="btn btn-secondary btn-md ms-auto">Back</button>
                                <button type="submit" class="btn btn-primary btn-md ms-auto">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const equipmentSelect = document.getElementById('equipment');
            const quantitySelect = document.getElementById('quantity');

            // Event listener for equipment selection change
            equipmentSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const maxQuantity = selectedOption.getAttribute('data-quantity');

                // Clear the quantity dropdown
                quantitySelect.innerHTML = '<option selected disabled>Choose quantity</option>';

                // Populate quantity options based on the selected equipment's quantity
                if (maxQuantity) {
                    for (let i = 1; i <= maxQuantity; i++) {
                        const option = document.createElement('option');
                        option.value = i;
                        option.textContent = i;
                        quantitySelect.appendChild(option);
                    }
                }
            });
        });
    </script>
@endpush
