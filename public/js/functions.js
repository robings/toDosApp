function addDeleteEventListeners(deleteButtons) {
    deleteButtons.forEach(function (deleteButton) {
        deleteButton.addEventListener('click', (e) => {
            idForDelete = e.target.dataset.id
            //console.log(idForDelete)
            fetch('/', {
                method: 'DELETE',
                body: JSON.stringify({"id": idForDelete}),
                headers: {
                    "Content-Type": "application/json"
                }
                })
                .then((data) => data.json())
                .then((success) => {
                        if (success['success']=1) {
                        window.location.reload(true)
                        } else {
                            console.log('Delete unsuccessful')
                        }
                    })
            })
        })
}

function addCompleteEventListeners(completeButtons) {
    completeButtons.forEach(function (completeButton) {
        completeButton.addEventListener('click', (e) => {
            idForComplete = e.target.dataset.id
            console.log(idForComplete)
            fetch('/', {
                method: 'PUT',
                body: JSON.stringify({"id": idForComplete}),
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then((data) => data.json())
                .then((success) => {
                    if (success['success']=1) {
                        window.location.reload(true)
                    } else {
                        console.log('Complete unsuccessful')
                    }
                })
        })
    })
}

function addEditEventListeners(editButtons) {
    editButtons.forEach(function (editButton) {
        editButton.addEventListener('click', (e) => {
            idForEdit = e.target.dataset.id
            console.log(idForEdit)
            console.log(e.target.parentElement.className)
            document.getElementById('taskName').value = e.target.parentNode.firstChild.textContent
            if (e.target.parentElement.className == 'urgent') {
                document.getElementById('urgentFlag').checked=true
            }
            document.getElementById('editForm').style.display='block'
        })
    })
}

function editFetch($idForComplete, $taskName, $completedFlag, $urgentFlag) {
    fetch('/', {
        method: 'PUT',
        body: JSON.stringify({"id": idForComplete}),
        headers: {
            "Content-Type": "application/json"
        }
    })
        .then((data) => data.json())
        .then((success) => {
            if (success['success']=1) {
                window.location.reload(true)
            } else {
                console.log('Complete unsuccessful')
            }
        })
}