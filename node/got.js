const fs = require('fs');
const got = require('got');
 
got('ya.ru')
    .then(response => {
        console.log(response.body);
        //=> '<!doctype html> ...' 
    })
    .catch(error => {
        console.log(error.response.body);
        //=> 'Internal server error ...' 
    });
 
// Streams 
got.stream('ya.ru').pipe(fs.createWriteStream('ya-ru.html'));
 
// For POST, PUT and PATCH methods got.stream returns a WritableStream 

//fs.createReadStream('ya-ru.html').pipe(got.stream.post('todomvc.com'));