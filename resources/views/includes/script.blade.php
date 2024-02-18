<!-- Bootstrap core JavaScript-->
<script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('assets/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('assets/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('assets/js/demo/chart-pie-demo.js') }}"></script>

<!-- Pastikan Anda telah menyertakan JavaScript Bootstrap Select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0/js/bootstrap-select.min.js"></script>



<script>

$(document).ready(function() {
    $('#reset-button').click(function() {
        $.ajax({
            type: "POST",
            url: $('#reset-form').attr('action'),
            data: $('#reset-form').serialize(),
            success: function(response) {
                // Tambahkan logika di sini untuk menangani respons dari server
                console.log(response);
            },
            error: function(error) {
                // Tambahkan logika di sini untuk menangani kesalahan
                console.log(error);
            }
        });
    });
});
    $(document).ready(function () {
        // Panggil fungsi .selectpicker() pada elemen select
        $('#searchSelect').selectpicker();
    });
    
</script>
