// Kill child if some file(s) changed
fs = require('fs')

setInterval(checkNew, 1000 + 100 * Math.random())

var files = {}

function checkNew()
{
  for(file in require.cache)
  {
    if(/\/node_modules\//.test(file))
      continue;
    fs.stat(file, statFile.bind(file))
  }
}

function statFile(err, stats)
{
  if(err)
    return
  var time = stats.mtime.getTime()
  if(files[this] && files[this] != time)
    process.exit()
  files[this] = time
}
