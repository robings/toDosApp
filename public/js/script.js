deleteButtons = document.querySelectorAll('.delete');
addDeleteEventListeners(deleteButtons)

completeButtons = document.querySelectorAll('.complete');
addCompleteEventListeners(completeButtons)

editButtons = document.querySelectorAll('.edit');
addEditEventListeners(editButtons)

document.getElementById('closeEditFormButton').addEventListener('click', (e)=> {
    document.getElementById('editForm').style.display='none'
})