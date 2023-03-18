import JustValidate from '/js/vendor/just-validate/dist/just-validate.es.js';
import IMask from '/js/vendor/imask/esm/imask.js';
import { sendMail } from './addAjaxFormHandler.js'

const checkboxses = document.getElementsByName('time');
const timeInput = document.getElementById('timeInput');

class Validation {

    options = {
        errorFieldCssClass: 'form__input_invalid',
        errorLabelCssClass: 'form__error-label',
        errorLabelStyle: {
            color: 'red',
        },
        validateBeforeSubmitting: true,
    }

    constructor(options = this.options) {
        this.options = options;
        this.maskHeandler();
        this.validate();
    }

    timeChoice() {
        for (let index = 0; index < checkboxses.length; index++) {
            checkboxses[index].onchange = () => {
                if (checkboxses[index].checked && (checkboxses[index].id == "radio-later")) {
                    timeInput.removeAttribute('disabled');
                } else {
                    timeInput.setAttribute('disabled', '');
                    timeInput.value = '';
                }
            }
        }
    }

    maskHeandler() {
        let telInputs = document.querySelectorAll('[type="tel"]');
        let maskOptions = {
            mask: '+{7}(000)000-00-00'
        };
        if (telInputs) {
            telInputs.forEach((telInput) => {
                IMask(telInput, maskOptions);
            })
        }
    }

    validate() {
        let modalForm = document.querySelector('[data-form-type="modal"]');
        if (modalForm) {
            modalForm = new JustValidate(modalForm, this.options);
            modalForm
                .addField('[name="tel"]', [
                    {
                        rule: 'required',
                        errorMessage: 'Укажите телефон.',
                    },
                ])
                .addField('[name="name"]', [
                    {
                        rule: 'maxLength',
                        value: 50,
                        errorMessage: 'Длинна не может превышать 50 символов!',
                    },
                    {
                        rule: 'required',
                        errorMessage: 'Укажите ФИО.',
                    },
                ])
                .addField('[name="email"]', [
                    {
                        rule: 'required',
                        errorMessage: 'Укажите Email',
                    },
                    {
                        rule: 'email',
                        errorMessage: 'Введите корректный Email!',
                    },
                ])
                .onSuccess((target) => {
                    let form = target.target;
                    sendMail(form).then((result) => {
                        if (result) {
                            form.classList.add('success');
                            form.querySelectorAll('input:not([type="hidden"]):not([type="submit"])').forEach((element) => {
                                element.value = "";
                            });
                            setTimeout(() => {
                                form.classList.remove('success');
                            }, 5000);
                        } else {
                            form.classList.add('fail');
                            setTimeout(() => {
                                form.classList.remove('fail');
                            }, 5000);
                        }
                    });
                })
        }
        let smallForm = document.querySelector('[data-form-type="small"]');
        if (smallForm) {
            smallForm = new JustValidate(smallForm, this.options);
            smallForm
                .addField('[name="tel"]', [
                    {
                        rule: 'required',
                        errorMessage: 'Укажите телефон.',
                    },
                ])
                .addField('[name="name"]', [
                    {
                        rule: 'maxLength',
                        value: 50,
                        errorMessage: 'Длинна не может превышать 50 символов!',
                    },
                    {
                        rule: 'required',
                        errorMessage: 'Укажите ФИО.',
                    },
                ])
                .onSuccess((target) => {
                    let form = target.target;
                    sendMail(form).then((result) => {
                        if (result) {
                            form.classList.add('success');
                            form.querySelectorAll('input:not([type="hidden"]):not([type="submit"])').forEach((element) => {
                                element.value = "";
                            });
                            setTimeout(() => {
                                form.classList.remove('success');
                            }, 5000);
                        } else {
                            form.classList.add('fail');
                            setTimeout(() => {
                                form.classList.remove('fail');
                            }, 5000);
                        }
                    });
                })
        }
    }
}

export { Validation };

