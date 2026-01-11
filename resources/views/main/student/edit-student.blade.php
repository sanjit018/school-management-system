<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Student</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  {{-- <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> --}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('main.include.navbar')
  @include('main.include.sidebar')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Student Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @foreach ($data as $val)    
            @foreach ($val->students as $st)    
         <div class="col-12">
          <div class="card shadow">
            <div class="card-header bg-primary">
                <h4 class="text-start">Personal Information</h4>
            </div>
            <div class="card-body">
                    <form action="{{ route('update-personal',$val->student_id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Name</div>
                                <div class="col-8">
                                    <input 
                                        type="text" 
                                        placeholder="Enter student name" 
                                        name="name" 
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $st->name }}"
                                    >
                        
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Email</div>
                                <div class="col-8">
                                    <input 
                                        type="email" 
                                        placeholder="Enter email" 
                                        name="email" 
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $st->email }}"
                                    >
                        
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Father's Name</div>
                                <div class="col-8">
                                    <input 
                                        type="text" 
                                        placeholder="Enter Father name" 
                                        name="fname" 
                                        class="form-control @error('fname') is-invalid @enderror"
                                        value="{{ $st->fname }}"
                                    >
                        
                                    @error('fname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Mother's Name</div>
                                <div class="col-8">
                                    <input 
                                        type="text" 
                                        placeholder="Enter Mother name" 
                                        name="mname" 
                                        class="form-control @error('mname') is-invalid @enderror"
                                        value="{{ $st->mname }}"
                                    >
                        
                                    @error('mname')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Contact</div>
                                <div class="col-8">
                                    <input 
                                        type="number" 
                                        placeholder="Enter Contact" 
                                        name="contact" 
                                        class="form-control @error('contact') is-invalid @enderror"
                                        value="{{ $st->contact }}"
                                    >
                        
                                    @error('contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Dob</div>
                                <div class="col-8">
                                    <input 
                                        type="date" 
                                        placeholder="Enter Date of birth" 
                                        name="dob" 
                                        class="form-control @error('dob') is-invalid @enderror"
                                        value="{{ $st->dob }}"
                                    >
                        
                                    @error('dob')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            {{-- <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Admission Date</div>
                                <div class="col-8">
                                    <input 
                                        type="date" 
                                        placeholder="Enter Admission Date" 
                                        name="admission_date" 
                                        class="form-control @error('admission_date') is-invalid @enderror"
                                        value="{{ old('admission_date') }}"
                                    >
                        
                                    @error('admission_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div> --}}
                            
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Gender</div>
                                <div class="col-8">
                                    <select name="gender" class="form-control">
                                        <option value="Male" {{ $st->gender=="Male"?"selected":"" }}>Male</option>
                                        <option value="Female" {{ $st->gender=="Female"?"selected":"" }}>Female</option>
                                    </select>
                        
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                           
                            
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4">Profile</div>
                                <div class="col-8">
                                    <input 
                                        type="file" 
                                        data-placeholder="Enter profile picture" 
                                        name="profile" 
                                        class="form-control @error('profile') is-invalid @enderror"
                                        value="{{ old('profile') }}"
                                    >
                        
                                    @error('profile')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            </div>
                        
                            <div class="col-12 mb-2 col-lg-6">
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-8">
                                <button type="submit" class="btn btn-success btn-block">Update Student</button>
                                </div>
                            </div>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header bg-info">
                    <h4 class="text-start">Academic Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route("update-academic",$val->unique_id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-2 col-lg-6">
                                <div class="row">
                                    <div class="col-4">Roll Number</div>
                                    <div class="col-8">
                                        <input 
                                        type="text" 
                                        placeholder="Enter Roll Number" 
                                        name="roll_number" 
                                        class="form-control @error('roll_number') is-invalid @enderror"
                                        value="{{ $val->roll_number }}"
                                        >
                                        
                                        @error('roll_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-2 col-lg-6">
                                <div class="row">
                                    <div class="col-4">Academic Year</div>
                                    <div class="col-8">
                                        <select name="session" class="form-control">
                                            <option value="">select</option>
                                            <option value="{{date('Y')}}" {{ $val->academic_year==date("Y")?"selected":'' }} >{{date('Y')}}</option>
                                            <option value="{{date('Y')+1}}" {{ $val->academic_year==date("Y")+1?"selected":'' }} >{{date('Y')+1}}</option>
                                            <option value="{{date('Y')+2}}" {{ $val->academic_year==date("Y")+2?"selected":'' }} >{{date('Y')+2}}</option>
                                            <option value="{{date('Y')+3}}" {{ $val->academic_year==date("Y")+3?"selected":'' }} >{{date('Y')+3}}</option>
                                        </select>
                            
                                        @error('session')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-2 col-lg-6">
                                <div class="row">
                                    <div class="col-4">Section</div>
                                    <div class="col-8">
                                        <select name="section" class="form-control">
                                            <option value="A" {{ $val->section=="A"?"selected":"" }} >A</option>
                                            <option value="B" {{ $val->section=="B"?"selected":"" }} >B</option>
                                            <option value="C" {{ $val->section=="C"?"selected":"" }} >C</option>
                                        </select>
                                        
                                        @error('section')
                                        <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-2 col-lg-6">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-8">
                                        <button class="btn btn-success btn-block">Update Student</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    @endforeach
    @endforeach
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

    @include('main.include.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- DataTables  & Plugins -->
{{-- <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> --}}
<script>
  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  // });
</script>
</body>
</html>
