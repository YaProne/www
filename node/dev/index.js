// Boot up Node.js' cluster

var cluster = require('cluster')

module.exports = cluster.isMaster ? master : slave

function master()
{
  for(var j = require('os').cpus().length; j>0; j--)
    cluster.fork()

  cluster
  .on('listening', function(worker, address)
  {
    console.log(`Worker ${worker.process.pid} listening on port ${address.port}`)
  })
  .on('exit', function(worker, code, signal)
  {
    console.log(`Worker ${worker.process.pid} died!`)
    setTimeout(restart, 300 + Math.round(200 * Math.random()))
  })
}

function restart()
{
  cluster.fork()
}

function slave(fn)
{
  require('./reload')
  fn()
}
