jQuery('.button-plus').click(function(){
    var currentval = parseInt(jQuery(this).prev().val(), 10);
        if (!isNaN(currentval)) {
            jQuery(this).prev().val(currentval + 1);
            }else {
            jQuery(this).prev().val(0);
                }
                    });
                    
jQuery('.button-minus').click(function(){
    var currentval = parseInt(jQuery(this).next().val(), 10);
        if (!isNaN(currentval) && currentval > 0) {
            jQuery(this).next().val(currentval - 1);
                }else {
                    jQuery(this).next().val(0);
                    }
                });    