window.onload = function() {
  var s = Snap(1000, 500);

  var myCircle = s.circle(200, 200, 60);
  var myRect = s.rect(300, 150, 100, 100);
  var myButt = s.polygon(10,10,10,30,40,20).attr({ fill: "red", stroke: "blue" });;
var style = {
    fill: "#318199",
    stroke: "#444",
    strokeWidth: 3
};
var style2 = {
    fill: "#5fb6b5",
    stroke: "#444",
    strokeWidth: 3
};
  myCircle.attr(style2);
  myRect.attr(style);

group = s.g(myCircle, myRect);

myCircle.node.onclick = function () {
    myCircle.attr("fill", "red");
};
group.drag(function(dx) {
  return this.transform("r" + dx + ",200,200");

});
myButt.node.onclick = function () {
  myRect.toggleClass();
  myButt.attr("fill", "green");
};

}
