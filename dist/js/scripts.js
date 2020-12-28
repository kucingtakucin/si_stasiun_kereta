(function($) {
    "use strict";

    // Add active state to sidbar nav links
    let path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    let stasiun_success = $(".stasiun-success").data('isi');
    let stasiun_fail = $(".stasiun-fail").data('isi');
    if (stasiun_success) {
        Swal.fire({
            title: 'Data Stasiun',
            text: `${stasiun_success}`,
            icon: 'success'
        })
    }
    if (stasiun_fail) {
        Swal.fire({
            title: 'Data Stasiun',
            text: `${stasiun_fail}`,
            icon: 'danger'
        })
    }

    $('.tombolHapusStasiun').click(function (event) {
        event.preventDefault()
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: 'Data Stasiun Akan Segera Dihapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(result => {
            if (result.value) {
                $(this).parent().submit()
            }
        })
    });

    let kereta_success = $(".kereta-success").data('isi');
    let kereta_fail = $(".kereta-fail").data('isi');
    if (kereta_success) {
        Swal.fire({
            title: 'Data Kereta',
            text: `${kereta_success}`,
            icon: 'success'
        })
    }
    if (kereta_fail) {
        Swal.fire({
            title: 'Data Kereta',
            text: `${kereta_fail}`,
            icon: 'danger'
        })
    }

    $('.tombolHapusKereta').click(function (event) {
        event.preventDefault()
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: 'Data Kereta Akan Segera Dihapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(result => {
            if (result.value) {
                $(this).parent().submit()
            }
        })
    });

    let penumpang_success = $(".penumpang-success").data('isi');
    let penumpang_fail = $(".penumpang-fail").data('isi');
    if (penumpang_success) {
        Swal.fire({
            title: 'Data Penumpang',
            text: `${penumpang_success}`,
            icon: 'success'
        })
    }
    if (penumpang_fail) {
        Swal.fire({
            title: 'Data Penumpang',
            text: `${penumpang_fail}`,
            icon: 'danger'
        })
    }

    $('.tombolHapusPenumpang').click(function (event) {
        event.preventDefault()
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: 'Data Penumpang Akan Segera Dihapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(result => {
            if (result.value) {
                $(this).parent().submit()
            }
        })
    });
})(jQuery);
