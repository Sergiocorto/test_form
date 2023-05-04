const firsNameInput = document.getElementById('first_name');
firsNameInput.addEventListener('input', () =>{
    const nameRegex = /^[a-zA-Zа-яА-ЯёЁ']+$/;
    if (!nameRegex.test(firsNameInput.value)) {
        alert('Можна використовувати лише літери');
        return;
    }
})

const lastNameInput = document.getElementById('last_name');
lastNameInput.addEventListener('input', () =>{
    const nameRegex = /^[a-zA-Zа-яА-ЯёЁ']+$/;
    if (!nameRegex.test(lastNameInput.value)) {
        alert('Можна використовувати лише літери');
        return;
    }
})


async function processForm(event) {
    event.preventDefault();
    const firstName = document.getElementById('first_name').value.trim();
    const lastName = document.getElementById('last_name').value.trim();
    const email = document.getElementById('email').value.trim();
    let password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirm_password').value.trim();

    if (password === confirmPassword) {

        password = btoa(password);

        const user = {
            'firstName': firstName,
            'lastName': lastName,
            'email': email,
            'password': password
        }

        const form = document.getElementById('form');
        await fetch(form.action, {
            method: form.method,
            body: JSON.stringify(user)
        })
            .then(response => {
                if (!response.ok) {
                    alert('Реєстрація не пройшла, спробуйте ще раз')
                }
                hideFormAndShowGreeting()
            });
    } else {
        alert('Пароль та повтор паролю не співпадають');
    }
}

function hideFormAndShowGreeting() {

    const form = document.getElementById('form');
    const greeting = document.getElementById('greeting');

    form.style.display = 'none';

    greeting.style.display = 'block';
}