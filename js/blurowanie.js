function blurowanie() {
            var content = document.getElementById('content').style;
            var loading = document.getElementById('loading').style;

            loading.opacity = "1";

            loading.display = "flex";

            content.backdropFilter = "blur(8px)";

            content.filter = "blur(8px)";
            
            content.pointerEvents = "none";
}

window.addEventListener("pageshow", function() {
            var content = document.getElementById('content').style;
            var loading = document.getElementById('loading').style;
    
            content.backdropFilter = "blur(0)";
            
            content.filter = "blur(0)";
            
            loading.opacity = "0";

            loading.display = "none";

            content.pointerEvents = "auto";
             let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
                bannerNode.parentNode.removeChild(bannerNode);
}, false);

window.onbeforeunload = function (e) {
    var e = e || window.event;

    if (e) {
        blurowanie();
    }
};