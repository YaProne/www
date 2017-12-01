var http = require('http')

var s = http.createServer(hello)

s.listen(80)

console.log('Listening on port 80')

function hello(req, resp)
{
	resp.write('Hello, world!')
	resp.end()
	console.log('url=', req.url)
	console.log('method=', req.method)
	console.log('v=', req.httpVersion)
	console.log(req.headers)
}
