var date = new Date();
  var tdate = date.getDate(); 
  if(tdate < 10)
  {
    tdate = "0" + tdate;
  }
  var month =date.getMonth()+1;
  if(month < 10)
  {
    month = "0" + month;
  }
  var year = date.getUTCFullYear();
var minDate = year + "-" + month + "-" + tdate;
  document.getElementById("dateroute").setAttribute('min',minDate);
  console.log(minDate);