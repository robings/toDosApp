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

            document.getElementById('taskName').value = e.target.parentNode.firstChild.textContent

            if (e.target.parentElement.className === 'urgent') {
                document.getElementById('urgentFlag').checked=true
            } else {
                document.getElementById('urgentFlag').checked=false
            }

            if (e.target.parentElement.childElementCount === 2) {
                document.getElementById('completedFlag').checked=true
            } else {
                document.getElementById('completedFlag').checked=false
            }

            document.getElementById('idForEdit').value = e.target.dataset.id

            document.getElementById('editForm').style.display='block'
        })
    })
}

function editFetch() {
    document.getElementById('editForm').style.display='none'
    idForEdit=document.getElementById('idForEdit').value
    taskNameForEdit=document.getElementById('taskName').value
    if (document.getElementById('completedFlag').checked) {
        completedFlagForEdit=1
    } else {
        completedFlagForEdit=0
    }

    if (document.getElementById('urgentFlag').checked) {
        urgentFlagForEdit=1
    } else {
        urgentFlagForEdit=0
    }

    console.log(idForEdit, completedFlagForEdit, urgentFlagForEdit)

    fetch('/edit', {
        method: 'PUT',
        body: JSON.stringify({ "id":idForEdit, "taskName":taskNameForEdit, "completedFlag":completedFlagForEdit, "urgentFlag":urgentFlagForEdit }),
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