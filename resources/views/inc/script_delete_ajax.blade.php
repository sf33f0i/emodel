<script>
    $('#form_delete').on('submit',function(event){
        event.preventDefault();

        let componentId = $('#componentId').val();

        $.ajax({
            url: "{{route('product_detach_component', $product->id)}}",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                name:componentId,
            },
            success:function(answer){
               
            },
        });
    });
</script>
