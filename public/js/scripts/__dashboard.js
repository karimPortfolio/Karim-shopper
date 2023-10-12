
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

addProductAlertTime();

