let n = 5

const factorial = n => n < 2 ? 1 : n * factorial(n-1)

alert(`${n}! =  ${factorial(n)}`)

function alert(s) {
	console.log(s)
}
