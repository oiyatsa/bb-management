function by_expiration_order(a,b) {
    if (a.expiration_date == b.expiration_date ) { return 0}
    if (a.expiration_date > b.expiration_date) {  return 1 }
    if (a.expiration_date < b.expiration_date) {  return -1 }
    //  https://techblg.app/articles/js-sort-array/
}

let foods = []
foods.sort(function(x, y) {
  var firstDate = new Date(x.expiration_date),
      SecondDate = new Date(y.expiration_date);

  if (firstDate < SecondDate) return -1;
  if (firstDate > SecondDate) return 1;
  return 0;
  //  https://www.delftstack.com/ja/howto/javascript/sort-array-of-objects-by-singlekey-with-date-value/
});

function showRestTime() {
  const now = new Date();
  const goal = //各賞味期限

  const restMillisecond = goal.getTime() - now.getTime();
  const day = Math.floor(restMillisecond / 1000 / 60 / 60 / 24);
  
  document.getElementById('day').textContent = day;
  }
    
  setInterval(showRestTime, 1000);
  //  https://takechi-web.com/javascript-coutdown-remainig-time/