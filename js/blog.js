
document.addEventListener('DOMContentLoaded', function() {
    let addbutton = document.querySelectorAll('.add-comment-button');


    document.getElementById('month').addEventListener('change', function()
    {
        document.getElementById('month_form').submit();
    });

    addbutton.forEach(function(button){
        button.addEventListener('click', function(event) {
            event.preventDefault();

            button.style.display = 'none';

            let newform = document.createElement('form');
            newform.className = 'form1';
            
            let hiddeninput = document.createElement('input');
            hiddeninput.type = 'hidden';
            hiddeninput.name = 'post_id';

            let post_id = button.getAttribute('data-post-id');

            hiddeninput.value = post_id;

            let textarea = document.createElement('input');
            textarea.type = 'textarea';
            textarea.name = 'comment';
            textarea.placeholder = 'Enter your comment here';
            textarea.required = true;

            let submit = document.createElement('input');
            submit.type = 'submit';
            submit.name = 'submit';
            submit.value = 'submit comment';
            submit.className = 'add-comment';    

            let testDiv = document.createElement('div');
            testDiv.className = 'test';



            testDiv.appendChild(textarea);
            testDiv.appendChild(submit);
            newform.appendChild(hiddeninput);
            newform.appendChild(testDiv);
            newform.method = "POST";
            newform.action = 'http://localhost:8888/mdanish-phase2/php/addcomment.php';

            let parent = button.parentElement;

            parent.appendChild(newform);


        });
    });

});