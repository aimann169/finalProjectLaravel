@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Show Borrow'])
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Show Borrow</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name</label>
                                    <p class="ms-1">{{ $data->user->name }}</p>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Equipment</label>
                                    <p class="ms-1">{{ $data->equipment->name }}</p>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Borrow date</label>
                                    <p class="ms-1">{{ $data->borrow_date }}</p>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Return date</label>
                                    <p class="ms-1">{{ $data->return_date }}</p>
                                </div>
                            </div>
        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity</label>
                                    <p class="ms-1">{{ $data->quantity }}</p>
                                </div>
                            </div>
        
                        </div>
                        <div class="text-end mt-2">
                            <button onclick="history.back()" class="btn btn-secondary btn-md ms-auto">Back</button>
                        </div>
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
