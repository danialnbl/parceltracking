const form = document.getElementById('form')
const staffID = document.getElementById('staffID')
const password = document.getElementById('password')

form.addEventListener('submit', (e) => {
    let messages = []
  
    if (staffID.value.length <= 2) {
      messages.push('StaffID must be longer than 2 characters')
    }
  
    if (password.value.length <= 2) {
      messages.push('Password must be longer than 2 characters')
    }
  
    if (messages.length > 0) {
      alert("There is something wrong with your details!")
      e.preventDefault()
      errorElement.innerText = messages.join(', ')
    }
  })