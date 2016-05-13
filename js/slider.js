 $(window).load(function () {
            setTimeout(function () {
                $('#slider').nivoslider({
                    effect: 'fade,fold', //Specify sets like: 'fold,fade'
                    slices: 15,
                    animSpeed: 500, //Slide transition speed
                    pauseTime: 3000,
                    startSlide: 0, //Set starting Slide (0 index)
                    directionNav: true, //Next & Prev
                    directionNavHide: true, //Only show on hover
                    controlNav: true, //1,2,3...
                    controlNavThumbs: true, //Use thumbnails for Control Nav
                    controlNavThumbsFromRel: false, //Use image rel for thumbs
                    controlNavThumbsSearch: '.jpg', //Replace this with...
                    controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
                    keyboardNav: true, //Use left & right arrows
                    pauseOnHover: false, //Stop animation while hovering
                    manualAdvance: false, //Force manual transitions
                    captionOpacity: 0.8, //Universal caption opacity
                    beforeChange: function () { },
                    afterChange: function () { },
                    slideshowEnd: function () { } //Triggers after all slides have been shown
                });
            }, 1000);
        });