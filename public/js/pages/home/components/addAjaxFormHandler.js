function sendMail(event) {
    event.preventDefault();

    fetch('send-mail', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
    });
}