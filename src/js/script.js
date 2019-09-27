//Functions
import {
    headerAddClassOnScroll,
    backgroundImageParalax,
    addClassToElementOnScroll,
    swiper
} from './modules/functions';

//Slider options
import {
    productsPageSliderOptions
} from './modules/sliderOptions';

(function () {
    /**
     * Add class to header on scroll
     * @src ./modules/functions.js
     */
    headerAddClassOnScroll('.site-header', 'site-header--small', 200);

    /**
     * Add parallax effect to background image
     * @src ./modules/functions.js
     */
    backgroundImageParalax('.home--hero-image', 0.666666);

    /**
     * Add class to element on scroll
     * @src ./modules/functions.js
     */
    addClassToElementOnScroll('.choose-weight--image', '50%', 'look-at-me');

    /**
     * Make sliders
     * @docs https://swiperjs.com/get-started/
     * @src ./modules/sliderOptions.js
     * @src ./modules/functions.js
     */
    swiper('#test', productsPageSliderOptions);
})();