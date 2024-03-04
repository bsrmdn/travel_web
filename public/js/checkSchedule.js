function checkSchedule() {

    let scheduleRows = document.getElementsByClassName('schedule-row');

    for (let i = 0; i < scheduleRows.length; i++) {
        let startTime = scheduleRows[i].getElementsByClassName('start-time')[0].innerText;
        // let endTime = scheduleRows[i].getElementsByClassName('end-time')[0].innerText;

        if (startTime <= currentTime() /*&& currentTime() <= endTime*/) {
            scheduleRows[i].classList.remove('d-none');
        } else {
            scheduleRows[i].classList.add('d-none');
        }
    }
}
setInterval(checkSchedule, 1000);