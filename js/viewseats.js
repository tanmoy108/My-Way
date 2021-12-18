var price = document.getElementById("price").value;
var seat = document.getElementById("seatnumber").value;
var ticket = [];
for (var i = 1; i <= seat; i++) {
  ticket.push({ no: i, amount: price });
}

str = ``;
ticket.forEach(function (value, index) {
  str =
    str +
    `<div class="col-xl-1 borderra" for='${value.no}#${value.amount}' onclick="myfun(this)">${value.no} <br> ${value.amount}</div>
    `;
});
// console.log(str);
document.getElementById("maindiv").innerHTML = str;
arr = [];
arr1 = [];
arre = [];
var array = document.getElementById("no1").value;
var tempo = new Array();
tempo = array.split(",");
tempo = tempo.map((el) => el.trim());
// console.log(tempo); // ['2', '5', '1']
for (a in tempo) {
  // console.log(tempo[a]);
  var b = tempo[a];
  arre.push(b);
  if (arre[b] == 0) {
    arre.pop();
  }
}
// console.log(arre);

function myfun(myvar) {
  // alert(myvar.attributes.for.value);
  // console.log(myvar);
  var a = 0;
  let ans = myvar.attributes.for.value;
  // console.log(ans);
  let ans1 = ans.split("#");
  let position = arr.indexOf(ans1[0]);
  console.log(ans1[0]);
  for (var i = 0; i < tempo.length; i++) {
    if (tempo[i] == ans1[0]) {
      position = 1;
      var variable = tempo[i];
      alert("seat no : " + variable + " is already booked");
      var a = 10;
      break;
      // console.log(position);
    }
  }
  if (position == -1) {
    arr.push(ans1[0]);
    arre.push(ans1[0]);
    arr1.push(ans1[1]);
    console.log("added");
    msg = "Added";
    // console.log(arr);
    // console.log(arr1);
  } else {
    console.log("already exist");
    msg = "Already selected";
  }

  // console.log(ans1);
  document.getElementById("msg").innerHTML = msg;
  seatno = arr.join(",");
  seatnoe = arre.join(",");
  // console.log(seatno);
  document.getElementById("seatno").value = seatno;
  document.getElementById("seatnoe").value = seatnoe;
  seatno = arr1.join("+");
  finalamount = eval(seatno);
  // console.log(finalamount);
  document.getElementById("seatamount").value = finalamount;
  if (a == 0) {
    myvar.style.background = "#325FFE";
    myvar.style.color = "white";
  } else if (a == 10) {
    myvar.style.background = "#ff780a";
    myvar.style.color = "white";
  }
}
