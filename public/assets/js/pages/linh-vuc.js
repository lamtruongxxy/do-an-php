$(document).ready(function() {
	$("#linh-vuc-datatable").DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: 'http://localhost:8000/linh-vuc/lay-danh-sach'
        },
        columns: [
            { data: "id" },
            { data: "ten_linh_vuc" },
            {
                data: "action",
                orderable: false
            }
        ],
		language: {
            paginate: {
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback: function() {
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        },
	});

    $(document).on('click', '.sua_linh_vuc', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        $("#id_linh_vuc").val(id);
        $("#ten_linh_vuc_edit").val(name);
        $("#thong_bao").html('');      
    });

    $("#form_edit").submit(function(e) {
        e.preventDefault();
        const form_data = $(this).serialize();
        let alert = '<div class="alert alert-info" role="alert"><i class="mdi mdi-alert-circle-outline mr-2"></i> <strong>Đang xử lý...</strong>!</div>';
        $("#thong_bao").html(alert);
        callAjax('linh-vuc/sua-linh-vuc', form_data, 'PUT')
            .done(function(data) {
                const { success, errors } = data;
                alert = '';
                if (errors) {
                    errors.forEach(item => {
                        alert += `<div class="alert alert-danger" role="alert">
                                <i class="mdi mdi-block-helper mr-2"></i> <strong>${item}</strong>!
                            </div>`;
                    });
                    $("#thong_bao").html(alert);
                }
                else if(success) {
                    alert = `<div class="alert alert-success" role="alert">
                                <i class="mdi mdi-check-all mr-2"></i> <strong>${success}</strong>!
                            </div>`;
                    $("#thong_bao").html(alert);
                    $("#linh-vuc-datatable").DataTable().ajax.reload();
                    setTimeout(function() {
                        $("#form-edit").modal('hide');
                    }, 500);
                }
            })
            .fail(function(errors) {
                let alert = `<div class="alert alert-danger" role="alert">
                                <i class="mdi mdi-block-helper mr-2"></i> <strong>Có lỗi xảy ra, mời thử lại sau</strong>!
                            </div>`;
                $("#thong_bao").html(alert);
            });
    });

    $("#close_form_edit").click(function(e) {
        $("#form-edit").modal('hide');
    });

    $('.alert-nofi-success').delay(2000).fadeOut();
    $('.alert-nofi-fail').delay(3000).fadeOut();

    $(document).on('submit', '.xoa-linh-vuc', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: "Bạn có chắc muốn xoá?",
            html: "<div class='text-secondary'>Lưu ý: Lĩnh vực bị xoá có thể khôi phục lại</div>",
            type: "warning",
            showCancelButton: !0,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Xác nhận",
            cancelButtonText: "Huỷ bỏ"
        }).then(function(t) {
            if (t.value) {
                callAjax(`linh-vuc/xoa-linh-vuc/${id}`, null, 'DELETE')
                    .done(function(data) {
                        const { status, msg } = data;
                        if (status) {
                            Swal.fire(msg, "", "success");
                            $("#linh-vuc-datatable").DataTable().ajax.reload();
                        } else {
                            Swal.fire(msg, "", "danger")
                        }
                    });
                
            }
        })
    })
});