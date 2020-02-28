


var width = document.querySelector(".wrapper").offsetWidth;
var cards = document.querySelector(".cards");

// console.log(width); //1200
// document.querySelector(".cards").style.height = width + "px";

// document.getElementsByClassName('cards-item').style.height = 3*width/10 + "px";
// document.getElementsByClassName("cards-item").style.width = 3*width/10 + "px";
// console.log(document.getElementsByClassName("cards-item").style.height)

var parentDOM = document.querySelector(".cards");
        
var test=parentDOM.getElementsByClassName("cards-item");//test is not target element
console.log(test);//HTMLCollection[1]

var testTarget=parentDOM.getElementsByClassName("cards-item")[0];//hear , this element is target
console.log(testTarget);//<p class="test">hello word2</p>
let long = parentDOM.getElementsByClassName("long");

for (let i = 0; i < test.length; i++) {
    let element = test[i];
    console.log(element);
    element.style.height = width*0.25 + "px";
    element.style.width = width*0.25 + "px";
    // element.style.height = 3*width/10 + "px";
    // element.style.width = 3*width/10 + "px";
    // console.log(document.getElementsByClassName("cards-item").style.height)
}
for (let i = 0; i < long.length; i++) {
    let element = long[i];
    element.style.height = width*0.5 + "px";
    element.style.width = width*0.25 + "px";
}









