

function bookmark(event){


    event.preventDefault();


    httpGet(event.currentTarget.href)
        .then(
            response => alert(response));

}

function httpGet(url) {

    return new Promise(function(resolve, reject) {

        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);

        xhr.onload = function() {
            if (this.status == 200) {
                resolve(this.response);
            } else {
                var error = new Error(this.statusText);
                error.code = this.status;
                reject(error);
            }
        };

        xhr.onerror = function() {
            reject(new Error("Network Error"));
        };

        xhr.send();
    });

}



function link(e){
    resetmenu();
    e.preventDefault();
    e.currentTarget.children[0].classList.add('active');

    httpGet(e.currentTarget.href)
        .then(
            response => inserToRoot(response));
}













function chengeActiveButton() {
    var filter = document.getElementsByClassName('filter-line')[0];

    if (!filter) {
        return;
    }
    var filter = document.getElementsByClassName('filter-line')[0].children;
    if (location.pathname=='/all')
        filter[1].className="active";
    else {
        filter[0].className="active";
    }
}

var nav=document.getElementById('nav'),
    lk=document.getElementById('lk'),
    overlays=document.getElementsByClassName('overlay');

if (lk) {
    lk.addEventListener('click', openLkMenu);
}


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

    if (!lk){
        return;
    }

    if (list.classList[list.classList.length-1]=='nav-open-right') {
        list.classList.remove('nav-open-right');
        overlay.classList.remove('open');
    }
    else {
        list.classList.add('nav-open-right');
        overlay.classList.add('open');
    }
}



// function open_menu(){
//
//     var list=document.getElementById('list'),
//         lk=document.getElementById('lkList');
//
//
//
//     if (list.style.display=='none' || lk.style.display=='none'){
//         list.style.left='0';
//         list.style.display='block';
//         lk.style.right='0';
//         lk.style.display='block';
//         overlay.style.display='block';
//
//     }
//     else {
//         list.style.left='-70%';
//         list.style.display='none';
//         overlay.style.display='none';
//         lk.style.right='-70%';
//         lk.style.display='none';
//     }
//
//
//
// }

chengeActiveButton();
// lk.addEventListener('click', openNavMenu);
nav.addEventListener('click', openNavMenu);



overlays[0].addEventListener('click', openNavMenu);
overlays[1].addEventListener('click', openLkMenu);
