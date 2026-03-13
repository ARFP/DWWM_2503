// import express from 'express';
const express = require('express');
const app = express();
const ip = "0.0.0.0";
const port = 80;


app.get('/', (req, res) => {
    console.log(req.url);
    res.send("Bienvenue !");
});


app.get('/toto', (req, res) => {
    console.log(req.url);
    res.send("Bienvenue Toto !");
});

app.get('/articles', (req, res) => {
    console.log(req.query);
    if(req.query.id !== undefined) {
        res.send("Bienvenue sur l'Article N°" + req.query.id);
    } else {
        res.send("Bienvenue Articles !");
    }
    
});

app.get('/articles/:id', (req, res) => {
    console.log(req.params);
    res.send("Bienvenue Article ID " + req.params.id);
});

app.get('/articles/:id/:action', (req, res) => {
    console.log(req.params);
    res.send("Bienvenue Article ID " + req.params.id + " avec l'action " + req.params.action);
});

var regex = /.*pok$/;

app.get(regex, (req, res) => {
    console.log(req.params);
    res.send("Bienvenue chez Z. J n'est pas loin");
});




app.listen(port, ip, () => {
    console.log('ExpressJS server running on ' + port);
})






/*
app.post('/toto', (req, res) => {

});
app.put();
app.delete();
app.patch();
app.all();*/