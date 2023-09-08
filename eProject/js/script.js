const taskFilter =document.querySelector('#taskFilter');
taskFilter.addEventListener("input",filterInput);
function filterInput(event){
    // console.log('clicked');
event.preventDefault();
const currentValue = event.target.value;
// console.log(currentValue);
const filterValue = currentValue.toLowerCase();
// console.log(filterValue);
const listItem = document.querySelectorAll('.tr-row');

listItem.forEach(function (singleLi){
    // console.log(singleLi)
    const singleLiText = singleLi.innerText.toLowerCase();
// console.log(singleLiText);
if(singleLiText.indexOf(filterValue) === -1){
       singleLi.style.display = "none";
}else{
       singleLi.style.display = "";
}
   
});

};
function approveRow(button) {
    const row = button.parentNode.parentNode;
    const siblingbtn = button.nextElementSibling;
  
    // Remove the sibling row with a fade-out effect, if it exists
      // siblingbtn.style.transition = 'opacity 0.1s ease';
      siblingbtn.style.opacity = 0;
  

      button.innerHTML = "approved";
    
    
            row.style.transition = 'opacity 0.7s ease';
            row.style.opacity = 0.3;
        setTimeout(function() {
        row.remove();
      }, 100);
  }
  function rejectRow(button) {
    const row = button.parentNode.parentNode;
    const elderSibling = button.previousElementSibling;
  
   
      // elderSibling.style.transition = 'opacity 0.1s ease';
      elderSibling.style.opacity = 0;
   
      button.innerHTML = "rejected";
      row.style.transition = 'opacity 0.7s ease';
      row.style.opacity = 0.3;
  
    setTimeout(function() {
      row.remove();
    }, 100);
  }
  
  

  
  
   
