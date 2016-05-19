(function() {
    //Grab latest comic from xkcd and pull up the image url and title
    $.ajax({
        url: "http://dynamic.xkcd.com/api-0/jsonp/comic?callback=?",
        type: "GET",
        dataType: "JSON",
        cache: false,
        success: function(data) {
            var img = data.img;
            var alt = data.alt;
            var title = data.title;
            var html = "<h3 class = 'center-block'>" + title + "</h3>" + "<img class='img-centered' src='" + img + "' alt='" +
                title + "' title='" + alt + "'/>";
            $(".something-funny").html(html);
        },
        error: function() {
            var html = "<h4 class = 'center-block'>Something funny should be here</h4>";
            $(".something-funny").html(html);
        },
    });
})();
