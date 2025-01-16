@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit Equipment'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Edit Equipment</h6>
                    </div>
                    <div class="card-body p-3">
                        <form role="form" method="POST" action="{{ route('equipment.update', ['equipment' => $data->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" required value="{{ $data->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">quantity <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="quantity" required value="{{ $data->quantity }}">
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-2">
                                <button type="button" onclick="history.back()" class="btn btn-secondary btn-md ms-auto">Back</button>
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
