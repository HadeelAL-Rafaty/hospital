<script src="{{asset('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
{{--<script src="{{asset('admin/assets/js/Chart.bundle.js')}}"></script>
<script src="{{asset('admin/assets/js/chart.js')}}"></script>--}}
<script src="{{asset('admin/assets/js/select2.min.js')}}"></script>
<script src="{{asset('admin/assets/js/moment.min.js')}}"></script>
<script src="{{asset('admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.js')}}"></script>

<script>
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });
</script>
<script>

    $(document).ready(function() {
        $('#patient-select').on('change', function() {
            var patientId = $(this).val();

// إرسال طلب Ajax لجلب بريد المريض ورقم الهاتف بناءً على الـ patientId
            $.ajax({
                url: '/get-patient-data',
                type: 'GET',
                data: { patientId: patientId },
                success: function(response) {
                    $('#patient-email').val(response.email);
                    $('#patient-phone').val(response.phone);
                },
                error: function() {
                    $('#patient-email').val('');
                    $('#patient-phone').val('');
                }
            });
        });
    });
</script>
