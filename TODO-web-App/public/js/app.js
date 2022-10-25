const a_task = document.getElementById('a-task');
const c_task = document.getElementById('c-task');
const p_task = document.getElementById('p-task');

const a_task_l = document.getElementById('a-task-l');
const c_task_l = document.getElementById('c-task-l');
const p_task_l = document.getElementById('p-task-l');

a_task.addEventListener('click', function() {
    a_task.classList.add('active');
    c_task.classList.remove('active');
    p_task.classList.remove('active');
    a_task_l.classList.add('active');
    c_task_l.classList.remove('active');
    p_task_l.classList.remove('active');
});

c_task.addEventListener('click', function() {
    c_task.classList.add('active');
    a_task.classList.remove('active');
    p_task.classList.remove('active');
    c_task_l.classList.add('active');
    a_task_l.classList.remove('active');
    p_task_l.classList.remove('active');
});

p_task.addEventListener('click', function() {
    p_task.classList.add('active');
    a_task.classList.remove('active');
    c_task.classList.remove('active');
    p_task_l.classList.add('active');
    a_task_l.classList.remove('active');
    c_task_l.classList.remove('active');
});