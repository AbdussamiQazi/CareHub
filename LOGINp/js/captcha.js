function generateCaptcha() {
    var num1 = Math.ceil(Math.random() * 10);
    var num2 = Math.ceil(Math.random() * 10);
    var operatorArr = ['+', '-', 'x'];
    var operator = operatorArr[Math.floor(Math.random() * operatorArr.length)];

    var captchaString = '';
    var result;
    switch (operator) {
        case '+':
            captchaString = num1 + ' + ' + num2;
            result = num1 + num2;
            break;
        case '-':
            captchaString = num1 + ' - ' + num2;
            result = num1 - num2;
            break;
        case 'x':
            captchaString = num1 + ' x ' + num2;
            result = num1 * num2;
            break;
    }
    document.getElementById("captchaOperation").textContent = captchaString;
    document.getElementById("txtCaptcha").value = result;
}

function validateCaptcha() {
    var userCaptcha = document.getElementById("txtInput").value;
    var generatedCaptcha = document.getElementById("txtCaptcha").value;

    if (userCaptcha == generatedCaptcha) {
        return true;
    } else {
        alert("Invalid Captcha. Please try again.");
        generateCaptcha();
        return false;
    }
}
