$('.type-edit').click(function(){
    var id = $(this).data('id')
    $.ajax({
        url: "/api/calendar/type/edit",
        type: "GET",
        data: {id},
        success: function(data){
            $('#type-id').val(data.data.id)
            $('#type-name').val(data.data.name)
            console.log($('#type-name').val())
        }
    })
})