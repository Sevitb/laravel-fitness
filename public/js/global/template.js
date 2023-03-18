import { MobileMenu } from './components/mobileMenu.js';
import { Header } from './components/header.js';
import { Validation } from './components/validation.js';

function startApp() {
    new Header();
    new MobileMenu();
    new Validation();
}

if (document.readyState !== 'loading') {
    startApp();
} else {
    document.addEventListener("DOMContentLoaded", () => {
        startApp()
    });
}