

<?php
$this->registerCssFile('/css/user.css');
$this->registerCssFile('/css/post.css');

use yii\helpers\Html;
?>

<section class="content-wrap">
    <div class="white-block display-flex white-block_row">


        <input id="search" type="text" placeholder="Поиск">
        <a href="/searching/" onclick="find(event)">Нажми что бы Найти</a>












</div>

    <div id="root"></div>
</section>

<script>

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



    function find(e){

        e.preventDefault();


        httpGet(e.currentTarget.href+get_input_val())
            .then(
                response => inserToRoot(response));
    }



    function get_input_val(){
        return document.getElementById('search').value;
    }


    function inserToRoot(data) {
        var root = document.getElementById('root');
        root.innerHTML=data;
        console.log('success');
    }










</script>