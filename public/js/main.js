// main js

const inputobj = {
    passwords : document.querySelectorAll("input[type='password']"),
    button : document.querySelector(".button"),
    div : document.querySelector("#inputDiv")
};

inputobj.button.addEventListener('click', (e) => {
inputobj.div.style.display = 'block';

inputobj.button.setAttribute('value', 'Submit Password');
inputobj.button.style.background='green';

});
