document.addEventListener('DOMContentLoaded', function(){  

    let form = document.getElementById('form');


    function prevent(e){
        let title = document.getElementById('title').value;
        console.log(title);
        let content = document.getElementById('description').value;

        removeHighlight();

        let empty= [];

        if(title === ""){
            empty.push('title');
        }

        if(content === ""){
            empty.push('description');
        }

        if(empty.length > 0){
            empty.forEach((element) => {
                document.getElementById(element).classList.add('highlight');
            }); 
            e.preventDefault();

        }
    }

    function removeHighlight(){
        let id = ['title', 'description'];
        id.forEach((element) => {
            document.getElementById(element).classList.remove('highlight');
            document.getElementById(element).addEventListener('input', removeHighlight);


        });
    }

   
    removeHighlight();
    form.addEventListener('submit', prevent);   

  


    let clear = document.getElementById('clear');

    clear.addEventListener('click', function(){
        let confirm = window.confirm('Are you sure you want to clear the form?');

        if(confirm){
            let id = ['title', 'description'];

            id.forEach((element) => {
                document.getElementById(element).value = "";
            });

            removeHighlight();
        }
    });

    

});