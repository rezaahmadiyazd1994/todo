<script>
$(document).ready(function(){
    $('#save_task').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{route('task.store')}}',
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){

            }
       })
   })
})
</script>
