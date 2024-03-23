document.getElementById('contactForm').addEventListener('submit', function (event) {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    var phone = document.getElementById('phone').value;

    if (!name || !email || !message || !phone) {
        alert('Please fill out all fields.');
        event.preventDefault();
        return;
    }

    var emailRegex = /^[a-zA-Z0-9._%+-]+@gmail\.com$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid Gmail address.');
        event.preventDefault();
        return;
    }

    var phoneRegex = /^(01|07)\d{9}$/;
    if (!phoneRegex.test(phone)) {
        alert('Please enter a valid phone number starting with 01 or 07.');
        event.preventDefault();
        return;
    }
});
