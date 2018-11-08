var myRec = new p5.SpeechRec('en-US', parseResult); // new P5.SpeechRec object
myRec.continuous = true; // do continuous recognition
myRec.interimResults = true; // allow partial recognition (faster, less accurate) // new P5.Speech object



function setup(){
myRec.start(); // start engine
}


function parseResult(){
// recognition system will often append words into phrases.
// so hack here is to only use the last word:
var mostrecentword = myRec.resultString.split(' ').pop();
if(mostrecentword.indexOf("login")!==-1){
window.location.href = "login";
}else if(mostrecentword.indexOf("register")!==-1){
window.location.href = "register"
}
else if(mostrecentword.indexOf("name")!==-1){
writeName();
}

}
function writeName(){
var myName = myRec.resultString;
console.log(myName);
// document.getElementById("name").value= myName;
}
