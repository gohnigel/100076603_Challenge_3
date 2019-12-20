// Count variable
var a = 1;

function addLocation() {
    // Retrieve form from html
    var form = document.getElementsByTagName("form")[0];
    var p = document.getElementById('addLocation');

    // Initialise location fieldset
    var fieldset = document.createElement('fieldset');
    var legend = document.createElement('legend');
    var p1 = document.createElement('p');
    var p2 = document.createElement('p');
    var labelAddress = document.createElement('label');
    var inputAddress = document.createElement('input');
    var labelEmail = document.createElement('label');
    var inputEmail = document.createElement('input');
    var labelPhone = document.createElement('label');
    var inputPhone = document.createElement('input');
    var span1 = document.createElement('span');
    var span2 = document.createElement('span');
    var span3 = document.createElement('span');

    // Add text into elements
    legend.textContent = "Location " + ++a;

    labelAddress.setAttribute("for", "address" + a);
    labelAddress.textContent = "Address: ";

    labelEmail.setAttribute("for", "email" + a);
    labelEmail.textContent = "Email: ";

    labelPhone.setAttribute("for", "phone" + a);
    labelPhone.textContent = "Phone: ";

    inputAddress.type = "text";
    inputAddress.name = "location[" + a + "][address]";
    inputAddress.id = "address" + a;
    inputAddress.maxLength = "255";
    inputAddress.required = "required";

    inputEmail.type = "email";
    inputEmail.name = "location[" + a + "][email]";
    inputEmail.id = "email" + a;
    inputEmail.maxLength = "255";
    inputEmail.required = "required";

    inputPhone.type = "text";
    inputPhone.name = "location[" + a + "][phone]";
    inputPhone.id = "phone" + a;
    inputPhone.maxLength = "255";
    inputPhone.required = "required";

    span1.className = "manager";
    span1.textContent = " * ";

    span2.className = "manager";
    span2.textContent = " * ";

    span3.className = "manager";
    span3.textContent = " * ";

    // Appending values to fieldset
    fieldset.appendChild(legend);

    p1.appendChild(labelAddress);
    p1.appendChild(inputAddress);
    p1.appendChild(span1);
    p1.appendChild(labelEmail);
    p1.appendChild(inputEmail);
    p1.appendChild(span2);

    p2.appendChild(labelPhone);
    p2.appendChild(inputPhone);
    p2.appendChild(span3);

    fieldset.appendChild(p1);
    fieldset.appendChild(p2);


    // Insert value into form
    form.insertBefore(fieldset, p);
}
