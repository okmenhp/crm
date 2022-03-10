
$('#calendarTypeName').html('Tháng')
$('.warning-text').toggle(false)

// calendar handling - start

var calendar = new tui.Calendar('#calendar', {
    defaultView: 'month',
    taskView: true,
    narrowWeekend: false,
    startDayOfWeek: 1,
    visibleWeeksCount: 3,
    visibleScheduleCount: 4,
    month: {isAlways6Week: false},
    useDetailPopup: false,
    useCreationPopup: false,
    template: {
        monthDayname: function(dayname) {
            return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>';
        }
    }
});

calendar.on({
    // open a detail popup
    'clickSchedule': function(e) {
        console.log('clickSchedule', e);
        getDetailSchedule(e.schedule.raw.schedule_id)
        var modal = $('#calendarModal')
        modal.modal('toggle')
        modal.find('button.final-button').html('Lưu')
    },
    // open a creation popup
    // 'beforeCreateSchedule': function(e) {
    //     console.log('beforeCreateSchedule', e);
    //     var modal = $('#calendarModal')
    //     modal.modal('toggle')
    //     modal.find('button.final-button').html('Tạo mới')
    // },
    // 'beforeUpdateSchedule': function(e) {
    //     console.log('beforeUpdateSchedule', e);
    //     e.schedule.start = e.start;
    //     e.schedule.end = e.end;
    //     cal.updateSchedule(e.schedule.id, e.schedule.calendarId, e.schedule);
    // },
    // 'beforeDeleteSchedule': function(e) {
    //     console.log('beforeDeleteSchedule', e);
    //     cal.deleteSchedule(e.schedule.id, e.schedule.calendarId);
    // }
});

function getApi(type){
    var data = new FormData();
    if(type == "toggle-monthly"){
        start_date = moment(calendar._renderRange.start._date).format('YYYY/MM/DD h:mm:ss')
        end_date = moment(calendar._renderRange.end._date).format('YYYY/MM/DD h:mm:ss')
        data.append('type', type)
        data.append('start_date', start_date)
        data.append('end_date', end_date)
    }
    
    $.ajax({
        url: "api/schedule/index",
        type: "POST",
        data: data,
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
    $('#pattern-schedule option[value='+data.data.pattern+']').prop('selected', true)
    $('.day-selection[value='+data.data.pattern+']').prop('checked', true)
    if(data.data.pattern != 1){
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
        }else{
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
        }
    }else{
        $('.repeat-selection').toggle(false)
    }
    //title
    $('#title').val(data.data.title)
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
        $('#meeting-room option[value=all]').prop('selected', true)
    }
    //type
    if(data.data.type_id != null){
        $('#type option[value='+data.data.type_id+']').prop('selected', true)
    }
    else{
        $('#type option[value=all]').prop('selected', true)
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

function checkFillForm(){
    var title = $('#title').val();

    if(title == ""){
        return false
    }

    return true
}

// calendar handling - end

// $('#start-date').on('change',function(){
//     console.log($(this).val())
// })

$('#btn-new-schedule').click(function(){
    defaultFormInsert()
    var modal = $('#calendarModal')
    modal.modal('toggle')
    modal.find('button.final-button').html('Tạo mới')
})

function defaultFormInsert(){
    $.ajax({
        url: "api/schedule/defaultFormInsert",
        type: "POST",
        // data: data,
        processData: false,
        contentType: false, 
        enctype: 'multipart/form-data',
        success: function(data){
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
            $('#start-date').val('')
            $('#end-date').val('')
            $('#location').val('')
            $('#meeting-room').find('option[value=all]').prop('selected',true)
            $('#type').find('option[value=all]').prop('selected',true)
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
    }else{
        $('#wday').toggle(false)
        $('#mday').toggle(true)
        addMonthDay()
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

//Thay đổi kiểu hiển thị của lịch
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
    }else if($(this).data('action') == 'toggle-weeks2'){ // 2 week view
        $('#calendarTypeName').html('2 Tuần')
        calendar.setOptions({month: {visibleWeeksCount: 2}}, true);
        calendar.changeView('month', true);
    }else if($(this).data('action') == 'toggle-weeks3'){ // 3 week view
        $('#calendarTypeName').html('3 Tuần')
        calendar.setOptions({month: {visibleWeeksCount: 3}}, true);
        calendar.changeView('month', true);
    }
    // getApi($(this).data('action'))
})
