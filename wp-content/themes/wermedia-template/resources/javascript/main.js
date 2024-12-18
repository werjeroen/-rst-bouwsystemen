import Glide from '@glidejs/glide';

window.$ = window.jQuery = require('jquery');
require('@fancyapps/fancybox');

const docbody = document.querySelector('body');
const navigationToggle = document.querySelector('.header__toggle');
const header = document.querySelector('.header');
const images = document.querySelectorAll('.fancybox');
const contentTable = document.querySelector('.block--content table');
const navigationChildren = document.querySelectorAll('navigation__link--children .link__icon');


let scrollPosition = window.scrollY;

const checkScrollPosition = (position) => {
    if (position > 0) {
        header.classList.add('header--fixed');
    } else {
        header.classList.remove('header--fixed');
    }
}

document.addEventListener("DOMContentLoaded", () => {
    if(header) {
        checkScrollPosition(scrollPosition);
    }

    if (contentTable) {
        contentTable.outerHTML = `<div class='table__wrapper'>${contentTable.outerHTML}</div>`;
    }

    /**
     *  Prevent layout shifts by delaying ALL animations
     */
    setTimeout(function () {
        docbody.classList.remove('preload');
    }, 250);

    /**
     *  Open or close the navigation 
     */ 
    if (navigationToggle) {
        navigationToggle.addEventListener("click", ( event ) => {
            event.preventDefault();

            document.querySelector(".header__slideout").classList.toggle('navigation--open');
            document.querySelector(".header__toggle").classList.toggle('toggle--open');
            docbody.classList.toggle('no-scroll');
        });
    }

    /**
     * Slider functionality for homepage banner
     */
    if (images) {
        $(".fancybox").fancybox({});
    }

    /**
     * Add extra class to open sub-menu
     */
    if(navigationChildren) {
        navigationChildren.forEach(element => {
            element.addEventListener("click", () => {
                element.classList.toggle("open");
            });
        });
    }
});

if(header) {
    window.addEventListener('scroll', function () {
        scrollPosition = window.scrollY;
        checkScrollPosition(scrollPosition);
    });
}