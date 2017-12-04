var http = require('http');
var url = require('url');
//var util = require('util');
//var formidable = require('formidable');

function start(route, handle){
	
	function onRequest(request, response){
		var postData = "";
		var pathname = url.parse(request.url).pathname;
		console.log("Request for " + pathname + " received.");
		
		route(handle, pathname, response, request);
		
//		request.setEncoding('utf8');
//		
//		request.addListener('data', function(postDataChunk){
//			postData += postDataChunk;
//			console.log("Received POST data chunk '" + postDataChunk + "'.");
//		});
//		
//		request.addListener('end', function(){
//			route(handle, pathname, response, postData);
//		});		

//      if (request.url == '/upload' && request.method.toLowerCase() == 'post') {
//      	// parse a file upload
//      	var form = new formidable.IncomingForm();
//      	form.parse(request, function(err, fields, files){
//      		response.writeHead(200, {'content-type': 'text/plain'});
//      		response.write("received upload;\n\n");
//      		response.end(util.inspect({fields: fields, files: files}));
//      	});
//      	
//      	return;
//      }
	}
	
	http.createServer(onRequest).listen(8888);
	console.log('Server has started.');
	
}

exports.start = start;