document.querySelectorAll('.accountsbtn').forEach(item => {
    item.addEventListener('click', function(event){
        event.preventDefault();
        const capture = document.getElementById('capture');
        if(capture){
            capture.classList.add('hidden');
        }
        
    })
})