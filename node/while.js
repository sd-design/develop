function smallestDivisor(num){
  "use strict";
  let i = 2;

  while (i <= num / 2) {
    if (num % i === 0) {
      return i;
    }
    i = i + 1;
  }

  return 1;
}
console.log(smallestDivisor(17) + "\n" + smallestDivisor(15));
