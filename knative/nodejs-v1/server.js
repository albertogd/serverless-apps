var express = require('express'),
    app = express(),
    port = process.env.PORT || process.env.OPENSHIFT_NODEJS_PORT || 8080,
    ip   = process.env.IP   || process.env.OPENSHIFT_NODEJS_IP || '0.0.0.0',
    version = '1.0';

app.get('/', function(req, res) {
    res.send('<html>');
    res.send('<h1>NodeJS test application</h1>');
    res.send('Version: ' + version + '<br /><br />');
    res.send('Container: ' + os.hostname());
});


app.listen(port, ip);

module.exports = app;
