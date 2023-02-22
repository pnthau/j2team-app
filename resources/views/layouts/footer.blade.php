{{-- @vite('resources/js/jquery.js') --}}
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>


<!--  Forms Validations Plugin -->
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('js/moment.min.js') }}"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

<!--  Select Picker Plugin -->
<script src="{{ asset('js/bootstrap-selectpicker.js') }}"></script>

<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
<script src="{{ asset('js/bootstrap-switch-tags.min.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>

<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('js/sweetalert2.js') }}"></script>

<!-- Vector Map plugin -->
<script src="{{ asset('js/jquery-jvectormap.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Wizard Plugin    -->
<script src="{{ asset('js/jquery.bootstrap.wizard.min.js') }}"></script>

<!--  Bootstrap Table Plugin    -->
<script src="{{ asset('js/bootstrap-table.js') }}"></script>

<!--  Plugin for DataTables.net  -->
<script src="{{ asset('js/jquery.datatables.js') }}"></script>


<!--  Full Calendar Plugin    -->
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>

<!-- Light Bootstrap Dashboard Core javascript and methods -->
<script src="{{ asset('js/light-bootstrap-dashboard.js?v=1.4.1') }}"></script>

@section('scripts')
@show
