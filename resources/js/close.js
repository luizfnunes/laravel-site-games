var deleteButton = document.querySelector('.delete:not(#delete-modal)');
  deleteButton.addEventListener('click', function(){
    var element = this.parentElement;
    element.style.display = 'none';
});