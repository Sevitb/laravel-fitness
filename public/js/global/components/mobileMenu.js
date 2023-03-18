"use strict"

import { addClassOnClick, removeClassOnClick } from '../tools/functions.js';

class MobileMenu {

    mobileMenuIcon = document.querySelector('.mobile-menu-icon');
    mobileMenuContainer = document.querySelector('.header__links');
    mobileMenuLinks = document.querySelectorAll('.header__nav-link');

    constructor() {
        this.openMobileMenu();
        this.closeOnScroll();
    }

    openMobileMenu() {
        if (this.mobileMenuIcon) {
            addClassOnClick(this.mobileMenuIcon, 'active', [this.mobileMenuIcon, this.mobileMenuContainer]);
            addClassOnClick(this.mobileMenuIcon, 'blocked', [document.body]);
        }
    }

    closeOnScroll() {
        if (this.mobileMenuIcon) {
            this.mobileMenuLinks.forEach(link => {
                removeClassOnClick(link, 'active', [this.mobileMenuIcon, this.mobileMenuContainer])
                removeClassOnClick(link, 'blocked', [document.body])
            });
        }
    }
}


export { MobileMenu }