function solution(side, ang1, ang2){
  ang3 = 180 - (ang1+ang2);
  t_ang1 = (Math.PI*ang1)/180;
  t_ang2 = (Math.PI*ang2)/180;
  t_ang3 = (Math.PI*ang3)/180;
var sol = (1/2)*(side*side)*((Math.sin(t_ang1)*Math.sin(t_ang2)/Math.sin(t_ang3)));
console.log(sol);
}

solution(3, 60, 60);
