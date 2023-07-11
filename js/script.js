
// Javascript code

window.addEventListener('DOMContentLoaded', function () {
    // Fetch and display the tasks from the server
    fetchTasks();
  });
  
  function fetchTasks() {
    fetch('php/crud_operations.php')
      .then(response => response.json())
      .then(data => {
        if (data && data.length > 0) {
          const taskList = document.getElementById('task-list');
          taskList.innerHTML = ''; // Clear existing task list
          data.forEach(task => {
            createTaskElement(task);
          });
        } else {
          const taskList = document.getElementById('task-list');
          taskList.innerHTML = 'No tasks found.';
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }
  
  function createTaskElement(task) {
    const taskList = document.getElementById('task-list');
  
    const taskItem = document.createElement('div');
    taskItem.classList.add('task-item');
  
    const description = document.createElement('p');
    description.textContent = task.description;
  
    const dueDate = document.createElement('p');
    dueDate.textContent = 'Due Date: ' + task.due_date;
  
    const status = document.createElement('p');
    status.textContent = 'Status: ' + task.status;
  
    taskItem.appendChild(description);
    taskItem.appendChild(dueDate);
    taskItem.appendChild(status);
  
    taskList.appendChild(taskItem);
  }
  