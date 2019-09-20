

'use strict';

function chengeActiveButton() {
    var filter = document.getElementsByClassName('filter-line')[0].children;

    console.log(location);
    if (location.pathname=='/all')
        filter[1].className="active";
    else {
        filter[0].className="active";
    }
}


function open_menu(){
    var list=document.getElementById('list'),
        nav=document.getElementById('nav'),
        overlay=document.getElementById('overlay');

    if (list.style.display=='none') {
        list.style.left='0';
        list.style.display='block';
        overlay.style.display='block';

    }
    else {
        list.style.left='-70%';
        list.style.display='none';
        overlay.style.display='none';
    }



};

chengeActiveButton();
nav.addEventListener('click', open_menu);
overlay.addEventListener('click', open_menu);
