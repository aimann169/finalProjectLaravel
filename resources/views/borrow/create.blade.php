@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Borrow'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Create Borrow</h6>
                    </div>
                    <div class="card-body p-3">
                        <form role="form" method="POST" action="{{ route('borrow.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Equipment Selection -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="equipment" class="form-control-label">Equipment <span
                                                class="text-danger">*</span></label>
                                        <select class="form-select" id="equipment" name="equipment_id" required>
                                            <option selected disabled>Open this select menu</option>
                                            @foreach ($equipments as $equipment)
                                                <option value="{{ $equipment->id }}"
                                                    data-quantity="{{ $equipment->quantity }}">
                                                    {{ $equipment->name }} (Available: {{ $equipment->quantity }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Borrow Date -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="borrow_date" class="form-control-label">Borrow Date <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control flatpickr" id="borrow_date"
                                            placeholder="Please select date" name="borrow_date" type="text" required>
                                    </div>
                                </div>

                                <!-- Return Date -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="return_date" class="form-control-label">Return Date <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control flatpickr" id="return_date"
                                            placeholder="Please select date" name="return_date" type="text" required>
                                    </div>
                                </div>

                                <!-- Quantity -->
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
