 $('.app-file-info').on('dblclick', function(e){
     window.location = "/file/" + $(this).data('uid'); 
 });


 //radio button share
 $('.form-check-input').on('click',function(){
    let type = $(this).data('type');
    if(type == 1) {
    	$('#flexRadio1').prop("checked", true);
    	$('.share_option').show();
    }else if(type == 2) {
        $('#flexRadio2').prop("checked", true);
        $('.share_option').hide();
    }
    else {
        $('#flexRadio3').prop("checked", true);
        $('.share_option').hide();
    }
    // $.ajax({
    //     url: '/api/',
    //     type: 'POST',
    //     dataType: 'json',
    //     data: {
    //         type : type,
    //     }
    // }).done(function(resp) {
    //     $('#noidung').html(ketqua);
    // });
 });
 
 //Modal share
 $('.modal-share-file').on('click', function(){
    let type = $(this).data('share');
    let id = $(this).data('id');
    let share_type = $(this).data('share_type');
    let baseUrl = window.location.origin;
    $('.share_type').attr("value", share_type);
    $('.form-share').attr("action", baseUrl+"/file/share/"+id);
    if(type == 1) {
    	$('#flexRadio1').prop("checked", true);
    	$('.share_option').show();
        load_share_for(id);
    }
    else if(type == 2) {
        $('#flexRadio2').prop("checked", true);
        $('.share_option').hide();
    }
    else {
        $('#flexRadio3').prop("checked", true);
        $('.share_option').hide();
    }
 });

 //share type (employee - department)
 $('.share-type-tab').on('click', function(){
     let share_type = $(this).data('share_type');
     $('.share_type').attr("value", share_type);
 });

 //select 
 function load_share_for(id){
    $.ajax({
        url: '/api/file/load-share-for/' + id,
        type: 'get',
        data: {
        }
    }).done(function(resp) {
        $('#user_select').html(resp.user_html);
        $('#department_select').html(resp.department_html);
        if(resp.share_type == 1){
            $("#left-icon-li1").addClass('active');
            $("#left-icon-li2").removeClass('active');
            $("#left-icon-tab1").addClass('show active');
            $("#left-icon-tab2").removeClass('show active')

        }else{
            $("#left-icon-li1").removeClass('active');
            $("#left-icon-li2").addClass('active');
            $("#left-icon-tab2").addClass('show active');
            $("#left-icon-tab1").removeClass('show active')
        }
    });
 }

 //info file
 $('.modal-info-file').on('click', function(){
     let id = $(this).data('id');
     modal_info_file(id);
 });

 function modal_info_file(id){
    $.ajax({
        url: '/api/file/info/' + id,
        type: 'get',
        data: {
        }
    }).done(function(resp) {
        if(resp.data.type == 1){
            $('#file_type').html('Folder');
            $('#file_size').html('0');
        }else{
            $('#file_type').html(resp.data.format);
            if(resp.data.size < 1000000){
                $('#file_size').html(resp.data.size/1000 +"kb");
            }else{
                $('#file_size').html(resp.data.size/1000 +"mb");
            }
        }
        $('#file_owl').html(resp.data.file_own);
        $('#file_date').html(resp.data.created_at);
        if(resp.data.status == 0){
            $('#file_status').html("Ẩn");
        }else if(resp.data.status == 1){
            $('#file_status').html("Hoạt động");
        }
        else{
            $('#file_status').html("Xoá tạm");
        }
        if(resp.data.share == 1){
            $('#file_share').html("Riêng tư");
        }else if(resp.data.status == 2){
            $('#file_share').html("Chỉ mình tôi");
        }
        else{
            $('#file_share').html("Công khai");
        }
    });
 }

 //view file
  $('.modal-view-file').on('click', function(){
     let id = $(this).data('id');
     modal_view_file(id);
 });

  function modal_view_file(id){
    $.ajax({
        url: '/api/file/info/' + id,
        type: 'get',
        data: {
        }
    }).done(function(resp) {
        if(resp.data.type == 1){
            $('#file_type').html('Folder');
            $('#file_size').html('0');
        }else{
            $('#file_type').html(resp.data.format);
            if(resp.data.size < 1000000){
                $('#file_size').html(resp.data.size/1000 +"kb");
            }else{
                $('#file_size').html(resp.data.size/1000 +"mb");
            }
        }
        $('#file_owl').html(resp.data.file_own);
        $('#file_date').html(resp.data.created_at);
        if(resp.data.status == 0){
            $('#file_status').html("Ẩn");
        }else if(resp.data.status == 1){
            $('#file_status').html("Hoạt động");
        }
        else{
            $('#file_status').html("Xoá tạm");
        }
        if(resp.data.share == 1){
            $('#file_share').html("Riêng tư");
        }else if(resp.data.status == 2){
            $('#file_share').html("Chỉ mình tôi");
        }
        else{
            $('#file_share').html("Công khai");
        }
    });
 }
