var http = require('http');
var request = require('request');
var colors = require('colors');

request.post('https://deholding.bitrix24.ru/bitrix/components/bitrix/rating.vote/vote.ajax.php', {form:{RATING_VOTE:'Y', RATING_VOTE_TYPE_ID:'FORUM_POST', RATING_VOTE_ENTITY_ID:'63740', RATING_VOTE_ACTION:'plus', sessid:'3d74edc0f9d976caaba6b2835d541c7e'}},function(error, response, body){ 
 	if(!error&&response.statusCode===200){
		//var $= cheerio.load(body);
		//var text = $('#about').text();
console.log('Ответ сервера:\n'.blue+body.green);
	}
	else{
console.log('Ответ сервера:'.blue+error.red);

}   
});
