class Modal {

    btns = document.querySelectorAll('[data-modal-id]');
    modals = document.querySelectorAll('[id*="modal-"]');

    activate() {
        this.btns.forEach((btn) => {
            btn.addEventListener('click', () => {
                this.modals.forEach((modal) => {
                    if (modal.id == btn.dataset.modalId) {
                        modal.showModal();
                        modal.addEventListener('animationend', () => {
                            modal.querySelector('[class*="close-btn"]').onclick = () => {
                                modal.dataset.close = '';
                                modal.addEventListener('animationend', () => {
                                    delete modal.dataset.close;
                                }, { once: true });
                                modal.close();
                            }
                        }, { once: true });
                    }
                });
            });
        });
    }
}


function process() {
    new Modal().activate();
}



if (document.readyState !== 'loading') {
    process();
} else {
    document.addEventListener("DOMContentLoaded", () => {
        process();
    });
}