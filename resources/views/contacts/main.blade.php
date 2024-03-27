<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacts</title>

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
                            <h1>Contacts</h1>
                        </div>
                        {{-- @include('components.breadcrumbs', ['breadcrumbs' => $breadcrumbs]) --}}
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                @include('components.notification-banner')
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contacts</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 20%">
                                        Name
                                    </th>
                                    <th style="width: 10%">
                                    </th>
                                    <th>
                                        Address
                                    </th>
                                    <th style="width: 30%" class="text-center">
                                        Note
                                    </th>
                                    <th style="width: 20%">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index => $contact)
                                    <tr>
                                        <td>
                                            {{ $index + 1 }}
                                        </td>
                                        <td>
                                            <a>
                                                {{ $contact->name }}
                                            </a>
                                            <br />
                                            <small>
                                                {{ $contact->phones[0]['phones'] ?? '' }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="list-inline">

                                                <img alt="Avatar" class="table-avatar"
                                                    src="{{ asset('storage/profile_pictures/' . $contact->profile) }}">
                                            </div>
                                        </td>
                                        <td class="project_progress">
                                            <p>{{ $contact->address }}</p>
                                        </td>
                                        <td class="project-state">
                                            <p>{{ $contact->note }}</p>
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('contacts.show', $contact->id) }}">
                                                <i class="fas fa-folder"></i> View
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('contacts.edit', $contact->id) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>

                                            <!-- Delete button with confirmation dropdown -->
                                            <div class="btn-group">
                                                <a class="btn btn-danger btn-sm dropdown-toggle" href="#"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                                <div class="dropdown-menu max-" style="max-width: 100px">
                                                    <a class="dropdown-item text-danger" href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $contact->id }}').submit();">Confirm</a>
                                                    <a class="dropdown-item" href="#">Cancel</a>
                                                </div>
                                            </div>

                                            <!-- Delete form -->
                                            <form id="delete-form-{{ $contact->id }}"
                                                action="{{ route('contacts.delete', $contact->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('contacts.create') }}" class="float-right"><input type="submit"
                                class="btn btn-success" value="Add Contact"></a>
                    </div>
                </div>

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
</body>

</html>
