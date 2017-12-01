fs = require('fs')
url = require('url')
_ = require('underscore')

exports.fact = factHTTP

function factHTTP(req, resp)
{
  var n = parseInt(url.parse(req.url, true).query.n) || 5

  fs.readFile('fact.html', done)

  function done(err, data)
  {
    var f = _.template(''+data)
    resp.end(f({n: n, factorial: factorial}))
  }
}

function factorial(n)
{
  var r = 1
  for(var i = 1; i <=n; i++)
  	r *= i
  return r
}
