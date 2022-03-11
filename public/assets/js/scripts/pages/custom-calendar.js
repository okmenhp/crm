
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
    useDetailPopup: false,
    useCreationPopup: false,
});

var global_data = []

calendar.on({
    // open a detail popup
    'clickSchedule': function(e) {
        console.log('clickSchedule', e);
        $('#schedule-id').val(e.schedule.raw.schedule_id)
        getDetailSchedule(e.schedule.raw.schedule_id)
        var modal = $('#calendarModal')
        modal.modal('toggle')
        modal.find('button.final-button').html('Lưu')
        modal.find('button.delete-button').toggle(true)
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
            global_data.push(data.data)
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
        $('#type option[value=""]').prop('selected', true)
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
            console.log(data.pattern + ", " + data.old_pattern)
            if(action == 1){
                calendar.createSchedules([data.data])
                global_data.push(data.data)
            }else{
                if(data.pattern == 1 && data.old_pattern == 1){ // thông thường -> thông thường
                    calendar.updateSchedule("1", data.data.calendarId, data.data);
                }else if(data.pattern != 1  && data.old_pattern == 1){ // thông thường -> lặp lại
                    calendar.deleteSchedule("1", parseInt(id));
                    for(var i=0; i<global_data[0].length; i++){
                        if(global_data[0][i].calendarId == id){
                            global_data[0].splice(i, 1)
                        }
                    }
                    calendar.createSchedules(data.data)
                }else if(data.pattern == 1  && data.old_pattern != 1){ // lặp lại -> thông thường
                    for(var i=0; i<global_data[0].length; i++){
                        if(global_data[0][i].calendarId == id){
                            calendar.deleteSchedule("1", parseInt(id));
                            global_data[0].splice(i, 1)
                        }
                    }
                    console.log("333333333333333333")
                    global_data[0].push(data.data)
                    calendar.createSchedules([data.data])
                }else{ // lặp lại -> lặp lại
                    // for(var i=0; i<global_data[0].length; i++){
                    //     if(global_data[0][i].calendarId == id){
                    //         calendar.deleteSchedule("1", parseInt(id));
                    //         global_data[0].splice(i, 1)
                    //         calendar.updateSchedule("1", data.data.calendarId, data.data);
                    //     }
                    // }
                    global_data[0] = global_data[0].concat(data.data)
                    console.log("4444444444444444")
                }
            }
            swal({
                icon: "success",
                text: action == 1 ? "Thêm mới thành công" : "Chỉnh sửa thành công",
            });
            $('#calendarModal').modal('toggle')
        }
    })
}

function deleteSchedule(id){
    $.ajax({
        url: "api/schedule/delete",
        type: "POST",
        data: {id},
        success: function(){
            calendar.deleteSchedule("1", parseInt(id));
            swal({
                icon: "success",
                text: "Xóa thành công",
            });
            $('#calendarModal').modal('toggle')
        }
    })
}

// calendar handling - end

// $('#start-date').on('change',function(){
//     console.log($(this).val())
// })

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
    if($('#pattern-schedule').val() != 1){
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
    // defaultFormInsert()
    // $('#schedule-id').val("")
    // var modal = $('#calendarModal')
    // modal.modal('toggle')
    // modal.find('button.final-button').html('Tạo mới')
    // modal.find('button.delete-button').toggle(false)
    console.log(global_data)
    // global_data[0].splice(7, 1)
    // global_data[0].push({
    //     id: '1',
    //     calendarId: '1',
    //     title: 'my schedule',
    //     category: 'time',
    //     dueDateClass: '',
    //     start: '2018-01-18T22:30:00+09:00',
    //     end: '2018-01-19T02:30:00+09:00'
    // })
    global_data[0][0] = {
        id: '1',
        calendarId: '1',
        title: 'my schedule',
        category: 'time',
        dueDateClass: '',
        start: '2018-01-18T22:30:00+09:00',
        end: '2018-01-19T02:30:00+09:00'
    }
    console.log(global_data)
})

$('#calendarModal .final-button').click(function(){
    if(isFillForm()){
        $('#schedule-id').val() == "" ? dataChangeSchedule(1) : dataChangeSchedule(2) //action: 1-thêm mới | 2-sửa
    }
})

$('#calendarModal .delete-button').click(function(){
    deleteSchedule($('#schedule-id').val())
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
            $('#meeting-room').find('option[value=""]').prop('selected',true)
            $('#type').find('option[value=""]').prop('selected',true)
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
