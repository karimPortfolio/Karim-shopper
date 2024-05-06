

const eye_icons = document.querySelector('#eye_icons');
const eye_show = document.querySelector('#eye_icons .eye_show');
const eye_hide = document.querySelector('#eye_icons .eye_hide');
const input = document.querySelector('#registrationForm #password');
if (eye_icons && typeof eye_icons !== "undefined")
{
    eye_show.addEventListener('click' , () => {
        eye_icons.classList.toggle('password_show');
        eye_icons.classList.toggle('password_hide');
        input.setAttribute('type', 'text');
    })

    eye_hide.addEventListener('click' , () => {
        eye_icons.classList.toggle('password_show');
        eye_icons.classList.toggle('password_hide');
        input.setAttribute('type', 'password');
    })
}

