
$('#calendarTypeName').html('Tháng')

var calendar = new tui.Calendar('#calendar', {
    defaultView: 'month',
    taskView: false,
    narrowWeekend: false,
    month: {isAlways6Week: false},
    useDetailPopup: false,
    useCreationPopup: true,
    template: {
        monthDayname: function(dayname) {
            return '<span class="calendar-week-dayname-name">' + dayname.label + '</span>';
        }
    }
});

calendar.createSchedules([
    {
        id: '1',
        calendarId: '1',
        title: 'my schedule',
        category: 'time',
        dueDateClass: '',
        body: 'lksdjfl skdfj sdlfkj flkfj sdlkjsdf',
        raw: {
            hihi: 'hihihihih'
          },
        start: '2022-03-07T22:30:00+09:00',
        end: '2022-03-09T02:30:00+09:00'
    },
    {
        id: '2',
        calendarId: '1',
        title: 'second schedule',
        category: 'time',
        dueDateClass: '',
        start: '2022-03-11T22:30:00+09:00',
        end: '2022-03-15T02:30:00+09:00',
        isReadOnly: true    // schedule is read-only
    }
]);

calendar.on({
    'clickSchedule': function(e) {
        // console.log('clickSchedule', e);
        var modal = $('#calendarModal')
        modal.modal('toggle')
        modal.find('button').html('Lưu')
    },
    // 'beforeCreateSchedule': function(e) {
    //     console.log('beforeCreateSchedule', e);
    //     // open a creation popup
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

$(document).ready(function(){
    var modal = $('#calendarModal')
    modal.modal('show')
})
$('#attendees').on('change', function() {
    var text = $('#attendees option:selected').text()
    var id = this.value
    $('.attendees').append('<a class="attendee-box mr-1" data-attendee-id="'+id+'" data-attendee-name="'+text+'">'+
        '<span>'+text+'</span>'+
        '<button class="border border-0 bg-white" aria-hidden="true">&times;</button>'+
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
})
