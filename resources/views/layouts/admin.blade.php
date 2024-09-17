<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <title>Admin dashboard</title>

  <!-- Favicon -->
  <link href="{{ asset('assets/imgs/favicon-2.png') }}" rel="shortcut icon" type="image/x-icon" />
  <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
  <link href="{{ asset('admins/css/jquery.datetimepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/images/icons/main_logo.jpg') }}" rel="shortcut icon" type="image/jpg">
  <link href="{{ asset('admins/css/styles.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('admins/css/custom.css') }}" rel="stylesheet" />

  <style>
    .ck-editor__editable {
      min-height: 150px;
    }

    @media (max-width: 768px) {
      .app-header {
        padding-left: 0px !important;
        padding-right: 0px !important;
      }
    }
  </style>
  <!-- Scripts -->
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

  @livewireStyles
</head>

<body>

  <!--  Body Wrapper -->
  <div class="page-wrapper" data-header-position="fixed" data-layout="vertical" data-navbarbg="skin6"
    data-sidebar-position="fixed" data-sidebartype="full" id="main-wrapper">

    @include('layouts.includes.admin.aside')

    <!--  Main wrapper -->
    <div class="body-wrapper">

      @include('layouts.includes.admin.nav')

      @yield('content')

    </div>

  </div>

  <script src="{{ asset('admins/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('admins/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admins/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('admins/js/app.min.js') }}"></script>
  <script src="{{ asset('admins/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('admins/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('admins/js/dashboard.js') }}"></script>

  <script src="{{ asset('admins/js/jquery.datetimepicker.full.min.js') }}"></script>

  <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

  @livewireScripts

  @stack('scripts')

  <script>
    // CKEDITOR.replace( 'long_desc' );

    ClassicEditor
      .create(document.querySelector('#long_desc'), {

      })
      .then(editor => {
        document.querySelector('#submitBtn').addEventListener('click', () => {
          let note = $('#long_desc').data('note');
          eval(note).set('long_desc', editor.getData());
        });
      })
      .catch(error => {
        console.error(error);
      });

    ClassicEditor
      .create(document.querySelector('#additional_info'), {
        ckfinder: {
          uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        }
      })
      .then(editor => {
        document.querySelector('#submitBtn').addEventListener('click', () => {
          let note = $('#additional_info').data('additional');
          eval(note).set('additional_info', editor.getData());
        });
      })
      .catch(error => {
        console.error(error);
      });



    ClassicEditor
      .create(document.querySelector('#edit_long_desc'), {
        // plugins: [ FullPage, ]
      })
      .then(editor => {
        document.querySelector('#editSubmitBtn').addEventListener('click', () => {
          let note = $('#edit_long_desc').data('note');
          eval(note).set('longdesc', editor.getData());
        });
      })
      .catch(error => {
        console.error(error);
      });



    ClassicEditor
      .create(document.querySelector('#service_desc'), {
        // plugins: [ FullPage, ]
      })
      .then(editor => {
        document.querySelector('#servSubmitBtn').addEventListener('click', () => {
          let note = $('#service_desc').data('serv');
          eval(note).set('long_desc', editor.getData());
        });
      })
      .catch(error => {
        console.error(error);
      });


    ClassicEditor
      .create(document.querySelector('#terms-editor'), {
        // plugins: [ FullPage, ]
      })
      .then(editor => {
        document.querySelector('#termsSubmitBtn').addEventListener('click', () => {
          let note = $('#terms-editor').data('terms');
          eval(note).set('terms', editor.getData());
        });
      })
      .catch(error => {
        console.error(error);
      });


    ClassicEditor
      .create(document.querySelector('#privacy-editor'), {
        // plugins: [ FullPage, ]
      })
      .then(editor => {
        document.querySelector('#privacySubmitBtn').addEventListener('click', () => {
          let note = $('#privacy-editor').data('policy');
          eval(note).set('policy', editor.getData());
        });
      })
      .catch(error => {
        console.error(error);
      });
  </script>

</body>

</html>
