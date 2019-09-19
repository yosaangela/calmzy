/**
 * Add class to header on scroll
 * @var element element to fire func on / @type string
 * @var headerclass class to add/remove / @type string
 */
export const headerClassOnScroll = (element, headerClass) => {
    window.onscroll = () => {
        let el = document.querySelector(element);
        if (window.pageYOffset > 100) {
            el.classList.add(headerClass);
        } else {
            el.classList.remove(headerClass);
        }
    }
};