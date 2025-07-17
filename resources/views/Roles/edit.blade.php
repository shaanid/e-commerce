@extends('Layouts.app')
@section('css')
    <style>

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
                            <h1 class="page-title">Permission Management</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Permission Management</li>
                                </ol>
                            </div>

                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- Row -->
                        <div class="row row-sm">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                        
                                                <div class="form-group">
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="permissions[]" 
                                                                value="{{ $permission->name }}" 
                                                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                            <label class="form-check-label">{{ $permission->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                        
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </form>
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
    </script>
@endsection
