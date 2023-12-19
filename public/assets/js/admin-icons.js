let items = document.querySelectorAll('.sidebar > nav > ul > li > a > p');

let spanCompendio = document.createElement('span')
spanCompendio.classList.add('ico-compendio')
items[5].appendChild(spanCompendio)
