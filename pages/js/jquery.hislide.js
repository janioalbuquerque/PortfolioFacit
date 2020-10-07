(function($) {

    var slide = function(ele, options) {
        var $ele = $(ele);

        var setting = {

            speed: 2000,

            interval: 4000,

        };

        $.extend(true, setting, options);

        var states = [
            { $zIndex: 1, width: 120, height: 150, top: 169, left: 30, $opacity: 0.2 },
            { $zIndex: 2, width: 130, height: 170, top: 159, left: 0, $opacity: 0.4 },
            { $zIndex: 3, width: 170, height: 218, top: 135, left: 110, $opacity: 0.7 },
            { $zIndex: 4, width: 600, height: 500, top: 100, left: 80, $opacity: 1 },
            { $zIndex: 3, width: 170, height: 218, top: 135, left: 470, $opacity: 0.7 },
            { $zIndex: 2, width: 130, height: 170, top: 159, left: 620, $opacity: 0.4 },
            { $zIndex: 1, width: 120, height: 150, top: 169, left: 500, $opacity: 0.2 }
        ];

        var $lis = $ele.find('li');
        var timer = null;


        $ele.find('.hi-next').on('click', function() {
            next();
        });
        $ele.find('.hi-prev').on('click', function() {
            states.push(states.shift());
            move();
        });
        $ele.on('mouseenter', function() {
            clearInterval(timer);
            timer = null;
        }).on('mouseleave', function() {
            autoPlay();
        });

        move();
        autoPlay();


        function move() {
            $lis.each(function(index, element) {
                var state = states[index];
                $(element).css('zIndex', state.$zIndex).finish().animate(state, setting.speed).find('img').css('opacity', state.$opacity);
            });
        }


        function next() {

            states.unshift(states.pop());
            move();
        }

        function autoPlay() {
            timer = setInterval(next, setting.interval);
        }
    }

    $.fn.hiSlide = function(options) {
        $(this).each(function(index, ele) {
            slide(ele, options);
        });

        return this;
    }
})(jQuery);