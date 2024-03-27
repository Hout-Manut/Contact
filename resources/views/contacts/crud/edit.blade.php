<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | Edit</title>

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
                            <h1>Edit Contact</h1>
                        </div>
                        {{-- @include('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs]) --}}
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <form action="{{ route('contacts.edit', $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                            required value="{{ $contact->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" name="address" id="inputAddress" class="form-control"
                                            value="{{ $contact->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCompany">Company</label>
                                        <input type="text" name="company" id="inputCompany" class="form-control"
                                            value="{{ $contact->company }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputTitle">Title</label>
                                        <input type="text" name="job_title" id="inputTitle" class="form-control"
                                            value="{{ $contact->job_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Note</label>
                                        <textarea name="note" id="inputDescription" class="form-control" rows="4">{{ $contact->note }}</textarea>
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
                                        <div id="phoneFields">
                                            @foreach ($contact->phones as $index => $phone)
                                                <div class="input-group mb-3 phone-input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button"
                                                            class="btn btn-default dropdown-toggle dropdown-label"
                                                            data-toggle="dropdown">
                                                            Type
                                                        </button>
                                                        <div class="dropdown-menu" style="padding-right:1em">
                                                            @php
                                                                $types = [
                                                                    'Home',
                                                                    'Personal',
                                                                    'Work',
                                                                    'School',
                                                                    'Other',
                                                                ];
                                                                $selectedType = $contact->phone_type[$index] ?? 'Other';
                                                            @endphp
                                                            @foreach ($types as $type)
                                                                <label class="dropdown-item" style="margin-left:1em">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="phone_types[{{ $index }}]"
                                                                        value="{{ $type }}"
                                                                        {{ $selectedType == $type ? 'checked' : '' }}>{{ $type }}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <input type="text" name="phones[{{ $index }}]"
                                                        class="form-control" value="{{ $phone->phones }}">
                                                    <div class="input-group-append">
                                                        <button type="button"
                                                            class="btn btn-danger remove-field">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email(s)</label>
                                        <button type="button" id="addEmail" class="btn btn-sm"><ion-icon
                                                name="add-outline"></ion-icon> Add Email</button>
                                        <div id="emailFields">
                                            @foreach ($contact->emails as $index => $email)
                                                <div class="input-group mb-3 email-input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button"
                                                            class="btn btn-default dropdown-toggle dropdown-label"
                                                            data-toggle="dropdown">
                                                            Type
                                                        </button>
                                                        <div class="dropdown-menu" style="padding-right:1em">
                                                            @php
                                                                $types = [
                                                                    'Home',
                                                                    'Personal',
                                                                    'Work',
                                                                    'School',
                                                                    'Other',
                                                                ];
                                                                $selectedType = $contact->email_type[$index] ?? 'Other';
                                                            @endphp
                                                            @foreach ($types as $type)
                                                                <label class="dropdown-item" style="margin-left:1em">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="email_types[{{ $index }}]"
                                                                        value="{{ $type }}"
                                                                        {{ $selectedType == $type ? 'checked' : '' }}>{{ $type }}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <input type="text" name="emails[{{ $index }}]"
                                                        class="form-control" value="{{ $email->emails }}">
                                                    <div class="input-group-append">
                                                        <button type="button"
                                                            class="btn btn-danger remove-field">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Connection(s)</label>
                                        <button type="button" id="addConnection" class="btn btn-sm"><ion-icon
                                                name="add-outline"></ion-icon> Add Connection</button>
                                        <div id="connectionFields">
                                            @foreach ($contact->connections as $index => $connection)
                                                <div class="input-group mb-3 connection-input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button"
                                                            class="btn btn-default dropdown-toggle dropdown-label"
                                                            data-toggle="dropdown">
                                                            Platform
                                                        </button>
                                                        <div class="dropdown-menu" style="padding-right:1em">
                                                            @php
                                                                $types = [
                                                                    'Facebook',
                                                                    'Twitter',
                                                                    'Github',
                                                                    'LinkedIn',
                                                                    'Instagram',
                                                                    'Discord',
                                                                    'Other',
                                                                ];
                                                                $selectedType =
                                                                    $contact->connection_type[$index] ?? 'Other';
                                                            @endphp
                                                            @foreach ($types as $type)
                                                                <label class="dropdown-item" style="margin-left:1em">
                                                                    <input class="form-check-input" type="radio" name="connection_platform[{{ $index }}]" value="{{ $type }}" {{ $selectedType == $type ? 'checked' : '' }}>{{ $type }}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <input type="text" name="connections[{{ $index }}]"
                                                        class="form-control" value="{{ $connection->connections }}">
                                                    <div class="input-group-append">
                                                        <button type="button"
                                                            class="btn btn-danger remove-field">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="profile-pic">Profile Picture:</label>
                                        <div>
                                            <img class="avatar" style="max-width: 200px"
                                                src="{{ asset('storage/profile_pictures/' . $contact->profile) }}"
                                                alt="Profile Picture">
                                        </div>
                                        <br>
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
                            <a href="{{ route('contacts.home') }}" class="btn btn-secondary">Cancel</a>
                            @include('components.notification-banner')
                            <input type="submit" value="Update Contact" class="btn btn-success float-right">
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
