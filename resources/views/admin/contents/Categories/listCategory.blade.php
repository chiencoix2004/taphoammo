@extends('admin.layouts.main')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Danh Mục</h4>
                        <div class="">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Approx</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item"><a href="#">Tables</a>
                                </li><!--end nav-item-->
                                <li class="breadcrumb-item active">Basic</li>
                            </ol>
                        </div>
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Danh sách danh mục</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table  mb-0 table-centered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tên Danh Mục</th>
                                            <th> Mục Con</th>
                                            <th>Vai Trò</th>
                                            <th>Trạng Thái</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $item)
                                            <tr>
                                                <td><img src="{{ asset('assets/images/logos/lang-logo/chatgpt.png') }}"
                                                        alt="" class="rounded-circle thumb-md me-1 d-inline">
                                                    {{ $item->name }}
                                                </td>
                                                <td>{{ $item->children_count }}</td>
                                                <td>Lớp Cha</td>
                                                @if ($item->status == 1)
                                                    <td><span class="badge bg-success">Hoạt Động</span></td>
                                                @else
                                                    <td><span class="badge bg-danger">Tắt</span></td>
                                                @endif

                                                <td class="text-end">
                                                    <div class="dropdown d-inline-block">
                                                        <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                            data-bs-toggle="dropdown" href="#" role="button"
                                                            aria-haspopup="false" aria-expanded="false">
                                                            <i class="las la-ellipsis-v fs-20 text-muted"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dLabel11">
                                                            {{-- <a class="dropdown-item" href="#">Creat Project</a> --}}
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.categories.detailCategory', ['slug' => $item->slug]) }}">Chi
                                                                Tiết</a>
                                                            {{-- <a class="dropdown-item" href="#">Sửa Danh Mục</a> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->

                    </div><!--end card-->

                    {{ $categories->links('pagination::bootstrap-4') }}
                </div> <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Thêm Danh Mục</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <form action="{{ route('admin.categories.addCategory') }}" method="POST">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="horizontalInput1" class="col-sm-2 col-form-label">Tên Danh Mục</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name Category">
                                    </div>
                                </div>
                                @if ($errors->any())
                                        <div id="alert-message" class="alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('message'))
                                    <div id="alert-message" class="alert alert-primary" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-10 ms-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>

                            </form>

                        </div>

                        <!--end card-body-->
                    </div><!--end card-->
                </div>
            </div><!--end row-->
            <hr>
            {{-- <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Striped Rows</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-3.jpg" alt=""
                                                    class="rounded-circle thumb-md me-1 d-inline"> Aaron Poulin</td>
                                            <td>Aaron@example.com</td>
                                            <td>+21 21547896</td>
                                            <td class="text-end">
                                                <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="#"><i
                                                        class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-4.jpg" alt=""
                                                    class="rounded-circle thumb-md me-1 d-inline"> Richard Ali</td>
                                            <td>Richard@example.com</td>
                                            <td>+41 21547896</td>
                                            <td class="text-end">
                                                <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="#"><i
                                                        class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-5.jpg" alt=""
                                                    class="rounded-circle thumb-md me-1 d-inline"> Juan Clark</td>
                                            <td>Juan@example.com</td>
                                            <td>+65 21547896</td>
                                            <td class="text-end">
                                                <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="#"><i
                                                        class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="assets/images/users/avatar-6.jpg" alt=""
                                                    class="rounded-circle thumb-md me-1 d-inline"> Albert Hull</td>
                                            <td>Albert@example.com</td>
                                            <td>+88 21547896</td>
                                            <td class="text-end">
                                                <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                                <a href="#"><i
                                                        class="las la-trash-alt text-secondary font-16"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title">Table Head Options</h4>
                                </div><!--end col-->
                            </div> <!--end row-->
                        </div><!--end card-header-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span
                                                    class="badge bg-transparent border border-success text-success">Business</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span
                                                    class="badge bg-transparent border border-warning text-warning">Personal</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span
                                                    class="badge bg-transparent border border-danger text-danger">Disabled</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Mark</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span
                                                    class="badge bg-transparent border border-success text-success">Business</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Jacob</td>
                                            <td>XYZ@Example.com</td>
                                            <td><span
                                                    class="badge bg-transparent border border-warning text-warning">Personal</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table><!--end /table-->
                            </div><!--end /tableresponsive-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div> <!--end col-->
            </div> --}}
            <!--end row-->
        </div><!-- container -->

    @endsection
