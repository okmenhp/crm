$('.type-edit').click(function(){
    var id = $(this).data('id')
    $.ajax({
        url: "/api/calendar/type/edit",
        type: "GET",
        data: {id},
        success: function(data){
            $('#type-id').val(data.data.id)
            $('#type-name').val(data.data.name)
        }
    })
})

$('.meeting-edit').click(function(){
    var id = $(this).data('id')
    $.ajax({
        url: "/api/calendar/meeting/edit",
        type: "GET",
        data: {id},
        success: function(data){
            $('#meeting-id').val(data.data.id)
            $('#meeting-name').val(data.data.name)
        }
    })
})