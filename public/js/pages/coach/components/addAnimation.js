(function () {
    /* 
       ----- Coach page sections -----
    */
    let infoSectionOptions = {
        reset: true,
        distance: '50px',
        origin: 'left'
    }

    let infoSectionAnimation = new ScrollReveal(infoSectionOptions);

    infoSectionAnimation.reveal('.coach-info-section__image-container', { delay: 200, origin: 'bottom', duration: 1000 });
    infoSectionAnimation.reveal('.coach-info-section__text-container');


    let anotherCoachesSectionOptions = {
        reset: true,
        distance: 0,
    }

    let anotherCoachesSectionAnimation = new ScrollReveal(anotherCoachesSectionOptions);
    anotherCoachesSectionAnimation.reveal('.another-coaches-section__grid-item');
})();