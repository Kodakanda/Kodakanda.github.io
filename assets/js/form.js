let checkbox = document.getElementById('form-accept-checkbox')
let formSend = document.getElementById('order-form-send')
checkbox.onchange = function(){
  if(checkbox.checked){
    formSend.removeAttribute('disabled')
  }else{
    formSend.setAttribute('disabled', 'true');
  }
}