let userName = document.querySelector("body > div > nav > ul.navbar-nav.ml-auto > li > a > span")

console.log(userName.innerHTML);

userName.innerHTML = 'Hola! <b>' + userName.textContent + '</b>' ;



