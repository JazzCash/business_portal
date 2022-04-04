let $ul = jQuery(".jazz-module").parent();
let $otherLis = $ul.find("li:gt(5)");
let $showMore = jQuery("<li data-action='show-more'class='test'>Show More</li>")
$ul.append($showMore);
$otherLis.hide();
$showMore.on('click', function() {
    if ($showMore.attr("data-action") == "show-more") {
        $otherLis.show();
        $showMore.attr("data-action", "show-less");
        $showMore.text("Show Less");
    } else {
        $otherLis.hide();
        $showMore.attr("data-action", "show-more");
        $showMore.text("Show More");
    }
})