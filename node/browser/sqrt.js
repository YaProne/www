let sqr = x => x * x

let approx = (x, y)=> (x + y / x) / 2

let is_good = (x, y) => abs(sqr(x) - y) < 1e-3

let abs = x => x > 0 ? x : -x

let step = (x, y)=>
  is_good(x, y) ? x : step(approx(x, y), y)

let sqrt = y => step(1, y)

console.log("sqrt(5)=", sqrt(5))