@extends('layout')

@section('content')

    <h1>Dashboard</h1>

    <div class="py-2">
        <div class="row mb-3">

            <!-- Metric -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div
                    class="card border border-primary border-3 border-bottom-0 border-end-0 border-top-0 shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="fs-5 fw-bold text-primary text-uppercase mb-1">Page Views</div>
                                <div class="h5 mb-0">2,298</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-calendar fs-1 text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div
                    class="card border border-success border-3 border-bottom-0 border-end-0 border-top-0 shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="fs-5 fw-bold text-success text-uppercase mb-1">
                                    Page RPM</div>
                                <div class="h5 mb-0">$5,000 (>500%)</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-currency-dollar fs-1 text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div
                    class="card border border-info border-3 border-bottom-0 border-end-0 border-top-0 shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="fs-5 fw-bold text-info text-uppercase mb-1">Tasks</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 me-3 text-muted">60%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm me-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metric -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div
                    class="card border border-warning border-3 border-bottom-0 border-end-0 border-top-0 shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col me-2">
                                <div class="fs-5 fw-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 fw-bold text-muted">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-check2 fs-1 text-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">

            <!-- Content Column -->
            <div class="col-lg-6">
                <div class="row py-5">
                    <!-- Color System -->
                    <div class="col-md-4 mb-4">
                        <div class="card bg-primary text-white shadow-sm">
                            <div class="card-body">
                                Primary
                                <div class="text-white-50 small">#7751bd</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-success text-white shadow-sm">
                            <div class="card-body">
                                Success
                                <div class="text-white-50 small">#8bc34a</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-info text-white shadow-sm">
                            <div class="card-body">
                                Info
                                <div class="text-white-50 small">#a8dadc</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-warning text-white shadow-sm">
                            <div class="card-body">
                                Warning
                                <div class="text-white-50 small">#ffc107</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-danger text-white shadow-sm">
                            <div class="card-body">
                                Danger
                                <div class="text-white-50 small">#e91e63</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-secondary text-white shadow-sm">
                            <div class="card-body">
                                Secondary
                                <div class="text-white-50 small">#6c757d</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-light text-black shadow-sm">
                            <div class="card-body">
                                Light
                                <div class="text-black-50 small">#f6f7f9</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-dark text-white shadow-sm">
                            <div class="card-body">
                                Dark
                                <div class="text-white-50 small">#32292f</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">

                <!-- About -->
                <div class="card shadow-sm mb-4 h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0 fw-bold text-primary">Dharma Theme</h6>
                    </div>
                    <div class="card-body">
                        <h4>About</h4>
                        <p>The Dharma Bootstrap theme is simple with <span
                                class="text-decoration-line-through">minimal</span> no dependencies outside of Bootstrap.
                            Made for easy development and customization.</p>
                        <p>And it's open sourced under the Creative Commons license.</p>

                        <h4>Under the Hood</h4>
                        <p>Bootstrap 5 and Bootstrap Icons to make things pretty. Minimal Sass, only used when customization
                            of Bootstrap is necessary. Comes with Webpack's dev server for easy local development.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
