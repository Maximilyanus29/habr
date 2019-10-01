



function chengeActiveButton() {
    var filter = document.getElementsByClassName('filter-line')[0].children;

    // console.log(location);
    if (location.pathname=='/all')
        filter[1].className="active";
    else {
        filter[0].className="active";
    }
}

var nav=document.getElementById('nav'),
    lk=document.getElementById('lk'),
    overlays=document.getElementsByClassName('overlay');
console.log(overlays[0]);



function openNavMenu() {
    var list=document.getElementById('list'),
        overlay = overlays[0];

    if (list.classList[list.classList.length-1]=='nav-open-left') {
        list.classList.remove('nav-open-left');
        overlay.classList.remove('open');
    }
    else {
        list.classList.add('nav-open-left');
        overlay.classList.add('open');
    }
}


function openLkMenu() {
    var list=document.getElementById('lkList'),
        overlay = overlays[1];

    if (list.classList[list.classList.length-1]=='nav-open-right') {
        list.classList.remove('nav-open-right');
        overlay.classList.remove('open');
    }
    else {
        list.classList.add('nav-open-right');
        overlay.classList.add('open');
    }
}



function open_menu(){

    var list=document.getElementById('list'),
        lk=document.getElementById('lkList');



    if (list.style.display=='none' || lk.style.display=='none'){
        list.style.left='0';
        list.style.display='block';
        lk.style.right='0';
        lk.style.display='block';
        overlay.style.display='block';

    }
    else {
        list.style.left='-70%';
        list.style.display='none';
        overlay.style.display='none';
        lk.style.right='-70%';
        lk.style.display='none';
    }



};

chengeActiveButton();
// lk.addEventListener('click', openNavMenu);
nav.addEventListener('click', openNavMenu);
lk.addEventListener('click', openLkMenu);
overlays[0].addEventListener('click', openNavMenu);
overlays[1].addEventListener('click', openLkMenu);
