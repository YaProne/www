require('./dev')(worker)

function worker()
{
	require('./router')
}