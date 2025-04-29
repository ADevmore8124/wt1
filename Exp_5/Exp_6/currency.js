function calculate(operation) {
    let amount = parseFloat(document.getElementById("number").value);
    
    if (isNaN(amount)) {
        alert("Please enter a valid number.");
        return;
    }

    let exchangeRate = 85.67;     let result;

  
        result = amount / exchangeRate;

    document.getElementById("result").value = result.toFixed(2); 
}
