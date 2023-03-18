class PriceCalculator {

    valueButtons = document.querySelectorAll('.section-calculator__value-btn');
    price = document.querySelector('.section-calculator__price');
    valueButtonsActive = document.getElementsByClassName('active-value');

    pricesValues = {
        category: {
            '1': 1000,
            '2': 1500,
            '3': 2000,
        },
        type: {
            '1': 500,
            '2': 1000,
        },
        number_of_people: {
            '1': 300,
            '2': 800,
        }
    }

    generatePrice() {
        if (this.valueButtons) {
            this.valueButtons.forEach(button => {
                button.addEventListener('click', (event) => {
                    this.valueButtons.forEach((item) => {
                        if (item.dataset.buttonType === button.dataset.buttonType) {
                            item.classList.remove('active-value');
                        }
                    });
                    if (button == event.target) {
                        button.classList.add('active-value');
                    }
                    this.price.textContent = this.calculate(this.valueButtonsActive);
                });
            });
        }
    }

    calculate(prices) {
        if (prices) {
            let sum = 0,
                currentType;
            Array.from(prices).forEach((button) => {
                if (button.dataset.buttonType != currentType) {
                    sum += this.pricesValues[button.dataset.buttonType][button.dataset.id];
                    console.log(button.dataset.id);
                    currentType = button.dataset.buttonType;
                }
            });
            console.log(sum);
            return sum;
        }
    }
}

export { PriceCalculator };