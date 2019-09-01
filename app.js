const fs = require('fs');

const express = require('express');
let ejs = require('ejs')
let app = express();

app.get('/', function (req, res) {
  res.send('app/index.html');
});

app.get('/search', function (req, res) {


  res.send();
});

app.get('/', function (req, res) {
  res.send('Hello World!');
});

app.get('/', function (req, res) {
  res.send('Hello World!');
});

app.get('/', function (req, res) {
  res.send('Hello World!');
});

app.listen(3000, function () {
  console.log('Example app listening on port 3000!');
});

