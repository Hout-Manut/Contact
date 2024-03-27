<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | Add</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('components.navbar')
        @include('components.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Contact</h1>
                        </div>
                        {{-- @include('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs]) --}}
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Blade directive for CSRF token -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Full Name</label>
                                        <input type="text" name="name" id="inputName" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" name="address" id="inputAddress" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCompany">Company</label>
                                        <input type="text" name="company" id="inputCompany" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Title</label>
                                        <input type="text" name="job_title" id="inputTitle" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Note</label>
                                        <textarea name="note" id="inputDescription" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Details</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Phone(s)</label>
                                        <button type="button" id="addPhone" class="btn btn-sm"><ion-icon
                                                name="add-outline"></ion-icon> Add Phone</button>
                                        <div id="phoneFields"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email(s)</label>
                                        <button type="button" id="addEmail" class="btn btn-sm"><ion-icon
                                                name="add-outline"></ion-icon> Add Email</button>
                                        <div id="emailFields"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Connection(s)</label>
                                        <button type="button" id="addConnection" class="btn btn-sm"><ion-icon
                                                name="add-outline"></ion-icon> Add Connection</button>
                                        <div id="connectionFields"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-pic">Profile Picture:</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="profile" class="custom-file-input"
                                                    id="profile-pic">
                                                <label class="custom-file-label" for="profile-pic">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-secondary">Cancel</a>
                            @include('components.notification-banner')
                            <input type="submit" value="Create new Contact" class="btn btn-success float-right">
                        </div>
                    </div>
                </form>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('components.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script src="../../dist/js/contact.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
