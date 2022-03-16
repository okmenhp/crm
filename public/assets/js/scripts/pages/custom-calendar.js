
$('#calendarTypeName').html('Tháng')
$('.warning-text').toggle(false)

// calendar handling - start

var calendar = new tui.Calendar('#calendar', {
    defaultView: 'month',
    taskView: false,
    narrowWeekend: false,
    startDayOfWeek: 1,
    visibleWeeksCount: 3,
    visibleScheduleCount: 4,
    month: {isAlways6Week: false},
    useDetailPopup: true,
    useCreationPopup: false,
    disableClick: true,
    disableDblClick: true,
    week: {
        daynames: ['Chủ nhật','Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7']
    },
    month: {
        daynames: ['Chủ nhật','Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7']
    },
    template: {
        alldayTitle: function(){
            return '<span class="tui-full-calendar-left-content">CẢ NGÀY</span>';
        },
        popupEdit: function() {
            return 'Sửa';
        },
        popupDelete: function() {
            return 'Xóa';
        }
    }
});

calendar.on({
    'beforeUpdateSchedule': function(e) {
        $('#schedule-id').val(e.schedule.raw.schedule_id)
        getDetailSchedule(e.schedule.raw.schedule_id)
        var modal = $('#calendarModal')
        modal.modal('toggle')
        modal.find('button.final-button').html('Lưu')
    },
    'beforeDeleteSchedule': function(e) {
        $('#schedule-id').val(e.schedule.calendarId)
        $('#date-selected').val(e.schedule.start._date)
        if(e.schedule.raw.pattern != 1){
            $('#update-option').modal('show')
        }else{
            deleteSchedule($('#schedule-id').val(), 2)
        }
    }
});

function getDateRangeCalendar(type){
    var data = new FormData();
    if(type == "toggle-monthly"){
        start_date = moment(calendar._renderRange.start._date).format('YYYY/MM/DD h:mm:ss')
        end_date = moment(calendar._renderRange.end._date).format('YYYY/MM/DD h:mm:ss')
        data.append('type', type)
        data.append('start_date', start_date)
        data.append('end_date', end_date)
    }

    return data;
}

function getApi(type){
    $.ajax({
        url: "api/schedule/index",
        type: "POST",
        data: getDateRangeCalendar(type),
        processData: false,
        contentType: false, 
        enctype: 'multipart/form-data',
        success: function(data){
            calendar.createSchedules(data.data)
        }
    })
}

function showData(data){
    //pattern
    $('.day-selection[value='+data.data.pattern+']').prop('checked', true)
    if(data.data.pattern != 1){
        $('#pattern-schedule option[value=2]').prop('selected', true)
        $('.repeat-selection').toggle(true)
        $('.day-selection-option').find('option').remove()
        $('.day-selection-option').append('<option value="all" disabled selected>Chọn</option>')
        $('.repeat-day-selected').html("")
        if(data.data.pattern == 2){
            $('#wday').toggle(true)
            $('#mday').toggle(false)
            for(var i=2; i<=8; i++){
                if(!data.data.wday.includes(i.toString())){
                    if(i==8){
                        $('#wday').append('<option value="'+i+'">CN</option>')
                    }else{
                        $('#wday').append('<option value="'+i+'">Thứ '+i+'</option>')
                    }
                }else{
                    if(i==8){
                        $('.repeat-day-selected').append('<a class="border rounded bg-primary pr-0 day-added" data-day="'+i+'" style="padding: 0.5rem">'+
                                                            '<span class="text-white">CN</span>'+
                                                            '<button class="border border-0 bg-transparent" aria-hidden="true"><span class="text-danger">&times;</span></button>'+
                                                        '</a>')
                    }else{
                        $('.repeat-day-selected').append('<a class="border rounded bg-primary pr-0 day-added" data-day="'+i+'" style="padding: 0.5rem">'+
                                                            '<span class="text-white">Thứ '+i+'</span>'+
                                                            '<button class="border border-0 bg-transparent" aria-hidden="true"><span class="text-danger">&times;</span></button>'+
                                                        '</a>')
                    }
                }
            }
        }else if(data.data.pattern == 2){
            $('#wday').toggle(false)
            $('#mday').toggle(true)
            for(var i=1; i<=31; i++){
                if(!data.data.mday.includes(i.toString())){
                    $('#mday').append('<option value="'+i+'">'+i+'</option>')
                }else{
                    $('.repeat-day-selected').append('<a class="border rounded bg-primary pr-0 day-added" data-day="'+i+'" style="padding: 0.5rem">'+
                                                        '<span class="text-white">'+i+'</span>'+
                                                        '<button class="border border-0 bg-transparent" aria-hidden="true"><span class="text-danger">&times;</span></button>'+
                                                    '</a>')
                }
            }
        }else{
            $('#wday').toggle(false)
            $('#mday').toggle(false)
        }
    }else{
        $('#pattern-schedule option[value=1]').prop('selected', true)
        $('#dayweek').prop('checked', true)
        $('#wday').toggle(true)
        $('#mday').toggle(false)
        $('#wday').find('option').remove()
        $('#mday').find('option').remove()
        addWeekDay()
        addMonthDay()
        $('.repeat-selection').toggle(false)
        $('.repeat-day-selected').html("")
    }
    //title
    $('#title').val(data.data.title)
    //color
    $('#color').data('color', data.data.color.id)
    $('.btn-select-color .color').css('background',data.data.color.value)
    $('.btn-select-color .text').html(data.data.color.name)
    //start date
    $('#start-date').val(data.data.start_date)
    //end date
    $('#end-date').val(data.data.end_date)
    //location
    $('#location').val(data.data.location)
    //meeting
    if(data.data.meeting_id != null){
        $('#meeting-room option[value='+data.data.meeting_id+']').prop('selected', true)
    }
    else{
        $('#meeting-room option[value=""]').prop('selected', true)
    }
    //type
    if(data.data.type_id != null){
        $('#type option[value='+data.data.type_id+']').prop('selected', true)
    }
    else{
        $('#type option[value=0]').prop('selected', true)
    }
    //user
    $('.attendees').html("")
    var user_id = []
    var user_name = []
    if(!jQuery.isEmptyObject(data.data.user_id)){
        var user_id = Object.keys(data.data.user_id).map(function (key) { return data.data.user_id[key]; })
        var user_name = Object.keys(data.data.user_name).map(function (key) { return data.data.user_name[key]; })
    }
    $('#attendees').find('option').remove()
    $('#attendees').append('<option value="all" disabled selected>--Chọn người tham gia--</option>')
    for(var i=0;i<data.data.users.length;i++){
        if(user_id.includes(data.data.users[i].id)){
            $('.attendees').append('<a class="border rounded bg-primary pr-0 attendee-box" style="padding: 0.5rem" data-attendee-id="'+user_id[i]+'" data-attendee-name="'+user_name[i]+'">'+
                                        '<span class="text-white">'+user_name[i]+'</span>'+
                                        '<button class="border border-0 bg-transparent" aria-hidden="true"><span class="text-danger">&times;</span></button>'+
                                    '</a>')
        }else{
            $('#attendees').append('<option value="'+data.data.users[i].id+'">'+data.data.users[i].full_name+'</option>');
        }
    }
    
    //description
    $('#description').val(data.data.description)
    $('#end-date').attr("min", $('#start-date').val())
    $('#start-date').attr("max", $('#end-date').val())
}

function getDetailSchedule(id){
    var data = new FormData();
    data.append('id', id)
    $.ajax({
        url: "api/schedule/detail",
        type: "POST",
        data: data,
        processData: false,
        contentType: false, 
        enctype: 'multipart/form-data',
        success: function(data){
            showData(data)
        }
    })
}

function dataChangeSchedule(action){
    var data = new FormData();
    data.append('date_range', getDateRangeCalendar())
    var pattern = $('#pattern-schedule').val()
    if(pattern != 1){
        pattern = $('input[name=pattern]:checked').val()
        var day_repeat = []
        $('.repeat-day-selected').children().each(function(){
            var wday_val = $(this).data('day')
            day_repeat.push(wday_val)
        })
        data.append('pattern', pattern)
        data.append('day_repeat', day_repeat)
    }else{
        data.append('pattern', pattern)
    }
    var id = $('#schedule-id').val()
    data.append('id', id)
    var title = $('#title').val()
    data.append('title', title)
    var color_id = $('#color').data('color')
    data.append('color_id', color_id)
    var start_date = $('#start-date').val()
    data.append('start_date', start_date)
    var end_date = $('#end-date').val()
    data.append('end_date', end_date)
    var location = $('#location').val()
    data.append('location', location)
    var meeting = $('#meeting-room').val()
    data.append('meeting', meeting)
    var type = $('#type').val()
    data.append('type', type)
    var attendees = []
    $('.attendees').children().each(function(){
        var attendee = $(this).data('attendee-id')
        attendees.push(attendee)
    })
    data.append('attendees', attendees)
    var description = $('#description').val()
    data.append('description', description)
    
    $.ajax({
        url: action == 1 ? "api/schedule/insert" : "api/schedule/update",
        type: "POST",
        data: data,
        processData: false,
        contentType: false, 
        enctype: 'multipart/form-data',
        success: function(data){
            calendar.clear()                
            calendar.createSchedules(data.data)
            swal({
                icon: "success",
                text: action == 1 ? "Thêm mới thành công" : "Chỉnh sửa thành công",
            });
            $('#calendarModal').modal('toggle')
        }
    })
}

function deleteSchedule(id, type){
    var data = new FormData();
    var date_selected = moment($('#date-selected').val()).format('MM/DD/YYYY h:mm:ss');
    data.append('id', id)
    data.append('type', type)
    data.append('date_selected', date_selected)
    $.ajax({
        url: "api/schedule/delete",
        type: "POST",
        data: data,
        processData: false,
        contentType: false, 
        enctype: 'multipart/form-data',
        success: function(data){
            calendar.clear()                
            calendar.createSchedules(data.data)
            swal({
                icon: "success",
                text: "Xóa thành công",
            });
        }
    })
}

function filterSchedule(type){
    $.ajax({
        url: "api/schedule/filter",
        type: "POST",
        data: {type},
        success: function(data){
            calendar.clear()
            calendar.createSchedules(data.data)
        }
    })
}

// lọc lịch theo type
$('input[name="type-schedule"][value=all]').on('change', function(){
    if($(this).prop('checked')){
        $('input[name="type-schedule"]').prop('checked', true)
    }else{
        $('input[name="type-schedule"]').prop('checked', false)
    }
})
$('input[name="type-schedule"]').on('change', function(){
    var type_changed = []
    if($(this).prop('checked')){
        $('input[name="type-schedule"][value=all]').prop('checked', true)
    }
    $('input[name="type-schedule"]:checked').each(function(){
        $(this).val() != "all" ? type_changed.push($(this).val()) : false
    })
    filterSchedule(type_changed)
})
// calendar handling - end

function isFillForm(){
    var title = $('#title').val();
    var start_date = $('#start-date').val();
    var end_date = $('#end-date').val();

    if(title == "" || start_date == "" || end_date == ""){
        swal({
            text: "Vui lòng điền đủ thông tin !",
        });
        return false
    }
    if($('#pattern-schedule').val() != 1 && $('input[name=pattern]:checked').val() != 4){
        var isSelected = $('.repeat-day-selected').children().length
        if(isSelected == 0){
            var pattern = $('input[name=pattern]:checked').val()
            pattern == 2 ? swal({text: "Vui lòng chọn 1 ngày trong tuần !",}) : swal({text: "Vui lòng chọn 1 ngày trong tháng !",});
            return false
        }
    }

    return true
}

$('#btn-new-schedule').click(function(){
    defaultFormInsert()

    var modal = $('#calendarModal')
    modal.modal('toggle')
    modal.find('button.final-button').html('Tạo mới')
})

$('#calendarModal .final-button').click(function(){
    if(isFillForm()){
        $('#schedule-id').val() == "" ? dataChangeSchedule(1) : dataChangeSchedule(2) //action: 1-thêm mới | 2-sửa
    }
})

$('.delete-button').click(function(){
    deleteSchedule($('#schedule-id').val(), $('.delete-type:checked').val())
})

function defaultFormInsert(){
    $.ajax({
        url: "api/schedule/defaultFormInsert",
        type: "POST",
        processData: false,
        contentType: false, 
        enctype: 'multipart/form-data',
        success: function(data){
            $('#schedule-id').val("")
            $('#pattern-schedule').find('option[value=1]').prop('selected', true)
            $('#dayweek').prop('checked', true)
            $('#wday').toggle(true)
            $('#mday').toggle(false)
            $('#wday').find('option').remove()
            $('#mday').find('option').remove()
            addWeekDay()
            addMonthDay()
            $('.repeat-selection').toggle(false)
            $('.repeat-day-selected').html("")
            $('#title').val('')
            //color
            var color = $('.color-select').first()
            $('#color').data('color', color.data('color'))
            $('.btn-select-color .color').css('background', color.find('.color').css('background-color'))
            $('.btn-select-color .text').html(color.find('span').html())
            $('#start-date').val('')
            $('#end-date').val('')
            $('#end-date').attr("min", $('#start-date').val())
            $('#start-date').attr("max", $('#end-date').val())
            $('#location').val('')
            $('#meeting-room').find('option[value=""]').prop('selected',true)
            $('#type').find('option[value=0]').prop('selected',true)
            $('#attendees').find('option').remove()
            $('#attendees').append('<option value="all" disabled selected>--Chọn người tham gia--</option>')
            for(var i=0;i<data.data.length;i++){
                $('#attendees').append('<option value="'+data.data[i].id+'">'+data.data[i].full_name+'</option>')
            }
            $('.attendees').html("")
        }
    })
}

//Thêm ngày trong tuần trong select
function addWeekDay(){
    $('#wday').append('<option value="all" disabled selected>Chọn</option>')
    for(var i=2; i<=8; i++){
        if(i==8){
            $('#wday').append('<option value="'+i+'">CN</option>')
        }else{
            $('#wday').append('<option value="'+i+'">Thứ '+i+'</option>')
        }
    }
}

//Thêm ngày trong tháng trong select
function addMonthDay(){
    $('#mday').append('<option value="all" disabled selected>Chọn</option>')
    for(var i=1; i<=31; i++){
        $('#mday').append('<option value="'+i+'">'+i+'</option>')
    }
}

$(document).ready(function(){
    addWeekDay()
    addMonthDay()
    getApi($('.calendar-view .calendar-action .dropdown-menu .dropdown-item.active').data('action'))
})

//Thay đổi pattern
$('#pattern-schedule').on('change', function(){
    if($(this).val() == 1){
        $('.repeat-selection').toggle(false)
    }else{
        $('.repeat-selection').toggle(true)
    }
})

//Thay đổi kiểu lặp lại
var day_repeat_pattern = true // true: theo ngày trong tuần | false: theo ngày trong tháng
$('.day-selection').on('change', function(){
    $('.day-selection-option').find('option').remove()
    day_repeat_pattern = !day_repeat_pattern
    if($('#dayweek').prop("checked") == true){
        $('#wday').toggle(true)
        $('#mday').toggle(false)
        addWeekDay()
    }else if($('#daymonth').prop("checked") == true){
        $('#wday').toggle(false)
        $('#mday').toggle(true)
        addMonthDay()
    }else{
        $('#wday').toggle(false)
        $('#mday').toggle(false)
    }
    $('.repeat-day-selected').html("")
})

// Thêm|Xóa Thứ|Ngày lặp lại
$('.day-selection-option').on('change', function() {
    var text = $(this).find('option:selected').text();
    var id = this.value
    $('.repeat-day-selected').append('<a class="border rounded bg-primary pr-0 day-added" data-day="'+id+'" style="padding: 0.5rem">'+
                                        '<span class="text-white">'+text+'</span>'+
                                       '<button class="border border-0 bg-transparent" aria-hidden="true"><span class="text-danger">&times;</span></button>'+
                                    '</a>')
    $(this).find('option[value='+this.value+']').remove();
    this.value = "all"
});
$("body").delegate('.day-added button', 'click', function(){
    var father = $(this).parent()
    var value = father.data('attendee-id')
    var name = father.data('attendee-name')
    $('#attendees').append($('<option>', {
        value: value,
        text: name
    }));
    father.remove()
})

// Toggle chọn màu
$('.btn-select-color').click(function(){
    $('.select-color-area').toggle()
    event.stopPropagation();
})
$(document).on("click", function () {
    $(".select-color-area").hide();
});

$('.color-select').click(function(){
    var color = $(this).data('color')
    var name = $(this).find('span').html()

    $('#color').data('color', color)
    $('.btn-select-color .color').css('background-color', $(this).find('.color').css('background-color'))
    $('.btn-select-color .text').html(name)
    $('.select-color-area').toggle()
})

// Toggle loại thời gian
// $('#is-all-day').on('change', function(){
//     if($(this).val() == '1'){
//         $('.date-select').attr('type', 'date')
//     }else{
//         $('.date-select').attr('type', 'datetime-local')
//     }
// })

// Thêm|Xóa người tham gia
$('#attendees').on('change', function() {
    var text = $('#attendees option:selected').text()
    var id = this.value
    $('.attendees').append('<a class="border rounded bg-primary pr-0 attendee-box" style="padding: 0.5rem" data-attendee-id="'+id+'" data-attendee-name="'+text+'">'+
                                '<span class="text-white">'+text+'</span>'+
                                '<button class="border border-0 bg-transparent" aria-hidden="true"><span class="text-danger">&times;</span></button>'+
                            '</a>')
    $("#attendees option[value='"+this.value+"']").remove();
    this.value = "all"
});
$("body").delegate('.attendee-box button', 'click', function(){
    var father = $(this).parent()
    var value = father.data('attendee-id')
    var name = father.data('attendee-name')
    $('#attendees').append($('<option>', {
        value: value,
        text: name
    }));
    father.remove()
})

// đặt thời gian bắt đầu - kết thúc
$( document ).ready(function() {
    $('#start-date').on('change', function(){
        $('#end-date').attr("min", $(this).val())
    })
    $('#end-date').on('change', function(){
        $('#start-date').attr("max", $(this).val())
    })
})


//Thay đổi kiểu hiển thị của lịch
$(document).ready(function(){
    $('.current-day').html(moment(calendar._renderDate._date).format('M - YYYY'))
})
$('#move-today').click(function(){
    calendar.today();
    calendar.changeView('day', true);
    $('#calendarTypeName').html('Ngày')
    $('.calendar-view .calendar-action .dropdown-menu .dropdown-item.active').toggleClass('active')
    $('#toggle-daily').toggleClass('active')

})
$('#move-prev').click(function(){
    calendar.prev();
    $('.current-day').html(moment(calendar._renderDate._date).format('M - YYYY'))
})
$('#move-next').click(function(){
    calendar.next();
    $('.current-day').html(moment(calendar._renderDate._date).format('M - YYYY'))
})
$('.calendar-view .calendar-action .dropdown-menu .dropdown-item').click(function(){
    $('.calendar-view .calendar-action .dropdown-menu .dropdown-item.active').toggleClass('active')
    $(this).toggleClass('active')
    if($(this).data('action') == 'toggle-daily'){ // daily view
        $('#calendarTypeName').html('Ngày')
        calendar.changeView('day', true);
    }else if($(this).data('action') == 'toggle-weekly'){ // weekly view
        $('#calendarTypeName').html('Tuần')
        calendar.changeView('week', true);
    }else if($(this).data('action') == 'toggle-monthly'){ // monthly view
        $('#calendarTypeName').html('Tháng')
        calendar.changeView('month', true);
    }
    // else if($(this).data('action') == 'toggle-weeks2'){ // 2 week view
    //     $('#calendarTypeName').html('2 Tuần')
    //     calendar.setOptions({month: {visibleWeeksCount: 2}}, true);
    //     calendar.changeView('month', true);
    // }else if($(this).data('action') == 'toggle-weeks3'){ // 3 week view
    //     $('#calendarTypeName').html('3 Tuần')
    //     calendar.setOptions({month: {visibleWeeksCount: 3}}, true);
    //     calendar.changeView('month', true);
    // }
    // getApi($(this).data('action'))
})
