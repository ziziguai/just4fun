/* 扩展Bootstrap V2 的JS组件 */
define(['bootstrap'], function(){
    /**
     * @desc 改进bootstrap modal的呈现
     * @author Weixun Luo
     * @date 2015-05-29
     */
    !function($) {
        $(document).on('show', '.modal.fix', function() {
            var self = $(this);
            // 修复定位居中问题
            winHeight = $(window).height();
            top = self[0].offsetLeft;
            fixedWidth = -(self.width() / 2);
            fixedHeight = -(self.height() / 2) + (winHeight / 2 - top);
            $(this).css({
                'margin-left': fixedWidth,
                'margin-top': fixedHeight
            });
        });
    }(window.jQuery);
});