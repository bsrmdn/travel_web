function checkSchedule() {

    let scheduleRows = document.getElementsByClassName('schedule-row');

    for (let i = 0; i < scheduleRows.length; i++) {
        let startTime = scheduleRows[i].getElementsByClassName('start-time')[0].innerText;
        // console.log(`${startTime.trim()}:00`, '>=', currentTime(), ':', `${startTime.trim()}:00` >= currentTime());
        // console.log(startTime, ' >= ', currentTime(false), ': ', startTime <= currentTime(false));                                                                           
        // let endTime = scheduleRows[i].getElementsByClassName('end-time')[0].innerText;

        if (`${startTime.trim()}:00` >= currentTime() /*&& currentTime() <= endTime*/) {
            scheduleRows[i].classList.remove('d-none');
        } else {
            scheduleRows[i].classList.add('d-none');
        }
    }
}
setInterval(checkSchedule, 1000);