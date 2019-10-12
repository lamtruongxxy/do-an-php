<form method="POST" class="xoa-linh-vuc" data-id="{{ $data->id }}">
    @method('DELETE')
    <button 
        class='btn btn-warning waves-effect waves-light sua_linh_vuc' 
        type='button'
        data-toggle='modal'
        data-target='#form-edit'
        data-id='{{ $data->id }}'
        data-name='{{ $data->ten_linh_vuc }}'>
    <i class='far fa-edit'></i>
      Sửa
    </button> &nbsp;&nbsp;
    <button 
        type='submit'
        class='btn btn-danger waves-effect waves-light'>
    <i class='far fa-trash-alt'></i>
      Xoá
    </button>
</form>