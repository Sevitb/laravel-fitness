import { addClassOnClick } from "/js/global/tools/functions.js";

(function () {
    const zonePageTitle = document.querySelector('.section-main-zone__title');

    if (zonePageTitle) {
        if (zonePageTitle.textContent.length >= 7) {
            addClassOnClick(null, 'section-main-zone__title_small', [zonePageTitle]);
        }
    }

})();