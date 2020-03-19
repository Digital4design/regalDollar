<!-- App's Basic Js  -->
<script src="{{ URL::asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/metisMenu.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ URL::asset('public/assets/js/waves.min.js') }}"></script>

 @yield('script')

<!-- App js-->
<script src="{{ URL::asset('public/assets/js/app.js') }}"></script>

<script type="text/javascript" src="{{ url('public/js/data-tables/data-table.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('public/js/data-tables/dataTables.buttons.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('public/js/data-tables/buttons.html5.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('public/js/data-tables/buttons.colVis.min.js') }}"></script>

@yield('script-bottom')

