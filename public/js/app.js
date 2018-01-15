(function($) {
    $(function() {
        BGToggle.init($("#AppArea"));
    });

    window.BGToggle = {
        lj_wrapper: null,

        init: function(aj_wrapper) {
            this.lj_wrapper = $(aj_wrapper);
        }
    };
})(jQuery);
