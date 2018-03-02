
var Matrix = {
	arr: new Array(100),
	
	set: function(i, j, val){
		var index = this.getArrayIndex(i,j);
		this.arr[index] = val;
		
	},
	get: function(i,j){
		var index = this.getArrayIndex(i,j);
		return this.arr[index];
		
	},
	
	getArrayIndex: function(i,j){
		return parseInt(i.toString() + j.toString());
	}

}


Matrix.set(0,9,1)
console.log(Matrix.get(0,9))

