document.addEventListener('DOMContentLoaded', ()=>{
    const addTodoBtn = document.getElementById("addTodoBtn");
    const todoInput = document.getElementById("todoInput");
    const todoListEl = document.getElementById("todoList");
    
    let todoList = [];
    addTodoBtn.addEventListener('click', ()=>{
        const todo = todoInput.value;
        if(todo){
            todoList.push(todo);
            todoInput.value='';
            renderTodoList()
        }
    })

    todoListEl.addEventListener('click', (event) => {   
        const idTarget = event.target.id
        console.log(idTarget)
        if (idTarget === 'removeBtn'){
            const todoId = event.target.dataset.id
            console.log(todoId)
            removeTodo(todoId)
        }

    })

    function renderTodoList(){
            todoListEl.innerHTML = todoList.map((todo, index) => {
                return `
             <li id="${index}" class="list-group-item d-flex justify-content-between align-items-center">
                    <span>${todo}</span>
                    <div>
                        <button id="editBtn" data-id=${index} class="btn btn-sm btn-outline-primary me-1">Редактировать</button>
                        <button id="removeBtn" data-id=${index} class="btn btn-sm btn-outline-danger" onClick"removeTodo" >Удалить</button>
                    </div>
                </li>  
            `
            }).join("")
        
    }
    function removeTodo(id){
        todoList = todoList.filter((todo, index)=>{
            if(id!=index){
                 return true
            }
           })
        renderTodoList()
    }
})