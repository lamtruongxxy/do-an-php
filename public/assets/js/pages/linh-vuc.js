$(document).ready(function() {
	$("#linh-vuc-datatable").DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: 'http://localhost:8000/linh-vuc'
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
});