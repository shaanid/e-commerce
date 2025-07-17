@extends('Layouts.app')
@section('css')
     <style>
        body {
            background-color: #f5f6fa;
        }
        .dashboard-card {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: 0.2s;
        }
        .dashboard-card:hover {
            transform: scale(1.02);
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }
        .card-value {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <!-- app-Header -->
            <div class="app-header header sticky">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-bs-toggle="sidebar"
                            href="javascript:void(0)"></a>
                    </div>
                </div>
            </div>
            <!-- /app-Header -->

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">
                            <h1 class="page-title">Roles Management</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Roles Management</li>
                                </ol>
                            </div>

                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        {{-- <h3 class="card-title">Basic Datatable</h3> --}}
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="container py-5">
                                            <h2 class="text-center mb-5">📊 Admin Dashboard</h2>
                                            <div class="row justify-content-center g-4">
                                                <div class="col-md-5">
                                                    <div class="card dashboard-card text-center p-4 bg-light">
                                                        <div class="card-body">
                                                            <div class="card-title">Total Orders</div>
                                                            <div class="card-value text-primary">{{ $totalOrders }}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="card dashboard-card text-center p-4 bg-light">
                                                        <div class="card-body">
                                                            <div class="card-title">Total Revenue</div>
                                                            <div class="card-value text-success">₹{{ number_format($totalRevenue, 2) }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->
        </div>
    </div>

@section('js')
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        });

        $(document).ready(function() {
            $('#roles-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('roles.list') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@endsection
