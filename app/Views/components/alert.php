<script>
    window.addEventListener("load", function (e) {

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        switch ("<?= $type ?>") {
            case "error":
                toastr.error("<?= $message ?>", "Error");
                break;
            case "success":
                toastr.success("<?= $message ?>", "Success");
                break;
            case "warning":
                toastr.warning("<?= $message ?>", "Warning");
                break;
            default:
                toastr.error("<?= $message ?>", "Error");
            break
        }

    })
</script>