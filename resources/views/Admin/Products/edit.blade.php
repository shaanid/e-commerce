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
                            <h1 class="page-title">Add Users</h1>
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
                            <form method="POST" action="{{ route('products.update', $product) }}" class="patientForm mt-3">
                                @csrf
                                <div class="col-lg-6 mb-5 mb-lg-0">
                                    <h3 class="my-5 fw-bold ls-tight">
                                        Basic Info
                                    </h3>
                                </div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="patientDetails row">
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Name<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="text" id="name" value="{{ $product->name }}" class="form-control border-dark"
                                                name="name" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                       
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Description<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="text" id="description" value="{{ $product->description }}" class="form-control  border-dark"
                                                name="description" />
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Price<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="number" id="price" value="{{ $product->price }}" class="form-control  border-dark"
                                                name="price" />
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-outline col-sm-3">
                                            <label class="form-label">Stock Quantity<span class="" style="color: red">
                                                    *</span></label>
                                            <input type="number" id="quantity" value="{{ $product->stock_quantity }}" class="form-control  border-dark"
                                                name="quantity" />
                                            @error('quantity')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-xl-12 mt-5 mb-6">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Save
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
