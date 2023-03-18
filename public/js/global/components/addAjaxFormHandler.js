async function sendMail(form) {
    let data = new FormData(form);
    let response = await fetch('send-mail', {
        method: 'POST',
        body: data
    });

    const results = await response.ok; 

    return results;
}

export { sendMail };