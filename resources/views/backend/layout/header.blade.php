<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="{{ $title }} - Admin Dashboard eCommerce Website.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ $title }} - Admin Dashboard eCommerce Website.</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="{{ asset('backend') }}/assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="{{ asset('backend') }}/assets/plugins/simplebar/simplebar.css" rel="stylesheet" />
	<link href="{{ asset('backend') }}/assets/css/custom.css" rel="stylesheet" />

	<!-- Ekka CSS -->
	<link id="ekka-css" href="{{ asset('backend') }}/assets/css/ekka.css" rel="stylesheet" />

	<!-- FAVICON -->
	<link href="{{ asset('images/company/'.$company->favicon) }}" rel="shortcut icon" />
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <style>
        .ck-editor__editable_inline{
            height: 100px;
        }
    </style>
    @yield('css')

</head>
