class Header {

    header = document.querySelector('.header');

    constructor() {
        this.handleHeaderOnScroll();
    }

    handleHeaderOnScroll() {
        document.querySelector('.page-wrapper').style.cssText = `margin-top: ${this.header.offsetHeight}px`;
        let lastScrollTop = 0;
        window.addEventListener('scroll', () => {
            if (scrollY > this.header.offsetHeight) {
                this.header.classList.add('fixed');
                if (lastScrollTop > scrollY) {
                    this.header.classList.add('show');
                    lastScrollTop = scrollY;
                } else {
                    this.header.classList.remove('show');
                    lastScrollTop = scrollY;
                }
            } else if (scrollY == 0) {
                this.header.classList.remove('fixed');
            }
        })
    }
}

export {Header};

