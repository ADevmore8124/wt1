const exchangeRates = {
    USD: 82,   // 1 USD = 82 INR
    EUR: 90,   // 1 EUR = 90 INR
    GBP: 105,  // 1 GBP = 105 INR
    JPY: 0.56, // 1 JPY = 0.56 INR
    AUD: 55    // 1 AUD = 55 INR
};

function convertCurrency(currency) {
    let inrAmount = document.getElementById("currency-value").value;
    if (inrAmount === "" || isNaN(inrAmount)) {
        document.getElementById("result").innerText = "Please enter a valid amount.";
        return;
    }
    let convertedAmount = (inrAmount / exchangeRates[currency]).toFixed(2);
    document.getElementById("result").innerText = `Converted Amount: ${convertedAmount} ${currency}`;
}

document.getElementById("usd-button").addEventListener("click", function() {
    convertCurrency("USD");
});

document.getElementById("eur-button").addEventListener("click", function() {
    convertCurrency("EUR");
});

document.getElementById("gbp-button").addEventListener("click", function() {
    convertCurrency("GBP");
});

document.getElementById("jpy-button").addEventListener("click", function() {
    convertCurrency("JPY");
});

document.getElementById("aud-button").addEventListener("click", function() {
    convertCurrency("AUD");
});
