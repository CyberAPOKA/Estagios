function display_payroll_div(e) {
    currency_value = document.getElementById('cidade').value;
    //input
    document.getElementById('inputbairro').style.display = "none";
    if (currency_value != 'São Leopoldo') {
        document.getElementById('inputbairro').style.display = "block";
        document.getElementById('selecione').style.display = "none";

    }
    //select
    document.getElementById('select').style.display = "none";
    if (currency_value == 'São Leopoldo') {
        document.getElementById('select').style.display = "block";
        document.getElementById('selecione').style.display = "none";
    }
    else {
        document.getElementById('bairro2').selectedIndex = 0;
    }
}