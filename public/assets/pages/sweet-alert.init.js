
/**
* Theme: Xadmino
* SweetAlert
*/


!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

        //Basic
        $('#sa-basic').on('click', function () {
            swal("Here's a message!");
        });

        //A title with a text under
        $('#sa-title').on('click', function () {
            swal("Here's a message!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat, tincidunt vitae ipsum et, pellentesque maximus enim. Mauris eleifend ex semper, lobortis purus sed, pharetra felis")
        });

        //Success Message
        $('#sa-success').on('click', function () {
            swal.fire("success", "Data Berhasil Disimpan!", "success")
        });

        //Warning Message
        $('#sa-warning').on('click', function () {
            swal.fire({
                title: "Apakah anda yakin ?",
                text: "Data yang sudah terhapus tidak dapat dikembalikan kembali",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-primary',
                cancelButtonClass: 'btn-danger',
                confirmButtonText: "Ya, hapus!",
                CancelButtonText: "Ya!",
                closeOnConfirm: false
            }, function () {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        });


    
       

        //Parameter
        $('#sa-params').on('click', function () {
            var hapus = $('#sa-params').attr('');            
            swal({
                title: "Apakah anda yakin?",
                text: "Data yang sudah terhapus tidak dapat dikembalikan lagi!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {

                    
                    swal("Terhapus!", "Data berhasil dihapus.", "success");
                } else {
                    swal("Dibatalkan", "Data batal dihapus", "error");
                }
            });
        });

        //Custom Image
        $('#sa-image').on('click', function () {
            swal({
                title: "Sweet!",
                text: "Here's a custom image.",
                imageUrl: "assets/plugins/bootstrap-sweetalert/thumbs-up.jpg"
            });
        });

        //Auto Close Timer
        $('#sa-close').on('click', function () {
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2000,
                showConfirmButton: false
            });
        });


    },
        //init
        $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
}(window.jQuery),

//initializing
    function ($) {
        "use strict";
        $.SweetAlert.init()
    }(window.jQuery);