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