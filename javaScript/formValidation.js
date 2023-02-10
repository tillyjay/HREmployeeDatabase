
// add employee form validation
function validateForm()
{
    const birthD = document.forms["insertForm"].birthD;
    const fName = document.forms["insertForm"].fName;
    const lName = document.forms["insertForm"].lName;
    const gender = document.forms["insertForm"].gender;
    const hireD = document.forms["insertForm"].hireD;

    function turnRed()
    {
        if (birthD.value.length == 0)
        {
            birthD.style.border = "1px solid red";
        }
        if (fName.value.length == 0)
        {
            fName.style.border = "1px solid red";
        }
        if (lName.value.length == 0)
        {
            lName.style.border = "1px solid red";
        }
        if (gender.value.length == 0)
        {
            gender.style.border = "1px solid red";
        }
        if (hireD.value.length == 0)
        {
            hireD.style.border = "1px solid red";
        }
    }

        if (birthD.value.length == 0 ||
            fName.value.length == 0 ||
            lName.value.length == 0 ||
            gender.value.length == 0 ||
            hireD.value.length == 0)
        {
            turnRed();
            return false;
        }
        else
        {
            return true;
        }

}


// birthdate validation
function birthDisplayError()
{
    const birthD = document.getElementById("birthD");
    const birthDVal = birthD.value;
    const birthDL = birthD.parentElement;
    const ifP = document.getElementById('birthDP');

    if (typeof(ifP) != 'undefined' && ifP != null)
    {
        ifP.remove();
    }

    const p = document.createElement("p");
    p.setAttribute('id', 'birthDP');
    birthDL.appendChild(p);

    function dateIsValid(birthDVal)
    {
        const regex = /^(\d{4})-(0[1-9]|1[0-2]|[1-9])-([1-9]|0[1-9]|[1-2]\d|3[0-1])$/;
        const tested = regex.test(birthDVal);
        if(tested === true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    const birthDValid = dateIsValid(birthDVal);

    if (birthDValid === true)
    {
        birthD.style.border = "1px solid black";
        p.remove();
    }
    else
    {
        p.innerHTML += "Please enter a birth date in the correct format";
    }
}

// first name validation
function fNameDisplayError()
{
    const fName = document.getElementById("fName");
    const fNameVal = fName.value;
    const fNameL = fName.parentElement;
    const ifP = document.getElementById('fNameP');

    if (typeof(ifP) != 'undefined' && ifP != null)
    {
        ifP.remove();
    }

    const p = document.createElement("p");
    p.setAttribute('id', 'fNameP');
    fNameL.appendChild(p);

    function nameIsValid(nameStr)
    {
        if(nameStr.charAt(0) === nameStr.charAt(0).toUpperCase()
            && nameStr.length >= 2 && nameStr.match(/([A-Za-z])/g))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    const fNameValid = nameIsValid(fNameVal);
    console.log(fNameValid);

    if (fNameValid === true)
    {
        fName.style.border = "1px solid black";
        p.remove();
    }
    else
    {
        p.innerHTML += "Please enter your first name";
    }
}

// last name validation
function lNameDisplayError()
{
    const lName = document.getElementById("lName");
    const lNameVal = lName.value;
    const lNameL = lName.parentElement;
    const ifP = document.getElementById('lNameP');

    if (typeof(ifP) != 'undefined' && ifP != null)
    {
        ifP.remove();
    }

    const p = document.createElement("p");
    p.setAttribute('id', 'lNameP');
    lNameL.appendChild(p);

    function nameIsValid(nameStr)
    {
        if(nameStr.charAt(0) === nameStr.charAt(0).toUpperCase()
            && nameStr.length >= 2 && nameStr.match(/([A-Za-z])/g))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    const lNameValid = nameIsValid(lNameVal);

    if (lNameValid === true)
    {
        lName.style.border = "1px solid black";
        p.remove();
    }
    else
    {
        p.innerHTML += "Please enter your last name";
    }
}


// gender validation
function genderDisplayError() {
    const gender = document.getElementById("gender");
    const genderVal = gender.value;
    const genderL = gender.parentElement;
    const ifP = document.getElementById('genderP');

    if (typeof (ifP) != 'undefined' && ifP != null) {
        ifP.remove();
    }

    const p = document.createElement("p");
    p.setAttribute('id', 'genderP');
    genderL.appendChild(p);

    function genderIsValid(gChar)
    {
        if(gChar.charAt(0) === gChar.charAt(0).toUpperCase()
            && gChar.length === 1 && gChar.match(/([MFT])/))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    const genderValid = genderIsValid(genderVal);
    console.log(genderValid);

    if (genderValid === true)
    {
        gender.style.border = "1px solid black";
        p.remove();
    }
    else
    {
        p.innerHTML += "Please enter a valid gender initial";
    }
}

// hire date validation
function hireDisplayError()
{

    const hireD = document.getElementById("hireD");
    const hireDVal = hireD.value;
    const hireDL = hireD.parentElement;
    const ifP = document.getElementById('hireDP');

    if (typeof(ifP) != 'undefined' && ifP != null)
    {
        ifP.remove();
    }

    const p = document.createElement("p");
    p.setAttribute('id', 'hireDP');
    hireDL.appendChild(p);

    function dateIsValid(hireDVal)
    {
        const regex = /^(\d{4})-(0[1-9]|1[0-2]|[1-9])-([1-9]|0[1-9]|[1-2]\d|3[0-1])$/;
        const tested = regex.test(hireDVal);
        if(tested === true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    const hireDValid = dateIsValid(hireDVal);

    if (hireDValid === true)
    {
        hireD.style.border = "1px solid black";
        p.remove();
    }
    else
    {
        p.innerHTML += "Please enter a hire date in the correct format";
    }
}

// employee number validation
function empDisplayError()
{
    const empNo = document.getElementById("empNo");
    const empNoVal = empNo.value;
    const empNoL = empNo.parentElement;
    const ifP = document.getElementById('empNoP');

    if (typeof (ifP) != 'undefined' && ifP != null)
    {
    ifP.remove();
    }

    const p = document.createElement("p");
    p.setAttribute('id', 'empNoP');
    empNoL.appendChild(p);

    function empNoIsValid(empNoVal)
    {

        if(empNoVal >= 10001)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    const empNoValid = empNoIsValid(empNoVal);

    if (empNoValid === true)
    {
        empNo.style.border = "1px solid black";
        p.remove();
    }
    else
    {
        p.innerHTML += "Please enter a valid employee number";
    }

}

// update form validation
function valForm()
{
    const empNo = document.forms["updateForm"].empNo;
    const birthD = document.forms["updateForm"].birthD;
    const fName = document.forms["updateForm"].fName;
    const lName = document.forms["updateForm"].lName;
    const gender = document.forms["updateForm"].gender;
    const hireD = document.forms["updateForm"].hireD;

    function turnRed()
    {
        if (empNo.value.length == 0)
        {
            empNo.style.border = "1px solid red";
        }
        if (birthD.value.length == 0)
        {
            birthD.style.border = "1px solid red";
        }
        if (fName.value.length == 0)
        {
            fName.style.border = "1px solid red";
        }
        if (lName.value.length == 0)
        {
            lName.style.border = "1px solid red";
        }
        if (gender.value.length == 0)
        {
            gender.style.border = "1px solid red";
        }
        if (hireD.value.length == 0)
        {
            hireD.style.border = "1px solid red";
        }
    }

    if (empNo.value.length == 0 ||
        birthD.value.length == 0 ||
        fName.value.length == 0 ||
        lName.value.length == 0 ||
        gender.value.length == 0 ||
        hireD.value.length == 0)
    {
        turnRed();
        return false;
    }
    else
    {
        return true;
    }

}
