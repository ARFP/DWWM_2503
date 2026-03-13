const http = require('http');
const os = require('os');

const ip = "0.0.0.0";
const port = "80";
const hostname = os.hostname();

/*const homepage = (req, res) => {
    res.statusCode = 200;
    res.setHeader("Content-Type", "text/plain");
    res.end("Page d'acceuil");
}*/

const server = http.createServer((req, res) => {

    res.statusCode = 200;
    res.setHeader("Content-Type", "text/plain");

    console.log(req.url);

    /*if(req.url == '/toto') {
        res.end("Bienvenue Toto : " + req.url);
    } 
    else if(req.url == '/') {
        res.end("Bienvenue Accueil : " + req.url);
    }
    else {
        res.statusCode = 404;
        res.end("Erreur NON TROUVE : " + req.url);
    }*/

    switch(req.url) {
        case '/toto':
        case '/tata':
            res.end("Bienvenue Toto : " + req.url);
            break;
        case '/': 
            res.end("Bienvenue Accueil : " + req.url);
            break;
        default:
            res.statusCode = 404;
            res.end("Erreur NON TROUVE : " + req.url);
            break;
    }
    
});


server.listen(port, ip, () => {
    console.log("Server " + hostname + " listening on http://" + ip + ":" + port);
});
