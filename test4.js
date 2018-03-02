var d = new Date();

class Ant {
	constructor(name) {
	    this.name = name;
		this.history = [];
	}
	  
	hello(ant, from_ant=false) {
		this.history.push(ant.name + " at "+d.getTime() )
		if(from_ant===false){
			ant.hello(this, true)
		}
	}
	
	about() {
		return this.history;
	}
}

var ant1 = new Ant('ant1');
var ant2 = new Ant('ant2');
var ant3 = new Ant('ant3');

ant1.hello(ant3); // встреча
setTimeout(function(){
    ant2.hello(ant3); // встреча
    setTimeout(function(){
        ant3.hello(ant1); // встреча
        
        console.log('ant1',ant1.about()); // просим рассказать о себе и встречах
        console.log('ant2',ant2.about()); // просим рассказать о себе и встречах
        console.log('ant3',ant3.about()); // просим рассказать о себе и встречах
        
    },2000);
},2000);
