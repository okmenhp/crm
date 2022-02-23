 $('.app-file-info').on('dblclick', function(e){
     window.location = "/file/" + $(this).data('uid'); 
 });

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

 $('.modal-share-file').on('click', function(){
    let type = $(this).data('share');
    let id = $(this).data('id');
    let baseUrl = window.location.origin;
    $('.form-share').attr("action", baseUrl+"/file/share/"+id);
    if(type == 1) {
    	$('#flexRadio1').prop("checked", true);
    	$('.share_option').show();
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