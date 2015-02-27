(function($){
    var helpBlocks = [];
        helpBlocks['youtube'] = 'Вставлять код выделленый жирным http://www.youtube.com/watch?v=<b>qlLolGuqo9o</b>';
        helpBlocks['vimeo'] = 'Вставлять код выделленый жирным http://vimeo.com/ondemand/plasticgalaxy/<b>106019009</b>';
    $(function() {
        // показываем нужные хостинги при загрузке
       $('.video_hosting option:selected').each(function(index, element) {
            var $this = $(element),
                parentBlock = $this.parents('.remote-wrapper'),
                helpContainer = $('.remote-video-help', parentBlock),
                videoContainer;
            videoContainer = $(('.remote-video-container.' + $this.data('name')), parentBlock);
            videoContainer.removeClass('hidden');
            helpContainer.html(helpBlocks[$this.data('name')]);

       });

       // сменили код видео
       $('body').on('change', '.remote_code', function() {
            var $this = $(this),
                parentBlock = $this.parents('.remote-wrapper'),
                remoteCodeArr = [],
                videoHosting = $('.video_hosting  option:selected', parentBlock),
                videoContainer;
            if (!videoHosting.val()) {
                return false;
            }
            videoContainer = $(('.remote-video-container.' + videoHosting.data('name')), parentBlock);
            remoteCodeArr = videoContainer.attr('src').split('/');
            remoteCodeArr[(remoteCodeArr.length - 1)] = $this.val();
            videoContainer.attr('src', remoteCodeArr.join('/'));
       });

       // сменили видео-хостинг
       $('body').on('change', '.video_hosting', function() {
            var $this = $(this),
                selectedElt = $('option:selected', $this),
                parentBlock = $this.parents('.remote-wrapper'),
                remoteCode = $('.remote_code', parentBlock),
                sameClass = $('.remote-video-container', parentBlock),
                helpContainer = $('.remote-video-help', parentBlock),
                remoteCodeArr = [],
                videoContainer;
            if (!selectedElt.val()) {
                helpContainer.html('');
                return false;
            }
            helpContainer.html(helpBlocks[selectedElt.data('name')]);
            videoContainer = $(('.remote-video-container.' + selectedElt.data('name')), parentBlock);
            sameClass.addClass('hidden');
            if (remoteCode.val()) {
                remoteCodeArr = videoContainer.attr('src').split('/');
                remoteCodeArr[(remoteCodeArr.length - 1)] = remoteCode.val();
                videoContainer.attr('src', remoteCodeArr.join('/'));
            }
            videoContainer.removeClass('hidden');
       });
    });
})(jQuery)