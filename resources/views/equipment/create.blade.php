@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Create Equipment'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Create Equipment</h6>
                    </div>
                    <div class="card-body p-3">
                        <form role="form" method="POST" action="{{ route('equipment.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="equipment-select" class="form-control-label">Select Equipment <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" id="equipment-select" name="name" required>
                                            <option value="" disabled selected>Choose an equipment</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Soccer Ball">Football</option>
                                            <option value="Badminton Racket">Badminton Racket</option>
                                            <option value="Tennis Racket">Tennis Racket</option>
                                            <option value="Tennis Racket">Shuttlecock</option>

                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Quantity <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="quantity" required>
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
    <script></script>
@endpush
