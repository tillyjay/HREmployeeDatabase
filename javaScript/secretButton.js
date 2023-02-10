
// Bean button function to launch iframe

$(function(){
    $('#beanButton').click(function(){
        if(!$('#iframe').length) {
            $('#iframeHolder').html('<iframe id="iframe" src="https://www.youtube.com/embed/9UsHDwOVk2A" width="1000" height="750" allowfullscreen></iframe>');
        }
    });
});