function writeServiceInfoToForm() {
    let btns = document.querySelectorAll('[data-modal-id]');
    let serviceTitleInput = document.querySelector('input[name="service_title"]')
    let coachLevelInput = document.querySelector('input[name="coach_level"]')

    btns.forEach(btn => {
        btn.addEventListener('click', (event) => {
            if (event.target.hasAttribute('data-service-id')) {
                let activeCategory = document.querySelector(`.service__tab-btn.active[id^="${event.target.dataset.serviceId}"]`);
                if (activeCategory) {
                    coachLevelInput.value = activeCategory.id[2];
                } else {
                    coachLevelInput.value = null;
                }
                serviceTitleInput.value = event.target.dataset.serviceTitle;
            } else if (event.target.hasAttribute('data-season-ticket-id')) {
                let activeCategory = document.querySelector(`.season-ticket__tab-btn.active[id^="${event.target.dataset.seasonTicketId}"]`)
                if (activeCategory) {
                    coachLevelInput.value = activeCategory.id[2];
                } else {
                    coachLevelInput.value = null;
                }
                serviceTitleInput.value = event.target.dataset.serviceTitle;
            } else {
                return false;
            }
        })
    });
};


if (document.readyState !== 'loading') {
    writeServiceInfoToForm();
} else {
    document.addEventListener("DOMContentLoaded", () => {
        writeServiceInfoToForm();
    });
}