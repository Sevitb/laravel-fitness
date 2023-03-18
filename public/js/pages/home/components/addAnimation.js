(function () {
    /* 
       ----- Mainpage sections -----
    */
    let mainSectionsOptions = {
        reset: true,
        distance: '50px',
        origin: 'right'
    }
    let mainSectionAnimation = new ScrollReveal(mainSectionsOptions);

    mainSectionAnimation.reveal('.section-main__title');
    mainSectionAnimation.reveal('.section-main__background-image_row_1', { delay: 100 });
    mainSectionAnimation.reveal('.section-main__background-image_row_2', { delay: 200 });
    mainSectionAnimation.reveal('.section-main__main-image', { delay: 200, origin: 'bottom', duration: 1000 });
    mainSectionAnimation.reveal('.section-main__text-body', { delay: 200, distance: 0, origin: 'bottom', duration: 1000 });
    mainSectionAnimation.reveal('.section-main__sales', { reset: true, delay: 200, origin: 'left', duration: 500 });


    let aboutSectionsOptions = {
        reset: true,
        scale: 0.8
    }
    let aboutSectionAnimation = new ScrollReveal(aboutSectionsOptions);

    aboutSectionAnimation.reveal('.section-about__text-container', { origin: 'bottom', distance: '100%', scale: 1 });


    let huberSectionsOptions = {
        reset: true,
        distance: '50px',
        origin: 'left',
        scale: 1
    }
    let huberSectionAnimation = new ScrollReveal(huberSectionsOptions);
    huberSectionAnimation.reveal('.section-huber__title');
    huberSectionAnimation.reveal('.section-huber__image-container', { origin: 'right', delay: 150 });
    huberSectionAnimation.reveal('.section-huber__text', { distance: false, delay: 150 });


    let advantagesSectionsOptions = {
        reset: true,
        scale: 0.8
    }
    let advantagesSectionAnimation = new ScrollReveal(advantagesSectionsOptions);

    advantagesSectionAnimation.reveal('.section-advantages__grid-item');
    advantagesSectionAnimation.reveal('.section-advantages__image', { delay: 200, origin: 'right', distance: '50px', scale: 1 });
    advantagesSectionAnimation.reveal('.section-advantages__support-image', { delay: 200, origin: 'left', distance: '50px', scale: 1 });
    advantagesSectionAnimation.reveal('.section-advantages__text', { delay: 350, origin: 'left', distance: '50px', scale: 1 });
    advantagesSectionAnimation.reveal('.section-advantages__support-text', { delay: 350, origin: 'right', distance: '50px', scale: 1 });


    let zonesSectionsOptions = {
        reset: true,
        scale: 1,
        delay: 100,
        origin: 'top'
    }
    let zonesSectionAnimation = new ScrollReveal(zonesSectionsOptions);

    zonesSectionAnimation.reveal('.section-zones__grid-item');


    let contactsSectionsOptions = {
        reset: true,
        scale: 1,
        delay: 100,
        origin: 'right'
    }
    let contactsSectionAnimation = new ScrollReveal(contactsSectionsOptions);

    contactsSectionAnimation.reveal('.section-contact-info__grid-item-contacts', { origin: 'left' });
    contactsSectionAnimation.reveal('.section-contact-info__grid-item-map', { delay: 300 });

})();