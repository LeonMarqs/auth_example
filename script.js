$(document).ready(() => {
  
  $('#username').on('focus', () => {
    $('#username-line').addClass('line-active');
  }) 
  $('#username').on('blur', () => {
    $('#username-line').removeClass('line-active');
  })

  $('#password').on('focus', () => {
    $('#password-line').addClass('line-active');
  })
  $('#password').on('blur', () => {
    $('#password-line').removeClass('line-active');
  })

  // signup page
  $('#password2').on('focus', () => {
    $('#password-line2').addClass('line-active');
  })
  $('#password2').on('blur', () => {
    $('#password-line2').removeClass('line-active');
  })

  

});