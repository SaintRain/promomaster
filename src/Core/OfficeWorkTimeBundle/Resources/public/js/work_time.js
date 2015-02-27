(function($){
    $(function(){
        updateTime();
    });
    
    /**
     * Обновление статуса работы офиса
     * @returns {void}
     */
    var updateTime = function() {
        var timeBlock = $('.office-work'),
            timeBlockText = timeBlock.text();    
            isWeekend = timeBlock.data('weekend'),
            curTime = (isWeekend) ? 0 : timeBlock.data('now'),
            startTime = (isWeekend) ? 0 : timeBlock.data('start'),
            endTime = (isWeekend) ? 0 : timeBlock.data('end');
            var counter = 0;
        if (curTime) {
            setInterval(function(){
                curTime += 60;
                if (curTime < startTime || curTime > endTime) {
                    if (timeBlockText != settingsJS.trans['msg_not_work_time']) {
                        timeBlock.addClass('close');
                        timeBlock.text(settingsJS.trans['msg_not_work_time']);
                    }
                } else if (((endTime - curTime) < 60 * 60) && ((endTime - curTime) > 0)) {
                    timeBlock.text(settingsJS.trans['msg_time_till_close_start'] + ((endTime - curTime)/60) + settingsJS.trans['msg_time_till_close_end']);
                } else {
                    if (timeBlockText != settingsJS.trans['msg_work_time']) {
                        timeBlock.text(settingsJS.trans['msg_work_time']);
                        timeBlock.removeClass('close');
                    }
                }
            }, 60000);
        }
    }
})(jQuery)