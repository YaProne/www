url = require('url')

require('http')
.createServer(router)
.listen(80)

// console.log('Listening on port 80')

function router(req, resp)
{
	console.log(req.method, req.url)
	resp.setHeader(
	  	'Content-Type', 
	  	'text/html; charset=utf-8')
	switch(url.parse(req.url).pathname)
	{
		case '/':
		  require('./home').home(resp)
		  break
		case '/fact':
		  require('./fact').fact(req, resp)
		  break
		default:
		  error(resp)
	}
}

function error(resp)
{
  resp.end('Page not found!')
}
