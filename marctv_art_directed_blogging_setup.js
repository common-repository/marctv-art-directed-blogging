(function ($) {
    $(document).ready(function($) {

        $('body').addClass('js');

        $('body.artdirected #navigation > ul, body.artdirected #nav > ul').append('<li id="switch_style"><a href="#" title="Art Directed Blogging on/off"><span class="dashicons dashicons-no"></span></a></li>');

        $('.artdirected #switch_style a').bind('click', function() {
            
            $('body').toggleClass('artdirected');
            
            if($('body').hasClass('artdirected')){
                $('#switch_style a').html('<span class="dashicons dashicons-no"></span>');
            }else{
                $('#switch_style a').html('<span class="dashicons dashicons-heart"></span>');
            }
        });

    });
})(jQuery);