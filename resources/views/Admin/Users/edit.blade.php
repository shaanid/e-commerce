@extends('Layouts.app')
@section('css')
    <style>
        .doctors {
            border-color: black;
        }

        .errorWrapper {
            background-color: red;
            color: white;
            border-radius: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="page">
        <div class="page-main">
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">

                        <div class="page-header mt-9">
                            <h1 class="page-title">Edit Users</h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                                </ol>
                            </div>
                        </div>
                        <!-- PAGE-HEADER END -->

                        <!-- ROW OPEN -->
                        <div class="row row-cards card">
                            <form method="POST" action="{{ route('users.update', $user->id) }}" class="patientForm mt-3">
                                @csrf
                                <div class="col-lg-6 mb-5 mb-lg-0">
                                    <h3 class="my-5 fw-bold ls-tight">
                                        Basic Info
                                    </h3>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="patientDetails row">
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">First Name<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="text" id="first_name"
                                                value="{{ old('first_name', $user->first_name) }}"
                                                class="form-control border-dark" name="first_name" />
                                                @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Last Name<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="text" id="last_name"
                                                value="{{ old('last_name', $user->last_name) }}"
                                                class="form-control  border-dark" name="last_name" />
                                                @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Email<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="text" id="email" value="{{ old('email', $user->email) }}"
                                                class="form-control  border-dark" name="email" />
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Address<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="text" id="address"
                                                value="{{ old('address', $user->address) }}"
                                                class="form-control  border-dark" name="address" />
                                                @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Phone<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="number" id="phone" value="{{ old('phone', $user->phone) }}"
                                                class="form-control  border-dark" name="phone" />
                                                @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Age<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="number" id="age" value="{{ old('age', $user->age) }}"
                                                class="form-control  border-dark" name="age" />
                                                @error('age')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Role<span class="" style="color: red">
                                                    *</span></label>
                                            <select class="form-control border-dark" name="role">
                                                <option value=""> -- SELECT -- </option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}"
                                                        {{ old('role', $user->roles->first()->name ?? '') == $role->name ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12 mt-5 mb-6">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Update
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-12 mt-5 mb-6">
                                    <div class="col-sm-6 text-wrap errorWrapper" style="display: none">
                                    </div>
                                </div>
                            </form>
                            <!-- COL-END -->
                        </div>
                        <!-- ROW CLOSED -->
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->
        </div>
    </div>

@section('js')
    <script></script>
@endsection
