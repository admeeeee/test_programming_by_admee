@extends('product.layout')
@section('content')
<div style="width:10%" class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}"><i class="fas fa-plus"></i> Add new</a>
            </div>
<div class="card-body table-responsive p-0" style="height: 350px;">
    <table id="tableprdt" class="table table-sm table-head-fixed text-nowrap">
        
        <thead>
            <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>PRICE</th>
                <th>DESC</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->title }}</td>
                <td>{{ $list->price }}</td>
                <td>{{ $list->desc }}</td>
                <td><button type="button" class="btn btn-secondary btn_edit"><i class="fas fa-pen"></i></button>
                <button type="button" class="btn btn-secondary deleteBtn"><i class="fas fa-trash"></i></button></td>
            </tr>
            
        @endforeach
        </tbody>
    </table>
</div>


<!-- MODAL EDIT -->
<div class="modal fade editTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <form action="<?= route('update.product.details') ?>" method="post" id="update-task-form">
                    @csrf
                     <!-- <input type="hidden" name="task_id"> -->
                     <div class="form-group">
                         <label for="">ID</label>
                         <input type="text" class="form-control" name="id" placeholder="">
                         <span class="text-danger error-text task_name_error"></span>
                     </div>
                     <div class="form-group">
                         <label for="">TITLE</label>
                         <input type="text" class="form-control" name="title" placeholder="">
                         <span class="text-danger error-text task_name_error"></span>
                     </div>
                     <div class="form-group">
                         <label for="">PRICE</label>
                         <input type="text" class="form-control" name="price" placeholder="">
                         <span class="text-danger error-text task_name_error"></span>
                     </div>
                     <div class="form-group">
                         <textarea class="form-control" name="desc" style="height:100px;resize:none;"></textarea>
                         <span class="text-danger error-text task_desc_error"></span>
                     </div>
                     <div class="form-group">
                         <button type="submit" class="btn btn-block btn-success">Save Changes</button>
                     </div>
                 </form>
                

            </div>
        </div>
    </div>
</div>
@section('script')
<script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

$("#tableprdt").on('click','.btn_edit', function(){
    // alert('id');
    var id = $(this).parent().siblings(':eq(0)').html();
    alert(id);
    // $('.editCountry').find('form')[0].reset();
    // $('.editCountry').find('span.error-text').text('');
    $.post('<?= route("get.product.details") ?>',{id:id}, function(data){
        $('.editTask').find('input[name="id"]').val(data.details.id);
        $('.editTask').find('textarea[name="desc"]').val(data.details.desc);
        $('.editTask').find('input[name="price"]').val(data.details.price);
        $('.editTask').find('input[name="title"]').val(data.details.title);
        $('.editTask').modal('show');
        
    },'json');
});
//DELETE TASK RECORD
$(document).on('click','.deleteBtn', function(){
    var id = $(this).parent().siblings(':eq(0)').html();
    var url = '<?= route("delete.product") ?>';

    swal.fire({
            title:'Are you sure?',
            html:'You want to <b>delete</b> this Task',
            showCancelButton:true,
            showCloseButton:true,
            cancelButtonText:'Cancel',
            confirmButtonText:'Yes, Delete',
            cancelButtonColor:'#d33',
            confirmButtonColor:'#556ee6',
            width:300,
            allowOutsideClick:false
    }).then(function(result){
            if(result.value){
                $.post(url,{id:id}, function(data){
                    if(data.code == 1){
                        toastr.success(data.msg);
                        window.location.href = "{{ route('product.index') }}";
                    }else{
                        toastr.error(data.msg);
                    }
                },'json');
            }
    });

});

</script>
@endsection