<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | Detail</title>

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
            <br>
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            @include('components.notification-banner')
                            <div class="card card-primary">
                                <div class="card-body box-profile d-flex flex-column"
                                    style="
                                    @if (!$isDefaultAvatar)
                                        background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 1)),
                                        url('{{ asset('storage/profile_pictures/' . $contact->profile) }}') no-repeat center center;
                                        background-size: cover;
                                        padding: 20px; /* Adjust padding as needed */
                                        min-height: 200px; /* Adjust minimum height as needed for your design */
                                    @endif
                                    ">
                                    <div class="mt-auto">
                                        <h3 class="profile-username">{{ $contact->name }}</h3>
                                        <p class="text-muted">{{ $contact->note }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-light">
                                <div class="card-header">
                                    <h3 class="card-title">Details</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="text-muted">{{ $contact->job_title }} at {{ $contact->company }}
                                            </p>
                                            <p class="text-muted">Address: {{ $contact->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (count($contact->phones) > 0)
                                <div class="card card-light">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                @foreach ($contact->phones as $phone)
                                                    <p class="text-muted m-0">{{ $phone->phone_type }}</p>
                                                    <a href="tel:{{ $phone->phones }}">
                                                        <h5 class="text-primary mt-0">{{ $phone->phones }}</h5>
                                                    </a>
                                                    @if (!$loop->last)
                                                        <hr>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (count($contact->emails) > 0)
                                <div class="card card-light">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                @foreach ($contact->emails as $email)
                                                    <p class="text-muted m-0">{{ $email->email_type }}</p>
                                                    <a href="mailto:{{ $email->emails }}">
                                                        <h5 class="text-primary mt-0">{{ $email->emails }}</h5>
                                                    </a>
                                                    @if (!$loop->last)
                                                        <hr>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (count($contact->Connections) > 0)
                                @php
                                    $sites = [
                                        'Facebook' => 'https://www.facebook.com/',
                                        'Instagram' => 'https://www.instagram.com/',
                                        'Twitter' => 'https://twitter.com/',
                                        'LinkedIn' => 'https://www.linkedin.com/',
                                        'Github' => 'https://github.com/',
                                        'Discord' => 'https://discord.com/',
                                        'Other' => 'https://',
                                    ];
                                @endphp
                                <div class="card card-light">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                @foreach ($contact->connections as $connection)
                                                    <p class="text-muted m-0">{{ $connection->connection_platform }}
                                                    </p>
                                                    <a href="{{ $sites[$connection->connection_platform] }}">
                                                        <h5 class="text-primary mt-0">{{ $connection->connections }}
                                                        </h5>
                                                    </a>
                                                    @if (!$loop->last)
                                                        <hr>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="card card-light">
                                <div class="card-header">
                                    <h3 class="card-title">Actions</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <a href="/contacts/{{ $contact->id }}/edit"
                                                class="btn btn-primary btn-block">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content -->
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
