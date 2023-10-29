
function addProductAlertTime()
{
    var alertMessage = document.querySelector('.flashMessages');
    setTimeout( () => {
         if (alertMessage)
         {
            alertMessage.style.display = "none";
         }
    },7000)

    if (alertMessage)
    {
        alertMessage.style.display = "flex";
    }

}

const notifications_toggle = document.querySelector('.notification_bill');
if (notifications_toggle !== null && typeof notifications_toggle !== 'undefined')
{
    notifications_toggle.addEventListener('click', () => {
        console.log('clicked')
        document.querySelector('.drop_downed').classList.toggle('closed');
        document.querySelector('.drop_downed').classList.toggle('opened');
    })
}

addProductAlertTime();

