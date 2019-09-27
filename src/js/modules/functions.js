import Swiper from 'swiper';

/**
 * Check if element is in dom
 * @param element @type string - element to check
 */
const isElementInDOM = (element) => {
    return typeof element != undefined && element != null;
}


// EXPORTS

/**
 * Add class to header on scroll
 * @var element element to fire func on / @type string
 * @var headerclass class to add/remove / @type string
 */
export let headerAddClassOnScroll = (element, headerClass, topOffset) => {
    window.addEventListener("scroll", () => {
        let el = document.querySelector(element);
        if (window.pageYOffset >= topOffset) {
            el.classList.add(headerClass);
        } else {
            el.classList.remove(headerClass);
        }
    });
};

/**
 * Add parallax effect to element "background-image"
 * @var element element to fire func on / @type string
 * @var velocity class to add/remove / @type number
 * NOTE: assign @var velocity value between 0 and 1
 */
export let backgroundImageParalax = (element, velocity) => {

    const el = document.querySelector(element);

    if (isElementInDOM(el)) {
        window.addEventListener("scroll", () => {
            let scrolled = window.pageYOffset;
            el.style.backgroundPosition = "0 -" + scrolled * velocity + "px";
        });
    }
};

/**
 * Add class to element on scroll
 * @param element @type string - element to add class to
 * @param offset @type string - offset reactivity of function - value 0% - 100%
 * @param addedClass @type string - class you want to add to element
 * @Waypoints class src: https://www.npmjs.com/package/waypoints
 */
export let addClassToElementOnScroll = (element, offset, addedClass) => {
    const el = document.querySelector(element);
    if (isElementInDOM(el))
        window.addEventListener('scroll', () => {
            new Waypoint({
                element: el,
                handler: () => {
                    el.classList.add(addedClass);
                },
                offset: offset
            })
        });
};

/**
 * Slide the element
 * @param element @type string - element to assign slider to
 * @param options @type object - options for slider - https://swiperjs.com/api/
 */
export let swiper = (element, options) => {
    const el = document.querySelector(element);
    if (isElementInDOM(el))
        new Swiper(el, options);
}