//Input fields
const first_name = document.getElementById('first_name');
const last_name = document.getElementById('last_name');
const address = document.getElementById('address');
const city = document.getElementById('city');
const province = document.getElementById('province');
const postal_code = document.getElementById('postal_code');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const em_id = document.getElementById('em_id');
const service = document.getElementById('service');
const price = document.getElementById('price');
const date = document.getElementById('date');
const ac_model = document.getElementById('ac_model');
const ac_serial = document.getElementById('ac_serial');
const coil_model = document.getElementById('coil_model');
const coil_serial = document.getElementById('coil_serial');
const furnace_model = document.getElementById('furnace_model');
const furnace_serial = document.getElementById('furnace_serial');
const good_care = document.getElementById('good_care');
const file = document.getElementById('file');

// Form
const service_form = document.getElementById('service_form');

// Validation colours
const green = '#4CAF50';
const red = '#F44336';

//Handle Form
// service_form.addEventListener('submit', function (event) {
//     event.preventDefault();
//     if (
//         validateFirstName()
//         && validateLastName()
//         && validateAddress()
//         && validateCity()
//         && validateProvince()
//         && validatePostalCode()
//         && validateEmail()
//         && validatePhone()
//         && validateEmID()
//         && validateService()
//         && validatePrice()
//         && validateAcModel()
//         && validateAcSerial()
//         && validateCoilModel()
//         && validateCoilSerial()
//         && validateFurnaceModel()
//         && validateFurnaceSerial()
//     ){
//         event.stopImmediatePropagation();
//         document.write('does it work');
//     }
//     else{
//         document.write('errors found');
//     }
// });


//Validator Functions
function validateFirstName() {
    if (checkIfEmpty(first_name))
        return false;
    if (containsCharacters(first_name, 1))
        return true;
}
function validateLastName() {
    if (checkIfEmpty(last_name))
        return false;
    if (containsCharacters(last_name, 1))
        return true;
}
function validateAddress() {
    if (checkIfEmpty(address)) 
        return false;
    if (containsCharacters(address, 3))
        return true;
}
function validateCity() {
    if (checkIfEmpty(city)) 
        return false;
    if (containsCharacters(city, 1))
    return true;

}
function validateProvince() {
    if (checkIfEmpty(province)) 
        return false;
}
function validatePostalCode() {
    if (checkIfEmpty(postal_code)) 
        return false;
    if (containsCharacters(postal_code, 5))
    return true;
}
function validateEmail() {
    if (email.value == 'Not Available') {
        setValid(email);
        return true;
    }
    if (checkIfEmpty(email)) 
        return false;

    if (!containsCharacters(email, 2))
        return true;
}
function validatePhone() {
    if (checkIfEmpty(phone)) 
        return false;
    if (containsCharacters(phone, 4))
        return true;
}
function validateEmID() {
    if (checkIfEmpty(em_id)) 
        return false;
    if (containsCharacters(em_id, 6)) 
        return true;

}
function validateService() {
    if (service.value === 'ac_install') {
        setValid(furnace_model);
        setValid(furnace_serial);
        furnace_model.value = ''
        furnace_serial.value = ''
    }
    if (service.value === 'furnace_install') {
        setValid(ac_model);
        setValid(ac_serial);
        setValid(coil_model);
        setValid(coil_serial);
        ac_model.value = ''
        ac_serial.value = ''
        coil_model.value = ''
        coil_serial.value = ''
    }
    if (service.value === 'repair') {
        setValid(ac_model);
        setValid(ac_serial);
        setValid(coil_model);
        setValid(coil_serial);
        setValid(furnace_model);
        setValid(furnace_serial);
        furnace_model.value = ''
        furnace_serial.value = ''
        ac_model.value = ''
        ac_serial.value = ''
        coil_model.value = ''
        coil_serial.value = ''
    }
    return true;
}
function validatePrice() {
    if (checkIfEmpty(price)) 
        return false;
    if (containsCharacters(price, 6)) 
        return true;
}
function validateAcModel() {
    if (checkIfEmpty(ac_model)) 
        return false;
    if (containsCharacters(ac_model, 7)) 
        return true;
}
function validateAcSerial() {
    if (checkIfEmpty(ac_serial)) 
        return false;
    if (containsCharacters(ac_serial, 7)) 
        return true;
}
function validateCoilModel() {
    if (checkIfEmpty(coil_model))
        return false;
    if (containsCharacters(coil_model, 7)) 
        return true;
}
function validateCoilSerial() {
    if (checkIfEmpty(coil_serial)) 
        return false;
    if (containsCharacters(coil_serial, 7)) 
        return true;
}
function validateFurnaceModel() {
    if (checkIfEmpty(furnace_model)) 
        return false;
    if (containsCharacters(furnace_model, 7)) 
        return true;
}
function validateFurnaceSerial() {
    if (checkIfEmpty(furnace_serial)) 
        return false;
    if (containsCharacters(furnace_serial, 7)) 
        return true;
}
function checkIfEmpty(field) {
    if (field.value.trim() === '') {
        setInvalid(field, 'Field cannot be empty')
        return true
    }
    else {
        setValid(field)
        return false
    }
}
function setInvalid(field, message) {
    field.className = 'invalid';
    field.nextElementSibling.innerHTML = message;
    field.nextElementSibling.style.color = red;
}
function setValid(field) {
    field.className = 'valid';
    field.nextElementSibling.innerHTML = '';
    field.nextElementSibling.style.color = green;
}
function containsCharacters(field, code) {
    let regEx;
    switch (code) {
        case 1:
            regEx = /^[a-zA-Z]*$/;
            return matchWithRegEx(regEx, field, 'Must contain only letters')
            break;
        case 2:
            regEx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            return matchWithRegEx(regEx, field, 'Invalid Email');
            break;
        case 3:
            regEx = /^\d+\s[A-z]+\s[A-z]+/;
            return matchWithRegEx(regEx, field, 'Invalid Address');
            break;
        case 4:
            regEx = /^(1?(-?\d{3})-?)?(\d{3})(-?\d{4})$/;
            return matchWithRegEx(regEx, field, 'Invalid Phone#');
            break;
        case 5:
            regEx = /^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$/;
            return matchWithRegEx(regEx, field, 'Format: A1A 1A1');
            break;
        case 6:
            regEx = /^[0-9]*$/;
            return matchWithRegEx(regEx, field, 'Only Numbers Allowed');
            break;
        case 7:
            regEx = /^[a-zA-Z0-9]+$/;
            return matchWithRegEx(regEx, field, 'Only Numbers and Letters Allowed');
            break;
        default:
    }
}

function matchWithRegEx(regEx, field, message) {
    if (regEx.test(field.value)) {
        setValid(field);
        return true;
    }
    else {
        setInvalid(field, message);
        return false;
    }
}