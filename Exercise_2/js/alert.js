function message() {
    var Name = document.getElementById('name');
    var PhoneNo = document.getElementById('phoneno');
    var Pickup = document.getElementById('pickuploc');
    var Destination = document.getElementById('destination');
    var PickupDate = document.getElementById('pickupdate');
    var Time = document.getElementById('time');

    const success = document.getElementById('success');
    const danger = document.getElementById('danger');

    if (Name.value === '' || PhoneNo.value === '' || Pickup.value === ''
        || Destination.value === '' || PickupDate.value === '' || Time.value === '') {
        danger.style.display = 'block';
    }
    else {
        setTimeout(() => {
            Name.value = '';
            PhoneNo.value = '';
            Pickup.value = '';
            Destination.value = '';
            PickupDate.value = '';
            Time.value = '';
        }, 2000);

        success.style.display = 'block';
        myFunction();
    }


    setTimeout(() => {
        danger.style.display = 'none';
        success.style.display = 'none';
    }, 4000);

}

function myFunction() {
    setTimeout(() => {
        alert("Redirecting to home page");
        location.replace("index.html")
    }, 3000);

}