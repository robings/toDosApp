function addDeleteEventListeners(deleteButtons) {
    deleteButtons.forEach(function (deleteButton) {
        deleteButton.addEventListener('click', (e) => {
            idForDelete = e.target.dataset.id
            console.log(idForDelete)
            //fetch request to delete something
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