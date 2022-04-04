jQuery(".convert-to-iframe").each(function() {
    let $this = jQuery(this);
    let $iframe = jQuery(`<iframe width="420" height="315"
src="https://www.youtube.com/embed/${$this.attr("src")}">
</iframe>`);
    $this.replaceWith($iframe);
});