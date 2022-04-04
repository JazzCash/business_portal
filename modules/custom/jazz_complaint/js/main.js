jQuery(".complaint-actions-container").each(function(){
    let $this = jQuery(this);
    let $actions = $this.find(".actions");
    let $action = $this.find(".actions-toggle");
    $action.on('click', function(){
        $actions.toggle();
    })
})