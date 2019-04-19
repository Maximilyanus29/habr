// const factorial = (n) => { 
// 	const iter = (counter, acc) => { 
// 	if (counter === 1) { 
// 	return acc; 
// 	} 
// 	return iter(counter - 1, counter * acc); 
// 	}; 

// 	return iter(n, 1); 
// };
// console.log(factorial(5));


const smallestDivisor = (n) => { 
	const iter = (base,ite) => { 
	if (base==1) {return 1;}
	else if (base==0) {return 0;}
	else if (base%ite==0){return ite;}
	else if (ite>base){return base;}
	return iter(base,ite+1);



	}; 

	return iter(n,2); 
};

console.log(smallestDivisor(17));

export default smallestDivisor;

