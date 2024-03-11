function checkSchedule() {

    let scheduleRows = document.getElementsByClassName('schedule-row');

    for (let i = 0; i < scheduleRows.length; i++) {
        let startTime = scheduleRows[i].getElementsByClassName('start-time')[0].innerText;
        // console.log(addTimes(startTime, '00:30'), '+', currentTime(), ':', addTimes(startTime, '00:30') >= currentTime());
        // console.log(startTime, ' >= ', currentTime(false), ': ', startTime <= currentTime(false));                                                                           
        // let endTime = scheduleRows[i].getElementsByClassName('end-time')[0].innerText;

        if (addTimes(startTime, '00:30') >= currentTime() /*&& currentTime() <= endTime*/) {
            scheduleRows[i].classList.remove('d-none');
        } else {
            scheduleRows[i].classList.add('d-none');
        }
    }
}
setInterval(checkSchedule, 1000);

function addTimes(startTime, endTime) {
    var times = [0, 0, 0]
    var max = times.length

    var a = (startTime || '').split(':')
    var b = (endTime || '').split(':')

    // normalize time values
    for (var i = 0; i < max; i++) {
        a[i] = isNaN(parseInt(a[i])) ? 0 : parseInt(a[i])
        b[i] = isNaN(parseInt(b[i])) ? 0 : parseInt(b[i])
    }

    // store time values
    for (var i = 0; i < max; i++) {
        times[i] = a[i] + b[i]
    }

    var hours = times[0]
    var minutes = times[1]
    var seconds = times[2]

    if (seconds >= 60) {
        var m = (seconds / 60) << 0
        minutes += m
        seconds -= 60 * m
    }

    if (minutes >= 60) {
        var h = (minutes / 60) << 0
        hours += h
        minutes -= 60 * h
    }

    return ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2) + ':' + ('0' + seconds).slice(-2)
}