@extends('layout')

@section('content')

    <h1>Dashboard</h1>

    <div class="py-2">
        <div class="row mb-3">

            <!-- Metric -->
            <div class="col-xl-3 col-md-6 mb-4">
                <x-widgets.metric label="Website Visitors" value="2,298" color="primary" icon="bi bi-people" />
            </div>

            <!-- Metric -->
            <div class="col-xl-3 col-md-6 mb-4">
                <x-widgets.metric label="Draft Stories" value="0" color="warning" icon="bi bi-page" />
            </div>

            <!-- Metric -->
            <div class="col-xl-3 col-md-6 mb-4">
                <x-widgets.metric_percent label="Post Quota" value="20" color="info" />
            </div>

            <!-- Metric -->
            <div class="col-xl-3 col-md-6 mb-4">
               <x-widgets.metric label="Pending Comments" value="12" color="warning" icon="bi bi-chat" />
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
